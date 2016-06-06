function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }

  var latCode;
  var longCode;
//var iasi;

  function showPosition(position) {
    
    latCode = position.coords.latitude;
    longCode = position.coords.longitude;
    sessionStorage.setItem('latitude', latCode);
    sessionStorage.setItem('longitude', longCode);
}

 var map;
var infowindow; 

function initMap() {
        //var iasi = {lat:47.16 , lng: 27.56};
        getLocation();
        var iasi = {lat: parseFloat(sessionStorage.getItem('latitude')), lng: parseFloat(sessionStorage.getItem('longitude'))};
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

var lat;
var long;

function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent("Nume:"+place.name+"<br />"+"Website:"+place.website+"Website:"+place.geometry.location.lat()+"Website:"+ place.geometry.location.lng());
         /*lat = place.geometry.location.lat();
         long = place.geometry.location.lng(); */
        localStorage.setItem("lat", place.geometry.location.lat());
        localStorage.setItem("lng", place.geometry.location.lng());

           
          infowindow.open(map, this);
        });
}
      
