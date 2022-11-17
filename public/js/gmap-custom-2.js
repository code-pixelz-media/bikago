(function ($) {

    "use strict";
    //if( $('.ajax').length > 0 ){
        var map;
        var marker;
        var your_address_latitude = -8.4095;
        var your_address_longitude = 115.1889;
        var myLatlng = new google.maps.LatLng(your_address_latitude, your_address_longitude);
        var geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow();
        // function initialize() {
        //     var mapOptions = {
        //     zoom: 10,
        //     center: myLatlng,
        //     mapTypeId: google.maps.MapTypeId.ROADMAP
        //     };
            
        //     map = new google.maps.Map(document.getElementById("webkulMap"), mapOptions);
        //     marker = new google.maps.Marker({
        //         map: map,
        //         position: myLatlng,
        //         draggable: true
        //     });

        //     google.maps.event.addListener(marker, 'dragend', function( event ) {

        //         document.getElementById('latitude').value =event.latLng.lat();
        //         document.getElementById('longitude').value =event.latLng.lng();
        //         // console.log( event );
        //         // var infowindow = new google.maps.InfoWindow({
        //         //     content: 'Latitude: ' + event.latLng.lat() + '<br>Longitude:' + event.latLng.lng()
        //         // });

        //         // infowindow.open(map,marker);

        //         geocoder.geocode({'latLng': event.latLng}, function(results, status) {
        //             if (status == google.maps.GeocoderStatus.OK) {

        //                 if (results[0]) {
        //                     var address_components = results[1].address_components;
        //                     var components={};
                            
        //                     jQuery.each(address_components, function(k,v1) {jQuery.each(v1.types, function(k2, v2){components[v2]=v1.long_name});});
        //                     var city;
        //                     var postal_code;
        //                     var state;
        //                     var country;

        //                     if(components.locality  && components.locality !== undefined ) {
        //                         city = components.locality;
        //                     }else{
        //                         city = '';
        //                     }

        //                     // if(!city  && components.postal_code !== undefined) {
        //                     //     city = components.administrative_area_level_1;
        //                     // }

        //                     if(components.postal_code && components.postal_code !== undefined ) {
        //                         postal_code = components.postal_code;
        //                     }else{
        //                         postal_code = '';
        //                     }

        //                     if(components.administrative_area_level_1 && components.administrative_area_level_1 !== undefined ) {
        //                         state = components.administrative_area_level_1;
        //                     }else{
        //                         state = '';
        //                     }

        //                     if(components.country && components.country !== undefined ) {
        //                         country = components.country;
        //                     }else{
        //                         country = '';
        //                     }

        //                     var full_location = city + ', ' + postal_code + ', ' + state + ', '+ country;
                            
        //                     $('#input-city').val(city);
        //                     $('#input-postcode').val(postal_code);
        //                     $('#latitude').val(marker.getPosition().lat());
        //                     $('#longitude').val(marker.getPosition().lng());
        //                     $('#input-country').val(country);
        //                     $('#full_location').val(results[0].formatted_address);
        //                     //$('#input-zone').val(zone);

        //                     // infowindow.setContent(results[0].formatted_address);
        //                     // infowindow.open(map, marker);
        //                 }
        //             }
        //         });
        //     });
        // }
        // google.maps.event.addDomListener(window, 'load', initialize);

        //https://maps.googleapis.com/maps/api/distancematrix/json?origins=Washington%2C%20DC&destinations=New%20York%20City%2C%20NY&units=imperial&key=AIzaSyCPXJv8JJNDj3xOi9U-3vaVeW4UYhVHdcM

        var map;
        var marker;
        var your_address_latitude = -8.4095;
        var your_address_longitude = 115.1889;
        var myLatlng = new google.maps.LatLng(your_address_latitude, your_address_longitude);
        var geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow();
        /*function initialize2() {
            var mapOptions = {
            zoom: 10,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            
            map = new google.maps.Map(document.getElementById("webkulMap2"), mapOptions);
            marker = new google.maps.Marker({
                map: map,
                position: myLatlng,
                draggable: true
            });


        var input = document.getElementById('google_map_location');
        const options = {
            bounds: defaultBounds,
            componentRestrictions: { country: "us" },
            fields: ["address_components", "geometry", "icon", "name"],
            strictBounds: false,
            types: ["establishment"],
          };
        //new google.maps.places.Autocomplete(input);
        const autocomplete = new google.maps.places.Autocomplete(input, options);


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

                            $('#input-city').val(city);
                            $('#input-postcode').val(postal_code);
                            $('#latitude').val(marker.getPosition().lat());
                            $('#longitude').val(marker.getPosition().lng());
                            $('#input-country').val(country);
                            $('#full_location').val(full_location);
                            //$('#input-zone').val(zone);
                            // infowindow.setContent(results[0].formatted_address);
                            // infowindow.open(map, marker);


                            $('#google_map_location').val(results[0].formatted_address);
                            $('.bsm-location').val(results[0].formatted_address);
                        }
                    }
                });
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize2);
    */

function initialize2() {
  const map = new google.maps.Map(document.getElementById("webkulMap2"), {
    center: { lat: -8.409518, lng: 115.1889 },
    zoom: 9,
  });
  const card = document.getElementById("pac-card");

  //map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

  // [START maps_places_autocomplete_creation]
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

  // [END maps_places_autocomplete_creation]
  // Set initial restriction to the greater list of countries.
  // [START maps_places_autocomplete_countries_multiple]
  // autocomplete.setComponentRestrictions({
  //   country: ["us", "pr", "vi", "gu", "mp"],
  // });

  // [END maps_places_autocomplete_countries_multiple]
  // [START maps_places_autocomplete_setbounds]
  // const southwest = { lat: 5.6108, lng: 136.589326 };
  // const northeast = { lat: 61.179287, lng: 2.64325 };
  // const newBounds = new google.maps.LatLngBounds(southwest, northeast);

  // autocomplete.setBounds(newBounds);

  // [END maps_places_autocomplete_setbounds]
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

    infowindowContent.children["place-icon"].src = place.icon;
    infowindowContent.children["place-name"].textContent = place.name;
    infowindowContent.children["place-address"].textContent = address;
    infowindow.open(map, marker);


  });

  // Sets a listener on a given radio button. The radio buttons specify
  // the countries used to restrict the autocomplete search.
  function setupClickListener(id, countries) {
    const radioButton = document.getElementById(id);

    radioButton.addEventListener("click", () => {
      autocomplete.setComponentRestrictions({ country: countries });
    });
  }

  // setupClickListener("changecountry-usa", "us");
  // setupClickListener("changecountry-usa-and-uot", [
  //   "us",
  //   "pr",
  //   "vi",
  //   "gu",
  //   "mp",
  // ]);
}
google.maps.event.addDomListener(window, 'load', initialize2);
//window.initMap = initMap;
// [END maps_places_autocomplete_multiple_countries]

        var map;
        var marker;
        var latitude = -8.4095;
        var longitude = 115.1889;
        var myLatlng = new google.maps.LatLng(latitude, longitude);
        var geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow();
 
        function myMap() {
          var myCenter = new google.maps.LatLng(latitude, longitude);
          var mapCanvas = document.getElementById("webkulMap3");
          var mapOptions = {
            center: myCenter,
            zoom: 10
          };
          var map = new google.maps.Map(mapCanvas, mapOptions);
          //some code is there to fetch the records
          var records = [{Latitude: 12.9715, Longitude: 77.5945627},{Latitude: 12.97159, Longitude: 77.594},{Latitude: 12.9715987, Longitude: 77.5945627},{Latitude: 12.971, Longitude: 77.5945627},{Latitude: 12.97, Longitude: 77.5945627}];
          
          var records = bsm_gmap_ajax.geocode;

          var markers = [];
          for (var i = 0; i < records.length; i++) {
            var record = records[i];
            var marker = new google.maps.Marker({
              position: new google.maps.LatLng(record.lat, record.lng),
              map: map,
              //icon: 'brown_markerA.png'
              //icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
            });
            markers.push(marker);
          }
          var markerCluster = new MarkerClusterer(map, markers, {
            imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
          });

        google.maps.event.addListener(marker, 'click', function() {
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

                    $('#input-city').val(city);
                    $('#input-postcode').val(postal_code);
                    $('#latitude').val(marker.getPosition().lat());
                    $('#longitude').val(marker.getPosition().lng());
                    $('#input-country').val(country);
                    $('#full_location').val(full_location);
                    //$('#input-zone').val(zone);
                    //infowindow.setContent(results[0].formatted_address);
                    //infowindow.open(map, marker);
                    $('#google_map_location').val(results[0].formatted_address);


                    //alert(full_location);
                }
            }
        });
    });
        }
        google.maps.event.addDomListener(window, "load", myMap);

    //}
})(jQuery);

