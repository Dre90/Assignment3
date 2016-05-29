<?php

namespace App\Http\Controllers;

use Auth;
use App\Conversation;
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

      //gathering the messages
      foreach ($conversations as $counter => $convo) {
        $convoMessages[$counter] = $convo->message;
      }

      return view('inbox', compact('conversations', 'convoMessages'));

      //return view('inbox', compact('convOwner', 'convInterested', 'convoOwnerMessages'));
      /*
      return view('inbox', [
          'convOwner' => $this->conversation->forUserConvoOwner($Request->user()),
          'convInterested' => $this->conversation->forUserConvoInterested($Request->user()),
      ]);
      */
    }
}
