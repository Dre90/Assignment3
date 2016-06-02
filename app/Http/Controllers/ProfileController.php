<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Image;
use Auth;
use Hash;

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

        return view('edit_profile', compact('user'));

    }


    public function update(Request $request)
    {
      //getting the auth user's info
      $loggedInUser = Auth::user()->id;
      $user = user::where('id', $loggedInUser)->get()->first();

      //validating input form
      $this->validate($request, [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255',
          'address' => 'required|max:255',
          'postnr' => 'required|digits:4|exists:posts,postnr',
          'phonenumber' => 'required|digits:8',
          'image' => 'max:8000|image',
      ]);

      //processing the request based on changed image or not
      if($request->hasFile("image")) {
          $image = $request->image;
          $filename = rand(1000,9000) . '_' . time() . '.' . $image->getClientOriginalExtension();
          $img = Image::make($image)
              ->resize(null, 1000, function ($constraint) {
                  $constraint->aspectRatio();
                  $constraint->upsize();
              })
              ->save( public_path("/resources/item_images/" . $filename) );

          User::where('id', $user->id)->update([  'name' => $request->name,
                                                  'email' => $request->email,
                                                  'address' => $request->address,
                                                  'postnr' => $request->postnr,
                                                  'phonenumber' => $request->phonenumber,
                                                  'userImage' => $filename
                                              ]);
      } else {
          User::where('id', $user->id)->update([  //'id' => $user->id,
                                                  'name' => $request->name,
                                                  'email' => $request->email,
                                                  'address' => $request->address,
                                                  'postnr' => $request->postnr,
                                                  'phonenumber' => $request->phonenumber,
                                              ]);
      }

      return redirect('profile');
    }

    public function updatePW(Request $request){
      $this->validate($request, [
          'oldPassword' => 'bail|required|min:6',
          'newPassword' => 'required|min:6|confirmed',
          'newPassword_confirmation' => 'required|min:6',
      ]);

      $user = Auth::user();

      if ($request->newPassword = $request->newPassword_confirmation) {
        if (Hash::check($request->oldPassword, $user->password)) {
          $user->fill([
            'password' => Hash::make($request->newPassword)
          ])->save();


          return redirect('profile');
        }
      }
    }
}
