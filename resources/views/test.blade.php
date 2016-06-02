@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
            <form enctype="multipart/form-data" method="POST" action="update" >
              {{ method_field('PATCH') }}
              {{ csrf_field() }}

                  <!-- Profile picture -->
                  <div class="col-md-5">
                      <img src="{{url('resources/user_images/')}}/{{ $user->userImage }}" class="img-responsive profilePicture" alt="{{ $user->name }} profile picture" />
                      <input type="file" name="image" id="image" value="{{ old('image') }}">
                  </div>


                    <!-- Profile information -->
                    <div class="col-md-5">
                      <!-- Row for Name and Edit profile-->
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" name="name" value="{{ $user->name }}">

                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                      </div>


                      <!-- Rows for Address -->
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}">

                              @if ($errors->has('address'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('address') }}</strong>
                                  </span>
                              @endif
                        </div>

                        <div class="form-group{{ $errors->has('postnr') ? ' has-error' : '' }}">
                          <label for="postnr">Postnumber:</label>
                              <input type="text" class="form-control" name="postnr" value="{{ $user->postnr }}">

                              @if ($errors->has('postnr'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('postnr') }}</strong>
                                  </span>
                              @endif
                         </div>

                      <!-- Rows for Phonenumber -->
                      <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                          <label for="phonenumber">Phonenumber:</label>
                              <input type="text" class="form-control" name="phonenumber" value="{{ $user->phonenumber }}">

                              @if ($errors->has('phonenumber'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('phonenumber') }}</strong>
                                  </span>
                              @endif
                      </div>

                      <!-- Rows for E-mail -->
                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" >E-Mail Address:</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">

                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                      </div>

                      <!-- Save changes button -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i>Save changes
                        </button>
            </form>
        </div>

        <div class="col-md-2"></div>
    </div>
</div>
@endsection
