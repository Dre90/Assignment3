@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('edit_profile') }}">
              {{ method_field('PATCH') }}
              {{ csrf_field() }}
              <!-- <div class="form-group"> -->

                  <!-- Profile picture -->
                  <div class="col-md-4 col-lg-4">
                      <img src="resources/user_images/{{ Auth::user()->userImage }}" class="img-responsive profilePicture" alt="{{ Auth::user()->name }} profile picture" />
                      <input type="file" class="form-control">
                  </div>

                  <!-- Profile information -->
                  <div class="col-md-7 col-lg-7">

                      <!-- Row for Name and Edit profile-->
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                              <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">

                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <!-- Rows for Address -->
                      <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                          <label for="address" class="col-md-12 control-label">Address:</label>

                          <div class="col-md-12">
                              <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">

                              @if ($errors->has('address'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('address') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('postnr') ? ' has-error' : '' }}">
                          <label for="postnr" class="col-md-12 control-label">Postnumber:</label>

                          <div class="col-md-12">
                              <input type="text" class="form-control" name="postnr" value="{{ Auth::user()->postnr }}">

                              @if ($errors->has('postnr'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('postnr') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>



                      <!-- Rows for Phonenumber -->
                      <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                          <label for="phonenumber" class="col-md-12 control-label">Phonenumber:</label>

                          <div class="col-md-12">
                              <input type="text" class="form-control" name="phonenumber" value="{{ Auth::user()->phonenumber }}">

                              @if ($errors->has('phonenumber'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('phonenumber') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>



                      <!-- Rows for E-mail -->
                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label for="email" class="col-md-12 control-label">E-Mail Address:</label>

                          <div class="col-md-12">
                              <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">

                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>



                      <!-- Save changes button -->
                      <button type="submit" class="btn btn-default">Save changes</button>
                      <div class="form-group">
                          <div class="col-md-12">
                              <button type="submit" class="btn btn-primary">
                                  <i class="fa fa-btn fa-user"></i>Save changes
                              </button>
                          </div>
                      </div>



                  </div>

                  <!-- Spacing for the right side of Profile Information -->
                  <div class="col-md-1 col-lg-1"></div>

              <!-- </div> -->
            </form>
        </div>
    </div>
</div>
@endsection
