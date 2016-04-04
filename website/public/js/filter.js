filterval = [];
arrstar = [];
star1 = 0;
star2 = 0;
star3 = 0;
star4 = 0;
star5 = 0;
function filter(json) {
    
    //reset all filters   
    $("#reset").on('click', function() {
        arrstar = [];
        filterval['guestratings'] = undefined;
        $("#hotel-name").val('');
        $("#star1").removeClass("highlight");
        $("#star2").removeClass("highlight");
        $("#star3").removeClass("highlight");
        $("#star4").removeClass("highlight");
        $("#star5").removeClass("highlight");
        $("#smile4").removeClass("highlight");
        $("#sad0").removeClass("highlight");
        $("#granny2").removeClass("highlight");
        $(".hotel-list").show();
    });
    
    //search for a particular hotel by its name    
    $('#search-hotel').click(function() {
        arrstar = [];
        filterval['guestratings'] = undefined;
        $("#star1").removeClass("highlight");
        $("#star2").removeClass("highlight");
        $("#star3").removeClass("highlight");
        $("#star4").removeClass("highlight");
        $("#star5").removeClass("highlight");
        $("#smile4").removeClass("highlight");
        $("#sad0").removeClass("highlight");
        $("#granny2").removeClass("highlight");
        var hotelName = $('#hotel-name').val();
        for(var i=0; i < json.length; i++) {
            var hotel = json[i].name;
            if (hotel.toUpperCase() === hotelName.toUpperCase()) {
                var areEqual = true;
                var c = i;
            } 
        }
        if(areEqual == true) {
            $(".hotel-list").hide();
            htmlString(c);
        } else {
            $("#error").dialog({
                modal: true,
                title: 'Waarning!',
                width: 600,
                hright: 450,
                buttons: {
                    Ok: function() {
                      $( this ).dialog( "close" );
                    }
                }
            });
            $(".hotel-list").show();
        }
    });
        

    //filter with guestratings    
    $('#smile4').click(function () {
        if( $(this).val() == 4 ) {
            $("#hotel-name").val('');
            filterval['guestrating'] = 4;
            $("#granny2").addClass("highlight");
            $("#sad0").addClass("highlight");
            $(".hotel-list").hide();
            newHtml(json,'guestratings',4);
        }
    });

    //filter with guestratings 
    $('#granny2').click(function () {
        
        if( $(this).val() == 2 ) {
            $("#hotel-name").val('');
            filterval['guestrating'] = 2;
            $(this).removeClass("highlight");
            $("#sad0").addClass("highlight");
            $(".hotel-list").hide();
            newHtml(json,'guestratings',2);
        } 
    });

    //filter with guestratings 
    $('#sad0').click(function () {
        $("#hotel-name").val('');
        filterval['guestrating'] = 0;
        $(this).removeClass("highlight");
        $("#granny2").removeClass("highlight");
        $(".hotel-list").hide();
        newHtml(json,'guestratings',0);
    });
    
    //filter with star ratings
    $("#star1").click(function () {
        if( star1 == 0) {
            if( $(this).val() == 1) {
                star1 = 1;
                $("#hotel-name").val('');
                arrstar.push(1);
                $("#star1").removeClass("highlight");
                if( $.inArray(2,arrstar) == -1 ) {
                    $("#star2").addClass("highlight");
                }
                if( $.inArray(3,arrstar) == -1 ) {
                    $("#star3").addClass("highlight");
                }
                if( $.inArray(4,arrstar) == -1 ) {
                    $("#star4").addClass("highlight");
                }
                if( $.inArray(5,arrstar) == -1 ) {
                    $("#star5").addClass("highlight");
                }
                $(".hotel-list").hide();
                    newHtml(json,'ratings',arrstar);
            }
        } else {
            star1 = 0;
            if( $.inArray(2,arrstar) == -1
                && $.inArray(3,arrstar) == -1
                && $.inArray(4,arrstar) == -1
                && $.inArray(5,arrstar) == -1) {
                $("#star1").removeClass("highlight");
                $("#star2").removeClass("highlight");
                $("#star3").removeClass("highlight");
                $("#star4").removeClass("highlight");
                $("#star5").removeClass("highlight");
                arrstar = $.grep(arrstar, function(a) {
                    return a != 1;
                });
                $(".hotel-list").hide();
                newHtml(json,'ratings',arrstar);
                console.log(arrstar);
            } else {
                $("#star1").addClass("highlight");
                arrstar = $.grep(arrstar, function(a) {
                    return a != 1;
                });
                $(".hotel-list").hide();
                newHtml(json,'ratings',arrstar);
            }
        }
    });

    //filter with star ratings
    $("#star2").click(function () {
        if( star2 == 0) {
            if( $(this).val() == 2) {
                star2 = 1;
                $("#hotel-name").val('');
                arrstar.push(2);
                $("#star2").removeClass("highlight");
                if( $.inArray(1,arrstar) == -1 ) {
                    $("#star2").addClass("highlight");
                }
                if( $.inArray(3,arrstar) == -1 ) {
                    $("#star3").addClass("highlight");
                }
                if( $.inArray(4,arrstar) == -1 ) {
                    $("#star4").addClass("highlight");
                }
                if( $.inArray(5,arrstar) == -1 ) {
                    $("#star5").addClass("highlight");
                }
                $(".hotel-list").hide();
                    newHtml(json,'ratings',arrstar);
            }
        } else {
             star2 = 0;
            if( $.inArray(1,arrstar) == -1
                && $.inArray(3,arrstar) == -1
                && $.inArray(4,arrstar) == -1
                && $.inArray(5,arrstar) == -1) {
                $("#star1").removeClass("highlight");
                $("#star2").removeClass("highlight");
                $("#star3").removeClass("highlight");
                $("#star4").removeClass("highlight");
                $("#star5").removeClass("highlight");
                arrstar = $.grep(arrstar, function(a) {
                    return a != 2;
                });
                $(".hotel-list").hide();
                newHtml(json,'ratings',arrstar);
            } else {
                $("#star2").addClass("highlight");
                arrstar = $.grep(arrstar, function(a) {
                    return a != 2;
                });
                $(".hotel-list").hide();
                newHtml(json,'ratings',arrstar);
            }
        }
    });

    //filter with star ratings
    $("#star3").click(function () {

        if( star3 == 0) {
            if( $(this).val() == 3) {
                star3 = 1;
                $("#hotel-name").val('');
                arrstar.push(3);
                $("#star3").removeClass("highlight");
                if( $.inArray(2,arrstar) == -1 ) {
                    $("#star2").addClass("highlight");
                }
                if( $.inArray(1,arrstar) == -1 ) {
                    $("#star1").addClass("highlight");
                }
                if( $.inArray(4,arrstar) == -1 ) {
                    $("#star4").addClass("highlight");
                }
                if( $.inArray(5,arrstar) == -1 ) {
                    $("#star5").addClass("highlight");
                }
                $(".hotel-list").hide();
                    newHtml(json,'ratings',arrstar);
            }
        } else {
            star3 = 0;
            if( $.inArray(2,arrstar) == -1
                && $.inArray(1,arrstar) == -1
                && $.inArray(4,arrstar) == -1
                && $.inArray(5,arrstar) == -1) {
                $("#star1").removeClass("highlight");
                $("#star2").removeClass("highlight");
                $("#star3").removeClass("highlight");
                $("#star4").removeClass("highlight");
                $("#star5").removeClass("highlight");
                arrstar = $.grep(arrstar, function(a) {
                    return a != 3;
                });
                $(".hotel-list").hide();
                newHtml(json,'ratings',arrstar);
            } else {
                console.log('not');
                $("#star3").addClass("highlight");
                arrstar = $.grep(arrstar, function(a) {
                    return a != 3;
                });
                $(".hotel-list").hide();
                newHtml(json,'ratings',arrstar);
            }
        }
    });

    //filter with star ratings
    $("#star4").click(function () {

        if( star4 == 0) {
            if( $(this).val() == 4) {
                star4 = 1;
                $("#hotel-name").val('');
                arrstar.push(4);
                $("#star4").removeClass("highlight");
                if( $.inArray(2,arrstar) == -1 ) {
                    $("#star2").addClass("highlight");
                }
                if( $.inArray(3,arrstar) == -1 ) {
                    $("#star3").addClass("highlight");
                }
                if( $.inArray(1,arrstar) == -1 ) {
                    $("#star1").addClass("highlight");
                }
                if( $.inArray(5,arrstar) == -1 ) {
                    $("#star5").addClass("highlight");
                }
                $(".hotel-list").hide();
                    newHtml(json,'ratings',arrstar);
            }
        } else {
            star4 = 0;
            if( $.inArray(2,arrstar) == -1
                && $.inArray(3,arrstar) == -1
                && $.inArray(1,arrstar) == -1
                && $.inArray(5,arrstar) == -1) {
                console.log('yes');
                $("#star1").removeClass("highlight");
                $("#star2").removeClass("highlight");
                $("#star3").removeClass("highlight");
                $("#star4").removeClass("highlight");
                $("#star5").removeClass("highlight");
                arrstar = $.grep(arrstar, function(a) {
                    return a != 4;
                });
                $(".hotel-list").hide();
                newHtml(json,'ratings',arrstar);
            } else {
                $("#star4").addClass("highlight");
                arrstar = $.grep(arrstar, function(a) {
                    return a != 4;
                });
                $(".hotel-list").hide();
                newHtml(json,'ratings',arrstar); 
            }
        }
    });

    //filter with star ratings
    $("#star5").click(function () {

        if( star5 == 0) {
            if( $(this).val() == 5) {
                star5 = 1;
                $("#hotel-name").val('');
                arrstar.push(5);
                console.log(arrstar);
                $("#star5").removeClass("highlight");
                if( $.inArray(2,arrstar) == -1 ) {
                    $("#star2").addClass("highlight");
                }
                if( $.inArray(3,arrstar) == -1 ) {
                    $("#star3").addClass("highlight");
                }
                if( $.inArray(4,arrstar) == -1 ) {
                    $("#star4").addClass("highlight");
                }
                if( $.inArray(1,arrstar) == -1 ) {
                    $("#star1").addClass("highlight");
                }
                $(".hotel-list").hide();
                    newHtml(json,'ratings',arrstar);
            }
        } else {
            star5 = 0;
            if( $.inArray(2,arrstar) == -1
                && $.inArray(3,arrstar) == -1
                && $.inArray(4,arrstar) == -1
                && $.inArray(1,arrstar) == -1) {
                $("#star1").removeClass("highlight");
                $("#star2").removeClass("highlight");
                $("#star3").removeClass("highlight");
                $("#star4").removeClass("highlight");
                $("#star5").removeClass("highlight");
                arrstar = $.grep(arrstar, function(a) {
                    return a != 5;
                });
                $(".hotel-list").hide();
                newHtml(json,'ratings',arrstar);
            } else {
                console.log('not');
                $("#star5").addClass("highlight");
                arrstar = $.grep(arrstar, function(a) {
                    return a != 5;
                });
                $(".hotel-list").hide();
                newHtml(json,'ratings',arrstar);
            }
        }
    });
}

