<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Image;
use Auth;

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

    public function edit(user $user)
    {
        $loggedInUser = Auth::user()->id;
        $user = user::where('id', $loggedInUser)->get()->first();

        // return $user;
        return view('edit_profile', compact('user'));

    }


    public function update(Request $request, user $user)
    {
        // $this->validate($request, [
        //     'name' => 'required|max:255',
        //     'email' => 'required|email|max:255',
        //     'address' => 'required|max:255',
        //     'postnr' => 'required|digits:4|exists:posts,postnr',
        //     'phonenumber' => 'required|digits:8'
        // ]);
        //
        // if($request->hasFile("image")) {
        //     $image = $request->file("image");
        //     $filename = rand(1000,9000) . '_' . time() . '.' . $image->getClientOriginalExtension();
        //     Image::make($image)->save( public_path("/resources/user_images/" . $filename) );
        // } else {
        //     $filename = $user->userImage;
        // }

        // user::where('id', $user->id)->update([  'id' => $user->id,
        //                                         'name' => $request->name,
        //                                         'email' => $request->email,
        //                                         'address' => $request->address,
        //                                         'postnr' => $request->postnr,
        //                                         'phonenumber' => $request->phonenumber,
        //                                         'userImage' => $filename]
        //                                     );
return view('profile');
        return "test";
        // return back();
    }


}
