<?php
// Initializam sesiunea
session_start();

// Verificam daca utilizatorul este logat. Daca nu este il redirectionam catre pagina principala
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../paginaPrincipala.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
  echo "idActiune: ";
  $idAct = $_POST['idAct'];
  echo $idAct;

  echo "idVoluntar: ";
  $idVol = $_SESSION['id'];
  echo $idVol;

  require_once "../config.php";

  // Stergem datele respective din tabelul actiuni
  $sql = "DELETE FROM actiuni WHERE idV = ".$idVol." AND idA = ".$idAct;

  if ($link->query($sql) === TRUE) {
    $_SESSION["resp"]="Te-ai retras cu succes!";
  } else {
    $_SESSION["resp"]="A apărut o eroare... Te rugăm să încerci puțin mai târziu!";
  }
}

header("location: ../harta.php");
exit;
?>
