<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Item;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\ItemRepository;


class ItemsController extends Controller
{
    /**
     * The item repository instance.
     *
     * @var ItemRepository
     */
    protected $items;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ItemRepository $items)
    {
        $this->middleware('auth');

        $this->item = $items;
    }

    /**
     * Show the users items page.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        return view('items', [
            'activeItems' => $this->item->forUserActive($request->user()),
            'givenAwayItems' => $this->item->forUserGivenAway($request->user()),
        ]);
    }

    /**
    * Destroy the given item.
    *
    * @param  Request  $request
    * @param  Item  $item
    * @return Response
    */
    public function destroy(Request $request, Item $item)
    {
      $this->authorize('destroy', $item);

      $item->delete();

      return back();
    }

    /**
    * Update the given item based on current givenAway status.
    *
    * @param  Request  $request
    * @param  Item  $item
    * @return Response
    */
    public function update(Request $request, Item $item)
    {
      $this->authorize('update', $item);

      if ($item->givenAway === 0) {
        Item::where('id', $item->id)->update(['givenAway' => 1]);
      } elseif ($item->givenAway === 1) {
        Item::where('id', $item->id)->update(['givenAway' => 0]);
      }

    return back();
    }

    /**
    * Edit the given item based.
    *
    * @param  Request  $request
    * @param  Item  $item
    * @return Response
    */
    public function edit(Request $request, Item $item)
    {
        $this->authorize('edit', $item);

        $categories = Category::all();
      return view('edit_item', compact('item', 'categories'));
    }

    public function save(Request $request, Item $item)
    {
 $itemimg = item::where('id', $item->id)->get();

        // $item->update($request->all());
        // return back();
        $this->validate($request, [
            'title' => 'required|max:255',
            'category' => 'required',
            'description' => 'required'
            // 'image' => 'required|image',
        ]);

        if($request->hasFile("image")) {
            $image = $request->file("image");
            $filename = rand(1000,9000) . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save( public_path("/resources/item_images/" . $filename) );
        } else {
            $filename = $itemimg->itemImage;
        }

        $new_item = new Item;
        $new_item->id = $request->itemid;
        $new_item->title = $request->title;
        $new_item->categoryid = $request->category;
        $new_item->description = $request->description;
        $new_item->itemImage = $filename;
        $new_item->userId = $request->_userid;

        $new_item->save();
        return back();
        // return \Redirect::to('items');
    }
}
