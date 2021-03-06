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
        $this->authorize('save', $item);

        $this->validate($request, [
            'title' => 'required|max:22',
            'category' => 'required',
            'description' => 'required',
            'image' => 'max:8000|image',
        ]);

        if($request->hasFile("image")) {
            $image = $request->image;
            $filename = rand(1000,9000) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image)
                ->resize(null, 1000, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save( public_path("/resources/item_images/" . $filename) );
        } else {
            $filename = $item->itemImage;
        }

        Item::where('id', $item->id)->update([  'id' => $item->id,
                                                'title' => $request->title,
                                                'categoryid' => $request->category,
                                                'description' => $request->description,
                                                'itemImage' => $filename
                                            ]);
        return \Redirect::to('items');
    }
}
