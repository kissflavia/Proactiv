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

  $sql = "INSERT INTO actiuni(primaryKey, idV, idA) VALUES (NULL,?,?)";

  if($stmt = mysqli_prepare($link, $sql)){

      mysqli_stmt_bind_param($stmt, "dd", $idVol, $idAct);

      if(mysqli_stmt_execute($stmt)){
        $_SESSION["resp"]="Te-ai înscris cu succes!";
      } else{
        $_SESSION["resp"]="A apărut o eroare... Te rugăm să încerci puțin mai târziu!";
      }
    }
}

header("location: ../harta.php");
exit;

?>
