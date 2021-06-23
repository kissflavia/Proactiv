<?php
// Initializam sesiunea
session_start();

// Verificam daca utilizatorul este logat. Daca este il redirectionam catre contul lui
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: contulmeu.php");
    exit;
}
else{
	header("location: paginaPrincipala.php");
    exit;
}

?>