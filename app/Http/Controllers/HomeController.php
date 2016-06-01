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
        $items = Item::orderBy('updated_at', 'DESC')
                    ->where('givenAway', 0)
                    ->get();

        return view('frontpage', compact('items', 'categories'));
    }

    public function show(Item $item)
    {
      if(Auth::user()){
        $convoInterested = Conversation::where('interestedId', Auth::user()->id)->
                                        where('ownerId', $item->userId)->
                                        where('itemId', $item->id)->get();
      }

        return view('item', compact('item', 'convoInterested'));
    }

    public function showcategory(Request $request)
    {
      $catId = $request->catId;
      //gathering the category items
      if ($catId === 0) {
        $items = Item::orderBy('updated_at', 'DESC')
                    ->where('givenAway', 0)
                    ->get();
      } else {
        $cat = Category::where('id', $catId)->get();
        $items = Item::orderBy('updated_at', 'DESC')
                    ->where('categoryId', $catId)
                    ->where('givenAway', 0)
                    ->get();
      }




      return response()->json($items);
      //return response()->json($items);
    }


}