jQuery(document).ready(function($){

    jQuery('#google_map_location').on( 'keyup',function () {

    var key = event.keyCode || event.charCode;

    if( key === 17 ){
        return; //if it's del or backspace, exit the function
    }


    var address = $('#google_map_location').val();
    //alert(address);
    
    var request = {
        query: address,
        fields: ['name', 'geometry', 'formatted_address'],
    };

    var mapOptions = {
        zoom: 10,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };

    map = new google.maps.Map(document.getElementById("webkulMap2"), mapOptions);

    marker = new google.maps.Marker({
            map: map,
            position: myLatlng,
            draggable: true
        });

    var place = new google.maps.places.PlacesService(map);

    //console.log( request );

    place.findPlaceFromQuery(request, function(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
           //  console.log( results );
          }
          map.setCenter(results[0].geometry.location);
          marker.setPosition(results[0].geometry.location)
        }
    });

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

                    $('#input-city').val(city);
                    $('#input-postcode').val(postal_code);
                    $('#latitude').val(marker.getPosition().lat());
                    $('#longitude').val(marker.getPosition().lng());
                    $('#input-country').val(country);
                    $('#full_location').val(full_location);
                    //$('#input-zone').val(zone);
                    //infowindow.setContent(results[0].formatted_address);
                    //infowindow.open(map, marker);
                    $('#google_map_location').val(results[0].formatted_address);


                    //alert(full_location);
                }
            }
        });
    });

    var source = "bali";
    var service = new google.maps.DistanceMatrixService();

    service.getDistanceMatrix(
    {
        origins: [source],
        destinations: [address],
        travelMode: 'DRIVING',
        unitSystem: google.maps.UnitSystem.METRIC,
    }, callback);

    function callback(response, status) {
        // See Parsing the Results for
        // the basics of a callback function.
        // console.log( response.rows[0].elements[0].distance.text );
        $('#distance').val(response.rows[0].elements[0].distance.text);

        var rate = 5.5;
        var price = $('.bsm-price').val();
        shipping_charge = parseFloat(rate) * parseFloat(response.rows[0].elements[0].distance.text);

        amount = parseFloat(shipping_charge) + parseFloat(price);
        $('.bsm-price').val(amount);
        $('#bsm-distance').val(response.rows[0].elements[0].distance.text);
    }


    var map;
    var marker;
    var your_address_latitude = -8.4095;
    var your_address_longitude = 115.1889;
    var myLatlng = new google.maps.LatLng(your_address_latitude, your_address_longitude);
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();
    function initialize2() {
        var mapOptions = {
        zoom: 10,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        map = new google.maps.Map(document.getElementById("webkulMap2"), mapOptions);
        marker = new google.maps.Marker({
            map: map,
            position: myLatlng,
            draggable: true
        });

        var input = document.getElementById('google_map_location');
        new google.maps.places.Autocomplete(input);

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
   
                        $('#input-city').val(city);
                        $('#input-postcode').val(postal_code);
                        $('#latitude').val(marker.getPosition().lat());
                        $('#longitude').val(marker.getPosition().lng());
                        $('#input-country').val(country);
                        $('#full_location').val(full_location);
                        //$('#input-zone').val(zone);
                        //infowindow.setContent(results[0].formatted_address);
                        //infowindow.open(map, marker);
                    }
                }
            });
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize2);

    });
});