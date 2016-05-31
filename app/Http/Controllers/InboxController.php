<?php

namespace App\Http\Controllers;

use Auth;
use App\Conversation;
use App\Message;

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

      return view('inbox', compact('conversations'));
    }

    public function show(Conversation $conversation)
    {
      //add authorization

      //get conversation with correct messages
      $conversationMess = $conversation->with('message')
                          ->where('id', $conversation->id)
                          ->get();

      return view('conversation', compact('conversation', 'conversationMess'));
    }

    public function store(Request $request)
    {
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

      return \Redirect::to('inbox/' . $request->convId);
    }
}
