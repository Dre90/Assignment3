@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form enctype="multipart/form-data" method="POST" action="add_item/new_item">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="titel">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category">
                        @foreach($categories as $Category)
                          <option value="{{ $Category->id }}">{{ $Category->categoryName }}</option>
                          @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Upload a image</label>
                    <input type="file" name="image" id="image">
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_userid" value="{{ Auth::user()->id }}">

                <button type="submit" class="btn btn-default pull-right">Upload</button>

            </form>
        </div>
    </div>
</div>
@endsection
