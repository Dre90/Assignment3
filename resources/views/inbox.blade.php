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
                {{-- <ul class="list-group"> --}}
                <div class="list-group">
                    @foreach ($conversations as $conversation)
                        {{-- <a href="{{ url('inbox/' . $conversation->id) }}" class="list-group-item ">
                            {{-- <li class="list-group-item conversation-box"> --}}
                                {{-- <p>
                                    Item: {{ $conversation->item->title }}
                                </p>

                                <!-- if user is owner, show You here -->

                                  @if($conversation->ownerUser->id === Auth::user()->id)
                                    {{-- You.</p> --}}
                                  {{-- @else

                                    <p>Owner: {{ $conversation->ownerUser->name }}</p>
                                  @endif --}}

                                  <!-- if user is interestedUser, show You here -->
                                  {{-- @if($conversation->interestedUser->id === Auth::user()->id)
                                    {{-- You.</p> --}}
                                  {{-- @else --}}

                                    {{-- <p>Interested: {{ $conversation->interestedUser->name }}</p>
                                  @endif
                                  <strong>Last received message</strong>
                                  <p>{{ $conversation->updated_at }}</p> --}}
                              {{-- </li> --}}
                          {{-- </a> --}}


                              <a href="{{ url('inbox/' . $conversation->id) }}" class="list-group-item">
                                  <h4 class="list-group-item-heading">Item: {{ $conversation->item->title }}</h4>
                                  <p class="list-group-item-text">
                                      <!-- if user is owner, show You here -->

                                    @if($conversation->ownerUser->id === Auth::user()->id)
                                      {{-- You.</p> --}}
                                    @else

                                      <p> <strong>Owner: </strong> {{ $conversation->ownerUser->name }}</p>
                                    @endif

                                    <!-- if user is interestedUser, show You here -->
                                    @if($conversation->interestedUser->id === Auth::user()->id)
                                      {{-- You.</p> --}}
                                    @else

                                      <p> <strong>Interested: </strong> {{ $conversation->interestedUser->name }}</p>
                                    @endif


                                </p>

                                <strong>Last received message:</strong> {{ $conversation->updated_at }}

                              </a>

                    @endforeach
                    </div>
                {{-- </ul> --}}
            </div>
        @endif
    </div>
</div>
@endsection
