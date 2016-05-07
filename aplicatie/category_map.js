var map;
var infowindow;
var pos;

function initMap(position) {
        //window.alert(localStorage.getItem("tip"));
        var iasi = {lat:47.16 , lng: 27.56};

        map = new google.maps.Map(document.getElementById('map'), {
          center: iasi,
          zoom: 15
        });

        infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
          location: iasi,
          radius: 10000,
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
      
