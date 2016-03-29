$(document).ready(function() {
$('#smile').on('click', function() {
    $('#error').hide();
    $('.hotel-list').animate({opacity:0});
    $('.loading').show();
    var city     = $('.search').val();
    var checkin  = $('#checkin').val();
    var checkout = $('#checkout').val();
    var filter = 'sm';
     $.ajax({
        type: "get",
        url: "smile",
        dataType: "json",
        data: {
        city:city,
        checkin: checkin,
        checkout: checkout,
        filter: filter
        },
        success: function(json){

            $('.loading').hide();
            $('.hotel-list').animate({opacity:1});
            if ( json['result'] === 'no') {
                $("#error").show();
                $(".hotel-list").hide();
            } else {
            $(".hotel-list").hide();
            for(var i=0;i<json.length;i++){

                var divContent = '<div class="col-md-12 hotel-list">';
                divContent += '<div class="row">';
                divContent += '<div class="col-md-3">';
                if ( json[i].photo !== undefined ) {
                divContent += '<div><img class="image" src="'+json[i].photo+'"></div>';
                } else {
                divContent += '<div><img class="image" src="/img/raj_mahal_hotel.jpg"></div>';    
                }
                divContent += ' </div>';
                divContent += '<div class="col-md-6 hotel-detail">';
                divContent += '<div class="hotel-name">'+json[i].name+'</div>';
                if ( json[i].ratings !== undefined ) {
                // divContent += '<div id="stars"><input id="input-id" type="text" class="rating" value="'+json[i].ratings+'"></div>';
                      // $("#input-id").rating();
                   
                }
                divContent += '<div class="hotel-address">'+json[i].address+'</div> ';
                
                if (json[i].guestratings !== undefined) {
                    divContent += '<div class="review">';
                    if (json[i].guestratings >= 4) {
                    divContent += '<img class="emo-sm" src="/img/smiley-face.jpg">';
                    }
                    if (json[i].guestratings >= 2
                        && json[i].guestratings < 4) {
                    divContent += '<img class="emo-gr" src="/img/Granny-Enchanted-Neutral-Face.png">';
                    }
                    if (json[i].guestratings < 2) {
                    divContent += '<img class="emo-sad" src="/img/sad.png">';
                    }
                    divContent += '<span class="guest-rating">'+json[i].guestratings+'/5</span>';
                    divContent += ' <div class="guestreviewcount">'+json[i].guestreviewcount+' Reviews </div>';
                    divContent += '</div>'; 
                }
                divContent += '</div>';
                divContent += '<div class="col-md-3 price-details">';
                divContent += '<div><center>Expedia</center></div>';
                if (json[i].price !== undefined) {
                divContent += '<div class="price"><label>$'+json[i].price+'</label></div>';
                }
                divContent += '<div class="deal-fit">';
                if (json[i].detailsurl !== undefined) {
                divContent += '<input type="hidden" id="url"';
                divContent += 'value="'+json[i].detailsurl+'">';
                }
                divContent += '<button class="btn btn-success deal" onclick="myFunction();">View Deal';
                divContent += '<span class="glyphicon glyphicon-chevron-right">';
                divContent += '</span></button></div>';
                divContent += '</div></div>';
                divContent += '</div>';

                $( "#parentdiv" ).append(divContent);
            } 
            }
        } 
        });        
    });

$('#granny').on('click', function() {
    $('#error').hide();
    $('.hotel-list').animate({opacity:0});
    $('.loading').show();
    var city     = $('.search').val();
    var checkin  = $('#checkin').val();
    var checkout = $('#checkout').val();
    var filter = 'gr';
    $.ajax({
        type: "get",
        url: "smile",
        dataType: "json",
        data: {
        city:city,
        checkin: checkin,
        checkout: checkout,
        filter: filter
        },
        success: function(json){

            $('.loading').hide();
            $('.hotel-list').animate({opacity:1});
            
            if ( json['result'] === 'no') {
                $("#error").show();
                $(".hotel-list").hide();
            } else {
            $(".hotel-list").hide();
            for(var i=0;i<json.length;i++){

                var divContent = '<div class="col-md-12 hotel-list">';
                divContent += '<div class="row">';
                divContent += '<div class="col-md-3">';
                if ( json[i].photo !== undefined ) {
                divContent += '<div><img class="image" src="'+json[i].photo+'"></div>';
                } else {
                divContent += '<div><img class="image" src="/img/raj_mahal_hotel.jpg"></div>';    
                }
                divContent += ' </div>';
                divContent += '<div class="col-md-6 hotel-detail">';
                divContent += '<div class="hotel-name">'+json[i].name+'</div>';
                if ( json[i].ratings !== undefined ) {
                // divContent += '<div id="stars"><input id="input-id" type="text" class="rating" value="'+json[i].ratings+'"></div>';
                      // $("#input-id").rating();
                   
                }
                divContent += '<div class="hotel-address">'+json[i].address+'</div> ';
                
                if (json[i].guestratings !== undefined) {
                    divContent += '<div class="review">';
                    if (json[i].guestratings >= 4) {
                    divContent += '<img class="emo-sm" src="/img/smiley-face.jpg">';
                    }
                    if (json[i].guestratings >= 2
                        && json[i].guestratings < 4) {
                    divContent += '<img class="emo-gr" src="/img/Granny-Enchanted-Neutral-Face.png">';
                    }
                    if (json[i].guestratings < 2) {
                    divContent += '<img class="emo-sad" src="/img/sad.png">';
                    }
                    divContent += '<span class="guest-rating">'+json[i].guestratings+'/5</span>';
                    divContent += ' <div class="guestreviewcount">'+json[i].guestreviewcount+' Reviews </div>';
                    divContent += '</div>'; 
                }
                divContent += '</div>';
                divContent += '<div class="col-md-3 price-details">';
                divContent += '<div><center>Expedia</center></div>';
                if (json[i].price !== undefined) {
                divContent += '<div class="price"><label>$'+json[i].price+'</label></div>';
                }
                divContent += '<div class="deal-fit">';
                if (json[i].detailsurl !== undefined) {
                divContent += '<input type="hidden" id="url"';
                divContent += 'value="'+json[i].detailsurl+'">';
                }
                divContent += '<button class="btn btn-success deal" onclick="myFunction();">View Deal';
                divContent += '<span class="glyphicon glyphicon-chevron-right">';
                divContent += '</span></button></div>';
                divContent += '</div></div>';
                divContent += '</div>';

                $( "#parentdiv" ).append(divContent);
            }
            } 
        } 
        });        
    });
$('#sad').on('click', function() {
    $('#error').hide();
    $('.hotel-list').animate({opacity:0});
    $('.loading').show();
    var city     = $('.search').val();
    var checkin  = $('#checkin').val();
    var checkout = $('#checkout').val();
    var filter = 'sad';
    $.ajax({
        type: "get",
        url: "smile",
        dataType: "json",
        data: {
        city:city,
        checkin: checkin,
        checkout: checkout,
        filter: filter
        },
        success: function(json){

            $('.loading').hide();
            $('.hotel-list').animate({opacity:1});
            
            if ( json['result'] === 'no') {
                $("#error").show();
                $(".hotel-list").hide();
            } else {
            $(".hotel-list").hide();
            for(var i=0;i<json.length;i++){

                var divContent = '<div class="col-md-12 hotel-list">';
                divContent += '<div class="row">';
                divContent += '<div class="col-md-3">';
                if ( json[i].photo !== undefined ) {
                divContent += '<div><img class="image" src="'+json[i].photo+'"></div>';
                } else {
                divContent += '<div><img class="image" src="/img/raj_mahal_hotel.jpg"></div>';    
                }
                divContent += ' </div>';
                divContent += '<div class="col-md-6 hotel-detail">';
                divContent += '<div class="hotel-name">'+json[i].name+'</div>';
                if ( json[i].ratings !== undefined ) {
                // divContent += '<div id="stars"><input id="input-id" type="text" class="rating" value="'+json[i].ratings+'"></div>';
                      // $("#input-id").rating();
                   
                }
                divContent += '<div class="hotel-address">'+json[i].address+'</div> ';
                
                if (json[i].guestratings !== undefined) {
                    divContent += '<div class="review">';
                    if (json[i].guestratings >= 4) {
                    divContent += '<img class="emo-sm" src="/img/smiley-face.jpg">';
                    }
                    if (json[i].guestratings >= 2
                        && json[i].guestratings < 4) {
                    divContent += '<img class="emo-gr" src="/img/Granny-Enchanted-Neutral-Face.png">';
                    }
                    if (json[i].guestratings < 2) {
                    divContent += '<img class="emo-sad" src="/img/sad.png">';
                    }
                    divContent += '<span class="guest-rating">'+json[i].guestratings+'/5</span>';
                    divContent += ' <div class="guestreviewcount">'+json[i].guestreviewcount+' Reviews </div>';
                    divContent += '</div>'; 
                }
                divContent += '</div>';
                divContent += '<div class="col-md-3 price-details">';
                divContent += '<div><center>Expedia</center></div>';
                if (json[i].price !== undefined) {
                divContent += '<div class="price"><label>$'+json[i].price+'</label></div>';
                }
                divContent += '<div class="deal-fit">';
                if (json[i].detailsurl !== undefined) {
                divContent += '<input type="hidden" id="url"';
                divContent += 'value="'+json[i].detailsurl+'">';
                }
                divContent += '<button class="btn btn-success deal" onclick="myFunction();">View Deal';
                divContent += '<span class="glyphicon glyphicon-chevron-right">';
                divContent += '</span></button></div>';
                divContent += '</div></div>';
                divContent += '</div>';

                $( "#parentdiv" ).append(divContent);
            } 
            }
        } 
        });        
    });
});
