@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Showing conversation for Item: {{ $conversation->item->title }}.</h1>
      <!-- show owner -->
      @if($conversation->ownerUser->id === Auth::user()->id)
        <h2>You are the owner of this item.</h2>
      @else
        <h2>{{ $conversation->ownerUser->name }} is the owner of this item.</h2>
      @endif
      <!-- show interested user -->
      @if($conversation->interestedUser->id === Auth::user()->id)
        <h2>You are interested in this item.</h2>
      @else
        <h2>{{ $conversation->interestedUser->name }} is interested in this item.</h2>
      @endif
      <h3>Messages</h3>
      <!-- showing messages with correct To and From users -->
      @foreach ($conversationMess as $conversation)
        @foreach ($conversation->message as $message)
          @if($message->userId === Auth::user()->id)
            <div class="row">
              <div class="col-md-12">
                <p><b>You: </b></p>
                <p>{{ $message->body }}</p>
              </div>
            </div>
          @elseif($conversation->interestedUser->id === $message->userId)
            <div class="row">
              <div class="col-md-12">
                <p><b>{{$conversation->interestedUser->name}}: </b></p>
                <p>{{ $message->body }}</p>
              </div>
            </div>
          @elseif($conversation->ownerUser->id === $message->userId)
            <div class="row">
              <div class="col-md-12">
                <p><b>{{$conversation->ownerUser->name}}: </b></p>
                <p>{{ $message->body }}</p>
              </div>
            </div>
          @endif
        @endforeach
      @endforeach
    </div>
  </div>
</div>
@endsection
