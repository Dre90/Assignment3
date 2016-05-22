@extends('layouts.app')
@section('custom head')
    <link href="../css/style.css" rel="stylesheet">
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

            <h2>{{ $item->title }}</h2>
            <h2>{{ $item->category->categoryName }}</h2>

        </div>
        <div class=" col-md-4">
            <div class="userInfo">
                <img src="../resources/user_images/{{ $item->itemImage }}" class="img-responsive center-block" alt="{{ $item->user->name }} profile picture" />
                <p>{{ $item->user->name }}</p>

            </div>
            <div class="userAddress">
                <p>{{ $item->user->address }}</p>
                <p>{{ $item->user->postnr }}</p>

            </div>

        </div>
    </div>
</div>
@endsection
