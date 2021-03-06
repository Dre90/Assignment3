<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Item;
use Image;




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
            'title' => 'required|max:22',
            'category' => 'required',
            'description' => 'required',
            'image' => 'max:8000|image|required',
        ]);


        $image = $request->image;
        $filename = rand(1000,9000) . '_' . time() . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image)
            ->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->save( public_path("/resources/item_images/" . $filename) );


        $new_item = new Item;
        $new_item->title = $request->title;
        $new_item->categoryid = $request->category;
        $new_item->description = $request->description;
        $new_item->itemImage = $filename;
        $new_item->userId = $request->_userid;

        $new_item->save();

        return \Redirect::to('items');
    }
}
