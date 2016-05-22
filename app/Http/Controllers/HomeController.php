<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $items = Item::all();

        return view('frontpage', compact('items', 'categories'));
    }
}
