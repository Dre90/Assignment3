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
                <ul class="list-group">
                    @foreach ($conversations as $conversation)
                        <a href="{{ url('inbox/' . $conversation->id) }}">
                            <li class="list-group-item conversation-box">
                                {{-- <h4>Item</h4> --}}
                                {{ $conversation->item->title }}

                                <!-- if user is owner, show You here -->

                                  @if($conversation->ownerUser->id === Auth::user()->id)
                                    {{-- You.</p> --}}
                                  @else
                                      <h4>Owner</h4>
                                    <p>{{ $conversation->ownerUser->name }}</p>
                                  @endif

                                  <!-- if user is interestedUser, show You here -->
                                  @if($conversation->interestedUser->id === Auth::user()->id)
                                    {{-- You.</p> --}}
                                  @else
                                      <h4>Interested</h4>
                                    <p>{{ $conversation->interestedUser->name }}</p>
                                  @endif
                                  <strong>Last received message</strong>
                                  <p>{{ $conversation->updated_at }}</p>
                              </li>
                          </a>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection
