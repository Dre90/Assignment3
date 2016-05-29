<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
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
        return view('item', compact('item'));
    }

    public function showcategory()
    {
        
    }


}
