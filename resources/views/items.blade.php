@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"> <!-- sidebar for choice: aktive items and history -->
          <h1>Sidebar</h1>
        </div>
        <div class="col-md-9">
          <div class="row">
            Count for Active Items this User has:{{ count($activeItems) }}<br>
            Count for Given Away Items this User has:{{ count($givenAwayItems) }}<br>

            @if ( count($activeItems) !== 0)
              count not 0 activeItems
            @elseif ( count($givenAwayItems) !== 0)
              count not 0 givenAwayItems
            @else
              you have no item history
            @endif



            <!--

            <div class=col-md-12>
              <h1>Active Items</h1>

            </div>
            <div class=col-md-12>
              <h1>Received Items</h1>
            </div>

            -->

          </div>
        </div>
    </div>
</div>
@endsection

<div class="panel panel-default">

    <div class="panel-body">
        items
        Aktive items
        History
    </div>
</div>
