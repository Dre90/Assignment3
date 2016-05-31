@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @if(count($conversations) === 0)
        <div class="col-md-12 text-center">
          <h1>You do not have any conversations.</h1>
        </div>
      @else
        <div class="col-md-12">
          <!-- all conversations -->
          <h1 class="text-center">Your Conversations</h1>
          <div class="list-group text-center">
            @foreach ($conversations as $conversation)
              <form action="{{ url('inbox/' . $conversation->id) }}" method="GET"><!-- Give Away item button -->
                <button type="submit" id="show-conversation-{{ $conversation->id }}" class="btn btn-default col-md-6">
                  <p>Item: {{ $conversation->item->title }}.</p>
                  <!-- if user is owner, show You here -->
                  <p>Owner:
                    @if($conversation->ownerUser->id === Auth::user()->id)
                      You.</p>
                    @else
                      {{ $conversation->ownerUser->name }}.</p>
                    @endif
                  <p>Interested User:
                    <!-- if user is interestedUser, show You here -->
                    @if($conversation->interestedUser->id === Auth::user()->id)
                      You.</p>
                    @else
                      {{ $conversation->interestedUser->name }}.</p>
                    @endif
                </button>
              </form>
            @endforeach
          </div>
        </div>
      @endif
    </div>
</div>
@endsection
