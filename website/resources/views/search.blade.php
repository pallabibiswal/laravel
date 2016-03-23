@extends('layouts.app')

@section('css')
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<link href="/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/ui-darkness/jquery-ui.css" />
<link href="/css/theme-krajee-svg.css" media="all" rel="stylesheet" type="text/css" />
@endsection

@section('script')
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="/js/hotel-search.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDDG_qAbS4Ni9qSUtFrdq35VnKLc6GWZN8" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"  type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
<script src="/js/star-rating.js" type="text/javascript"></script>
<script src="/js/star-rating_locale_LANG.js"></script>
<script src="/js/map-search.js"></script>

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
            </form>
        </div>
    </div>
</div>

@if ( isset($data))
<div class="col-md-7 col-md-offset-3 all-details">
<div id="map_container" title="Location Map">    
        <div id="map_canvas"></div>
</div>
<span id="controls">
    <button type="submit" 
    name="showMap" value="Show Map" id="showMap" 
    class="btn btn-default glyphicon glyphicon-map-marker">
    Map</button>
</span> 
<div class="col-md-3" id="sort">
<select class="form-control" name="sort" id="sortname">
    <option value="price">Sort By</option>
    <option value="price">Focus on Price</option>
    <option value="starrating">Focus on Star Rating</option>
    <option value="guestrating">Sort by Popularity</option>
</select>
</div>
<div class="loading"><img class="load" src="/img/loadingimage.gif"></div>
<div id="parentdiv">
@for ($i=0; $i < $total['count'] ; $i++)
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
                <div class="hotel-name">{{ $data[$i]['name'] }}</div>
                
                <div id="stars">
                <input id="input-id" type="number" class="rating" readonly="false"
                value="@if(isset($data[$i]['ratings'])){{$data[$i]['ratings']}}@endif">
                </div>
                
                <div class="hotel-address">{{ $data[$i]['address'] }}</div> 
                
                @if(isset($data[$i]['guestratings']))
                    <div class="review">
                        @if ($data[$i]['guestratings'] >= 4)
                        <img class="emo-sm" src="/img/smiley-face.jpg">
                        @endif
                        @if ($data[$i]['guestratings'] >= 2
                        && $data[$i]['guestratings'] < 4)
                        <img class="emo-gr" src="/img/Granny-Enchanted-Neutral-Face.png">
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
                @if(isset($data[$i]['price']))
                <div class="price"><label>{{'$'}} {{ $data[$i]['price']}} </label></div>
                @endif
            </div>
        </div>     
    </div>
@endfor
</div>

</div>
@endif

@endsection