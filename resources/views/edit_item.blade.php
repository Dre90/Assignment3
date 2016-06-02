@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit item</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">

            <form enctype="multipart/form-data" method="POST" action="save">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="save-button">
                    <a class="btn btn-default pull-right cancel-button" href="{{redirect()->back()->getTargetUrl()}}">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Save changes</button>

                </div>
                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title</label>

                    @if (old('title'))
                      <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
                    @else
                      <input type="text" name="title" class="form-control" id="title" value="{{ $item->title }}">
                    @endif

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif

                </div>
                <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                    <label for="category">Category</label>

                    <select class="form-control" name="category" >
                        <option value="{{ $item->category->id }}">{{ $item->category->categoryName }}</option>
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

                    @if (old('description'))
                      <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
                      <textarea name="description" class="form-control" id="description" rows="10">{{ old('description') }}</textarea>
                    @else
                      <textarea name="description" class="form-control" id="description" rows="10">{{$item->description}}</textarea>
                    @endif

                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image">Upload a image</label>
                    <input type="file" name="image" id="image">
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Current image</label>
                    <div class="item-image-box-item-page">
                        <img src="{{url('resources/item_images/')}}/{{$item->itemImage }}" class="img-responsive center-block item-image-item-page" alt="{{ $item->title }} image" />
                    </div>
                </div>
                <input type="hidden" name="_userid" value="{{ Auth::user()->id }}">
                <input type="hidden" name="_itemid" value="{{ $item->id }}">



            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
