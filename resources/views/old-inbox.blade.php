@foreach ($conversations as $conversation)
    <div class="col-md-2">
        <form action="{{ url('inbox/' . $conversation->id) }}" method="GET"><!-- Give Away item button -->
            <button type="submit" id="show-conversation-{{ $conversation->id }}" class="btn btn-default pull-left">
                <div class="small-item-image-box ">
                    <img src="{{url('resources/item_images/')}}/{{$conversation->item->itemImage }}" class="small-item-image img-thumbnail" alt="profile picture" />
                </div>
                {{-- <h4>Item</h4> --}}
                <h3>{{ $conversation->item->title }}</h3>

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
            </button>
        </form>
    </div>
@endforeach
