<?php
// Initializam sesiunea
session_start();

// Includem fisierul config al bazei de date
require_once "config.php";

// Pregatim query-ul astfel incat sa corespunda filtrelor aplicate
if($_SESSION["jud"]==""){
  if($_SESSION["categ"]==""){
    $result = $link->query("SELECT nume, categorie, idActiune, a.judet , a.oras, dataStart, dataStop, lat, lng FROM actiune AS a,locatii AS l WHERE a.judet=l.jud AND a.oras = l.oras");
  }
  else{
    $result = $link->query("SELECT nume, categorie, idActiune, a.judet , a.oras, dataStart, dataStop, lat, lng FROM actiune AS a,locatii AS l WHERE a.judet=l.jud AND a.oras = l.oras AND categorie = \"".$_SESSION["categ"]."\"");
  }
}
else{
  if($_SESSION["oras"]==""){
    if($_SESSION["categ"]==""){
      $result = $link->query("SELECT nume, categorie, idActiune, a.judet , a.oras, dataStart, dataStop, lat, lng FROM actiune AS a,locatii AS l WHERE a.judet=l.jud AND a.oras = l.oras AND a.judet = \"".$_SESSION["jud"]."\"");
    }
    else{
      $result = $link->query("SELECT nume, categorie, idActiune, a.judet , a.oras, dataStart, dataStop, lat, lng FROM actiune AS a,locatii AS l WHERE a.judet=l.jud AND a.oras = l.oras AND a.judet = \"".$_SESSION["jud"]."\" AND categorie = \"".$_SESSION["categ"]."\"");
    }
  }
  else{
    if($_SESSION["categ"]==""){
      $result = $link->query("SELECT nume, categorie, idActiune, a.judet , a.oras, dataStart, dataStop, lat, lng FROM actiune AS a,locatii AS l WHERE a.judet=l.jud AND a.oras = l.oras AND a.oras = \"".$_SESSION["oras"]."\"");
    }
    else{
      $result = $link->query("SELECT nume, categorie, idActiune, a.judet , a.oras, dataStart, dataStop, lat, lng FROM actiune AS a,locatii AS l WHERE a.judet=l.jud AND a.oras = l.oras AND a.oras = \"".$_SESSION["oras"]."\" AND categorie = \"".$_SESSION["categ"]."\"");
    }
  }
}

  $actiuni = $link->query("SELECT idA FROM actiuni WHERE idV  = ".$_SESSION["id"]);

?>

var markers = [
    <?php if($result){
    if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo '['.$row['lat'].', '.$row['lng'].', "'.$row['nume'].'", "'.$row['categorie'].'", "'.$row['idActiune'].'", "'.$row['dataStart'].'", "'.$row['dataStop'].'"],';
      }
    }
  }
    ?>
];

const actiuni = [
    <?php if($actiuni){
    if($actiuni->num_rows > 0){
    $row = $actiuni->fetch_assoc();
    echo '\''.$row['idA'].'\'';
    while($row = $actiuni->fetch_assoc()){
        echo ',\''.$row['idA'].'\'';
      }
    }
  }
    ?>
];

let marker, infowindow;


function initMap() {
	var centru = {lat: 46.006154, lng: 24.874319};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 6.5,
    center: centru,
    maxZoom: 10,
    minZoom: 6.5,

  });

let i = 0;

while(i < markers.length){

  var pozLatLng = {lat: markers[i][0], lng: markers[i][1]};
  const include = actiuni.includes(markers[i][4]);
  console.log(include);
  if(include == false ){
  var string = markers[i][2] + "<br>" + markers[i][3] + "<br>" + markers[i][5] + " - " + markers[i][6]
  +"<br><br><form method=\"POST\" action=\"./harta/abonez.php\"><input type=\"hidden\" name=\"idAct\" value=\" " + markers[i][4] + " \"><button type=\"submit\" class=\"btn btn-outline-dark\">Mă înscriu</button><br><form>";
  }
  else{
    var string = markers[i][2] + "<br>" + markers[i][3] + "<br>" + markers[i][5] + " - " + markers[i][6]
    +"<br><br><form method=\"POST\" action=\"./harta/dezabonez.php\"><input type=\"hidden\" name=\"idAct\" value=\" " + markers[i][4] + " \"><button type=\"submit\" class=\"btn btn-outline-dark\">Mă retrag</button><br><form>";
  }
  if(markers[i][3] == "Donații"){
           marker =  new google.maps.Marker({
           position: pozLatLng,
           map,
           content: string,
           icon: 'Imagini/Clusters/donatii.png',
           animation: google.maps.Animation.DROP,
            });

    }
    else if(markers[i][3] == "Cultural"){
	           marker =  new google.maps.Marker({
	           position: pozLatLng,
	           map,
	           content: string,
	           icon: 'Imagini/Clusters/cultural.png',
	           animation: google.maps.Animation.DROP,
	            });

	  }
    else if(markers[i][3] == "Educațional"){
	           marker =  new google.maps.Marker({
	           position: pozLatLng,
	           map,
	           content: string,
	           icon: 'Imagini/Clusters/educational.png',
	           animation: google.maps.Animation.DROP,
	            });
	  }
		else if(markers[i][3] == "Nutriție"){
	           marker =  new google.maps.Marker({
	           position: pozLatLng,
	           map,
	           content: string,
	           icon: 'Imagini/Clusters/nutritie.png',
	           animation: google.maps.Animation.DROP,
	            });
	  }
		else if(markers[i][3] == "Protecția mediului"){
	           marker =  new google.maps.Marker({
	           position: pozLatLng,
	           map,
	           content: string,
	           icon: 'Imagini/Clusters/protectia_mediului.png',
	           animation: google.maps.Animation.DROP,
	            });
	  }
		else if(markers[i][3] == "Religios"){
	           marker =  new google.maps.Marker({
	           position: pozLatLng,
	           map,
	           content: string,
	           icon: 'Imagini/Clusters/religios.png',
	           animation: google.maps.Animation.DROP,
	            });
	  }
		else if(markers[i][3] == "Social"){
	           marker =  new google.maps.Marker({
	           position: pozLatLng,
	           map,
	           content: string,
	           icon: 'Imagini/Clusters/social.png',
	           animation: google.maps.Animation.DROP,
	            });
	  }
		else if(markers[i][3] == "Sport"){
	           marker =  new google.maps.Marker({
	           position: pozLatLng,
	           map,
	           content: string,
	           icon: 'Imagini/Clusters/sport.png',
	           animation: google.maps.Animation.DROP,
	            });
	  }

    infowindow = new google.maps.InfoWindow({});

    marker.addListener('click', function(){
    populateInfoWindow(this, infowindow);
    infowindow.open(map, this);
    });

    i = i + 1;
  }



}

function populateInfoWindow(marker, info){
    if(info.marker != marker){
      info.setContent('');
      info.setContent(marker.content);
  }
}

initMap();
