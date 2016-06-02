@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit profile</h1>
        </div>
    </div>
    <div class="row">
        <form enctype="multipart/form-data" role="form" method="POST" action="{{ url('/profile/edit') }}" >
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <!-- Profile picture -->
            <div class="col-md-2">
                <img src="{{url('resources/user_images/')}}/{{ $user->userImage }}" class="img-responsive profilePicture edit-profilePicture" alt="{{ $user->name }} profile picture" />
                <input type="file" name="image" id="image" value="{{ old('image') }}">

                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-1"></div>
            <!-- Profile information -->
            <div class="col-md-5">
                <h3>Update profile</h3>
                <!-- Row for Name and Edit profile-->
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Name</label>

                    @if (old('name'))
                      <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @else
                      <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    @endif

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- Rows for Address -->
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address">Address:</label>

                    @if (old('address'))
                      <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                    @else
                      <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                    @endif

                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('postnr') ? ' has-error' : '' }}">
                  <label for="postnr">Postnumber:</label>

                    @if (old('postnr'))
                      <input type="text" class="form-control" name="postnr" value="{{ old('postnr') }}">
                    @else
                      <input type="text" class="form-control" name="postnr" value="{{ $user->postnr }}">
                    @endif

                    @if ($errors->has('postnr'))
                        <span class="help-block">
                            <strong>{{ $errors->first('postnr') }}</strong>
                        </span>
                    @endif
                 </div>

                <!-- Rows for Phonenumber -->
                <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                    <label for="phonenumber">Phonenumber:</label>

                    @if (old('phonenumber'))
                        <input type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}">
                    @else
                        <input type="text" class="form-control" name="phonenumber" value="{{ $user->phonenumber }}">
                    @endif

                    @if ($errors->has('phonenumber'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phonenumber') }}</strong>
                        </span>
                    @endif
                </div>

                <!-- Rows for E-mail -->
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" >E-Mail Address:</label>
                    @if (old('email'))
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @else
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    @endif

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <!-- Save changes button -->
                    <a class="btn btn-default cancel-button pull-right" href="{{redirect()->back()->getTargetUrl()}}">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">
                        <i class="fa fa-btn fa-user"></i>Save changes
                    </button>
                </div>
            </div>
        </form>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <h3>Change password</h3>

            <!-- changing password -->
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/edit') }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group{{ $errors->has('oldPassword') ? ' has-error' : '' }}">
                    <label class="control-label">Old Password</label>
                    <input type="password" class="form-control" name="oldPassword">
                    @if ($errors->has('oldPassword'))
                        <span class="help-block">
                            <strong>{{ $errors->first('oldPassword') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('newPassword') ? ' has-error' : '' }}">
                    <label class="control-label">New Password</label>
                    <input type="password" class="form-control" name="newPassword">
                    @if ($errors->has('newPassword'))
                        <span class="help-block">
                            <strong>{{ $errors->first('newPassword') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('newPassword_confirmation') ? ' has-error' : '' }}">
                    <label class="control-label">Confirm New Password</label>
                    <input type="password" class="form-control" name="newPassword_confirmation">

                    @if ($errors->has('newPassword_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('newPassword_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-refresh"></i>Change Password
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection
