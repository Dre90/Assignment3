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
                      <td>
                        <form action="{{ url('items/'.$item->id) }}" method="POST"><!-- Give Away item button -->
                          {{ csrf_field() }}
                          {{ method_field('PATCH') }}
                          <button type="submit" id="update-item-{{ $item->id }}" class="btn btn-success">
                            <i class="fa fa-btn fa-gift"></i>Give Away
                          </button>
                        </form>
                      </td>
                      <td><a href="item/{{$item->id}}" class="btn btn-default">Edit</a></td><!-- Edit item button -->
                      <td>
                        <form action="{{ url('items/'.$item->id) }}" method="POST"><!-- Delete item button -->
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button type="submit" id="delete-item-{{ $item->id }}" class="btn btn-danger">
                            <i class="fa fa-btn fa-trash"></i>Delete
                          </button>
                        </form>
                      </td>
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
                  <h2>You have not given away any items.</h2>
                </div>
              @endif
            </div><!-- given away items div end -->
          </div>
        </div>
    </div>
</div>
@endsection
