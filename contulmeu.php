<?php
// Initializam sesiunea
session_start();

// Verificam daca utilizatorul este logat. Daca nu este il redirectionam catre pagina principala
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: paginaPrincipala.php");
    exit;
}

$nume=$precif=$data=$despre=$judet=$oras=$email=$parola = "";

require_once "config.php";
if($_SESSION["tip"]=="voluntar"){
  $sql = "SELECT nume, prenume, dataN, judet, oras, email, parola FROM voluntar WHERE email=\"".$_SESSION["username"]."\"";
  $result = mysqli_query($link, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0){
    $row = mysqli_fetch_assoc($result) ;
    $nume=$row['nume'];
    $precif=$row['prenume'];
    $data=$row['dataN'];
    $judet=$row['judet'];
    $oras=$row['oras'];
    $email=$row['email'];
    $parola=$row['parola'];
  }
}
else{
  if($_SESSION["tip"]=="organizatie"){
    $sql = "SELECT denumire, cif, dataI, judet, oras, despre, email, parola FROM organizatie WHERE email=\"".$_SESSION["username"]."\"";
    $result = mysqli_query($link, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
      $row = mysqli_fetch_assoc($result) ;
      $nume=$row['denumire'];
      $precif=$row['cif'];
      $data=$row['dataI'];
      $judet=$row['judet'];
      $oras=$row['oras'];
      $despre=$row['despre'];
      $email=$row['email'];
      $parola=$row['parola'];
    }
  }
  else{
    $_SESSION = array();
    session_destroy();
    header("location: paginaPrincipala.php");
    exit;
  }
}
  if($_SESSION["resp"]!=""){
  echo '<script>alert("'.$_SESSION["resp"].'");</script>';
      $_SESSION["resp"]="";
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/imagini\logo.png">

    <title>Proactiv - Contul meu</title>

    <!-- Bootstrap CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"/>

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      ::-webkit-scrollbar {
          display: none;
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
    .content-section {
      display: none;
    }
    .datepicker {
        font-size: 0.875em;
    }
    .datepicker td, .datepicker th {
        width: 2em;
        height: 1.2em;
    }
</style>
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
            <a class="nav-link" href="acasa.php">Acas??</a>
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
              <a class="nav-link active" aria-current="page" href="#"><img src="./assets/imagini\myacc.png" width="23px" height="23px"/>  Contul meu</a>
            </li>
          </ul>
      </div>
    </div>
  </nav>
</header>

<main>

  <div class="row">
    <div class="col-lg-4" align="center" style="background-color: #E6DAF0;">
    <br><br><br><br>
    <img src="./assets/imagini\myacc.png" class="rounded mx-auto d-block"  width="250px" height="250px" alt="Poza Profil">
      <br><br><br>
      <div class="btn-group-vertical" role="group" aria-label="Meniu Butoane">
        <button type="button" data-section="sectiuneaGeneral" class="btn btn-secondary btn-lg">General</button>
        <button type="button" data-section="sectiuneaParola" class="btn btn-secondary btn-lg">Schimb?? parola</button>
        <button type="button" data-section="sectiuneaMesaje" class="btn btn-secondary btn-lg">Mesaje primite</button>
        <button type="button" data-section="sectiuneaActiuni" class="btn btn-secondary btn-lg">Ac??iunile mele</button>
        <a type="button" class="btn btn-secondary btn-lg" href="logout.php">LOGOUT</a>
      </div>
      <br><br><br><br><br>
  </div>

<div class="col" align="left" style="background-color: #F5F1F9;">
  <div class="col-lg-7 well">
    <!-- Sectiunea General -->
    <div class="content-section" id="sectiuneaGeneral" style="overflow-x: hidden;">
      <form method="POST" action="./contulmeu/general.php">
        <br><br><br>
        <label for="$nume" class="form-label"><?php if($_SESSION["tip"]=="voluntar") echo "<br><br>Nume"; else echo "Denumire"?></label>
        <input type="text" class="form-control" name="nume" id="$nume" value="<?php echo $nume; ?>" required>
        <br>
        <label for="$precif" class="form-label"><?php if($_SESSION["tip"]=="voluntar") echo "Prenume"; else echo "CIF"?></label>
        <input type="text" class="form-control" name="precif" id="$precif" value="<?php echo $precif; ?>" required>
        <br>
        <div class="col-md">
          <label for="judet" class="form-label">Jude?? - <?php echo $judet; ?></label>
          <select class="form-select" name="judet" id="judet" required>
            <option value="<?php echo $judet; ?>"></option>
          </select>
        </div>
        <br>
        <div class="col-md">
          <label for="oras" class="form-label">Ora?? - <?php echo $oras; ?></label>
          <select class="form-select" name="oras" id="oras" required>
            <option value="<?php echo $oras; ?>"></option>
          </select>
        </div>
        <br>
        <div class="col-md">
          <label for="date-picker-example"><?php if($_SESSION["tip"]=="voluntar") echo "Data na??terii"; else echo "Data ??nfiin????rii"?></label>
          <br>
          <input value="<?php echo $data; ?>" class="form-control" data-date-format="dd/mm/yyyy" name="data" id="datepicker">
        </div>
        <br>
        <?php if($_SESSION["tip"]=="organizatie"){?>
          <div class="form-group">
            <label for="despre">Despre organiza??ie</label>
            <textarea class="form-control" name="despre" id="despre" rows="3" required><?php echo $despre; ?></textarea>
          </div>
        <?php } ?>
        <br>
        <button type="submit" class="btn btn-outline-dark">Actualizeaz??</button>
        <br><br><br>
    </form>
  </div>
  <!-- Sectiunea Schimba Parola -->
  <div class="content-section" id="sectiuneaParola">
    <form method="POST" action="./contulmeu/schimbaParola.php">
      <br><br><br><br>
      <br><br><br>
      <label for="$email" class="form-label">Email</label>
      <input type="text" name="email" class="form-control" id="$email" required>
      <br>
      <label for="$parolaveche" class="form-label">Parola veche</label>
      <input type="password" name="parolaveche" class="form-control" id="$parolaveche" required>
      <br>
      <label for="$parolanoua" class="form-label">Parola nou??</label>
      <input type="password" name="parolanoua" class="form-control" id="$parolanoua" required>
      <br>
      <label for="$parolanoua2" class="form-label">Confirma??i parola nou??</label>
      <input type="password" name="parolanoua2" class="form-control" id="$parolanoua2" required>
      <br>
      <br>
      <button type="submit" class="btn btn-outline-dark">Schimb?? parola</button>
      <br><br><br>
    </form>
    </div>
    <!-- Sectiunea Mesaje Primite -->
    <div class="content-section" id="sectiuneaMesaje">
        <br><br><br><br>
        <br><br><br>
        <?php
        if($_SESSION["tip"]=="voluntar"){
          $sql = "SELECT trmOrg, denumire,titlu,continut,prmVol as prm FROM mesajorgvol,organizatie WHERE trmOrg = idOrganizatie AND prmVol = ".$_SESSION["id"];
        }
        else {
          $sql = "SELECT trmVol, concat(nume,\" \",prenume) as denumire,titlu,continut,prmOrg as prm FROM mesajvolorg,voluntar WHERE trmVol = idVoluntar AND prmOrg = ".$_SESSION["id"];
        }
        $result = mysqli_query($link, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
          echo "<div class=\"row\">";
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card" style="width: 18rem;margin-bottom:10px;margin-left:20px;">
              <div class="card-body">
                <h4 class="card-title"><?php echo $row["denumire"].":";?></h5>
                <br>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $row["titlu"];?></h6>
                <p class="card-text"><?php echo $row["continut"];?></p>
              </div>
            </div>
            <?php
          }
          echo "</div>";
        }
          ?>
        <br><br><br>
      </div>
      <!-- Sectiunea Actiuni -->
      <div class="content-section" id="sectiuneaActiuni">
          <br><br><br>
          <?php
          if($_SESSION["tip"]=="voluntar"){
            $sql = "SELECT actiune.nume as nume,despre,actiune.categorie as cat,actiune.judet as jud,actiune.oras as oras,dataStart,dataStop, idV, idA FROM actiune,actiuni,voluntar WHERE idA = idActiune AND idV=idVoluntar AND idV = ".$_SESSION["id"];
          }
          else {
            $sql = "SELECT idActiune, nume, categorie, a.judet as jud, a.oras as oras , dataStart, dataStop, organizatie, a.despre as despre FROM actiune AS a,organizatie WHERE organizatie = idOrganizatie AND idOrganizatie = ".$_SESSION["id"];
          }
          $result = mysqli_query($link, $sql);
          $resultCheck = mysqli_num_rows($result);
          if ($resultCheck > 0){
            echo "<div class=\"row\">";
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <div class="col-lg-15 mb-4">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title"><?php echo $row["nume"];?></h3>
                    <h5 class="card-title"><?php echo $row["dataStart"]." - ".$row["dataStop"];?></h5>
                    <h6 class="card-title"><?php echo $row["oras"].", jude??ul ".$row["jud"];?></h6>
                    <hr/>
                    <p class="card-text" style="font-size:12px;"><?php echo $row["despre"];?></p>
                  </div>
                 </div>
                </div>
              <?php
            }
            echo "</div>";
          }
          // Inchidem conexiunea
          mysqli_close($link);
            ?>
          <br><br><br>
        </div>
