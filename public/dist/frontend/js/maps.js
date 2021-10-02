jQuery(function ($) {
    "use strict";
var infoBox_ratingType='star-rating';(function($){"use strict";function mainMap() {var ib=new InfoBox(); function locationData (locationImg, locationRating, locationRatingCounter, locationURL, locationTitle, locationAddress, locationPhone, locationColor, locationIcon, locationName, locationStatus, ) {return(''+
'<div class="map-listing-item">'+
'<div class="inner-box">'+
'<div class="infoBox-close"><i class="fa fa-times"></i></div>'+
'<div class="image-box">'+
'<figure class="image"><img src="'+locationImg+'" alt=""></figure>'+        
'<div class="content">'+
'<div class="'+infoBox_ratingType+'" data-rating="'+locationRating+'"><div class="rating-counter">('+locationRatingCounter+' reviews)</div></div>'+
'<h3><a href="'+locationURL+'">' + locationTitle + '<span class="icon icon-verified"></span></a></h3>'+
'<ul class="info">'+
'<li><span class="flaticon-phone"></span>' +locationPhone+ '</li>'+
'<li><span class="flaticon-pin"></span>' +locationAddress+ '</li>'+
'</ul>'+
'</div>'+
'</div>'+
'<div class="bottom-box">'+
'<div class="places"><div class="place '+ locationColor +'"><span class="icon '+ locationIcon +'" ></span> '+ locationName +' </div></div>'+
'<div class="status">'+ locationStatus +'</div>'+
'</div>'+
'</div>'+
'</div>')};


var locations=[
    [locationData('images/resource/listing/1-1.jpg', '5', '7', 'listing-single.html', "Private Hotel-Spa",          '+61-8181-123 ', 'New York', 'sky', 'flaticon-tent', 'Hotel', 'Now Closed', ), 40.94401669296697, -74.16938781738281, 1, '<i class="icon flaticon-desk-bell"></i>'],
    [locationData('images/resource/listing/1-2.jpg', '5', '8', 'listing-single.html', "Burger & Lobster Soho",       '+61-8236-920 ', 'New York', 'pink', 'flaticon-cutlery', 'Restaurant', 'Now Closed', ), 40.77055783505125, -74.26002502441406, 2, '<i class="icon flaticon-cutlery"></i>'], 
    [locationData('images/resource/listing/1-3.jpg', '5', '9', 'listing-single.html', "Best Museum",                '+61-8236-920 ', 'New York', 'purple', 'flaticon-tent', 'Art & History', 'Now Closed', ), 40.7427837, -73.11445617675781, 3, '<i class="icon flaticon-tent"></i>'], 
    [locationData('images/resource/listing/2-1.jpg', '5', '6', 'listing-single.html', "Shop 3 Secret Bargain NYC ", '+61-8236-920 ', 'New York', 'green', 'flaticon-shopping-bag', 'Shopping', 'Now Closed', ), 40.70437865245596, -73.98674011230469, 4, '<i class="icon flaticon-shopping-bag"></i>'], 
    [locationData('images/resource/listing/2-2.jpg', '5', '5', 'listing-single.html', "Moonlight Restourant ",     '+61-8236-920 ', 'New York', 'pink', 'flaticon-cutlery', 'Restaurant', 'Now Closed', ), 40.641311, -73.778139, 5, '<i class="icon flaticon-cutlery"></i>'], 
    [locationData('images/resource/listing/2-3.jpg', '5', '4', 'listing-single.html', "Tom's Restaurant", '+61-8236-920 ', 'New York', 'orange', 'flaticon-cutlery', 'Restaurant', 'Now Closed', ), 41.080938, -73.535957, 6, '<i class="icon flaticon-cutlery"></i>'], 
    [locationData('images/resource/listing/2-4.jpg', '5', '3', 'listing-single.html', "Explore the Real Brooklyn ", '+61-8236-920 ', 'New York', 'dark-pink', 'flaticon-gym', ' Gym & Fitness ', 'Now Closed', ), 41.079386, -73.519478, 7, '<i class="icon flaticon-mirror"></i>'], 
];


function numericalRating(ratingElem) {
        $(ratingElem).each(function() {
            var dataRating = $(this).attr('data-rating');
            if (dataRating >= 4.0) {
                $(this).addClass('high');
            } else if (dataRating >= 3.0) {
                $(this).addClass('mid');
            } else if (dataRating < 3.0) {
                $(this).addClass('low');
            }
        });
    }
    numericalRating('.numerical-rating');


    function starRating(ratingElem) {
        $(ratingElem).each(function() {
            var dataRating = $(this).attr('data-rating');

            function starsOutput(firstStar, secondStar, thirdStar, fourthStar, fifthStar) {
                return ('' +
                    '<span class="' + firstStar + '"></span>' +
                    '<span class="' + secondStar + '"></span>' +
                    '<span class="' + thirdStar + '"></span>' +
                    '<span class="' + fourthStar + '"></span>' +
                    '<span class="' + fifthStar + '"></span>');
            }
            var fiveStars = starsOutput('star', 'star', 'star', 'star', 'star');
            var fourHalfStars = starsOutput('star', 'star', 'star', 'star', 'star half');
            var fourStars = starsOutput('star', 'star', 'star', 'star', 'star empty');
            var threeHalfStars = starsOutput('star', 'star', 'star', 'star half', 'star empty');
            var threeStars = starsOutput('star', 'star', 'star', 'star empty', 'star empty');
            var twoHalfStars = starsOutput('star', 'star', 'star half', 'star empty', 'star empty');
            var twoStars = starsOutput('star', 'star', 'star empty', 'star empty', 'star empty');
            var oneHalfStar = starsOutput('star', 'star half', 'star empty', 'star empty', 'star empty');
            var oneStar = starsOutput('star', 'star empty', 'star empty', 'star empty', 'star empty');
            if (dataRating >= 4.75) {
                $(this).append(fiveStars);
            } else if (dataRating >= 4.25) {
                $(this).append(fourHalfStars);
            } else if (dataRating >= 3.75) {
                $(this).append(fourStars);
            } else if (dataRating >= 3.25) {
                $(this).append(threeHalfStars);
            } else if (dataRating >= 2.75) {
                $(this).append(threeStars);
            } else if (dataRating >= 2.25) {
                $(this).append(twoHalfStars);
            } else if (dataRating >= 1.75) {
                $(this).append(twoStars);
            } else if (dataRating >= 1.25) {
                $(this).append(oneHalfStar);
            } else if (dataRating < 1.25) {
                $(this).append(oneStar);
            }
        });
    }
    starRating('.star-rating');
    
google.maps.event.addListener(ib,'domready',function(){if(infoBox_ratingType='numerical-rating'){numericalRating('.infoBox .'+infoBox_ratingType+'');}
if(infoBox_ratingType='star-rating'){starRating('.infoBox .'+infoBox_ratingType+'');}});var mapZoomAttr=$('#map').attr('data-map-zoom');var mapScrollAttr=$('#map').attr('data-map-scroll');if(typeof mapZoomAttr!==typeof undefined&&mapZoomAttr!==false){var zoomLevel=parseInt(mapZoomAttr);}else{var zoomLevel=5;}
if(typeof mapScrollAttr!==typeof undefined&&mapScrollAttr!==false){var scrollEnabled=parseInt(mapScrollAttr);}else{var scrollEnabled=false;}
var map=new google.maps.Map(document.getElementById('map'),{zoom:zoomLevel,scrollwheel:scrollEnabled,center:new google.maps.LatLng(40.80,-73.70),mapTypeId:google.maps.MapTypeId.ROADMAP,zoomControl:false,mapTypeControl:false,scaleControl:false,panControl:false,navigationControl:false,streetViewControl:false,gestureHandling:'cooperative',styles:[
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#e9e9e9"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#dedede"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#333333"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f2f2f2"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
    }
]});$('.listing-item-container').on('mouseover',function(){var listingAttr=$(this).data('marker-id');if(listingAttr!==undefined){var listing_id=$(this).data('marker-id')-1;var marker_div=allMarkers[listing_id].div;$(marker_div).addClass('clicked');$(this).on('mouseout',function(){if($(marker_div).is(":not(.infoBox-opened)")){$(marker_div).removeClass('clicked');}});}});var boxText=document.createElement("div");boxText.className='map-box'
var currentInfobox;var boxOptions={content:boxText,disableAutoPan:false,alignBottom:true,maxWidth:0,pixelOffset:new google.maps.Size(-134,-55),zIndex:null,boxStyle:{width:"320px"},closeBoxMargin:"0",closeBoxURL:"",infoBoxClearance:new google.maps.Size(25,25),isHidden:false,pane:"floatPane",enableEventPropagation:false,};var markerCluster,overlay,i;var allMarkers=[];var clusterStyles=[{textColor:'white',url:'',height:50,width:50}];var markerIco;for(i=0;i<locations.length;i++){markerIco=locations[i][4];var overlaypositions=new google.maps.LatLng(locations[i][1],locations[i][2]),overlay=new CustomMarker(overlaypositions,map,{marker_id:i},markerIco);allMarkers.push(overlay);google.maps.event.addDomListener(overlay,'click',(function(overlay,i){return function(){ib.setOptions(boxOptions);boxText.innerHTML=locations[i][0];ib.close();ib.open(map,overlay);currentInfobox=locations[i][3];google.maps.event.addListener(ib,'domready',function(){$('.infoBox-close').on('click',function(e){e.preventDefault();ib.close();$('.map-marker-container').removeClass('clicked infoBox-opened');});});}})(overlay,i));}
var options={imagePath:'images/',styles:clusterStyles,minClusterSize:2};markerCluster=new MarkerClusterer(map,allMarkers,options);google.maps.event.addDomListener(window,"resize",function(){var center=map.getCenter();google.maps.event.trigger(map,"resize");map.setCenter(center);});var zoomControlDiv=document.createElement('div');var zoomControl=new ZoomControl(zoomControlDiv,map);function ZoomControl(controlDiv,map){zoomControlDiv.index=1;map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);controlDiv.style.padding='5px';controlDiv.className="zoomControlWrapper";var controlWrapper=document.createElement('div');controlDiv.appendChild(controlWrapper);var zoomInButton=document.createElement('div');zoomInButton.className="custom-zoom-in";controlWrapper.appendChild(zoomInButton);var zoomOutButton=document.createElement('div');zoomOutButton.className="custom-zoom-out";controlWrapper.appendChild(zoomOutButton);google.maps.event.addDomListener(zoomInButton,'click',function(){map.setZoom(map.getZoom()+1);});google.maps.event.addDomListener(zoomOutButton,'click',function(){map.setZoom(map.getZoom()-1);});}
var scrollEnabling=$('#scrollEnabling');$(scrollEnabling).on('click',function(e){e.preventDefault();$(this).toggleClass("enabled");if($(this).is(".enabled")){map.setOptions({'scrollwheel':true});}else{map.setOptions({'scrollwheel':false});}})
$("#geoLocation, .input-with-icon.location a").on('click',function(e){e.preventDefault();geolocate();});

function geolocate(){if(navigator.geolocation){navigator.geolocation.getCurrentPosition(function(position){var pos=new google.maps.LatLng(position.coords.latitude,position.coords.longitude);map.setCenter(pos);map.setZoom(12);});}}}
var map=document.getElementById('map');if(typeof(map)!='undefined'&&map!=null){google.maps.event.addDomListener(window,'load',mainMap);}

function singleListingMap() {
    var myLatlng=new google.maps.LatLng( {
        lng: $('#singleListingMap').data('longitude'), lat: $('#singleListingMap').data('latitude'),
    }
    );
    var single_map=new google.maps.Map(document.getElementById('singleListingMap'), {
        zoom:15, center:myLatlng, scrollwheel:false, zoomControl:false, mapTypeControl:false, scaleControl:false, panControl:false, navigationControl:false, streetViewControl:false, styles:[
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#e9e9e9"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#dedede"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#333333"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f2f2f2"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
    }
]
       
    }
    );
    $('#streetView').on('click',function(e) {
        e.preventDefault();
        single_map.getStreetView().setOptions( {
            visible: true, position: myLatlng
        }
        );
    }
    );
    var zoomControlDiv=document.createElement('div');
    var zoomControl=new ZoomControl(zoomControlDiv, single_map);
    function ZoomControl(controlDiv, single_map) {
        zoomControlDiv.index=1;
        single_map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
        controlDiv.style.padding='5px';
        var controlWrapper=document.createElement('div');
        controlDiv.appendChild(controlWrapper);
        var zoomInButton=document.createElement('div');
        zoomInButton.className="custom-zoom-in";
        controlWrapper.appendChild(zoomInButton);
        var zoomOutButton=document.createElement('div');
        zoomOutButton.className="custom-zoom-out";
        controlWrapper.appendChild(zoomOutButton);
        google.maps.event.addDomListener(zoomInButton, 'click', function() {
            single_map.setZoom(single_map.getZoom()+1);
        }
        );
        google.maps.event.addDomListener(zoomOutButton, 'click', function() {
            single_map.setZoom(single_map.getZoom()-1);
        }
        );
    }
    var singleMapIco="<i class='"+$('#singleListingMap').data('map-icon')+"'></i>";
    new CustomMarker(myLatlng, single_map, {
        marker_id: '1'
    }
    , singleMapIco);
}

var single_map=document.getElementById('singleListingMap');
if(typeof(single_map)!='undefined'&&single_map!=null) {
    google.maps.event.addDomListener(window, 'load', singleListingMap);
}





function CustomMarker(latlng,map,args,markerIco){this.latlng=latlng;this.args=args;this.markerIco=markerIco;this.setMap(map);}
CustomMarker.prototype=new google.maps.OverlayView();CustomMarker.prototype.draw=function(){var self=this;var div=this.div;if(!div){div=this.div=document.createElement('div');div.className='map-marker-container';div.innerHTML='<div class="marker-container">'+
'<div class="marker-card">'+
'<div class="front face">'+self.markerIco+'</div>'+
'<div class="back face">'+self.markerIco+'</div>'+
'<div class="marker-arrow"></div>'+
'</div>'+
'</div>'
google.maps.event.addDomListener(div,"click",function(event){$('.map-marker-container').removeClass('clicked infoBox-opened');google.maps.event.trigger(self,"click");$(this).addClass('clicked infoBox-opened');});if(typeof(self.args.marker_id)!=='undefined'){div.dataset.marker_id=self.args.marker_id;}
var panes=this.getPanes();panes.overlayImage.appendChild(div);}
var point=this.getProjection().fromLatLngToDivPixel(this.latlng);if(point){div.style.left=(point.x)+'px';div.style.top=(point.y)+'px';}};CustomMarker.prototype.remove=function(){if(this.div){this.div.parentNode.removeChild(this.div);this.div=null;$(this).removeClass('clicked');}};CustomMarker.prototype.getPosition=function(){return this.latlng;};})(this.jQuery);
})(jQuery);