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
          <div class="row">


            @foreach ($conversations as $conversation)
                <div class="col-md-4">
              <form action="{{ url('inbox/' . $conversation->id) }}" method="GET"><!-- Give Away item button -->
                <button type="submit" id="show-conversation-{{ $conversation->id }}" class="btn btn-default pull-left">
                            <img src="{{url('resources/item_images/')}}/{{$conversation->item->itemImage }}" class="small-item-image img-thumbnail" alt="profile picture" />
                            <p>Item: {{ $conversation->item->title }}</p>

                            <!-- if user is owner, show You here -->

                              @if($conversation->ownerUser->id === Auth::user()->id)
                                {{-- You.</p> --}}
                              @else
                                <p>Owner: {{ $conversation->ownerUser->name }}</p>
                              @endif

                              <!-- if user is interestedUser, show You here -->
                              @if($conversation->interestedUser->id === Auth::user()->id)
                                {{-- You.</p> --}}
                              @else
                                <p>Interested: {{ $conversation->interestedUser->name }}</p>
                              @endif
                        <p>
                            {{ $conversation->updated_at }}
                        </p>
                </button>
              </form>
          </div>
            @endforeach

        </div>


    </div>
      @endif
    </div>
</div>
@endsection
