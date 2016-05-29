@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
          <!-- all conversations -->
          <p>Your Conversations</p>
          <div class="list-group">
            @foreach ($conversations as $conversation)
              <form action="{{ url('inbox/'. $conversation->id) }}" method="POST"><!-- Give Away item button -->
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <button type="submit" id="show-conversation-{{ $conversation->id }}" class="btn btn-default col-md-12">
                  {{ $conversation->item->title }}
                </button>
              </form>
            @endforeach
          </div>
        </div>
        <div class="col-md-9">
          <!-- one coversation's messages -->
          <div class="row">
            <div class="col-md-12">
              @yield('conversations')

              <pre>
              <?php// print_r($convoMessages); ?>
              <?php print_r($conversations); ?>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
