<?php
// Initializam sesiunea
session_start();

// Verificam daca utilizatorul este logat. Daca nu este il redirectionam catre pagina principala
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: paginaPrincipala.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $idOrg = $_POST["idOrg"];
  $idVol = $_SESSION["id"];
  $titlu = $_POST["titlu"];
  $cont = $_POST["continut"];
  // Configuram baza de date
  require_once "config.php";
  // Insert statement
  $sql = "INSERT INTO mesajvolorg(trmVol,titlu,continut,prmOrg) VALUES (?,?,?,?)";

  if($stmt = mysqli_prepare($link, $sql)){

      mysqli_stmt_bind_param($stmt, "dssd", $idVol, $titlu, $cont, $idOrg);

      // Executam statementul
      if(mysqli_stmt_execute($stmt)){
          echo '<script>alert("Mesaj trimis cu succes!");</script>';
      } else{
          echo '<script>alert("Oops! Ceva nu a mers bine! Va rog sa reveniti mai tarziu");</script>';
      }

      // Inchidem statementul
      mysqli_stmt_close($stmt);
    }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="Imagini\logo.png">

    <title>Proactiv - Organizații</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">


    <!-- Bootstrap CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      @font-face {
        font-family: Ubuntu-Regular;
        src: url('assets/dist/fonts/ubuntu/Ubuntu-Regular.ttf');
      }
      html, body {
        font-family: Ubuntu-Regular;
        overflow-x: hidden;
        background-color: #E6DAF0;
      }
      ::-webkit-scrollbar {
          display: none;
      }
</style>

</head>
<body>

<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <img src="Imagini\proactiv.png" width="150px" height="40px" class="d-inline-block align-top" alt="">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" href="acasa.php">Acasă</a>
          </li>
          <li class="nav-item">
            <?php
            // Cont voluntar -> Hartă
            if($_SESSION["tip"]=="voluntar")
                echo "<a class=\"nav-link\" href=\"harta.php\">Hartă</a>";
            // Cont organizație -> Acțiune nouă
            else echo "<a class=\"nav-link\" href=\"actiunenoua.php\">Acțiune nouă</a>";
            ?>
          </li>
          <li class="nav-item">
            <?php
            // Cont voluntar -> Organizații
            if($_SESSION["tip"]=="voluntar")
                echo "<a class=\"nav-link active\" aria-current=\"page\" href=\"#\">Organizații</a>";
            // Cont organizație -> Voluntari
            else echo "<a class=\"nav-link active\" aria-current=\"page\" href=\"#\">Voluntari</a>";
            ?>
          </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
              <a class="nav-link" href="contulmeu.php"><img src="Imagini\myacc.png" width="23px" height="23px"/>  Contul meu</a>
            </li>
          </ul>
      </div>
    </div>
  </nav>
</header>

<main>

<br><br><br><br><br><br>

<div class="row">
    <div class="col-4 col-md-4" align="center">
        <h2 style="color:#702DC8;">A - I</h2>
    </div>
    <div class="col" align="center">
        <h2 style="color:#702DC8;">J - P</h2>
    </div>
    <div class="col" align="center">
        <h2 style="color:#702DC8;">Q - Z</h2>
    </div>
</div>

