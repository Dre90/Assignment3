@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class=" col-md-3">
            <h1>Categories</h1>
            <form>
                <div class="radio">
                    <label>
                        <input onclick="showCategory(this.value)" type="radio" name="optionsRadios" id="optionsRadios2" value="0" checked>
                        Show all
                    </label>
                </div>
                @foreach($categories as $Category)
                    {{-- <div class="radio">
                        <label>
                            <input onclick="showCategory(this.value)" type="radio" value="{{ $Category->id }}"> {{ $Category->categoryName }}
                        </label>
                    </div> --}}
                    <div class="radio">
                        <label>
                            <input onclick="showCategory(this.value)" type="radio" name="optionsRadios" id="optionsRadios2" value="{{ $Category->id }}">
                            {{ $Category->categoryName }}
                        </label>
                    </div>

                @endforeach
            </form>
        </div>
<div id="items-grid">
    <div class=" col-md-9" id="items">
        <h1>Items</h1>
        <div class="row clearfix" id="items_container">
            @foreach($items as $item)
                <a href="item/{{$item->id}}">
                    <div class="col-md-4 item-Outerbox">
                        <div class="item-image-box">
                            <img src="resources/item_images/{{ $item->itemImage }}" class="img-responsive center-block item-image" alt="{{ $item->title }} image" />
                        </div>
                        <div class="">
                            <?php
                                $var1 = $item->updated_at;
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

        <script>
        function showCategory(str) {
                $.ajax({
                   type: "POST",
                   cache: false,
                   url : "item/{categoryid}",
                   dataType: "html",
                   data: { catId : str },
                   success: function(response) {
                    //parsing the response to javascript objects
                    var obj = $.parseJSON(response);
                    var i = 0;
                    var output = '';

                    //building the new items in the items part of the page
                    $.each(obj, function() {
                                //setting time variables for time shown on items
                                var1 = new Date(this['updated_at']);
                                var2 = new Date();
                                dateDiff = new Date(var2 - var1);

                                //calculating time variables
                                seconds = Math.round(dateDiff/1000);
                                minutes = Math.round(dateDiff/1000/60);
                                hours = Math.round(dateDiff/1000/60/60);
                                days = Math.round(dateDiff/1000/60/60/24);

                                //building the output
                                output += '<a href="item/' +this['id']+ '">';
                                  output += '<div class="col-md-4 item-Outerbox">';
                                    output += '<div class="item-image-box">';
                                      output += '<img src="resources/item_images/'+this['itemImage']+'" class="img-responsive center-block item-image" alt="'+this['title']+' image" />';
                                    output += '</div>';
                                    output += '<div class="">';
                                      output += '<h2 class="text-center">'+this['title']+'</h2>';
                                      output += '<span class="pull-right">';
                                        if(minutes == 0){
                                            output += '<span class="glyphicon glyphicon-time" aria-hidden="true"></span> '+seconds+' sec';
                                        }else if(hours == 0){
                                            output += '<span class="glyphicon glyphicon-time" aria-hidden="true"></span> '+minutes+' min';
                                        }else if(days == 0){
                                            output += '<span class="glyphicon glyphicon-time" aria-hidden="true"></span> '+hours+' h';
                                        }else{
                                             output += '<span class="glyphicon glyphicon-time" aria-hidden="true"></span> '+days+' d';
                                        }
                                        output += '</span>';
                                      output += '</div>';
                                    output += '</div>';
                                  output += '</a>';

                                i++;
                            });
                    //updating the page
                    if (output === '') {
                      $( "#items_container" ).html('<h3>There are no items in this category</h3>');
                    } else {
                      $( "#items_container" ).html(output);
                    }
                   }
               })
            }
</script>

    </div>
</div>
@endsection
