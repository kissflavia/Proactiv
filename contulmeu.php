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
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="Imagini\logo.png">

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
        overflow: hidden;
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
                echo "<a class=\"nav-link\" href=\"organizatii.php\">Organizații</a>";
            // Cont organizație -> Voluntari
            else echo "<a class=\"nav-link\" href=\"voluntari.php\">Voluntari</a>";
            ?>
          </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#"><img src="Imagini\myacc.png" width="23px" height="23px"/>  Contul meu</a>
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
    <img src="Imagini\myacc.png" class="rounded mx-auto d-block"  width="250px" height="250px" alt="Poza Profil">
      <br><br><br>
      <div class="btn-group-vertical" role="group" aria-label="Meniu Butoane">
        <button type="button" data-section="sectiuneaGeneral" class="btn btn-secondary btn-lg">General</button>
        <button type="button" data-section="sectiuneaParola" class="btn btn-secondary btn-lg">Schimbă parola</button>
        <button type="button" data-section="sectiuneaMesaje" class="btn btn-secondary btn-lg">Mesaje noi</button>
        <button type="button" data-section="sectiuneaActiuni" class="btn btn-secondary btn-lg">Acțiunile mele</button>
        <?php if($_SESSION["tip"]=="voluntar"){?>
          <button type="button" data-section="sectiuneaInterese" class="btn btn-secondary btn-lg">Setează-ți interesele</button>
        <?php } ?>
        <a type="button" class="btn btn-secondary btn-lg" href="logout.php">LOGOUT</a>
      </div>
      <br><br><br><br><br>
  </div>

<div class="col" align="left" style="background-color: #F5F1F9;">
  <div class="col-lg-7 well">
    <div class="content-section" id="sectiuneaGeneral">
        <br><br><br><br>
        <label for="$nume" class="form-label"><?php if($_SESSION["tip"]=="voluntar") echo "Nume"; else echo "Denumire"?></label>
        <input type="text" class="form-control" id="$nume" value="<?php echo $nume; ?>" required>
        <br>
        <label for="$precif" class="form-label"><?php if($_SESSION["tip"]=="voluntar") echo "Prenume"; else echo "CIF"?></label>
        <input type="text" class="form-control" id="$precif" value="<?php echo $precif; ?>" required>
        <br>
        <div class="col-md">
          <label for="judet" class="form-label">Județ - <?php echo $judet; ?></label>
          <select class="form-select" id="judet" required>
            <option value="<?php echo $judet; ?>"></option>
          </select>
        </div>
        <br>
        <div class="col-md">
          <label for="oras" class="form-label">Oraș - <?php echo $oras; ?></label>
          <select class="form-select" id="oras" required>
            <option value="<?php echo $oras; ?>"></option>
          </select>
        </div>
        <br>
        <div class="col-md">
          <label for="date-picker-example"><?php if($_SESSION["tip"]=="voluntar") echo "Data nașterii"; else echo "Data înființării"?></label>
          <br>
          <input value="<?php echo $data; ?>" class="form-control" data-date-format="dd/mm/yyyy" id="datepicker">
        </div>
        <br>
        <?php if($_SESSION["tip"]=="organizatie"){?>
          <div class="form-group">
            <label for="despre">Despre organizație</label>
            <textarea class="form-control" name="despre" id="despre" rows="3" required><?php echo $despre; ?></textarea>
          </div>
        <?php } ?>
        <br>
        <button type="button" class="btn btn-outline-dark">Modifică</button>
        <br><br><br>
  </div>
