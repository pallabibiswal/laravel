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
            <div class="row">
                <div class="col-md-3">
                    <label>Check In Date</label>
                    <input type="text" name="checkin" 
                    class="form-control  glyphicon glyphicon-calendar date"
                    value="@if(isset($detail['checkin'])){{$detail['checkin']}}@else""@endif">
                </div>
                <div class="col-md-3">
                    <label>Check Out Date</label>
                    <input type="text" name="checkout"
                    class="form-control  glyphicon glyphicon-calendar date"
                    value="@if(isset($detail['checkout'])){{$detail['checkout']}}@else""@endif">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-11 col-md-offset-1 all-details">
@if ( isset($data))
@for ($i=0; $i < $total['count'] ; $i++)
    <div class="col-md-6 col-md-offset-3 hotel-list">
        <div class="row">
            <div class="col-md-3">
                @if(isset($data[$i]['photo']))
                <div><img id="image" src="{{ $data[$i]['photo']}}"></div>
                @endif
            </div>
        
            <div class="col-md-6 hotel-detail">             
                <div class="hotel-name">{{ $data[$i]['name'] }}</div>
                <div id="stars">
                <input id="input-id" type="text" class="rating" 
                value="@if(isset($data[$i]['ratings'])){{$data[$i]['ratings']}}@else{{""}}@endif" >
                </div>
                <div class="hotel-address">{{ $data[$i]['address'] }}</div> 
            </div>

            <div class="col-md-3 price-details">
                @if(isset($data[$i]['price']))
                <div class="price"><label>{{'$'}} {{ $data[$i]['price']}} </label></div>
                @else
                <label>Not available</label>
                @endif
            </div>


        </div>     
    </div>

@endfor
@endif
</div>
@endsection