<br><br>
<?php   require_once "config.php"; ?>
<div class="row">
<div class="col-4 col-md-4" align="center">
    <?php
    $sql = "SELECT idOrganizatie, denumire, cif, dataI, judet, oras, despre, email FROM organizatie ORDER BY denumire";
    $result = mysqli_query($link, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
    while ($row = mysqli_fetch_assoc($result)) {
      $string=ucfirst($row["denumire"]);
      if($string[0]>="A" && $string[0]<="I"){
      ?>
      <button type="submit" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#ModalForm<?php echo $row["idOrganizatie"];?>"><?php echo $row["denumire"];?></button>
      <div class="modal fade" id="ModalForm<?php echo $row["idOrganizatie"];?>" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"><?php echo $row["denumire"];?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-body">
                  <h4 class="mb-3">CIF/CUI: <?php echo $row["cif"];?></h4>
                  <h4 class="mb-3">Înființată în: <?php echo $row["dataI"];?></h4>
                  <p><?php echo $row["despre"];?></p>
                  <h4 class="mb-3">Trimite un mesaj:</h4>
                  <input name="titlu" type="text" class="form-control"  placeholder="" value="Titlu" required>
                  <br>
                  <textarea class="form-control" name="continut" rows="3" required></textarea>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idOrg" value="<?php echo $row['idOrganizatie']; ?>"/>
                    <button class="btn btn-secondary" type="submit" name="btnForm">Trimite mesaj</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <br>
          <?php
        }
      }
    }
    ?>
</div>

<div class="col-4 col-md-4" align="center">
    <?php
    $sql = "SELECT idOrganizatie, denumire, cif, dataI, judet, oras, despre, email FROM organizatie ORDER BY denumire";
    $result = mysqli_query($link, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
    while ($row = mysqli_fetch_assoc($result)) {
      $string=ucfirst($row["denumire"]);
      if($string[0]>="J" && $string[0]<="P"){
      ?>
      <button type="submit" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#ModalForm<?php echo $row["idOrganizatie"];?>"><?php echo $row["denumire"];?></button>
      <div class="modal fade" id="ModalForm<?php echo $row["idOrganizatie"];?>" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"><?php echo $row["denumire"];?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-body">
                  <h4 class="mb-3">CIF/CUI: <?php echo $row["cif"];?></h4>
                  <h4 class="mb-3">Înființată în: <?php echo $row["dataI"];?></h4>
                  <p><?php echo $row["despre"];?></p>
                  <h4 class="mb-3">Trimite un mesaj:</h4>
                  <input name="titlu" type="text" class="form-control"  placeholder="" value="Titlu" required>
                  <br>
                  <textarea class="form-control" name="continut" rows="3" required></textarea>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idOrg" value="<?php echo $row['idOrganizatie']; ?>"/>
                    <button class="btn btn-secondary" type="submit" name="btnForm">Trimite mesaj</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <br>
          <?php
        }
      }
    }
    ?>
</div>

<div class="col-4 col-md-4" align="center">
    <?php
    $sql = "SELECT idOrganizatie, denumire, cif, dataI, judet, oras, despre, email FROM organizatie ORDER BY denumire";
    $result = mysqli_query($link, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
    while ($row = mysqli_fetch_assoc($result)) {
      $string=ucfirst($row["denumire"]);
      if($string[0]>="Q" && $string[0]<="Z"){
      ?>
      <button type="submit" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#ModalForm<?php echo $row["idOrganizatie"];?>"><?php echo $row["denumire"];?></button>
      <div class="modal fade" id="ModalForm<?php echo $row["idOrganizatie"];?>" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"><?php echo $row["denumire"];?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-body">
                  <h4 class="mb-3">CIF/CUI: <?php echo $row["cif"];?></h4>
                  <h4 class="mb-3">Înființată în: <?php echo $row["dataI"];?></h4>
                  <p><?php echo $row["despre"];?></p>
                  <h4 class="mb-3">Trimite un mesaj:</h4>
                  <input name="titlu" type="text" class="form-control"  placeholder="" value="Titlu" required>
                  <br>
                  <textarea class="form-control" name="continut" rows="3" required></textarea>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idOrg" value="<?php echo $row['idOrganizatie']; ?>"/>
                    <button class="btn btn-secondary" type="submit" name="btnForm">Trimite mesaj</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <br>
          <?php
        }
      }
    }

    // Close connection
    mysqli_close($link);
    ?>
</div>
</row>
  <!-- FOOTER
  <footer class="container">
    <p class="float-end"><a href="#" style="color:#9059D9;">Back to top</a></p>
    <p>&copy; Kiss Flavia &middot; </p>
  </footer>-->
</main>

<script src="assets/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
