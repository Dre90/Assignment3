<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Image;


class ProfileController extends Controller
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
        return view('profile');
    }

    public function edit()
    {
        return view('edit_profile');

    }


    public function update(Request $request)
    {
      $update_user = new User;
        $update_user->name = $request->name;
        $update_user->address = $request->address;
        $update_user->postnr = $request->postnr;
        $update_user->phonenumber = $request->phonenumber;
        $update_user->email = $request->email;

        $update_user->update();

        return back();
    }


}
