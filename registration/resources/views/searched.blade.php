<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>Search Location</title>
        
        <!--css file-->
        <link href="{{ asset_timed('/css/map.css') }}" rel="stylesheet">
        </head>
    <body>
    
    
    <!--search box-->
    <input id="pac-input" class="controls" type="text" placeholder="Search Box" name="search" 
    value="{{ $address['location'] }}"/>
    <a href="{{ url('/mapsearch') }}"><h1>GO BACK</h1></a></li>
    <div id="map"></div>

    <!--js file-->
    <script src="{{ asset_timed('/js/map.js') }}" ></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDG_qAbS4Ni9qSUtFrdq35VnKLc6GWZN8&libraries=places&callback=initAutocomplete"
         async defer></script>
    </body>
</html>