<?php
// Initializam sesiunea
session_start();

// Verificam daca utilizatorul este logat. Daca nu este il redirectionam catre pagina principala
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["tip"]!="organizatie" ){
    header("location: paginaPrincipala.php");
    exit;
}

// Configuram baza de date
require_once "config.php";

// Definim variabilele si le initializam cu valori null
$nume = $categ = $despre =  $dataStart = $dataStop = $judet= $oras = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $id = NULL;
    $nume = $_POST["numeA"];
    $categ = $_POST["categA"];
    $despre = $_POST["despreA"];
    $dataStart= $_POST["dataStart"];
    $dataStop = $_POST["dataStop"];
    $judet = $_POST["judetA"];
    $oras = $_POST["orasA"];
    $ORG = $_SESSION["id"];

        // Insert statement
        $sql = "INSERT INTO actiune(idActiune,nume,categorie,judet,oras,dataStart,dataStop,organizatie,despre) VALUES (?,?,?,?,?,?,?,?,?)";

        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "dssssssds", $id, $nume, $categ, $judet, $oras, $dataStart, $dataStop, $ORG, $despre);

            // Executam statementul
            if(mysqli_stmt_execute($stmt)){
              echo '<script type="text/javascript">
                  window.onload = function () { alert("Acțiunea a fost semnalată!"); }
                  </script>';
            } else{
              echo '<script type="text/javascript">
                  window.onload = function () { alert("Oops! Ceva nu a mers bine! Reveniți mai târziu"); }
                  </script>';
            }

            // Inchidem statementul
            mysqli_stmt_close($stmt);
          }

      // Close connection
      mysqli_close($link);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="Imagini\logo.png">

    <title>Proactiv - Acțiune nouă</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">


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
      @font-face {
        font-family: Ubuntu-Regular;
        src: url('assets/dist/fonts/ubuntu/Ubuntu-Regular.ttf');
      }
      html, body {
        font-family: Ubuntu-Regular;
        max-width: 100%;
        overflow: hidden;
        background-color: #E6DAF0;
      }
      .datepicker {
          font-size: 0.875em;
      }
      .datepicker td, .datepicker th {
          width: 2em;
          height: 2em;
      }
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
                echo "<a class=\"nav-link active\" aria-current=\"page\" href=\"#\">Hartă</a>";
            // Cont organizație -> Acțiune nouă
            else echo "<a class=\"nav-link active\" aria-current=\"page\" href=\"#\">Acțiune nouă</a>";
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

<br><br><br><br>
<div class="row">
    <div class="col-lg-7" align="center">
      <div class="col-lg-8 well">
    <h3 style="color:#702DC8;">Semnalează o acțiune nouă de voluntariat.</h2>
    <h5 style="color:#9059D9;">Suntem siguri că vor exista mulți voluntari interesați!</h2>
      <br>
        <div class="row">
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-6 form-group">
                      <label>Nume</label>
                      <input type="text" name="numeA" class="form-control" required value="">
                    </div>
                    <div class="col-sm-6 form-group">
                      <label for="categorie">Categorie</label>
                      <select class="form-select" name="categA" id="categorie" required value="">
                         <option value=""></option>
                         <option>Cultural</option>
                         <option>Donații</option>
                         <option>Educațional</option>
                         <option>Nutriție</option>
                         <option>Protecția mediului</option>
                         <option>Religios</option>
                         <option>Social</option>
                         <option>Sport</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 form-group">
                      <label>Despre acțiune</label>
                      <textarea class="form-control" name="despreA" id="despre" rows="2"></textarea>
                    </div>
                  </div>
                  <br>
                  <hr class="featurette-divider">
                  <br>
                  <div class="row">
                    <div class="col-sm-6 form-group">
                      <label>Începe din</label>
                      <br>
                      <input class="form-control" name="dataStart" data-date-format="dd/mm/yyyy" id="datepicker" value="">
                    </div>
                    <div class="col-sm-6 form-group">
                      <label>Se încheie în</label>
                      <br>
                      <input class="form-control" name="dataStop" data-date-format="dd/mm/yyyy" id="datepicker2" value="">
                    </div>
                  </div>
                  <br>
                  <hr class="featurette-divider">
                  <br>
                  <div class="row">
                    <div class="col-sm-6 form-group">
                      <label for="judet" class="form-label">Județ</label>
                      <select class="form-select" name="judetA" id="judet" required value="">
                        <option value=""></option>
                      </select>
                    </div>
                    <div class="col-sm-6 form-group">

                      <label for="oras" class="form-label">Oraș</label>
                      <select class="form-select" name="orasA" id="oras" required value="">
                        <option value=""></option>
                        </select>
                    </div>
                  </div>
                <hr class="featurette-divider">
                <br>
                <button type="submit" name="btnAct" class="btn btn-lg btn-outline-dark" style="margin:auto; display:block; width:50%">Semnalează acțiune</button>
                <br><br><br>
                </div>
              </form>
            </div>
        </div>
</div>

<div class="col" align="left">
  <br><br>
    <img src="Imagini\ActiuneNoua\map.jpg" width="600px" height="500px"/>
</div>

</div>

  <!-- FOOTER
  <footer class="container">
    <p class="float-end"><a href="#" style="color:#9059D9;">Back to top</a></p>
    <p>&copy; Kiss Flavia &middot; </p>
  </footer>-->
</main>
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
        $('#datepicker').datepicker("setDate", new Date());
        $('#datepicker2').datepicker({
            maxViewMode: 2,
            language: "ro",
            orientation: "bottom left",
            weekStart: 1,
            daysOfWeekHighlighted: "6,0",
            autoclose: true,
            todayHighlight: true
        });
        $('#datepicker2').datepicker("setDate", new Date());
    </script>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
