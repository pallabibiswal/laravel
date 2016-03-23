$(function() {
    $( ".date" ).datepicker();
});

$(document).ready(function() {
$('#sortname').on('change', function() {
    $('.hotel-list').animate({opacity:0});
    $('.loading').show();
    var city     = $('.search').val();
    var checkin  = $('#checkin').val();
    var checkout = $('#checkout').val();
    var sort     = $('#sortname').val();
    console.log(sort);
    $.ajax({
        type: "get",
        url: "sort",
        dataType: "json",
        data: {
        city:city,
        checkin: checkin,
        checkout: checkout,
        sort: sort
        },
        success: function(json){
            // var json = $.parseJSON(data);
            $('.loading').hide();
            $('.hotel-list').animate({opacity:1});

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
                if (json[i].price !== undefined) {
                divContent += '<div class="col-md-3 price-details">';
                divContent += '<div class="price"><label>$'+json[i].price+'</label></div>';
                divContent += '</div>';
                }
                divContent += '</div></div>';

                $( "#parentdiv" ).append(divContent);
            } 
        }         
    });
}); 
});
