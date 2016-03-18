@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<link href="/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
<link href="/css/theme-krajee-svg.css" media="all" rel="stylesheet" type="text/css" />
@endsection

@section('script')
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
<script src="/js/star-rating.js" type="text/javascript"></script>
<script src="/js/star-rating_locale_LANG.js"></script>
<script>
  $(function() {
    $( ".date" ).datepicker();
  });
</script>
@endsection

@section('content')

<div class="jumbotron">
    <div class="row">
        <div class="col-md-offset-3">
            <form method="post" action="search" name="search">
            {!! csrf_field() !!}
            <div class="row"> 
                <div class="col-md-6">
                    <input type="text" class="form-control search" 
                    name="search" placeholder="e.g Mumbai" 
                    value="@if(isset($detail['city'])){{$detail['city']}}@else""@endif">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-info" type="submit">
                    Search!</button>  
                </div>
            
            </div><p/>
            <div>
                @if ($errors->has('search'))
                    <span>
                    {{ $errors->first('search') }}
                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label>Check In Date</label>
                    <input type="text" name="checkin" id="checkin"
                    class="form-control  glyphicon glyphicon-calendar date"
                    value="@if(isset($detail['checkin'])){{$detail['checkin']}}@else""@endif">
                </div>
               
                <div class="col-md-3">
                    <label>Check Out Date</label>
                    <input type="text" name="checkout" id="checkout"
                    class="form-control  glyphicon glyphicon-calendar date"
                    value="@if(isset($detail['checkout'])){{$detail['checkout']}}@else""@endif">
                </div>
            </div>
            <div class="row">
                 <div class="col-md-3">
                    @if ($errors->has('checkin'))
                        <span>
                        {{ $errors->first('checkin') }}
                        </span>
                    @endif
                </div>
                <div class="col-md-3">
                    @if ($errors->has('checkout'))
                        <span>
                        {{ $errors->first('checkout') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if ( isset($data))
<div class="col-md-7 col-md-offset-3 all-details">
<div class="col-md-3" id="sort">
<select class="form-control" name="sort" id="sortname">
    <option value="price">Focus on Price</option>
    <option value="starrating">Focus on Star Rating</option>
    <option value="guestrating">Sort by Popularity</option>
</select>
</div>
@for ($i=0; $i < $total['count'] ; $i++)
    <div class="col-md-12 hotel-list">
        <div class="row">
            <div class="col-md-3">
                @if(isset($data[$i]['photo']))
                <div><img class="image" src="{{ $data[$i]['photo']}}"></div>
                @endif
            </div>
        
            <div class="col-md-6 hotel-detail">             
                <div class="hotel-name">{{ $data[$i]['name'] }}</div>
                @if(isset($data[$i]['ratings']))
                <div id="stars">
                <input id="input-id" type="number" class="rating" 
                value="{{$data[$i]['ratings']}}">
                </div>
                @endif
                <div class="hotel-address">{{ $data[$i]['address'] }}</div> 
            </div>

            <div class="col-md-3 price-details">
                @if(isset($data[$i]['price']))
                <div class="price"><label>{{'$'}} {{ $data[$i]['price']}} </label></div>
                @else
                <div class="price"><label>Not Defined</label></div>
                @endif
            </div>
        </div>     
    </div>
@endfor
</div>
@endif
<div class="kk"></div>
<script>
$(document).ready(function() {
$('#sortname').on('change', function() {
    var city     = $('.search').val();
    var checkin  = $('#checkin').val();
    var checkout = $('#checkout').val();
    var sort     = $('#sortname').val();
    console.log(sort);
    $.ajax({
        type: "get",
        url: "sort",
        dataType: "html",
        data: {
        city:city,
        checkin: checkin,
        checkout: checkout,
        sort: sort
        },
        success: function(data){
            var json = $.parseJSON(data);
            for(var i=0;i<json.length;i++){

                console.log(json[i].name);
                console.log(json[i].price);
                console.log(json[i].address);
                console.log(json[i].ratings);
                console.log(json[i].photo);
                $('.hotel-name').each(function(i) {
                    $(this).html(json[i].name);
                });

                $('.hotel-address').each(function(i) {
                    $(this).html(json[i].address);
                });

                $('.image').each(function(i) {
                    $(this).attr("src",json[i].photo);
                });

                // $('.rating').each(function(i) {
                //     $(this).attr("value",json[i].ratings);
                // });
               

                $('.price').each(function(i) {
                    $(this).html("$ "+json[i].price);
                });
                
            }          
        }
    });
    }); 
});
</script>
</form>
@endsection