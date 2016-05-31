<?php

namespace App\Http\Controllers;

use Auth;
use App\Item;
use App\Category;
use App\Conversation;
use App\User;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $items = Item::orderBy('created_at', 'DESC')
                    ->where('givenAway', 0)
                    ->get();

        return view('frontpage', compact('items', 'categories'));
    }

    public function show(Item $item)
    {
      if(Auth::user()){
        $convoInterested = Conversation::where('interestedId', Auth::user()->id)->get();
      }

        return view('item', compact('item', 'convoInterested'));
    }

    public function showcategory()
    {

    }


}
