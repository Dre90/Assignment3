@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h1>Categories</h1>
            <form>
                @foreach($categories as $Category)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> {{ $Category->categoryName }}
                        </label>
                     </div>


                @endforeach
            </form>
        </div>
        <div class="col-md-9">
            <h1>Content</h1>
            <div class="row">
                @foreach($items as $item)
                    <div class="col-md-4">
                        <img src="resources/item_images/{{ $item->itemImage }}" class="img-responsive" alt="{{ $item->title }} image" />
                        {{ $item->title }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
