function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }

  var latCode;
  var longCode;
var iasi;

  function showPosition(position) {
    latCode = position.coords.latitude;
    longCode = position.coords.longitude;
    iasi={lat:latCode,lng:longCode};
}

 var map;
var infowindow; 

function initMap() {
        //window.alert(localStorage.getItem("tip"));
        //var iasi = {lat:47.16 , lng: 27.56};
        //var iasi = {lat: latCode, lng: longCode};
        
        map = new google.maps.Map(document.getElementById('map'), {
          center: iasi,
          zoom: 15
        });

        infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
          location: iasi,
          radius: localStorage.getItem("raza"),
          type: localStorage.getItem("tip")
        }, callback);
        
}

function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
        }
}

function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);

          infowindow.open(map, this);
        });
}
      
