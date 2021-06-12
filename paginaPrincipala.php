<?php
// Initializam sesiunea
session_start();

// Verificam daca utilizatorul este logat. Daca nu este il redirectionam catre pagina principala
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: contulmeu.php");
    exit;
}

// Include fisierul config pentru conexiunea cu baza de date
require_once "config.php";

// Definim variabilele si le initializam cu NULL
$username = $password = $tip = "";
$username_err = $password_err = $login_err = "";

// Procesam datele din formular in momentul in care acesta este submis
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validam credentialele
    if(empty($username_err) && empty($password_err)){
        $sql1 = "SELECT idVoluntar FROM voluntar WHERE email = \"".$username."\"";
        $sql2 = "SELECT idOrganizatie FROM organizatie WHERE email = \"".$username."\"";
        $result = mysqli_query($link, $sql1);
        $result2 = mysqli_query($link, $sql2);
        $resultCheck = mysqli_num_rows($result);
        $resultCheck2 = mysqli_num_rows($result2);
        $sql="SELECT idVoluntar, email, parola FROM voluntar WHERE email = ?";
        if ($resultCheck > 0){
            $tip="voluntar";
        }else {
          if ($resultCheck2 > 0){
              $tip="organizatie";
              $sql = "SELECT idOrganizatie, email, parola FROM organizatie WHERE email = ?";
          }
        }
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Daca parola este corecta, pornim sesiunea
                            session_start();

                            // Salvam informatiile utile in variabilele sesiunii
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["tip"] = $tip;

                            // Redirectam utilizatorul catre contul lui
                            header("location: contulmeu.php");
                        } else{
                            // Daca parola este gresita, se afiseaza un mesaj generic
                            $login_err = "Parola gresita";
                        }
                    }
                } else{
                    // Daca emailul este gresit, se afiseaza un mesaj generic
                    $login_err = "Email gresit";
                }
            } else{
              echo '<script type="text/javascript">
                  window.onload = function () { alert("Oops! Ceva nu a mers bine! Va rog sa reveniti mai tarziu"); }
                  </script>';
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="Imagini\logo.png">

    <title>Proactiv</title>

    <!-- Bootstrap CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Carusel cu imagini-->
    <link href="assets/dist/css/carousel.css" rel="stylesheet">

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
      html, body {
        scroll-behavior: smooth;
        max-width: 100%;
        overflow-x: hidden;
      }
      p2{
        color:#9059D9;
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
      </div>
    </div>
  </nav>
</header>

<main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="Imagini\PaginaPrincipala\vol.jpg" style="object-fit: cover;" width="100%" height="500px"/></svg>

        <div class="container">
          <div class="carousel-caption text-start">
            <div class="mask" style="padding-left: 20px; background-color: rgba(0, 0, 0, 0.6)">
            <h1>Bine ai revenit!</h1>
            <p style="color:#C3AAE3;">Ești oricând binevenit! Ne bucurăm că vrei să fi implicat și altruist!</p>
            <p><button type="submit" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#LoginModal">Loghează-te</button></p>
            <br>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="Imagini\PaginaPrincipala\vol2.jpg" style="object-fit: cover;" width="100%" height="500px"/></svg>

        <div class="container">
          <div class="carousel-caption">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
            <h1>Ești pentru prima oară pe acest site?</h1>
            <p style="color:#C3AAE3;">Creează-ți un cont de voluntar dacă dorești să fi și tu proactiv sau unul pentru organizații dacă dorești să semnalezi o nouă acțiune de voluntariat!</p>
            <p><a class="btn btn-dark" href="contvoluntar.php">VOLUNTAR</a>   <a class="btn btn-dark" href="contorganizatie.php">ORGANIZAȚIE</a></p>
            <br>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="Imagini\PaginaPrincipala\vol3.jpg" style="object-fit: cover;" width="100%" height="500px"/></svg>

        <div class="container">
          <div class="carousel-caption text-end">
            <div class="mask" style="padding-right: 20px; background-color: rgba(0, 0, 0, 0.6)">
            <h1>Nu te-am convins încă să ni te alături?</h1>
            <p style="color:#C3AAE3;">Dă-ne o șansă să iți arătăm de ce este important să ajuți!</p>
            <p><a class="btn btn-outline-light" href="#ceva">De ce?</a></p>
            <br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Înapoi</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Înainte</span>
    </button>
  </div>

  <!-- Modalul pentru login -->
  <link rel="stylesheet" type="text/css" href="assets/dist/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="assets/dist/css/utillogin.css">
  <link rel="stylesheet" type="text/css" href="assets/dist/css/mainlogin.css">

  <div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="container-login100" >
    			<div class="wrap-login100 p-t-30 p-b-50">
    				<span class="login100-form-title p-b-41">
    					Login
    				</span>
            <?php
            if(!empty($login_err)){
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }
            ?>
    				<form class="login100-form p-b-33 p-t-5" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    					<div class="wrap-input100" data-validate = "username">
    						<input class="input100" type="email" name="username" placeholder="Introduceți email-ul" required>
    						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
    					</div>

    					<div class="wrap-input100" data-validate="password">
    						<input class="input100" type="password" name="password" placeholder="Introduceți parola" required>
    						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
    					</div>

    					<div class="container-login100-form-btn m-t-32">
    						<button class="login100-form-btn">
    							Loghează-te
    						</button>
    					</div>

    				</form>
    			</div>
    		</div>
      </div>
    </div>
  </div>
    <!-- Motivele pentru a face voluntariat-->
    <div id="ceva" class="row featurette">
      <hr class="featurette-divider">
      <div class="row justify-content-md-center">
      <div class="col-md-5">
        <h2 class="text-muted">ESTE BUN PENTRU <span class="featurette-heading">SĂNĂTATE</span></h2>
        <br>
        <br>
        <p class="lead">Nu, nu inventăm acest lucru. Studiile au constatat că, atunci când nu te mai gândești la propriile probleme și te concentrezi asupra problemelor altora, nivelul tău de stres începe să scadă.</p>
        <p class="lead">În afară de acest lucru, sistemul tău imunitar este, de asemenea, întărit, iar sentimentul general de satisfacție crește.</p>
        <p class="lead">Acest lucru se datorează faptului că a face ceva pentru altcineva întrerupe tiparele de producere a tensiunii și le înlocuiește cu un sentiment de scop, un nivel de încredere mai ridicat și cu emoții pozitive!</p>
      </div>
      <div class="col-md-3">
        <img src="Imagini\PaginaPrincipala\sanatate.jpg" width="500px" height="500px"/>
      </div>
    </div></div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="row justify-content-md-center">
      <div class="col-md-5 order-md-2">
        <h2 class="text-muted">ÎȚI ÎMBUNĂTĂȚEȘTE ȘANSELE DE <span class="featurette-heading">ANGAJARE</span></h2>
        <br><br>
        <p class="lead">Știai că voluntariatul este o modalitate excelentă de a-ți spori perspectivele de carieră? Te ajută să creezi o impresie pozitivă, te face mai inovator și creativ și îți oferă o serie de abilități utile.</p>
        <br>
        <p class="lead">Și nu suntem singurii care sunt conștienți de aceste beneficii, și recrutorii sunt! Se spune că recrutorii pun mai mult preț pe voluntariat decât pe prezentarea personală atunci când se uită la potențialii candidați.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="Imagini\PaginaPrincipala\angajare.jpg" width="500px" height="500px"/>

      </div>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row justify-content-md-center">
    <div class="col-md-5">
      <h2 class="text-muted">VEI AVEA UN <span class="featurette-heading">IMPACT</span></h2>
      <br>
      <br>
      <p class="lead">Voluntariatul îțî oferă șansa de a contribui la o comunitate și la o lume în care ți-ai dori să trăiești în fiecare zi!</p>
      <br>
      <p class="lead">Îți oferă posibilitatea de a face parte din ceva mai măreț decât tine și de a-ți folosi propriile abilități și cunoștințe pentru a ajuta la creșterea proactivității de pe tot globul.</p>
    </div>
    <div class="col-md-3">
      <img src="Imagini\PaginaPrincipala\impact.jpg" width="500px" height="500px"/>
    </div>
  </div></div>

    <hr class="featurette-divider">

    <!-- /Sfarsit motive-->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#myCarousel" style="color:#9059D9;">Back to top</a></p>
    <p>&copy; Kiss Flavia &middot; </p>
  </footer>
</main>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>


  </body>
</html>
