//jquery for date picker plug in
$(function() {
    $(".date").datepicker();
});

$(document).ready(function() {

//ajax call for sorting hotels on change event
$('#sortname').on('change', function() {

    //reset other filter options
    $("#hotel-name").val('');
    $("#star1").removeClass("highlight");
    $("#star2").removeClass("highlight");
    $("#star3").removeClass("highlight");
    $("#star4").removeClass("highlight");
    $("#star5").removeClass("highlight");
    $("#smile4").removeClass("highlight");
    $("#sad0").removeClass("highlight");
    $("#granny2").removeClass("highlight");
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
            $('.loading').hide();
            $('.hotel-list').animate({opacity:1});

            $(".hotel-list").hide();

            //generating string to populate with sorted hotel details
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
                
                divContent += '<div id="stars">';
                    if (json[i].ratings > 0
                            && json[i].ratings <= 1) {
                    divContent += '<span ><img class="rating-stars"'+ 
                    'src="/img/favorites-star-2.png"></span>';
                    }
                    if (json[i].ratings > 1
                            && json[i].ratings <= 2) {
                    divContent += '<span ><img class="rating-stars"'+ 
                    'src="/img/favorites-star-2.png"></span>';
                    divContent += '<span ><img class="rating-stars"'+ 
                    'src="/img/favorites-star-2.png"></span>';
                    }
                    if (json[i].ratings > 2
                            && json[i].ratings <= 3) {
                    divContent += '<span ><img class="rating-stars"'+ 
                    'src="/img/favorites-star-2.png"></span>';
                    divContent += '<span ><img class="rating-stars"'+ 
                    'src="/img/favorites-star-2.png"></span>';
                    divContent += '<span ><img class="rating-stars"'+ 
                    'src="/img/favorites-star-2.png"></span>';
                    }
                    if (json[i].ratings > 3
                            && json[i].ratings <= 4) {
                    divContent += '<span ><img class="rating-stars"'+ 
                    'src="/img/favorites-star-2.png"></span>';
                    divContent += '<span ><img class="rating-stars"'+ 
                    'src="/img/favorites-star-2.png"></span>';
                    divContent += '<span ><img class="rating-stars"'+ 
                    'src="/img/favorites-star-2.png"></span>';
                    divContent += '<span ><img class="rating-stars"'+ 
                    'src="/img/favorites-star-2.png"></span>';
                    }
                    if (json[i].ratings > 4
                            && json[i].ratings <= 5) {
                    divContent += '<span ><img class="rating-stars"'+ 
                    'src="/img/favorites-star-2.png"></span>';
                    divContent += '<span ><img class="rating-stars"'+ 
                    'src="/img/favorites-star-2.png"></span>';
                    divContent += '<span ><img class="rating-stars"'+ 
                    'src="/img/favorites-star-2.png"></span>';
                    divContent += '<span ><img class="rating-stars"'+ 
                    'src="/img/favorites-star-2.png"></span>';
                    divContent += '<span ><img class="rating-stars"'+ 
                    'src="/img/favorites-star-2.png"></span>';
                    }
                    divContent += '</div>';
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
                if (json[i].detailsurl !== undefined) {
                divContent += '<div class="deal-fit">';
                divContent += '<button class="btn btn-success deal"'+ 
                              'onclick="myFunction(\''+json[i].detailsurl+'\');">View Deal';
                divContent += '<span class="glyphicon glyphicon-chevron-right">';
                divContent += '</span></button></div>';
                }
                divContent += '</div></div>';
                divContent += '</div>';

                $( "#parentdiv" ).append(divContent);
            } 
        }         
    });
}); 
});

//function to open expedia website 
function myFunction(data) {
    var myWindow = window.open(data, "expedia", "width=600, height=500");
}