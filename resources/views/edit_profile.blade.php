@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row">

                  <!-- Profile picture -->
                  <div class="col-md-4 col-lg-4">
                      <img src="resources/user_images/{{ Auth::user()->userImage }}" class="img-responsive profilePicture" alt="{{ Auth::user()->name }} profile picture" />
                  </div>

                  <!-- Profile information -->
                  <div class="col-md-7 col-lg-7">

                      <!-- Row for Name and Edit profile-->
                      <div class="row">
                        <div class="col-md-12 col-lg-12">
                          <!-- <h2 class="profileHeader">{{ Auth::user()->name }}</h2> -->
                          <form role="form">
                            <input type="name" class="form-control" id="name" placeholder="Your name" value="{{ Auth::user()->name }}">
                          </form>
                        </div>
                      </div>

                      <!-- Rows for Address -->
                      <div class="row profileLabel">
                        <div class="col-md-12 col-lg-12">
                          <label for="address">Address:</label>
                        </div>
                      </div>
                      <div class="row profileInfo">
                        <div class="col-md-12 col-lg-12">
                          <input type="address" class="form-control" id="address" placeholder="Your address" value="{{ Auth::user()->address }}">
                          <input type="address" class="form-control" id="postnr" placeholder="Your postnr" value="{{ Auth::user()->postnr }}">
                        </div>
                      </div>

                      <!-- Rows for Phonenumber -->
                      <div class="row profileLabel">
                        <div class="col-md-12 col-lg-12">
                          <label for="phonenumber">Phonenumber:</label>
                        </div>
                      </div>
                      <div class="row profileInfo">
                        <div class="col-md-12 col-lg-12">
                          <input type="number" class="form-control" id="phonenumber" placeholder="Your phonenumber" value="{{ Auth::user()->phonenumber }}">
                        </div>
                      </div>

                      <!-- Rows for E-mail -->
                      <div class="row profileLabel">
                        <div class="col-md-12 col-lg-12">
                          <label for="email">E-mail:</label>
                        </div>
                      </div>
                      <div class="row profileInfo">
                        <div class="col-md-12 col-lg-12">
                          <input type="text" class="form-control" id="email" placeholder="Your email" value="{{ Auth::user()->email }}">
                        </div>
                      </div>

                      <button type="submit" class="btn btn-default" align="right">Save changes</button>

                  </div>

                  <!-- Spacing for the right side of Profile Information -->
                  <div class="col-md-1 col-lg-1"></div>

                </div>
              </div>
            </div>

        </div>
    </div>
</div>
@endsection
