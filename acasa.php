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
    <link rel="shortcut icon" type="image/x-icon" href="./assets/imagini\logo.png">

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
      <img src="./assets/imagini\proactiv.png" width="150px" height="40px" class="d-inline-block align-top" alt="">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Acas??</a>
          </li>
          <li class="nav-item">
            <?php
            // Cont voluntar -> Hart??
            if($_SESSION["tip"]=="voluntar")
                echo "<a class=\"nav-link\" href=\"harta.php\">Hart??</a>";
            // Cont organiza??ie -> Ac??iune nou??
            else echo "<a class=\"nav-link\" href=\"actiunenoua.php\">Ac??iune nou??</a>";
            ?>
          </li>
          <li class="nav-item">
            <?php
            // Cont voluntar -> Organiza??ii
            if($_SESSION["tip"]=="voluntar")
                echo "<a class=\"nav-link\" href=\"organizatii.php\">Organiza??ii</a>";
            // Cont organiza??ie -> Voluntari
            else echo "<a class=\"nav-link\" href=\"voluntari.php\">Voluntari</a>";
            ?>
          </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
              <a class="nav-link" href="contulmeu.php"><img src="./assets/imagini\myacc.png" width="23px" height="23px"/>  Contul meu</a>
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
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="./assets/imagini\PaginaPrincipala\vol.jpg" style="object-fit: cover;" width="100%" height="500px"/></svg>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="./assets/imagini\PaginaPrincipala\vol2.jpg" style="object-fit: cover;" width="100%" height="500px"/></svg>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="./assets/imagini\PaginaPrincipala\vol3.jpg" style="object-fit: cover;" width="100%" height="500px"/></svg>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">??napoi</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">??nainte</span>
    </button>
  </div>


    <!-- Motivele pentru a face voluntariat-->
    <div id="ceva" class="row featurette">
      <hr class="featurette-divider">
      <div class="row justify-content-md-center">
      <div class="col-md-5">
        <h2 class="text-muted">ESTE BUN PENTRU <span class="featurette-heading">S??N??TATE</span></h2>
        <br>
        <br>
        <p class="lead">Nu, nu invent??m acest lucru. Studiile au constatat c??, atunci c??nd nu te mai g??nde??ti la propriile probleme ??i te concentrezi asupra problemelor altora, nivelul t??u de stres ??ncepe s?? scad??.</p>
        <p class="lead">??n afar?? de acest lucru, sistemul t??u imunitar este, de asemenea, ??nt??rit, iar sentimentul general de satisfac??ie cre??te.</p>
        <p class="lead">Acest lucru se datoreaz?? faptului c?? a face ceva pentru altcineva ??ntrerupe tiparele de producere a tensiunii ??i le ??nlocuie??te cu un sentiment de scop, un nivel de ??ncredere mai ridicat ??i cu emo??ii pozitive!</p>
      </div>
      <div class="col-md-3">
        <img src="./assets/imagini\PaginaPrincipala\sanatate.jpg" width="500px" height="500px"/>
      </div>
    </div></div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="row justify-content-md-center">
      <div class="col-md-5 order-md-2">
        <h2 class="text-muted">????I ??MBUN??T????E??TE ??ANSELE DE <span class="featurette-heading">ANGAJARE</span></h2>
        <br><br>
        <p class="lead">??tiai c?? voluntariatul este o modalitate excelent?? de a-??i spori perspectivele de carier??? Te ajut?? s?? creezi o impresie pozitiv??, te face mai inovator ??i creativ ??i ????i ofer?? o serie de abilit????i utile.</p>
        <br>
        <p class="lead">??i nu suntem singurii care sunt con??tien??i de aceste beneficii, ??i recrutorii sunt! Se spune c?? recrutorii pun mai mult pre?? pe voluntariat dec??t pe prezentarea personal?? atunci c??nd se uit?? la poten??ialii candida??i.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="./assets/imagini\PaginaPrincipala\angajare.jpg" width="500px" height="500px"/>

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
        <p class="lead">Voluntariatul ?????? ofer?? ??ansa de a contribui la o comunitate ??i la o lume ??n care ??i-ai dori s?? tr??ie??ti ??n fiecare zi!</p>
        <br>
        <p class="lead">????i ofer?? posibilitatea de a face parte din ceva mai m??re?? dec??t tine ??i de a-??i folosi propriile abilit????i ??i cuno??tin??e pentru a ajuta la cre??terea proactivit????ii de pe tot globul.</p>
      </div>
      <div class="col-md-3">
        <img src="./assets/imagini\PaginaPrincipala\impact.jpg" width="500px" height="500px"/>
      </div>
    </div></div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="row justify-content-md-center">
      <div class="col-md-5 order-md-2">
        <h2 class="text-muted">PO??I CONTRIBUI LA O CAUZ?? ??N CARE <span class="featurette-heading">CREZI</span></h2>
        <br><br>
        <p class="lead">Nu e??ti sigur cum s?? ??ncepi c??l??toria ta de voluntariat? Motivul t??u pentru voluntariat ar trebui s?? ??nceap?? acolo unde se afl?? pasiunile tale.</p>
        <br>
        <p class="lead">Las?? dragostea pentru animale, pentru natur?? sau pentru alte categorii s?? ????i ghideze drumul.</p>
        <br>
        <p class="lead">Permite ac??iunilor tale s?? fie conduse din inten??ii bune. ??n acest fel, toat?? munca grea va merita ??i vei fi mai dedicat cauzei. Ca urmare, impactul t??u va fi mult mai mare.</p></p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="./assets/imagini\PaginaPrincipala\cauza.jpg" width="500px" height="500px"/>
      </div>
    </div></div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="row justify-content-md-center">
      <div class="col-md-5">
        <h2 class="text-muted">??I VEI <span class="featurette-heading">MOTIVA</span> ??I PE CEI DIN JUR</h2>
        <br>
        <br>
        <p class="lead">Contribuind la predarea ??n ??coli sau asist??nd pe cineva ??n atingerea obiectivelor de ??nv????are a limbii engleze, vei contribui la dezvoltarea abilit????ilor ??i la cre??terea ??ncrederii ??n sine.</p>
        <br>
        <p class="lead">Orice ai decide s?? faci, ??i vei ajuta pe oameni s?? fie mai motiva??i. De asemenea, ??i ve??i ajuta s??-??i dezvolte abilit????ile ??i ??ncrederea de care au nevoie pentru a accesa oportunit????i de munc?? mai bune.</p>
      </div>
      <div class="col-md-3">
        <img src="./assets/imagini\PaginaPrincipala\empower.jpg" width="500px" height="500px"/>
      </div>
    </div></div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="row justify-content-md-center">
      <div class="col-md-5 order-md-2">
        <h2 class="text-muted">VEI <span class="featurette-heading">CUNOA??TE</span> OAMENI MINUNA??I</h2>
        <br><br>
        <p class="lead">Voluntariatul ????i permite s?? ??nt??lne??ti oameni din toate categoriile sociale. ????i ofer?? ??ansa de a forma rela??ii care pot avea un impact durabil asupra vie??ii tale.</p>
        <br>
        <p class="lead">Ai putea s??-??i cuno??ti noul prieten cel mai bun, viitorul partener de afaceri sau s?? ai o conversa??ie care s?? aduc?? o schimbare pozitiv?? ??n via??a ta.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="./assets/imagini\PaginaPrincipala\conexiune.jpg" width="500px" height="500px"/>
      </div>
    </div></div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="row justify-content-md-center">
      <div class="col-md-5">
        <h2 class="text-muted">VEI DOB??NDI O <span class="featurette-heading">PERSPECTIV?? NOU??</span></h2>
        <br>
        <br>
        <p class="lead">Voluntariatul poate schimba modul ??n care vezi lumea!</p>
        <br>
        <p class="lead">Vei intra zilnic ??n contact cu persoane din diferite ????ri, medii ??i perspective.</p>
        <br>
        <p class="lead">Aceast?? schimbare de perspectiv?? ????i deschide mintea c??tre ceea ce este cu adev??rat important ??i te ajut?? s?? construie??ti pun??i de ??n??elegere.</p>
      </div>
      <div class="col-md-3">
        <img src="./assets/imagini\PaginaPrincipala\prespectiva.jpg" width="500px" height="500px"/>
      </div>
    </div></div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="row justify-content-md-center">
      <div class="col-md-5 order-md-2">
        <h2 class="text-muted">TE VEI <span class="featurette-heading">DISTRA</span></h2>
        <br><br>
        <p class="lead">Voluntariatul nu este ceva de luat ??n glum?? ??i trebuie tratat cu cel mai mare respect, dar este ??i distractiv!</p>
        <br>
        <p class="lead">Este un motiv pentru a cunoa??te oameni noi, a ??mbr????i??a tradi??iile culturale ??i a ??nt??lni locuri noi.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="./assets/imagini\PaginaPrincipala\fun.jpg" width="500px" height="500px"/>
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
