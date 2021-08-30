<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'proactiv');

// Incercam sa ne conectam la baza de date
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificam conexiunea
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
