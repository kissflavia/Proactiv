<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
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

    <title>Proactiv - Organizații</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">


    <!-- Bootstrap core CSS -->
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
    .splitleft{
      height: 100%;
      width: 33%;
      position: fixed;
      z-index: 1;
      top: 0;
      overflow-x: hidden;
      padding-top: 20px;
    }
    .splitmiddle{
      height: 100%;
      width: 33%;
      z-index: 1;
      top: 0;
      overflow-x: hidden;
      padding-top: 20px;
    }
    .splitright {
      height: 100%;
      width: 33%;
      position: fixed;
      z-index: 1;
      top: 0;
      overflow-x: hidden;

    }

    .left {
      left: 0;
    }

    .right {
      right: 0;
    }

    .centered {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
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
            <a class="nav-link" href="harta.php">Hartă</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Organizații</a>
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

<?php
require_once "config.php";
$sql = "SELECT denumire, cif, dataI, judet, oras, despre, email FROM organizatie";
$result = mysqli_query($link, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0){
while ($row = mysqli_fetch_assoc($result)) {

?>

<div class="splitleft left">
  <div class="centered">
    <h2 style="color:#702DC8;">A - I</h2>
    <?php
      $string=$row["denumire"];
      if($string[0]>="A" && $string[0]<="I")
        echo $string."<br><br>";
    ?>

    <br><br>

  </div>
</div>

<div class="splitmiddle">
  <div class="centered">
    <h2 style="color:#702DC8;">J - P</h2>
    <?php
      $string=$row["denumire"];
      if($string[0]>="J" && $string[0]<="P")
        echo $string."<br><br>";
    ?>
    <br><br>
  </div>
</div>

<div class="splitright right">
  <div class="centered">
    <h2 style="color:#702DC8;">Q - Z</h2>
    <?php
      $string=$row["denumire"];
      if($string[0]>="Q" && $string[0]<="Z")
        echo $string."<br><br>";
      }
    }
    ?>
    <br><br>
  </div>
</div>

  <!-- FOOTER
  <footer class="container">
    <p class="float-end"><a href="#" style="color:#9059D9;">Back to top</a></p>
    <p>&copy; Kiss Flavia &middot; </p>
  </footer>-->
</main>

<script src="assets/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
