<?php

namespace App\Http\Controllers;

use Auth;
use App\Conversation;
use App\Message;
use App\Item;
use App\User;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\ConversationRepository;


class InboxController extends Controller
{
  /**
   * The conversation repository instance.
   *
   * @var ConversationRepository
   */
  protected $conversations;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ConversationRepository $conversations)
    {
        $this->middleware('auth');

        $this->conversation = $conversations;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $Request)
    {

      //gather data about conversations for this user
      $convOwner = $this->conversation->forUserConvoOwner($Request->user());
      $convInterested = $this->conversation->forUserConvoInterested($Request->user());


      //merge to one laravel collection
      $conversations = collect();
      foreach ($convOwner as $convo) {
        $conversations->push($convo);
      }

      foreach ($convInterested as $convo) {
        $conversations->push($convo);
      }

      $conversations = $conversations->sortByDesc('updated_at');

      return view('inbox', compact('conversations'));
    }

    public function show(Conversation $conversation)
    {
      //add authorization
      $this->authorize('show', $conversation);

      //get conversation with correct messages
      $conversationMess = $conversation->with('message')
                          ->where('id', $conversation->id)
                          ->get();

      return view('conversation', compact('conversation', 'conversationMess'));
    }

    public function store(Request $request, Conversation $conversation)
    {
      //authorize, validate and save the new message
      $this->authorize('store', $conversation);

      $this->validate($request, [
        'convId' => 'required|exists:conversations,id',
        'userId' => 'required|exists:users,id',
        'newMessage' => 'required',
      ]);

      $newMessage = new Message;
      $newMessage->conversationId = $request->convId;
      $newMessage->userId = $request->userId;
      $newMessage->body = $request->newMessage;

      $newMessage->save();

      //updating the messageCount on the related conversation
      $conv = Conversation::where('id', $request->convId)->get();
      $conv[0]->messageCount += 1;
      $conv[0]->save();

      return \Redirect::to('inbox/' . $request->convId);
    }

    public function create(Request $request, Conversation $conversation, Item $item)
    {
      $this->validate($request, [
        'newMessage' => 'required',
      ]);

      //check if unique ids in conversations table
      $checkDB = count(Conversation::where('interestedId', $request->user()->id)->
                                  where('ownerId', $item->userId)->
                                  where('itemId', $item->id)->get());

      //processing the data and storing in db
      if ($checkDB === 0){
        //user id, item id and item owner id are unique
        //creating new conversation
        $newConvo = new Conversation;
        $newConvo->interestedId = $request->user()->id;
        $newConvo->ownerId = $item->userId;
        $newConvo->itemId = $item->id;
        $newConvo->messageCount = 1;

        $newConvo->save();

        //getting the new conversation id
        $conv = Conversation::where('interestedId', $request->user()->id)->
                                    where('ownerId', $item->userId)->
                                    where('itemId', $item->id)->get();

        //return $conv[0]->id;
        //creating the new message in the new conversation
        $newMessage = new Message;
        $newMessage->conversationId = $conv[0]->id;
        $newMessage->userId = $request->user()->id;
        $newMessage->body = $request->newMessage;

        $newMessage->save();

        return \Redirect::to('inbox/' . $conv[0]->id);

      } else {
        //not ok
        //should be part of the validation form? custom validator maybe?
        //TODO: add feedback
      }
    }
}
