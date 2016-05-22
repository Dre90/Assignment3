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
                        <div class="col-md-7 col-lg-7">
                          <h2 class="profileHeader">{{ Auth::user()->name }}</h2>
                        </div>
                        <div class="col-md-5 col-lg-5" align="right">
                          <a href="{{ url('profile') }}" class="btn btn-default btn sm">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit profile
                          </a>
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
                          <p>{{ Auth::user()->address }}</p>
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
                          <p>{{ Auth::user()->phonenumber }}</p>
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
                          <p>{{ Auth::user()->email }}</p>
                        </div>
                      </div>

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
