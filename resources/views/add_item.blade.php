@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form enctype="multipart/form-data" method="POST" action="add_item/new_item">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif

                </div>
                <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                    <label for="category">Category</label>
                    <select class="form-control" name="category" >
                        <option value=""></option>
                        @foreach($categories as $Category)
                            <option value="{{ $Category->id }}"@if(old('category') == $Category->id ) {{ 'selected' }} @endif>{{ $Category->categoryName }}</option>
                          @endforeach
                    </select>
                    @if ($errors->has('category'))
                        <span class="help-block">
                            <strong>{{ $errors->first('category') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="10" value="{{ old('description') }}"></textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image">Upload a image</label>
                    <input type="file" name="image" id="image" value="{{ old('image') }}">
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
                <input type="hidden" name="_userid" value="{{ Auth::user()->id }}">

                <button type="submit" class="btn btn-primary pull-right">Upload</button>

            </form>
        </div>
    </div>
</div>
@endsection