</div>
</div>
  </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
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
    $('#datepicker').datepicker("setDate", <?php echo $data; ?>);
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
      "Alba": {"Abrud": [],"Alba Iulia": [],"Baia de Arieş": [],"Câmpeni": [],"Cugir": [],"Ocna Mureş": [],"Teiuş": [],"Zlatna": []},
      "Arad": {"Arad": [],"Chişineu Criş": [],"Curtici": [],"Ineu": [],"Lipova": [],"Nădlac": [],"Pâncota": [],"Pecica": [],"Sântana": [],"Sebiş": [],"Vladimirescu": []},
      "Argeş": {"Costeşti": [],"Mioveni": [],"Piteşti": [],"Ştefăneşti": [],"Topoloveni": []},
      "Bacău": {"Bacău": [],"Buhuşi": [],"Comăneşti": [],"Dărmăneşti": [],"Slănic-Moldova": [],"Târgu Ocna": []},
      "Bihor": {"Aleşd": [],"Borş": [],"Doctor Petru Groza": [],"Oradea": [],"Săcueni": [],"Salonta": [],"Valea lui Mihai": []},
      "Bistriţa-Năsăud": {"Beclean": [],"Bistriţa": [],"Năsăud": [],"Sângeorz-Băi": []},
      "Botoşani": {"Botoşani": [],"Bucecea": [],"Darabani": [],"Flămânzi": [],"Săveni": [],"Ştefăneşti": []},
      "Brăila": {"Brăila": [],"Făurei": [],"Ianca": [],"Însurăţei": []},
      "Braşov": {"Braşov": [],"Ghimbav": [],"Predeal": [],"Râşnov": [],"Rupea": [],"Victoria": [],"Zărneşti": []},
      "Bucureşti": {"Bucureşti": [],"Voluntari": []},
      "Buzău": {"Buzău": [],"Nehoiu": [],"Pătârlagele": [],"Pogoanele": []},
      "Călăraşi": {"Budeşti": [],"Călăraşi": [],"Fundulea": [],"Lehliu-Gară": [],"Olteniţa": []},
      "Caraş-Severin": {"Anina":[],"Băile Herculane":[],"Bocşa":[],"Moldova Nouă":[],"Oraviţa":[],"Oţelu Roşu": [],"Pojejena":[],"Reşiţa":[]},
      "Cluj": {"Cluj-Napoca":[],"Huedin":[]},
      "Constanţa": {"Constanţa":[],"Hârşova":[],"Lipniţa":[],"Murfatlar":[],"Năvodari":[],"Negru Vodă":[],"Ostrov":[],"Ovidiu":[],"Techirghiol":[]},
      "Covasna": {"Baraolt":[],"Covasna":[],"Întorsura Buzăului":[],"Sfântu-Gheorghe":[]},
      "Dâmboviţa": {"Fieni":[],"Găeşti":[],"Pucioasa":[],"Răcari":[],"Târgovişte":[],"Titu":[]},
      "Dolj": {"Bechet":[],"Calafat":[],"Craiova":[],"Dăbuleni":[],"Filiaşi":[],"Segarcea":[]},
      "Galaţi": {"Bereşti-Târg":[],"Bujor":[],"Galaţi":[]},
      "Giurgiu": {"Bolintin Vale":[],"Giurgiu":[],"Mihăileşti":[]},
      "Gorj": {"Bumbeşti-Jiu":[],"Novaci-Străini":[],"Rovinari":[],"Târgu Cărbuneşti":[],"Târgu Jiu":[],"Ţicleni":[],"Tismana":[],"Turceni":[]},
      "Harghita": {"Bălan":[],"Cristuru Secuiesc":[],"Miercurea-Ciuc":[],"Vlăhiţa":[]},
      "Hunedoara": {"Aninoasa":[],"Călan":[],"Deva":[],"Geoagiu":[],"Haţeg":[],"Hunedoara":[],"Petrila":[],"Simeria":[],"Uricani":[]},
      "Ialomiţa": {"Amara":[],"Căzăneşti":[],"Cernavodă":[],"Slobozia":[],"Ţăndărei":[]},
      "Iaşi": {"Hârlău":[],"Iaşi":[],"Podu Iloaiei":[],"Târgu Frumos":[],"Ungheni-Prut":[],"Victoria":[]},
      "Ilfov": {"Bragadiru":[],"Buftea":[],"Chitila":[],"Fierbinţi-Târg":[],"Măgurele":[],"Otopeni":[],"Pantelimon":[],"Popeşti-Leordeni":[]},
      "Maramureş": {"Baia Mare":[],"Baia-Sprie":[],"Borşa":[],"Cavnic":[],"Dragomireşti":[],"Săliştea de Sus":[],"Seini":[],"Sighetu Marmaţiei":[],"Şomcuta Mare":[],"Târgu Lăpuş":[],"Tăuţii Măgheruş":[],"Ulmeni":[],"Vişeu de Sus":[]},
      "Mehedinţi": {"Baia de Aramă":[],"Drobeta-Turnu Severin":[],"Orşova":[],"Strehaia":[],"Vânju-Mare":[]},
      "Mureş": {"Iernut":[],"Luduş":[],"Miercurea Nirajului":[],"Sângeorgiu de Pădure":[],"Sărmaşu":[],"Sovata":[],"Târgu-Mureş":[],"Ungheni":[]},
      "Neamţ": {"Bicaz":[],"Piatra Neamţ":[],"Roznov":[],"Târgu Neamţ":[]},
      "Olt": {"Balş":[],"Corabia":[],"Drăgăneşti-Olt":[],"Piatra Olt":[],"Potcoava":[],"Scorniceşti":[],"Slatina":[]},
      "Prahova": {"Azuga":[],"Băicoi":[],"Boldeşti-Scăeni":[],"Breaza":[],"Buşteni":[],"Comarnic":[],"Mizil":[],"Ploieşti":[],"Plopeni":[],"Sinaia":[],"Slănic":[],"Urlaţi":[],"Vălenii de Munte":[]},
      "Sălaj": {"Cehu Silvaniei":[],"Jibou":[],"Şimleu Silvaniei":[],"Zalău":[]},
      "Satu Mare": {"Ardud":[],"Carei":[],"Dorolţ":[],"Livada":[],"Negreşti-Oaş":[],"Satu Mare":[],"Tăşnad":[]},
      "Sibiu": {"Agnita":[],"Avrig":[],"Cisnădie":[],"Copşa Mică":[],"Dumbrăveni":[],"Miercurea Sibiului":[],"Ocna Sibiului":[],"Sălişte":[],"Sibiu":[],"Tălmaciu":[]},
      "Suceava": {"Broşteni":[],"Cajvana":[],"Dolhasca":[],"Frasin":[],"Gura Humorului":[],"Liteni":[],"Milişăuţi":[],"Salcea":[],"Siret":[],"Suceava":[],"Vicovu de Sus":[]},
      "Teleorman": {"Alexandria":[],"Turnu Măgurele":[],"Videle":[],"Zimnicea":[]},
      "Timiş": {"Buziaş":[],"Cenad":[],"Ciacova":[],"Comloşu Mare":[],"Deta":[],"Făget":[],"Gătaia":[],"Ictar Budinţi":[],"Jamu Mare":[],"Jimbolia":[],"Sânnicolau Mare":[],"Timişoara":[]},
      "Tulcea": {"Babadag":[],"Isaccea":[],"Măcin":[],"Sulina":[],"Tulcea":[]},
      "Vâlcea": {"Băbeni":[],"Băile Olăneşti":[],"Bălceşti":[],"Berbeşti":[],"Brezoi":[],"Călimăneşti":[],"Horezu":[],"Ocnele Mari":[],"Râmnicu Vâlcea":[]},
      "Vaslui": {"Drânceni":[],"Fălciu":[],"Murgeni":[],"Negreşti":[],"Vaslui":[]},
      "Vrancea": {"Focşani":[],"Mărăşeşti":[],"Odobeşti":[],"Panciu":[]},
    }
    window.onload = function() {
      var judetSel = document.getElementById("judet");
      var orasSel = document.getElementById("oras");

      for (var x in locatii) {
        judetSel.options[judetSel.options.length] = new Option(x, x);
      }
      judetSel.onchange = function() {
        //empty Chapters- and Topics- dropdowns
        orasSel.length = 1;
        //display correct values
        for (var y in locatii[this.value]) {
          orasSel.options[orasSel.options.length] = new Option(y, y);
        }
      }
      orasSel.onchange = function() {

        //display correct values
        var z = locatii[judetSel.value][this.value];
      }
    }
    </script>

  </body>
</html>