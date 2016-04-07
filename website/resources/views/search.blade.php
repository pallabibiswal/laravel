@extends('layouts.app')

@section('css')
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/ui-darkness/jquery-ui.css" />
@endsection

@section('script')
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="{{ asset_timed('/js/hotel-search.js') }}"></script>
<script src="{{ asset_timed('/js/map-search.js') }}"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDDG_qAbS4Ni9qSUtFrdq35VnKLc6GWZN8" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"  type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
<script src="{{ asset_timed('/js/filter.js') }}"></script>
<script>

  </script>
@endsection

@section('content')

<!-- main content-->
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
            </form>
        </div>
    </div>
</div>

<!--Displaying results after API call-->
@if ( isset($data))
<script>
    $(document).ready(function () {
    var data = '<?php if(isset($data)){ echo addslashes(json_encode($data)); }?>';
        if (data !== undefined ) {
            json = $.parseJSON(data);
            filter(json);
        }
    });
</script>
<div class="row">
<div class="col-md-3 col-md-offset-1 filters">
    <div class="panel panel-default">

    <!--Top Filters Options-->
        <div class="panel-heading">Top Filters</div>
            <div class="panel-body">
                <hr/>
                    <div class="ft-ratings">Star Ratings: </div>
                    <div><button id="star1" value="1">
                    <img class="ft-star" hspace="15" 
                    src="/img/favorites-star-2.png"></button></div>
                    <div><button id="star2" value="2">
                    <img class="ft-star" hspace="15" 
                    src="/img/favorites-star-2.png">
                    <img class="ft-star" hspace="15" 
                    src="/img/favorites-star-2.png"></button></div>
                    <div><button id="star3" value="3">
                    <img class="ft-star" hspace="15" 
                    src="/img/favorites-star-2.png">
                    <img class="ft-star" hspace="15" 
                    src="/img/favorites-star-2.png">
                    <img class="ft-star" hspace="15" 
                    src="/img/favorites-star-2.png"></button></div>
                    <div><button id="star4" value="4">
                    <img class="ft-star" hspace="15" 
                    src="/img/favorites-star-2.png">
                    <img class="ft-star" hspace="15" 
                    src="/img/favorites-star-2.png">
                    <img class="ft-star" hspace="15" 
                    src="/img/favorites-star-2.png">
                    <img class="ft-star" hspace="15" 
                    src="/img/favorites-star-2.png"></button></div>
                    <div><button id="star5" value="5">
                    <img class="ft-star" hspace="15" 
                    src="/img/favorites-star-2.png">
                    <img class="ft-star" hspace="15" 
                    src="/img/favorites-star-2.png">
                    <img class="ft-star" hspace="15" 
                    src="/img/favorites-star-2.png">
                    <img class="ft-star" hspace="15" 
                    src="/img/favorites-star-2.png">
                    <img class="ft-star" hspace="15" 
                    src="/img/favorites-star-2.png"></button></div>

                <hr/>
                <hr/>
                    <div class="ft-ratings">Guest Ratings: </div>
                    <button id="sad0" value="0">
                    <img class="ft-emo-sad" hspace="15" src="/img/sad.png"></button>
                    <button id="granny2" value="2">
                    <img class="ft-emo-gr" hspace="15" 
                    src="/img/Granny-Enchanted-Neutral-Face.png"></button>
                    <button id="smile4" value="4">
                    <img class="ft-emo-sm" hspace="15" 
                     src="/img/smiley-face.jpg"></button>
                <hr/>

                <hr/>
                    <div class="ft-options">Top Options: </div>
                    <span id="wifi">
                    <img class="ft-wifi" hspace="10" src="/img/wifi.png"></span>
                    <span id="spa">
                    <img class="ft-spa" hspace="10" src="/img/spa.png"></span>
                    <span id="beach">
                    <img class="ft-beach" hspace="10" src="/img/Beach-512.png"></span>
                    <span id="breakfast">
                    <img class="ft-breakfast" hspace="10" src="/img/breakfast.png"></span>
                    <span id="pool">
                    <img class="ft-pool" hspace="10" src="/img/pool.png"></span>
                <hr/>

                <hr/>
                    <div class="ft-ratings">Search Hotel Names: </div>
                    <div class="row">
                    <div class="col-md-8"><input id="hotel-name" type="text" 
                    class="form-control"/></div>
                    <div class="col-md-2">
                    <button id="search-hotel" class="btn btn-info">G0..
                    </button></div>
                    </div>
                <hr/>
                <hr/>
                    <p>
                        <label for="amount">Price:</label>
                        <input type="text" id="amount">
                    </p>
 
                    <div id="slider"></div>
                    <span id="slider-value"></span>
                <hr/>
        </div>
        <div><button id="reset" class="btn btn-info">
        Reset Filters</button></div>
    </div>
</div>
<div class="col-md-7 all-details">

<!--to display Map-->
<div id="dialog">
<div id="dvMap"></div>
</div>
<span id="controls">
    <button type="submit" 
    name="showMap" value="Show Map" id="showMap" 
    class="btn btn-default glyphicon glyphicon-map-marker" 
    onClick ="hotelMap({{ $lanlog['lat'] }},{{ $lanlog['lng'] }}, {{ json_encode($data)}});">
    Map</button>
