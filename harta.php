<?php
   // Initializam sesiunea
   session_start();

   // Verificam daca utilizatorul este logat. Daca nu este il redirectionam catre pagina principala
   if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
       header("location: paginaPrincipala.php");
       exit;
   }

   // Salvam datele pt filtre in variabilele de sesiune specifice
   if($_SERVER['REQUEST_METHOD'] == "POST"){

     $_SESSION["jud"] = $_POST["judet"];
     $_SESSION["oras"] = $_POST["oras"];
     $_SESSION["categ"] = $_POST["categ"];
   }

   // Popup pentru abonare/dezabonare
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
      <title>Proactiv - Harta</title>
      <script
         src="https://maps.googleapis.com/maps/api/js?key=INSERT_KEY&callback=initMap"
         defer
      ></script>
      <script src="./harta/showharta.php"></script>
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
                               echo "<a class=\"nav-link active\" aria-current=\"page\" href=\"#\">Hart??</a>";
                           // Cont organiza??ie -> Ac??iune nou??
                           else echo "<a class=\"nav-link active\" aria-current=\"page\" href=\"#\">Ac??iune nou??</a>";
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
         <br><br><br><br><br><br>
         <div class="splitleft left">
           <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="centered">
               <h3 style="color:#702DC8;">
               Aici po??i vedea ac??iunile care ????i caut?? voluntari!</h2>
               <h5 style="color:#9059D9;">
               Apas?? indicatorii pentru detalii</h2>
               <br>
               <div class="col-md">
                  <label for="judet" class="form-label">Alege un anumit jude??</label>
                  <select class="form-select" name="judet" id="judet">
                     <option value=""></option>
                  </select>
               </div>
               <br>
               <div class="col-md">
                  <label for="oras" class="form-label">Alege un anumit ora??</label>
                  <select class="form-select" name="oras" id="oras">
                     <option value=""></option>
                  </select>
               </div>
               <br>
               <div class="col-md">
                  <label for="categorie" class="form-label">Alege o anumit?? categorie</label>
                  <select class="form-select" name="categ" id="categorie" value="">
                     <option value=""></option>
                     <option>Cultural</option>
                     <option>Dona??ii</option>
                     <option>Educa??ional</option>
                     <option>Nutri??ie</option>
                     <option>Protec??ia mediului</option>
                     <option>Religios</option>
                     <option>Social</option>
                     <option>Sport</option>
                  </select>
               </div>
               <br><br>
               <p><button class="btn btn-outline-dark" type="submit">Aplic?? filtrele</button></p>
            </div>
          </form>

         </div>
         <div class="splitright right">
            <div id="map" class="centered">
            </div>
         </div>
      </main>
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
             // Golim dropdown-ul aferent Ora??ului
             orasSel.length = 1;
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
      <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>
