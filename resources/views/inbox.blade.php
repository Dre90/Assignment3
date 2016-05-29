@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
          <!-- all conversations -->
          <p>Your Conversations</p>
          <div class="list-group">
            @foreach ($conversations as $conversation)
              <button type="button" class="list-group-item">{{$conversation->item->title}}</button>
            @endforeach
          </div>
        </div>
        <div class="col-md-9">
          <!-- one coversation's messages -->
          <div class="row">
            <div class="col-md-12">


              <pre>
              <?php print_r($conversations); ?>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
