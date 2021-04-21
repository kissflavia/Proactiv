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

    <title>Proactiv - Harta</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHiS4zW5nQWPuHFxdDaZ4yaoQ8O4-C4Yw&callback=initMap"
      defer
    ></script>
    <script src="showharta.php"></script>


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
        max-width: 100%;
        overflow-x: hidden;
        background-color: #E6DAF0;
      }
      #map {
        float: right;
        width: 90%;
        height:80%;
        margin-right: 60px;
        margin-left: auto;
      }
      #map:focus {
        outline: black solid 0.15em;
      }
      .splitleft{
        height: 100%;
        width: 30%;
        position: fixed;
        z-index: 1;
        top: 0;
        overflow-x: hidden;
        padding-top: 20px;
      }
      .splitright {
        height: 100%;
        width: 70%;
        position: fixed;
        z-index: 1;
        top: 0;
        overflow-x: hidden;
        padding-top: 20px;
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
            <a class="nav-link active" aria-current="page" href="#">Hartă</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="organizatii.php">Organizații</a>
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

<div class="splitleft left">
  <div class="centered">
    <h3 style="color:#702DC8;">Aici poți vedea acțiunile care își caută voluntari!</h2>
    <h5 style="color:#9059D9;">Apasă indicatorii pentru detalii</h2>
      <br>
      <div class="col-md">
        <label for="judet" class="form-label">Alege un anumit județ</label>
        <select class="form-select" id="judet" required>
          <option value=""></option>
          <option>Optiunea 1</option>
          <option>Optiunea 2</option>
          <option>Optiunea 3</option>
        </select>
      </div>
      <br>
      <div class="col-md">
        <label for="oras" class="form-label">Alege un anumit oraș</label>
        <select class="form-select" id="oras" required>
          <option value=""></option>
          <option>Optiunea 1</option>
          <option>Optiunea 2</option>
          <option>Optiunea 3</option>
        </select>
      </div>
      <br>
      <div class="col-md">
        <label for="categorie" class="form-label">Alege o anumită categorie</label>
        <select class="form-select" id="categorie" required>
          <option value=""></option>
          <option>Optiunea 1</option>
          <option>Optiunea 2</option>
          <option>Optiunea 3</option>
        </select>
      </div>
      <br><br>
      <p><a class="btn btn-outline-dark" href="#">Aplică filtrele</a></p>
  </div>
</div>

<div class="splitright right">
  <div id="map" class="centered">
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
