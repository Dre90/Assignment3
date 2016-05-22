@extends('layouts.app')
@section('custom head')
    <link href="../css/style.css" rel="stylesheet">

    <script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="../js/script.js"></script>

@endsection

@section('content')
<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">{{ $item->category->categoryName }}</a></li>
            <li -class="active">{{ $item->title }}</li>
        </ol>
    </div>
    <div class="row">
        <div class=" col-md-8">
            <img src="../resources/item_images/{{ $item->itemImage }}" class="img-responsive center-block" alt="{{ $item->title }} image" />

            <h1>{{ $item->title }}</h1>
            <h4><small>Category:</small> {{ $item->category->categoryName }}</h4>
            <p>
                {{ $item->description }}
            </p>
            <p>
                <?php
                    $d=strtotime($item->updated_at);
                 ?>
                Last changed: {{ date("d. F Y", $d) . " at " . date("H:i", $d)}}
            </p>

        </div>
        <div class=" col-md-4">
            <div class="userInfo">
                <img src="../resources/user_images/{{ $item->user->userImage}}" class="profile-img center-block img-thumbnail" alt="{{ $item->user->name }} profile picture" />
                <h2 class="text-center">{{ $item->user->name }}</h2>

                <form>
                    <textarea class="form-control message" rows="4"></textarea>
                    <button type="button" class="btn btn-primary btn-lg btn-block">Send message</button>
                </form>


            </div>

            <script>
            var address = "{{ $item->user->address }} {{ $item->user->postnr }} {{ $item->user->post->placeName }}";
            // var address = "foobar";
            </script>
            <div class="userAddress">
                <h3 class="text-center">{{ $item->user->address }}, {{ $item->user->postnr }} {{ $item->user->post->placeName }}</h3>

                <div id="map_canvas" ></div>
            </div>

            <div class="similarCategorys">

            </div>

        </div>
    </div>
</div>
@endsection