//function to combinely filter hotels with different filter options
function newHtml(json,find,val) {
    var srate = arrstar.length;
    var grate = filterval['guestrating'];
    
    var flag = 0; 
    for(var i=0; i < json.length; i++) {
        if( find === 'guestratings') {
            if( srate != 0 ) {
                if ( json[i].guestratings >= val) {
                    if( $.inArray(2,arrstar) != -1) {
                        checkStar(i,2);
                    }
                    if( $.inArray(1,arrstar) != -1) {
                        checkStar(i,1);
                    }
                    if( $.inArray(3,arrstar) != -1) {
                        checkStar(i,3);
                    }
                    if( $.inArray(5,arrstar) != -1) {
                        checkStar(i,5);
                    }
                    if( $.inArray(4,arrstar) != -1) {
                        checkStar(i,4);
                    }
                }
            } else {
                if (json[i].guestratings >= val) {
                    htmlString(i);
                    flag = 1;
                } 
            }
        }
        if( find === 'ratings') {
            if( grate !== undefined ) {
                if ( srate == 0 ) {
                    if ( json[i].guestratings >= grate ) {
                        htmlString(i);   
                        flag =1;
                    }
                } else { 
                    if ( json[i].guestratings >= grate) {
                        if( $.inArray(2,arrstar) != -1) {
                            checkStar(i,2);
                        }
                        if( $.inArray(1,arrstar) != -1) {
                            checkStar(i,1);
                        }
                        if( $.inArray(3,arrstar) != -1) {
                            checkStar(i,3);
                        }
                        if( $.inArray(5,arrstar) != -1) {
                            checkStar(i,5);
                        }
                        if( $.inArray(4,arrstar) != -1) {
                            checkStar(i,4);
                        }
                    } 
                }
            } else {
                if ( srate == 0 ) {
                    $(".hotel-list").show();
                    flag = 1;    
                } else {
                    if( $.inArray(2,arrstar) != -1) {
                        checkStar(i,2);
                    }
                    if( $.inArray(1,arrstar) != -1) {
                        checkStar(i,1);
                    }
                    if( $.inArray(3,arrstar) != -1) {
                        checkStar(i,3);
                    }
                    if( $.inArray(5,arrstar) != -1) {
                        checkStar(i,5);
                    }
                    if( $.inArray(4,arrstar) != -1) {
                        checkStar(i,4);
                    }
                } 
            } 
                  
        } 
    } 
    
    //to print error message if result not found
    if ( flag == 0) {
        $("#error").dialog({
            modal: true,
            title: 'Waarning!',
            width: 600,
            hright: 450,
            buttons: {
                Ok: function() {
                  $( this ).dialog( "close" );
                }
            }
        });
    }

    function checkStar(i,val) {
        if( json[i].ratings > val-1
        && json[i].ratings <= val ) {
            htmlString(i);
            flag = 1;
        }
    }
}

//function to generate  string after filtering
function htmlString(i) {
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
