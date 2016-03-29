function hotelMap(lat,lng,data) {
    
    var map;
    var hotels = [];
    for(i=0;i<data.length;i++ ){
        innerArr = [ data[i].name, data[i].lat, data[i].lng,
             data[i].address, data[i].ratings, data[i].guestratings,
             data[i].photo, data[i].guestreviewcount, data[i].price,
             data[i].detailsurl];
        hotels.push(innerArr);
    }

    $("#dialog").dialog({
        modal: true,
        title: "Google Map",
        width: 600,
        hright: 450,
        buttons: {
            Close: function () {
                $(this).dialog('close');
            }
        },
        open: function () {
            var mapOptions = {
                center: new google.maps.LatLng(lat, lng),
                zoom: 12,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);

            for (var i = 0; i < hotels.length; i++){
                var beach  = hotels[i];
                var latlng = new google.maps.LatLng(beach[1],beach[2]);
                var name         = beach[0];
                var address      = beach[3];
                var ratings      = beach[4];
                var guestratings = beach[5];
                var photo        = beach[6];
                var reviewcount  = beach[7];
                var price        = beach[8];
                var detailsurl   = beach[9];
                
                createMarker(map,latlng, name, address, ratings, guestratings,
                 photo, reviewcount, price,detailsurl);
            }
        }
    });
}

// This function creates each marker and it sets their Info Window content
function createMarker(map,latlng, name, address, ratings, guestratings, photo, reviewcount, price, detailsurl){
    
    var infoWindow;
    infoWindow = new google.maps.InfoWindow();
    var image = {
      url: '/img/hotel_icon.jpg',
      // This marker is 20 pixels wide by 32 pixels high.
      scaledSize: new google.maps.Size(20, 20),
      // The origin for this image is (0, 0).
      origin: new google.maps.Point(0, 0),
      // The anchor for this image is the base of the flagpole at (0, 32).
      anchor: new google.maps.Point(0, 0)
    };
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      icon: image, 
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
        iwContent += '<div class="iw-deal">';
        if ( price !== undefined ) {
            iwContent += '<span class="iw-price">$ '+price+'</span>';
        }
        if (detailsurl !== undefined) {
            iwContent += '<input type="hidden" id="url"';
            iwContent += 'value="'+detailsurl+'">';
        }
        iwContent += '<button class="btn btn-success deal" onclick="myFunction();">View Deal';
        iwContent += '<span class="glyphicon glyphicon-chevron-right">';
        iwContent += '</span></button></div>';            
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
   
}
