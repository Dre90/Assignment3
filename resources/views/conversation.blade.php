@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">

                <h2><a href="{{url('item/')}}/{{$conversation->item->id}}"> {{ $conversation->item->title }}</a></h2>
            </div>

            <div class="col-md-6 text-right">
                <!-- show owner -->
                @if($conversation->ownerUser->id === Auth::user()->id)

                @else
                  <h4> {{ $conversation->ownerUser->name }} is the owner of this item.</h4>
                @endif
                <!-- show interested user -->
                @if($conversation->interestedUser->id === Auth::user()->id)

                @else
                  <h4> {{ $conversation->interestedUser->name }} is interested in this item</h4>
                @endif
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h3>Messages</h3>
            </div>

             <div class="col-md-8">
             </div>
        </div>
<div class="row">
    <div class="col-md-12">
      <!-- showing messages with correct To and From users -->
      @foreach ($conversationMess as $conversation)
        @foreach ($conversation->message as $message)
          @if($message->userId === Auth::user()->id)
            <div class="conversationMessageCurrentUser">
                <div class="row">
                <div class="col-md-3"></div>
                    <div class="col-md-7 MessageCurrentUser">
                        <p>
                            <small class="message-dato">{{ $message->created_at }}</small>
                            {{ $message->body }}
                        </p>

                    </div>
                    <div class="col-md-2">
                        <img src="{{url('resources/user_images/')}}/{{$conversation->interestedUser->userImage }}" class="small-profilePicture img-circle" alt="profile picture" />
                            You
                    </div>
                </div>
            </div>
          @elseif($conversation->interestedUser->id === $message->userId)
            <div class="conversationMessageOtherUser">
                <div class="row">
                    <div class="col-md-2 text-right">
                        <img src="{{url('resources/user_images/')}}/{{$conversation->interestedUser->userImage }}" class="small-profilePicture img-circle" alt="profile picture" />
                        {{$conversation->interestedUser->name}}
                    </div>
                    <div class="col-md-7 MessageOtherUser">
                        <p>
                            <small class="message-dato">{{ $message->created_at }}</small>
                            {{ $message->body }}
                        </p>
                    </div>
                  <div class="col-md-3"></div>
                </div>
            </div>
          @elseif($conversation->ownerUser->id === $message->userId)
            <div class="conversationMessageOtherUser">
                <div class="row">
                    <div class="col-md-2 text-right">
                        <img src="{{url('resources/user_images/')}}/{{$conversation->interestedUser->userImage }}" class="small-profilePicture img-circle" alt="profile picture" />
                        {{$conversation->ownerUser->name}}
                    </div>
                    <div class="col-md-7 MessageOtherUser">
                        <p>
                            <small class="message-dato">{{ $message->created_at }}</small>
                            {{ $message->body }}
                        </p>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
          @endif
        @endforeach
      @endforeach
  </div>
</div>
      <div class="row">
          <div class="col-md-2 "></div>
          <div class="col-md-8">


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

                  <div class="text-right">
                    <button type="submit" class="btn btn-primary">Reply</button>
                  </div>

              </form>
          </div>
          <div class="col-md-2 "></div>
      </div>
    </div>
  </div>
</div>
@endsection
