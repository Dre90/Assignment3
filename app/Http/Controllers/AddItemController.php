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
        $this->validate($request, [
            'title' => 'required|max:255',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        if($request->hasFile("image")) {
            $image = $request->file("image");
            $filename = rand(1000,9000) . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save( public_path("/resources/item_images/" . $filename) );
        }


        $todays_date = date("Y-m-d H:i:s");
        $new_item = new Item;
        $new_item->title = $request->title;
        $new_item->categoryid = $request->category;
        $new_item->description = $request->description;
        $new_item->itemImage = $filename;
        $new_item->userId = $request->_userid;

        $new_item->save();

        return back();
    }
}
