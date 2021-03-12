function initMap() {
	var centru = {lat: 46.006154, lng: 24.874319};

 var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 6.5,
    center: centru,
    maxZoom: 8,
    minZoom: 6.5,

  });
}
initMap();