</span> 

<!--sorting hotels-->
<div class="col-md-3" id="sort">
<select class="form-control" name="sort" id="sortname">
    <option value="price">Sort By</option>
    <option value="price">Focus on Price</option>
    <option value="starrating">Focus on Star Rating</option>
    <option value="guestrating">Sort by Popularity</option>
</select>
</div>

<!--hidden loading image during ajax call-->
<div class="loading"><img class="load" src="/img/loadingimage.gif"></div>
<div id="parentdiv">
<br/>

<!--To display error message when result not found-->
<div id="error"><h4>Sorry...No Result Found..!</h4></div>

<!--Display hotels-->
@for ($i = 0; $i < $total['count']; $i++)
    <div class="col-md-12 hotel-list">
        <div class="row">
            <div class="col-md-3">
                @if(isset($data[$i]['photo']))
                <div><img class="image" src="{{ $data[$i]['photo']}}"></div>
                @else
                <div><img class="image" src="/img/raj_mahal_hotel.jpg"></div>
                @endif
            </div>
        
            <div class="col-md-6 hotel-detail">
                @if(isset($data[$i]['name']))             
                <div class="hotel-name">{{ $data[$i]['name'] }}</div>
                @endif

                @if(isset($data[$i]['ratings']))
                <div id="stars">
                @if ($data[$i]['ratings'] > 0
                        && $data[$i]['ratings'] <= 1)
                <span ><img class="rating-stars" 
                src="/img/favorites-star-2.png"></span>
                @endif
                @if ($data[$i]['ratings'] > 1
                        && $data[$i]['ratings'] <= 2)
                <span ><img class="rating-stars" 
                src="/img/favorites-star-2.png"></span>
                <span ><img class="rating-stars" 
                src="/img/favorites-star-2.png"></span>
                @endif
                @if ($data[$i]['ratings'] > 2
                        && $data[$i]['ratings'] <= 3)
                <span ><img class="rating-stars" 
                src="/img/favorites-star-2.png"></span>
                <span ><img class="rating-stars" 
                src="/img/favorites-star-2.png"></span>
                <span ><img class="rating-stars" 
                src="/img/favorites-star-2.png"></span>
                @endif
                @if ($data[$i]['ratings'] > 3
                        && $data[$i]['ratings'] <= 4)
                <span ><img class="rating-stars" 
                src="/img/favorites-star-2.png"></span>
                <span ><img class="rating-stars" 
                src="/img/favorites-star-2.png"></span>
                <span ><img class="rating-stars" 
                src="/img/favorites-star-2.png"></span>
                <span ><img class="rating-stars" 
                src="/img/favorites-star-2.png"></span>
                @endif
                @if ($data[$i]['ratings'] > 4
                        && $data[$i]['ratings'] <= 5)
                <span ><img class="rating-stars" 
                src="/img/favorites-star-2.png"></span>
                <span ><img class="rating-stars" 
                src="/img/favorites-star-2.png"></span>
                <span ><img class="rating-stars" 
                src="/img/favorites-star-2.png"></span>
                <span ><img class="rating-stars" 
                src="/img/favorites-star-2.png"></span>
                <span ><img class="rating-stars" 
                src="/img/favorites-star-2.png"></span>
                @endif
                </div>
                @endif
                
                @if(isset($data[$i]['address'])) 
                <div class="hotel-address">{{ $data[$i]['address'] }}</div>
                @endif 
                
                @if(isset($data[$i]['guestratings']))
                    <div class="review">
                        @if ($data[$i]['guestratings'] >= 4)
                        <img class="emo-sm" src="/img/smiley-face.jpg">
                        @endif
                        @if ($data[$i]['guestratings'] >= 2
                        && $data[$i]['guestratings'] < 4)
                        <img class="emo-gr" 
                        src="/img/Granny-Enchanted-Neutral-Face.png">
                        @endif
                        @if ($data[$i]['guestratings'] < 2)
                        <img class="emo-sad" src="/img/sad.png">
                        @endif
                        <span class="guest-rating">
                        {{ $data[$i]['guestratings'] }}/5</span> 
                        <div class="guestreviewcount">
                        {{ $data[$i]['guestreviewcount'] }} Reviews </div>
                    </div>
                @endif
            </div>

            <div class="col-md-3 price-details">
                <div><center>Expedia</center></div>
                @if(isset($data[$i]['price']))
                <div class="price"><label>{{'$'}} {{ $data[$i]['price']}} 
                </label></div>
                @endif
                @if(isset($data[$i]['detailsurl']))
                <div class="deal-fit">
                <button class="btn btn-success deal" onClick="myFunction('{{$data[$i]['detailsurl']}}');">View Deal
                <span class="glyphicon glyphicon-chevron-right"></span></button>
                </div>
                @endif
            </div>
        </div>     
    </div>
@endfor
</div>
</div>
</div>
@endif

@endsection