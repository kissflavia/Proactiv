<?php
// Initializam sesiunea
session_start();

// Verificam daca utilizatorul este logat. Daca nu este il redirectionam catre pagina principala
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: paginaPrincipala.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="Imagini\logo.png">

    <title>Proactiv - Voluntari</title>

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


<?php
require_once "config.php";
?>
<div class="row">
<div class="col-4 col-md-4" align="center">
    <?php
    $sql = "SELECT nume, prenume, dataN, judet, oras, email FROM voluntar ORDER BY nume";
    $result = mysqli_query($link, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
    while ($row = mysqli_fetch_assoc($result)) {
      $string=ucwords($row["nume"]." ".$row["prenume"]);
      if(($string[0]>="A" && $string[0]<="I")||($string[0]>="0" && $string[0]<="9"))
        echo $string."<br><br>";
      }
    }
    ?>
</div>

<div class="col-4 col-md-4" align="center">
    <?php
    $sql = "SELECT nume, prenume, dataN, judet, oras, email FROM voluntar ORDER BY nume";
    $result = mysqli_query($link, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
    while ($row = mysqli_fetch_assoc($result)) {
      $string=ucwords($row["nume"]." ".$row["prenume"]);
      if($string[0]>="J" && $string[0]<="P")
        echo $string."<br><br>";
      }
    }
    ?>
</div>

<div class="col-4 col-md-4" align="center">
    <?php
    $sql = "SELECT nume, prenume, dataN, judet, oras, email FROM voluntar ORDER BY nume";
    $result = mysqli_query($link, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
    while ($row = mysqli_fetch_assoc($result)) {
      $string=ucwords($row["nume"]." ".$row["prenume"]);
      if($string[0]>="Q" && $string[0]<="Z")
        echo $string."<br><br>";
      }
    }
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