</div>
</div>
  </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('#datepicker').datepicker({
        maxViewMode: 2,
        language: "ro",
        orientation: "bottom left",
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true
    });
    $('#datepicker').datepicker('setDate', <?php echo $data; ?>);
</script>

    <script>
    $(function() {
        $(".btn").on("click", function() {
          //Ascunde toate sectiunile
          $(".content-section").hide();
          //Arata sectiunea potrivita in functie de butonul apasat
          $("#" + $(this).attr("data-section")).show();
        });
    });
    </script>
    <script>
    var locatii = {
      "Alba": {"Abrud": [],"Alba Iulia": [],"Baia de Arie??": [],"C??mpeni": [],"Cugir": [],"Ocna Mure??": [],"Teiu??": [],"Zlatna": []},
      "Arad": {"Arad": [],"Chi??ineu Cri??": [],"Curtici": [],"Ineu": [],"Lipova": [],"N??dlac": [],"P??ncota": [],"Pecica": [],"S??ntana": [],"Sebi??": [],"Vladimirescu": []},
      "Arge??": {"Coste??ti": [],"Mioveni": [],"Pite??ti": [],"??tef??ne??ti": [],"Topoloveni": []},
      "Bac??u": {"Bac??u": [],"Buhu??i": [],"Com??ne??ti": [],"D??rm??ne??ti": [],"Sl??nic-Moldova": [],"T??rgu Ocna": []},
      "Bihor": {"Ale??d": [],"Bor??": [],"Doctor Petru Groza": [],"Oradea": [],"S??cueni": [],"Salonta": [],"Valea lui Mihai": []},
      "Bistri??a-N??s??ud": {"Beclean": [],"Bistri??a": [],"N??s??ud": [],"S??ngeorz-B??i": []},
      "Boto??ani": {"Boto??ani": [],"Bucecea": [],"Darabani": [],"Fl??m??nzi": [],"S??veni": [],"??tef??ne??ti": []},
      "Br??ila": {"Br??ila": [],"F??urei": [],"Ianca": [],"??nsur????ei": []},
      "Bra??ov": {"Bra??ov": [],"Ghimbav": [],"Predeal": [],"R????nov": [],"Rupea": [],"Victoria": [],"Z??rne??ti": []},
      "Bucure??ti": {"Bucure??ti": [],"Voluntari": []},
      "Buz??u": {"Buz??u": [],"Nehoiu": [],"P??t??rlagele": [],"Pogoanele": []},
      "C??l??ra??i": {"Bude??ti": [],"C??l??ra??i": [],"Fundulea": [],"Lehliu-Gar??": [],"Olteni??a": []},
      "Cara??-Severin": {"Anina":[],"B??ile Herculane":[],"Boc??a":[],"Moldova Nou??":[],"Oravi??a":[],"O??elu Ro??u": [],"Pojejena":[],"Re??i??a":[]},
      "Cluj": {"Cluj-Napoca":[],"Huedin":[]},
      "Constan??a": {"Constan??a":[],"H??r??ova":[],"Lipni??a":[],"Murfatlar":[],"N??vodari":[],"Negru Vod??":[],"Ostrov":[],"Ovidiu":[],"Techirghiol":[]},
      "Covasna": {"Baraolt":[],"Covasna":[],"??ntorsura Buz??ului":[],"Sf??ntu-Gheorghe":[]},
      "D??mbovi??a": {"Fieni":[],"G??e??ti":[],"Pucioasa":[],"R??cari":[],"T??rgovi??te":[],"Titu":[]},
      "Dolj": {"Bechet":[],"Calafat":[],"Craiova":[],"D??buleni":[],"Filia??i":[],"Segarcea":[]},
      "Gala??i": {"Bere??ti-T??rg":[],"Bujor":[],"Gala??i":[]},
      "Giurgiu": {"Bolintin Vale":[],"Giurgiu":[],"Mih??ile??ti":[]},
      "Gorj": {"Bumbe??ti-Jiu":[],"Novaci-Str??ini":[],"Rovinari":[],"T??rgu C??rbune??ti":[],"T??rgu Jiu":[],"??icleni":[],"Tismana":[],"Turceni":[]},
      "Harghita": {"B??lan":[],"Cristuru Secuiesc":[],"Miercurea-Ciuc":[],"Vl??hi??a":[]},
      "Hunedoara": {"Aninoasa":[],"C??lan":[],"Deva":[],"Geoagiu":[],"Ha??eg":[],"Hunedoara":[],"Petrila":[],"Simeria":[],"Uricani":[]},
      "Ialomi??a": {"Amara":[],"C??z??ne??ti":[],"Cernavod??":[],"Slobozia":[],"????nd??rei":[]},
      "Ia??i": {"H??rl??u":[],"Ia??i":[],"Podu Iloaiei":[],"T??rgu Frumos":[],"Ungheni-Prut":[],"Victoria":[]},
      "Ilfov": {"Bragadiru":[],"Buftea":[],"Chitila":[],"Fierbin??i-T??rg":[],"M??gurele":[],"Otopeni":[],"Pantelimon":[],"Pope??ti-Leordeni":[]},
      "Maramure??": {"Baia Mare":[],"Baia-Sprie":[],"Bor??a":[],"Cavnic":[],"Dragomire??ti":[],"S??li??tea de Sus":[],"Seini":[],"Sighetu Marma??iei":[],"??omcuta Mare":[],"T??rgu L??pu??":[],"T??u??ii M??gheru??":[],"Ulmeni":[],"Vi??eu de Sus":[]},
      "Mehedin??i": {"Baia de Aram??":[],"Drobeta-Turnu Severin":[],"Or??ova":[],"Strehaia":[],"V??nju-Mare":[]},
      "Mure??": {"Iernut":[],"Ludu??":[],"Miercurea Nirajului":[],"S??ngeorgiu de P??dure":[],"S??rma??u":[],"Sovata":[],"T??rgu-Mure??":[],"Ungheni":[]},
      "Neam??": {"Bicaz":[],"Piatra Neam??":[],"Roznov":[],"T??rgu Neam??":[]},
      "Olt": {"Bal??":[],"Corabia":[],"Dr??g??ne??ti-Olt":[],"Piatra Olt":[],"Potcoava":[],"Scornice??ti":[],"Slatina":[]},
      "Prahova": {"Azuga":[],"B??icoi":[],"Bolde??ti-Sc??eni":[],"Breaza":[],"Bu??teni":[],"Comarnic":[],"Mizil":[],"Ploie??ti":[],"Plopeni":[],"Sinaia":[],"Sl??nic":[],"Urla??i":[],"V??lenii de Munte":[]},
      "S??laj": {"Cehu Silvaniei":[],"Jibou":[],"??imleu Silvaniei":[],"Zal??u":[]},
      "Satu Mare": {"Ardud":[],"Carei":[],"Dorol??":[],"Livada":[],"Negre??ti-Oa??":[],"Satu Mare":[],"T????nad":[]},
      "Sibiu": {"Agnita":[],"Avrig":[],"Cisn??die":[],"Cop??a Mic??":[],"Dumbr??veni":[],"Miercurea Sibiului":[],"Ocna Sibiului":[],"S??li??te":[],"Sibiu":[],"T??lmaciu":[]},
      "Suceava": {"Bro??teni":[],"Cajvana":[],"Dolhasca":[],"Frasin":[],"Gura Humorului":[],"Liteni":[],"Mili????u??i":[],"Salcea":[],"Siret":[],"Suceava":[],"Vicovu de Sus":[]},
      "Teleorman": {"Alexandria":[],"Turnu M??gurele":[],"Videle":[],"Zimnicea":[]},
      "Timi??": {"Buzia??":[],"Cenad":[],"Ciacova":[],"Comlo??u Mare":[],"Deta":[],"F??get":[],"G??taia":[],"Ictar Budin??i":[],"Jamu Mare":[],"Jimbolia":[],"S??nnicolau Mare":[],"Timi??oara":[]},
      "Tulcea": {"Babadag":[],"Isaccea":[],"M??cin":[],"Sulina":[],"Tulcea":[]},
      "V??lcea": {"B??beni":[],"B??ile Ol??ne??ti":[],"B??lce??ti":[],"Berbe??ti":[],"Brezoi":[],"C??lim??ne??ti":[],"Horezu":[],"Ocnele Mari":[],"R??mnicu V??lcea":[]},
      "Vaslui": {"Dr??nceni":[],"F??lciu":[],"Murgeni":[],"Negre??ti":[],"Vaslui":[]},
      "Vrancea": {"Foc??ani":[],"M??r????e??ti":[],"Odobe??ti":[],"Panciu":[]},
    }
    window.onload = function() {
      var judetSel = document.getElementById("judet");
      var orasSel = document.getElementById("oras");

      for (var x in locatii) {
        judetSel.options[judetSel.options.length] = new Option(x, x);
      }
      judetSel.onchange = function() {
    ?????? // Golim dropdown-ul aferent Ora??ului
    ?????? orasSel.length = 1;
        // Afi????m datele potrivite
        for (var y in locatii[this.value]) {
          orasSel.options[orasSel.options.length] = new Option(y, y);
        }
      }
      orasSel.onchange = function() {
        // Afi????m datele potrivite
        var z = locatii[judetSel.value][this.value];
      }
    }
    </script>

  </body>
</html>
