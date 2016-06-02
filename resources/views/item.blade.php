@extends('layouts.app')
@section('custom head')
    <link href="../css/style.css" rel="stylesheet">

    <script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="../js/script.js"></script>

@endsection

@section('content')
<div class="container">
    <div class="row ">
        <div class=" col-md-8">
            <div class="item-image-box-item-page">
                <img src="../resources/item_images/{{ $item->itemImage }}" class="img-responsive center-block item-image-item-page" alt="{{ $item->title }} image" />
            </div>
            <div class="border-buttom">
                <h1>{{ $item->title }}</h1>
            </div>
            <div class="category border-buttom">
                <h4><small>Category:</small> {{ $item->category->categoryName }}</h4>
            </div>

                <h3>Description</h3>
                <div class="description border-buttom">{{$item->description}}</div>

                <div class="border-buttom">
                    <?php
                        $d=strtotime($item->updated_at);
                     ?>
                    Last changed: {{ date("d. F Y", $d) . " at " . date("H:i", $d)}}
                </p>
                </div>


        </div>
        <div class=" col-md-4">
            <div class="userInfo">
                <div class="profile-image-item-page">
                    <img src="../resources/user_images/{{ $item->user->userImage}}" class="profile-img center-block img-thumbnail" alt="{{ $item->user->name }} profile picture" />
                </div>
                <h2 class="text-center">{{ $item->user->name }}</h2>

                @if((Auth::check()) && ($item->user->id === Auth::user()->id))
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <h4>This is your item.</h4>
                    </div>
                  </div>
                @elseif ((Auth::check()) && (count($convoInterested) !== 0))
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <h4>You allready have a conversation about this item.</h4>
                      <a href="{{ url('inbox/' . $convoInterested[0]->id) }}"><h4>Take me there.</h4></a>
                    </div>
                  </div>
                @elseif((Auth::check()) && (count($convoInterested) === 0))
                <form method="POST" action="{{ url('inbox/' . $item->id) . '/create'}}">
                    {{ csrf_field() }}
                    <!-- <input type="hidden" name="item" value="{{ $item }}"> -->
                    <div class="form-group{{ $errors->has('newMessage') ? ' has-error' : '' }}">
                      <textarea class="form-control message" name="newMessage" value="{{ old('newMessage') }}" rows="4"></textarea>
                      @if ($errors->has('newMessage'))
                        <span class="help-block">
                          <strong>{{ $errors->first('newMessage') }}</strong>
                        </span>
                      @endif
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Send Message</button>
                    </div>
                </form>
                @else
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <h4>You need to be logged in to send a message about this item.</h4>
                    </div>
                  </div>
                @endif

            </div>

            <script>
                var address = "{{ $item->user->address }} {{ $item->user->postnr }} {{ $item->user->post->placeName }}";
            </script>
            <div class="userAddress">
                <h3 class="text-center">{{ $item->user->address }}, {{ $item->user->postnr }} {{ $item->user->post->placeName }}</h3>

                <div id="map_canvas" ></div>
            </div>
        </div>
    </div>
</div>
@endsection
