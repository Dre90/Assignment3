<?php

namespace App\Http\Controllers;

use Auth;
use App\Item;
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     /*
    public function index(Request $request)
    {
        //$items = Item::all()->user->id;
        //$user = Auth::user();

        //return view('items', compact('items', 'user'));
        return view('items', [
           'items' => $this->item-forUser($request->user()),
      ]);
    }
    */

    public function index(Request $request)
    {
        //variables for storing active and given way items
        $activeItems = NULL;
        $givenAwayItems = NULL;
        //Gathering this users items
        $items = $this->item->forUser($request->user());

        //splitting this users items into given away or not arrays
        foreach ($items as $columnName => $item) {
          if ($item['givenAway'] === 0) {
            $activeItems .= $item;
          } elseif ($item['givenAway'] === 1) {
            $givenAwayItems .= $item;
          }
        }

        return view('items', compact('activeItems', 'givenAwayItems'));


    }

}
