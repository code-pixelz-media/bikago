(function ($) {

    "use strict";

    var map;
    var marker;
    var latitude = -8.4095;
    var longitude = 115.1889;
    var myLatlng = new google.maps.LatLng(latitude, longitude);
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();

    function initialize2() {
      const map = new google.maps.Map(document.getElementById("webkulMap2"), {
        center: { lat: -8.409518, lng: 115.1889 },
        zoom: 9,
      });
      const card = document.getElementById("pac-card");

      const center = { lat: -8.409518, lng: 115.1889 };

      // Create a bounding box with sides ~10km away from the center point
      const defaultBounds = {
        north: center.lat + 0.1,
        south: center.lat - 0.1,
        east: center.lng + 0.1,
        west: center.lng - 0.1,
      };
      const input = document.getElementById("pac-input");
      const options = {
        bounds: defaultBounds,
        componentRestrictions: { country: "id" },
        fields: ["address_components", "geometry", "icon", "name"],
        strictBounds: false,
        // types: ["establishment"],
      };
      const autocomplete = new google.maps.places.Autocomplete(input, options);

      autocomplete.setComponentRestrictions({
        country: ["id"],
      });

      const infowindow = new google.maps.InfoWindow();
      const infowindowContent = document.getElementById("infowindow-content");

      infowindow.setContent(infowindowContent);

      const marker = new google.maps.Marker({
        map,
        anchorPoint: new google.maps.Point(0, -29),
      });

      autocomplete.addListener("place_changed", () => {
        infowindow.close();
        marker.setVisible(false);

        const place = autocomplete.getPlace();

        if (!place.geometry || !place.geometry.location) {
          // User entered the name of a Place that was not suggested and
          // pressed the Enter key, or the Place Details request failed.
          window.alert("No details available for input: '" + place.name + "'");
          return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
        } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17); // Why 17? Because it looks good.
        }

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        let address = "";

        if (place.address_components) {
          address = [
            (place.address_components[0] &&
              place.address_components[0].short_name) ||
              "",
            (place.address_components[1] &&
              place.address_components[1].short_name) ||
              "",
            (place.address_components[2] &&
              place.address_components[2].short_name) ||
              "",
          ].join(" ");
        }

        var components={};
        jQuery.each(place.address_components, function(k,v1) {
            jQuery.each(v1.types, function(k2, v2){components[v2]=v1.long_name});
        });
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

        $('#input-city2').val(city);
        $('#input-postcode2').val(postal_code);
        $('#latitude2').val(marker.getPosition().lat());
        $('#longitude2').val(marker.getPosition().lng());
        $('#input-country2').val(country);
        $('#full_location').val(address);
        $('#google_map_location').val(address);
        infowindow.setContent(address);
        infowindow.open(map, marker);

        var geocodes = bsm_gmap_ajax.geocode;
        var source = new google.maps.LatLng(marker.getPosition().lat(), marker.getPosition().lng());    
        var destination=[];
        jQuery.each(geocodes, function(k,v1) {
            destination.push( new google.maps.LatLng(v1.lat,v1.lng) );
        });
        var service = new google.maps.DistanceMatrixService();
        service.getDistanceMatrix(
        {
            origins: [source],
            destinations: destination,
            travelMode: 'DRIVING',
            unitSystem: google.maps.UnitSystem.METRIC,
        }, callback);

        function callback(response, status) {
            // See Parsing the Results for
            // the basics of a callback function.
            //elements is an array.

            var distance = response.rows[0].elements;

            var max = "";
            var min = 100000000000000;
            var min_km = "0 KM";

            jQuery.each(distance, function(k,v1) {
                console.log(v1);
                if( v1.status == "OK" ){

                    var temp_max = v1.distance.value;
                    var temp_min = v1.distance.value;
                    min_km = v1.distance.text;

                    // if( temp_max > max ){
                    //     max = temp_max;
                    // }

                    if( temp_min < min ){
                        min = temp_min;
                        min_km = v1.distance.text;
                    }

                }
            });

            if( min == 100000000000000 ){
                min = 0;
                min_km = 0;
            }

            $('#bsm-distance').val(min_km);
            var rate = bsm_gmap_ajax.rate;
            var price = $('#net-price').val();
            var shipping_charge = parseFloat(rate) * parseFloat(min_km);
            var amount = parseFloat(shipping_charge) + parseFloat(price);
            $('.bsm-price').val(amount);
            // console.log(rate);
            // console.log(price);
            // console.log(shipping_charge);
            // console.log(min_km);
            // console.log(amount);
        }
      });
    }
    google.maps.event.addDomListener(window, 'load', initialize2);
//window.initMap = initMap;
// [END maps_places_autocomplete_multiple_countries]

// Map two Completes here.


/************** This code is for map3 ************/

    function myMap() {
        var myCenter = new google.maps.LatLng(latitude, longitude);
        var mapCanvas = document.getElementById("webkulMap3");
        var mapOptions = {
        center: myCenter,
        zoom: 10
        };
        var map = new google.maps.Map(mapCanvas, mapOptions);
        //some code is there to fetch the records

        var locations = bsm_gmap_ajax.geocode;
        const infowindow = new google.maps.InfoWindow();
        var markers = locations.map(function(location, i) {
            //console.log(location);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(location.lat, location.lng),
                map: map,
            });
            google.maps.event.addListener(marker, 'click', function() {
                geocoder.geocode({'latLng': marker.getPosition()}, 
                    function(results, status) {

                        if (status == google.maps.GeocoderStatus.OK) {

                            if (results[0]) {
                                var address_components = results[1].address_components;                    
                                var components={};
                                jQuery.each(address_components, function(k,v1) {
                                    jQuery.each(v1.types, function(k2, v2){components[v2]=v1.long_name});
                                });
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

                            $('#input-city').val(city);
                            $('#input-postcode').val(postal_code);
                            $('#latitude').val(marker.getPosition().lat());
                            $('#longitude').val(marker.getPosition().lng());
                            $('#input-country').val(country);
                            $('#full_location').val(full_location);
                            //$('#input-zone').val(zone);
                            infowindow.setContent(full_location);
                            infowindow.open(map, marker);
                            $('#google_map_location').val(results[0].formatted_address);

                        }
                    }
                });
            });
          return marker;
        });
        
        }
        google.maps.event.addDomListener(window, "load", myMap);

})(jQuery);

