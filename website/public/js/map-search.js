$(document).ready(function () {
$('#showMap').on('click', function () {
    var city     = $('.search').val();
    var checkin  = $('#checkin').val();
    var checkout = $('#checkout').val();
    var sort     = $('#sortname').val();
    $.ajax({
        type: "get",
        url: "map",
        dataType: "json",
        data: {
            city:city,
            checkin: checkin,
            checkout: checkout,
            sort: sort
        },
        success: function(data){ 
            console.log('in ajax success method');
            hotelMap(data);
        }
    });
});
});

function hotelMap(data) {

    console.log('in js method');
    var map;
    var infoWindow;
    var coords = new Object();
    var markersArray = [];
    coords.lat = data.center.lat;
    coords.lng = data.center.lng;

    var beaches = [];
    for(i=0;i<data.latlng.length;i++ ){
        innerArr = [data.latlng[i].name,data.latlng[i].lat,data.latlng[i].lng,
            data.latlng[i].address,data.latlng[i].ratings,data.latlng[i].guestratings,
            data.latlng[i].photo,data.latlng[i].guestreviewcount,data.latlng[i].price];
        beaches.push(innerArr);
    }

    console.log(beaches);
        
    $( "#map_container" ).dialog({
        autoOpen:false,
        width: 555,
        height: 400,
        resizeStop: function(event, ui) {google.maps.event.trigger(map, 'resize')  },
        open: function(event, ui) {google.maps.event.trigger(map, 'resize'); }      
    });  
    console.log('now map container');
    $( "#showMap" ).click(function() {           
        $( "#map_container" ).dialog( "open" );
        map.setCenter(new google.maps.LatLng(coords.lat, coords.lng), 10);
        return false;
    }); 
    console.log('showMap');   
    initialize();
    
    function initialize() 
    {      
        console.log('now initializing');
        var latlng = new google.maps.LatLng(coords.lat, coords.lng);
        var myOptions = {
          zoom: 10,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
       map = new google.maps.Map(document.getElementById("map_canvas"),  myOptions); 
       // a new Info Window is created
       infoWindow = new google.maps.InfoWindow();

       // Event that closes the Info Window with a click on the map
       google.maps.event.addListener(map, 'click', function() {
          infoWindow.close();
       });

       // Finally displayMarkers() function is called to begin the markers creation
       displayMarkers();                        
    }   

function displayMarkers(){

   // this variable sets the map bounds according to markers position
   var bounds = new google.maps.LatLngBounds();
   console.log('display marker method');
     
   // for loop traverses markersData array calling createMarker function for each marker 
   for (var i = 0; i < beaches.length; i++){
    var beach = beaches[i];
      var latlng = new google.maps.LatLng(beach[1],beach[2]);
      var name = beach[0];
      var address = beach[3];
      var ratings = beach[4];
      var guestratings = beach[5];
      var photo = beach[6];
      var reviewcount = beach[7];
      var price = beach[8];
      createMarker(latlng, name, address, ratings, guestratings, photo, reviewcount, price);

      // marker position is added to bounds variable
      bounds.extend(latlng);  
   }
   
   map.fitBounds(bounds);
}

// This function creates each marker and it sets their Info Window content
function createMarker(latlng, name, address, ratings, guestratings, photo, reviewcount, price){
   console.log('create marker method');
   var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      title: name
   });
   google.maps.event.addListener(marker, 'click', function() {
      
      // Creating the content to be inserted in the infowindow
      var iwContent = '<div class="row">'+
                    '<div class="col-md-12">' +
                '<div class="tit-border"><div class="iw-title">' +name+'</div></div>'+ 
                '<div class="col-md-6 ">';
                if(ratings !== undefined) {
                  iwContent += '<div id="stars">'+
                            '<input id="input-id" type="number"'+
                            'class="rating" readonly="false"'+
                            'value="'+ratings+'"></div>';
                  
                }
                iwContent += '<div class="iw-address">'+address+'</div>';
                if (guestratings !== undefined) {
                    iwContent += '<div class="iw-review">';
                    if (guestratings >= 4) {
                    iwContent += '<img class="iw-emo-sm"'+ 
                                'src="/img/smiley-face.jpg">';
                    }
                    if (guestratings >= 2
                        && guestratings < 4) {
                    iwContent += '<img class="iw-emo-gr"'+
                                'src="/img/Granny-Enchanted-Neutral-Face.png">';
                    }
                    if (guestratings < 2) {
                    iwContent += '<img class="iw-emo-sad" src="/img/sad.png">';
                    }
                   iwContent += '<span class="iw-guest-rating">'+guestratings+'/5</span>';
                   iwContent += ' <div class="iw-guestreviewcount">'+reviewcount+' Reviews </div>';
                   iwContent += '</div>'; 
                }
    iwContent += '</div>'+
                '<div class="col-md-6">'+
                '<img class="iw-image" src="'+photo+'">'+
                '</div>'+
                '</div></div>';
      
      // including content to the Info Window.
      infoWindow.setContent(iwContent);

      // opening the Info Window in the current map and at the current marker location.
      infoWindow.open(map, marker);
   });
console.log('end');
}
}     