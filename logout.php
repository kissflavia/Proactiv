<?php
// Initializam sesiunea
session_start();

// Resetam variabilele sesiunii
$_SESSION = array();

// Distrugem sesiunea
session_destroy();

// Redirectionam utilizatorul catre pagina principala
header("location: paginaPrincipala.php");
exit;
?>
