@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class=" col-md-3">
            <h1>Categories</h1>
            <form>
                <div class="radio">
                    <label>
                        <input onclick="showCustomer(this.value)" type="radio" name="optionsRadios" id="optionsRadios2" value="0" checked>
                        Show all
                    </label>
                </div>
                @foreach($categories as $Category)
                    {{-- <div class="radio">
                        <label>
                            <input onclick="showCustomer(this.value)" type="radio" value="{{ $Category->id }}"> {{ $Category->categoryName }}
                        </label>
                    </div> --}}
                    <div class="radio">
                        <label>
                            <input onclick="showCustomer(this.value)" type="radio" name="optionsRadios" id="optionsRadios2" value="{{ $Category->id }}">
                            {{ $Category->categoryName }}
                        </label>
                    </div>

                @endforeach
            </form>
        </div>
        <script>
            function showCustomer(str) {
                console.log(str);

            }
            </script>
        <div class=" col-md-9" id="items">
            <h1>Items</h1>
            <div class="row clearfix">
                @foreach($items as $item)
                    <a href="item/{{$item->id}}">
                        <div class="col-md-4 item-Outerbox">
                            <div class="item-image-box">


                                <img src="resources/item_images/{{ $item->itemImage }}" class="img-responsive center-block" alt="{{ $item->title }} image" />
                            </div>
                            <div class="">
                                <?php
                                    $var1 = $item->created_at;
                                    $var2 = date('Y-m-d H:i:s');


                                    $date = new DateTime( $var1);
                                    $diff = $date->diff(new DateTime( $var2));

                                    $seconds = $diff->format('%s sec');
                                    $minutesDiff = $diff->format('%i');
                                    $minutes = $diff->format('%i min');
                                    $hoursDiff = $diff->format('%h');
                                    $hours = $diff->format('%h h');
                                    $daysDiff = $diff->format('%d');
                                    $days = $diff->format("%a d");
                                 ?>

                                <h2 class="text-center">{{ $item->title }}</h2>
                                    <span class="pull-right">
                                        @if($minutesDiff == 0)
                                            <span class="glyphicon glyphicon-time" aria-hidden="true"></span> {{ $seconds }}
                                        @elseif($hoursDiff == 0)
                                            <span class="glyphicon glyphicon-time" aria-hidden="true"></span> {{ $minutes }}
                                        @elseif($daysDiff == 0)
                                            <span class="glyphicon glyphicon-time" aria-hidden="true"></span> {{ $hours }}
                                        @else
                                            <span class="glyphicon glyphicon-time" aria-hidden="true"></span> {{ $days }}
                                        @endif
                                    </span>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
