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
      <title>Proactiv - Harta</title>
      <script
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHiS4zW5nQWPuHFxdDaZ4yaoQ8O4-C4Yw&callback=initMap"
         defer
         ></script>
      <script src="showharta.php"></script>
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
         <br><br><br><br><br><br>
         <div class="splitleft left">
            <div class="centered">
               <h3 style="color:#702DC8;">
               Aici poți vedea acțiunile care își caută voluntari!</h2>
               <h5 style="color:#9059D9;">
               Apasă indicatorii pentru detalii</h2>
               <br>
               <div class="col-md">
                  <label for="judet" class="form-label">Alege un anumit județ</label>
                  <select class="form-select" id="judet" required>
                     <option value=""></option>
                  </select>
               </div>
               <br>
               <div class="col-md">
                  <label for="oras" class="form-label">Alege un anumit oraș</label>
                  <select class="form-select" id="oras" required>
                     <option value=""></option>
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
      <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>
