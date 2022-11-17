(function ($) {
  "use strict";
    var map;
    var marker;
    var your_address_latitude = -8.4095;
    var your_address_longitude = 115.1889;
    var myLatlng = new google.maps.LatLng(your_address_latitude, your_address_longitude);
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();
    function initialize() {
        var mapOptions = {
        zoom: 9,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        map = new google.maps.Map(document.getElementById("webkulMap"), mapOptions);
        marker = new google.maps.Marker({
            map: map,
            position: myLatlng,
            draggable: true
        });

        google.maps.event.addListener(marker, 'dragend', function( event ) {

            document.getElementById('latitude').value =event.latLng.lat();
            document.getElementById('longitude').value =event.latLng.lng();
            //console.log( event );
            var infowindow = new google.maps.InfoWindow({
                content: 'Latitude: ' + event.latLng.lat() + '<br>Longitude:' + event.latLng.lng()
            });

            infowindow.open(map,marker);

            // geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
            geocoder.geocode({'latLng': event.latLng}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    if (results[0]) {
                        var address_components = results[1].address_components;
                        var components={};
                        
                        jQuery.each(address_components, function(k,v1) {jQuery.each(v1.types, function(k2, v2){components[v2]=v1.long_name});});
                        var city;
                        var postal_code;
                        var state;
                        var country;

                        if(components.locality  && components.locality !== undefined ) {
                            city = components.locality;
                        }else{
                            city = '';
                        }

                        // if(!city  && components.postal_code !== undefined) {
                        //     city = components.administrative_area_level_1;
                        // }

                        if(components.postal_code && components.postal_code !== undefined ) {
                            postal_code = components.postal_code;
                        }else{
                            postal_code = '';
                        }

                        if(components.administrative_area_level_1 && components.administrative_area_level_1 !== undefined ) {
                            state = components.administrative_area_level_1;
                        }else{
                            state = '';
                        }

                        if(components.country && components.country !== undefined ) {
                            country = components.country;
                        }else{
                            country = '';
                        }

                        var full_location = city + ', ' + postal_code + ', ' + state + ', '+ country;
                        
                        // $.ajax({
                        //     url : bsm_gmap_ajax.url,
                        //     data: {state : state, country : country},
                        //     type: 'POST',
                        //     success: function(data) {
                        //         $('#input-country').val(data['country']);
                        //         $('#input-zone').val(data['zone']);
                        //         console.log(data);
                        //     }
                        // });

                        $('#input-city').val(city);
                        $('#input-postcode').val(postal_code);
                        $('#latitude').val(marker.getPosition().lat());
                        $('#longitude').val(marker.getPosition().lng());
                        $('#input-country').val(country);
                        $('#full_location').val(results[0].formatted_address);
                        //$('#input-zone').val(zone);


                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);

//https://maps.googleapis.com/maps/api/distancematrix/json?origins=Washington%2C%20DC&destinations=New%20York%20City%2C%20NY&units=imperial&key=AIzaSyCPXJv8JJNDj3xOi9U-3vaVeW4UYhVHdcM

    var map;
    var marker;
    var your_address_latitude = -8.4095;
    var your_address_longitude = 115.1889;
    var myLatlng = new google.maps.LatLng(your_address_latitude, your_address_longitude);
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();
    function initialize2() {
        var mapOptions = {
        zoom: 9,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        map = new google.maps.Map(document.getElementById("webkulMap2"), mapOptions);
        marker = new google.maps.Marker({
            map: map,
            position: myLatlng,
            draggable: true
        });

      //   var request = {
      //   query: 'bikago',
      //   fields: ['name', 'geometry', 'formatted_address'],
      //   };

      // var service = new google.maps.places.PlacesService(map);

      // service.findPlaceFromQuery(request, function(results, status) {
      //   if (status === google.maps.places.PlacesServiceStatus.OK) {
      //     for (var i = 0; i < results.length; i++) {
      //       console.log( results );
      //       console.log(request);
      //     }
      //     map.setCenter(results[0].geometry.location);
      //   }
      // });

        google.maps.event.addListener(marker, 'dragend', function() {
            geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    if (results[0]) {
                        var address_components = results[1].address_components;
                        
                        var components={};

                        jQuery.each(address_components, function(k,v1) {jQuery.each(v1.types, function(k2, v2){components[v2]=v1.long_name});});
                        var city;
                        var postal_code;
                        var state;
                        var country;

                        if(components.locality) {
                            city = components.locality;
                        }

                        if(!city) {
                            city = components.administrative_area_level_1;
                        }

                        if(components.postal_code) {
                            postal_code = components.postal_code;
                        }

                        if(components.administrative_area_level_1) {
                            state = components.administrative_area_level_1;
                        }

                        if(components.country) {
                            country = components.country;
                        }

                        var full_location = city + ', ' + postal_code + ', ' + state + ', '+ country;
                        
                        // $.ajax({
                        //     url : bsm_gmap_ajax.url,
                        //     data: {state : state, country : country},
                        //     type: 'POST',
                        //     success: function(data) {
                        //         $('#input-country').val(data['country']);
                        //         $('#input-zone').val(data['zone']);
                        //     }
                        // });

                        $('#input-city').val(city);
                        $('#input-postcode').val(postal_code);
                        $('#latitude').val(marker.getPosition().lat());
                        $('#longitude').val(marker.getPosition().lng());
                        $('#input-country').val(country);
                        $('#full_location').val(full_location);
                        //$('#input-zone').val(zone);
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize2);


})(jQuery);

jQuery(document).ready(function($){
    jQuery('#locationBtn').on( 'click',function () {

        var address = $('#google_map_location').val();
        alert(address);
        var source = "bali";
        var service = new google.maps.DistanceMatrixService();
        service.getDistanceMatrix(
        {
            origins: [address],
            destinations: [source],
            travelMode: 'DRIVING',
            unitSystem: google.maps.UnitSystem.METRIC,
        }, callback);

        function callback(response, status) {
          // See Parsing the Results for
          // the basics of a callback function.
            //console.log( response )
            
        }
    });
});