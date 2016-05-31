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
            <div class="row conversationMessageCurrentUser">
              <div class="col-md-12">
                <div class="row">
                  <p class="col-md-2 text-right"><b>You: </b></p>
                  <p class="col-md-9">{{ $message->body }}</p>
                </div>
              </div>
            </div>
          @elseif($conversation->interestedUser->id === $message->userId)
            <div class="row conversationMessageOtherUser">
              <div class="col-md-12">
                <div class="row">
                  <p class="col-md-2 text-right"><b>{{$conversation->interestedUser->name}}: </b></p>
                  <p class="col-md-9">{{ $message->body }}</p>
                </div>
              </div>
            </div>
          @elseif($conversation->ownerUser->id === $message->userId)
            <div class="row conversationMessageOtherUser">
              <div class="col-md-12">
                <div class="row">
                  <p class="col-md-2 text-right"><b>{{$conversation->ownerUser->name}}: </b></p>
                  <p class="col-md-9">{{ $message->body }}</p>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      @endforeach
      <!-- input form for new message -->
      <form method="POST" action="{{ url('inbox/' . $conversation->id) }}">
        {{ csrf_field() }}
        <input type="hidden" name="convId" value="{{ $conversation->id }}">
        <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
        <div class="form-group{{ $errors->has('newMessage') ? ' has-error' : '' }}">
          <textarea class="form-control message" name="newMessage" value="{{ old('newMessage') }}" rows="4"></textarea>
          @if ($errors->has('newMessage'))
            <span class="help-block">
              <strong>{{ $errors->first('newMessage') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group">
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Reply</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
