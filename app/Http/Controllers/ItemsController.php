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
}
