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
<div id="items-grid">
    <div class=" col-md-9" id="items">
        <h1>Items</h1>
        <div class="row clearfix">
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

        <!-- test div -->
        <div id="testDiv">
          test
        </div>

        <script>

        function showCustomer(str) {
          console.log(str)
                $.ajax({
                   type: "POST",
                   cache: false,
                   url : "item/{categoryid}",
                   dataType: "html",
                   data: { catId : str },
                   success: function(response) {

                    var obj = $.parseJSON(response);
                    console.log(obj)
                    var i = 0;
                            console.log(response.iyo);

                    var output = null;

                    $.each(obj, function() {
                                console.log(this['id']);
                                console.log(this['categoryId']);
                                console.log(this['created_at']);
                                console.log(this['description']);
                                console.log(this['itemImage']);
                                console.log(this['givenAway']);
                                console.log(this['title']);
                                console.log(this['updated_at']);
                                console.log(this['userId']);


                                //TODO: bygg output her


                                i++;
                            });

                     $( "#testDiv" ).html = '<p>This is a test</p>';
                   }
               })
            }

        // var optionSelected = $(this).find("option:selected");
        // semesterSelected  = optionSelected.val();
        // console.log(semesterSelected);

        // $.ajax({
        //     type: "POST",
        //     cache: false,
        //     url : "rate/units",
        //     data: { sem : semesterSelected },
        //     success: function(data) {
        //         var obj = $.parseJSON(data);
        //         var i = 0;
        //         console.log(data.iyo);
        //
        //         $.each(obj, function() {
        //             console.log(this[0]);
        //             console.log(this[1]);
        //             console.log(this[2]);
        //             console.log(this[3]);
        //             console.log(this[4]);
        //
        //             i++;
        //         });
        //     }
        // })

        // .done(function(data) {
        //     alert('done');
        // })
        // .fail(function(jqXHR, ajaxOptions, thrownError) {
        //     alert('No response from server');
        // });

</script>

    </div>
</div>
@endsection
