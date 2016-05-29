@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
          <!-- all conversations -->
          <p>Your Conversations</p>
          <div class="list-group">
            @foreach ($conversations as $conversation)
              <form action="{{ url('inbox/' . $conversation->id) }}" method="GET"><!-- Give Away item button -->

                <button type="submit" id="show-conversation-{{ $conversation->id }}" class="btn btn-default col-md-12">
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
        <div class="col-md-9">
          <!-- one coversation's messages -->
          <div class="row">
            <div class="col-md-12">

            </div>
          </div>
        </div>
    </div>
</div>
@endsection
