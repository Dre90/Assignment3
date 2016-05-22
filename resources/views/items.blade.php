@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"> <!-- sidebar for choice: active items and given away items -->
          <ul class="list-group">
            <a href="#activeItems">
              <li class="list-group-item">
                <span class="label label-default label-pill pull-right">{{ count($activeItems) }}</span>
                Active Items
              </li>

            <a href="#givenAwayItems">
              <li class="list-group-item">
                <span class="label label-default label-pill pull-right">{{ count($givenAwayItems) }}</span>
                Given Away Items
              </li>
            </a>
          </ul>
        </div>
        <div class="col-md-9"><!-- main content div -->
          <div class="row">
            <div class="col-md-12" id="activeItems"><!-- active items div start -->
              <h1>Active Items</h1>
              @if ( count($activeItems) !== 0)
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Item Name</th>
                      <th>Give Away</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($activeItems as $item)
                    <tr>
                      <td>{{ $item->title }}</td>
                      <td>give away</td>
                      <td><a href="item/{{$item->id}}" class="btn btn-default">Edit</a></td>
                      <td>delete</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              @else
                <div class="col-md-12">
                  <h2>You have no active items.</h2>
                </div>
              @endif
            </div><!-- active items div end -->
            <div class="col-md-12" id="givenAwayItems"><!-- given away items div start -->
              <h1>Given Away Items</h1>
              @if ( count($givenAwayItems) !== 0)
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Item Name</th>
                      <th>Re-list Item</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($givenAwayItems as $item)
                    <tr>
                      <td>{{ $item->title }}</td>
                      <td>re-list item</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              @else
                <div class="col-md-12">
                  <h2>You have no given away items.</h2>
                </div>
              @endif
            </div><!-- given away items div end -->
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
