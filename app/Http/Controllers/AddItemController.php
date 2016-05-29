<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Image;

use Illuminate\Http\Request;

use App\Http\Requests;


class AddItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('add_item',compact('categories'));
    }

    public function store(Request $request)
    {
        if($request->hasFile("image")) {
            $image = $request->file("image");
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save( public_path("/resources/item_images/" . $filename) );
        }
        // https://www.youtube.com/watch?v=jy2SUxx6uHc

        $todays_date = date("Y-m-d H:i:s");
        $new_item = new Item;
        $new_item->title = $request->title;
        $new_item->categoryid = $request->category;
        $new_item->description = $request->description;
        $new_item->itemImage = $filename;
        $new_item->userId = $request->_userid;
        $new_item->created_at = $todays_date;
        $new_item->updated_at = $todays_date;

        $new_item->save();
        return back();
    }
}
