@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if($conCount === 0)
            <div class="col-md-12">
                <h1>You do not have any conversations.</h1>
            </div>
        @else
            <div class="col-md-12">
                <!-- all conversations -->
                <h1>Your have {{ $conCount }} Conversations</h1>
                <div class="list-group">
                    @foreach ($conversations as $conversation)
                        <a href="{{ url('inbox/' . $conversation->id) }}" class="list-group-item">
                            <h4 class="list-group-item-heading">Item: {{ $conversation->item->title }}</h4>
                            <p class="list-group-item-text">
                                <!-- if user is owner, show You here -->
                                @if($conversation->ownerUser->id === Auth::user()->id)

                                @else

                                  <p> <strong>Owner: </strong> {{ $conversation->ownerUser->name }}</p>
                                @endif

                                <!-- if user is interestedUser, show You here -->
                                @if($conversation->interestedUser->id === Auth::user()->id)

                                @else

                                  <p> <strong>Interested: </strong> {{ $conversation->interestedUser->name }}</p>
                                @endif

                            </p>
                            <strong>Last received message:</strong> {{ $conversation->updated_at }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
