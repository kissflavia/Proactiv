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

    <title>Proactiv</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <!-- Bootstrap CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      ::-webkit-scrollbar {
          display: none;
      }
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
      }
    </style>


    <!-- Caruselul cu imagini -->
    <link href="assets/dist/css/carousel.css" rel="stylesheet">
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
            <a class="nav-link active" aria-current="page" href="#">Acasă</a>
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
                echo "<a class=\"nav-link\" href=\"organizatii.php\">Organizații</a>";
            // Cont organizație -> Voluntari
            else echo "<a class=\"nav-link\" href=\"voluntari.php\">Voluntari</a>";
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

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="Imagini\PaginaPrincipala\vol.jpg" style="object-fit: cover;" width="100%" height="500px"/></svg>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="Imagini\PaginaPrincipala\vol2.jpg" style="object-fit: cover;" width="100%" height="500px"/></svg>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="Imagini\PaginaPrincipala\vol3.jpg" style="object-fit: cover;" width="100%" height="500px"/></svg>
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

    <div class="row featurette">
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

    <div class="row featurette">
      <div class="row justify-content-md-center">
      <div class="col-md-5 order-md-2">
        <h2 class="text-muted">POȚI CONTRIBUI LA O CAUZĂ ÎN CARE <span class="featurette-heading">CREZI</span></h2>
        <br><br>
        <p class="lead">Nu ești sigur cum să începi călătoria ta de voluntariat? Motivul tău pentru voluntariat ar trebui să înceapă acolo unde se află pasiunile tale.</p>
        <br>
        <p class="lead">Lasă dragostea pentru animale, pentru natură sau pentru alte categorii să îți ghideze drumul.</p>
        <br>
        <p class="lead">Permite acțiunilor tale să fie conduse din intenții bune. În acest fel, toată munca grea va merita și vei fi mai dedicat cauzei. Ca urmare, impactul tău va fi mult mai mare.</p></p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="Imagini\PaginaPrincipala\cauza.jpg" width="500px" height="500px"/>
      </div>
    </div></div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="row justify-content-md-center">
      <div class="col-md-5">
        <h2 class="text-muted">ÎI VEI <span class="featurette-heading">MOTIVA</span> ȘI PE CEI DIN JUR</h2>
        <br>
        <br>
        <p class="lead">Contribuind la predarea în școli sau asistând pe cineva în atingerea obiectivelor de învățare a limbii engleze, vei contribui la dezvoltarea abilităților și la creșterea încrederii în sine.</p>
        <br>
        <p class="lead">Orice ai decide să faci, îi vei ajuta pe oameni să fie mai motivați. De asemenea, îi veți ajuta să-și dezvolte abilitățile și încrederea de care au nevoie pentru a accesa oportunități de muncă mai bune.</p>
      </div>
      <div class="col-md-3">
        <img src="Imagini\PaginaPrincipala\empower.jpg" width="500px" height="500px"/>
      </div>
    </div></div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="row justify-content-md-center">
      <div class="col-md-5 order-md-2">
        <h2 class="text-muted">VEI <span class="featurette-heading">CUNOAȘTE</span> OAMENI MINUNAȚI</h2>
        <br><br>
        <p class="lead">Voluntariatul îți permite să întâlnești oameni din toate categoriile sociale. Îți oferă șansa de a forma relații care pot avea un impact durabil asupra vieții tale.</p>
        <br>
        <p class="lead">Ai putea să-ți cunoști noul prieten cel mai bun, viitorul partener de afaceri sau să ai o conversație care să aducă o schimbare pozitivă în viața ta.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="Imagini\PaginaPrincipala\conexiune.jpg" width="500px" height="500px"/>
      </div>
    </div></div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="row justify-content-md-center">
      <div class="col-md-5">
        <h2 class="text-muted">VEI DOBÂNDI O <span class="featurette-heading">PERSPECTIVĂ NOUĂ</span></h2>
        <br>
        <br>
        <p class="lead">Voluntariatul poate schimba modul în care vezi lumea!</p>
        <br>
        <p class="lead">Vei intra zilnic în contact cu persoane din diferite țări, medii și perspective.</p>
        <br>
        <p class="lead">Această schimbare de perspectivă îți deschide mintea către ceea ce este cu adevărat important și te ajută să construiești punți de înțelegere.</p>
      </div>
      <div class="col-md-3">
        <img src="Imagini\PaginaPrincipala\prespectiva.jpg" width="500px" height="500px"/>
      </div>
    </div></div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="row justify-content-md-center">
      <div class="col-md-5 order-md-2">
        <h2 class="text-muted">TE VEI <span class="featurette-heading">DISTRA</span></h2>
        <br><br>
        <p class="lead">Voluntariatul nu este ceva de luat în glumă și trebuie tratat cu cel mai mare respect, dar este și distractiv!</p>
        <br>
        <p class="lead">Este un motiv pentru a cunoaște oameni noi, a îmbrățișa tradițiile culturale și a întâlni locuri noi.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="Imagini\PaginaPrincipala\fun.jpg" width="500px" height="500px"/>
      </div>
    </div></div>

    <hr class="featurette-divider">

    <!-- /Sfarsit motive-->

</div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#" style="color:#9059D9;">Back to top</a></p>
    <p>&copy; Kiss Flavia &middot; </p>
  </footer>
</main>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>


  </body>
</html>
