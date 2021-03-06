<?php
    // Includem fisierul config al bazei de date
    require_once "config.php";

    // Definim si initializam variabilele
    $nume = $prenume = $datan = $judet= $oras = $email = $password = $confirm_password = "";
    $email_err = $confirm_password_err = "";

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $id=NULL;
        $nume = $_POST["numeV"];
        $prenume = $_POST["prenumeV"];
        $datan = $_POST["datanV"];
        $judet= $_POST["judetV"];
        $oras = $_POST["orasV"];
        $email = $_POST["emailV"];
        $password = $_POST["pswV"];
        $confirm_password = $_POST["psw2V"];

        // Verificam emailul
        $sql = "SELECT idVoluntar FROM voluntar WHERE email = \"".$email."\"";
        $sql2 = "SELECT idOrganizatie FROM organizatie WHERE email = \"".$email."\"";
        $result = mysqli_query($link, $sql);
        $result2 = mysqli_query($link, $sql2);
        $resultCheck = mysqli_num_rows($result);
        $resultCheck2 = mysqli_num_rows($result2);
        if ($resultCheck > 0 || $resultCheck2 > 0){
            $email_err = "Acest e-mail este deja utilizat";
        }
        // Verificam parola
        if($password != $confirm_password){
            $confirm_password_err = "Parolele nu se potrivesc";
        }
        // Verificam lipsa erorilor inainte de a insera datele in baza de date
        if(empty($email_err) && empty($confirm_password_err)){
          // Statement-ul de insert
          $sql = "INSERT INTO voluntar (idVoluntar,nume,prenume,dataN,judet,oras,email,parola) VALUES (?,?,?,?,?,?,?,?)";

          if($stmt = mysqli_prepare($link, $sql)){
              $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Transformam parola in hash code
              mysqli_stmt_bind_param($stmt, "dsssssss", $id, $nume, $prenume, $datan, $judet, $oras, $email, $hashed_password);

              // Executam statement-ul
              if(mysqli_stmt_execute($stmt)){
                  // Redirectionam catre pagina principala
                  header("location: paginaPrincipala.php");
              } else{
                echo '<script>alert("Oops! Ceva nu a mers bine! Va rog sa reveniti mai tarziu");</script>';
              }
              // Inchidem statement-ul
              mysqli_stmt_close($stmt);
            }
        }
        // Inchidem conexiunea
        mysqli_close($link);
      }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/imagini\logo.png">

    <title>Cont nou - VOLUNTAR</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="assets/dist/css/carousel.css" rel="stylesheet">
    <link href="assets/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"/>

    <style>
        ::-webkit-scrollbar {
            display: none;
        }
        .datepicker {
            font-size: 0.875em;
        }
        .datepicker td, .datepicker th {
            width: 2em;
            height: 2em;
        }
      @font-face {
        font-family: Ubuntu-Regular;
        src: url('assets/dist/fonts/ubuntu/Ubuntu-Regular.ttf');
      }
      html, body {
        font-family: Ubuntu-Regular;
        max-width: 100%;
      }
    </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a  href="paginaPrincipala.php"><img src="./assets/imagini\proactiv.png" width="150px" height="40px" class="d-inline-block align-top" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        </div>
      </div>
    </nav>
  </header>

  <div class="container">
    <br><br><br>
    <h3 class="text-muted">Cont nou <span class="featurette-heading">VOLUNTAR</span></h3>
    <br>
      <div class="col-lg-12 well">
      	<div class="row">
      				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      					<div class="col-sm-12">
      						<div class="row">
      							<div class="col-sm-6 form-group">
      								<label>Nume</label>
      								<input type="text" name="numeV" class="form-control" required value="<?php echo $nume; ?>">
      							</div>
      							<div class="col-sm-6 form-group">
      								<label>Prenume</label>
      								<input type="text" name="prenumeV" class="form-control" required value="<?php echo $prenume; ?>">
      							</div>
      						</div>
                  <br>
                  <div class="form-group">
      							<label>Data nașterii</label>
                    <br>
                    <input class="form-control" name="datanV" data-date-format="dd/mm/yyyy" id="datepicker" value="<?php echo $datan; ?>">
      						</div>

                  <div class="row">
      							<div class="col-sm-6 form-group">
                      <br>
                      <label for="judet" class="form-label">Județ</label>
                      <select class="form-select"  name="judetV" id="judet" required>
                    		<option></option>
                    		<option>Alba</option>
                    		<option>Arad</option>
                    		<option>Argeş</option>
                    		<option>Bacău</option>
                    		<option>Bihor</option>
                    		<option>Bistriţa-Năsăud</option>
                    		<option>Botoşani</option>
                    		<option>Brăila</option>
                    		<option>Braşov</option>
                    		<option>Bucureşti</option>
                    		<option>Buzău</option>
                    		<option>Călăraşi</option>
                    		<option>Caraş-Severin</option>
                    		<option>Cluj</option>
                    		<option>Constanţa</option>
                    		<option>Covasna</option>
                    		<option>Dâmboviţa</option>
                    		<option>Dolj</option>
                    		<option>Galaţi</option>
                    		<option>Giurgiu</option>
                    		<option>Gorj</option>
                    		<option>Harghita</option>
                    		<option>Hunedoara</option>
                    		<option>Ialomiţa</option>
                    		<option>Iaşi</option>
                    		<option>Ilfov</option>
                    		<option>Maramureş</option>
                    		<option>Mehedinţi</option>
                    		<option>Mureş</option>
                    		<option>Neamţ</option>
                    		<option>Olt</option>
                    		<option>Prahova</option>
                    		<option>Sălaj</option>
                    		<option>Satu Mare</option>
                    		<option>Sibiu</option>
                    		<option>Suceava</option>
                    		<option>Teleorman</option>
                    		<option>Timiş</option>
                    		<option>Tulcea</option>
                    		<option>Vâlcea</option>
                    		<option>Vaslui</option>
                    		<option>Vrancea</option>
                      </select>
      							</div>
      							<div class="col-sm-6 form-group">
                      <br>
                      <label for="oras" class="form-label">Oraș</label>
                      <select class="form-select" name="orasV" id="oras" required></select>
      							</div>
      						</div>

                  <hr class="featurette-divider">

                  <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="emailV" required class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                  </div>
                  <div class="row">
      							<div class="col-sm-6 form-group">
                      <br>
      								<label>Parolă</label>
      								<input type="password" name="pswV" required class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
      							</div>
      							<div class="col-sm-6 form-group">
                      <br>
      								<label>Confirmă parola</label>
      								<input type="password" name="psw2V" required class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                      <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
      							</div>
      						</div>

                <hr class="featurette-divider">

      					<button type="submit" name="btnVol" class="btn btn-lg btn-outline-dark" style="margin:auto; display:block; width:50%">Creează cont</button>
                <br><br><br>
      					</div>
      				</form>
      			</div>
      	</div>
	</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
  jQuery(function($) {
    var oras = {
        'Alba':['Abrud','Alba Iulia','Baia de Arieş','Câmpeni','Cugir','Ocna Mureş','Teiuş','Zlatna'],
    		'Arad':['Arad','Chişineu Criş','Curtici','Ineu','Lipova','Nădlac','Pâncota','Pecica','Sântana','Sebiş','Vladimirescu'],
    		'Argeş':['Costeşti','Mioveni','Piteşti','Ştefăneşti','Topoloveni'],
    		'Bacău':['Bacău','Buhuşi','Comăneşti','Dărmăneşti','Slănic-Moldova','Târgu Ocna'],
    		'Bihor':['Aleşd','Borş','Doctor Petru Groza','Oradea','Săcueni','Salonta','Valea lui Mihai'],
    		'Bistriţa-Năsăud':['Beclean','Bistriţa','Năsăud','Sângeorz-Băi'],
    		'Botoşani':['Botoşani','Bucecea','Darabani','Flămânzi','Săveni','Ştefăneşti'],
    		'Brăila':['Brăila','Făurei','Ianca','Însurăţei'],
    		'Braşov':['Braşov','Ghimbav','Predeal','Râşnov','Rupea','Victoria','Zărneşti'],
    		'Bucureşti':['Bucureşti','Voluntari'],
    		'Buzău':['Buzău','Nehoiu','Pătârlagele','Pogoanele'],
    		'Călăraşi':['Budeşti','Călăraşi','Fundulea','Lehliu-Gară','Olteniţa'],
    		'Caraş-Severin':['Anina','Băile Herculane','Bocşa','Moldova Nouă','Oraviţa','Oţelu Roşu','Pojejena','Reşiţa'],
    		'Cluj':['Cluj-Napoca','Huedin'],
    		'Constanţa':['Constanţa','Hârşova','Lipniţa','Murfatlar','Năvodari','Negru Vodă','Ostrov','Ovidiu','Techirghiol'],
    		'Covasna':['Baraolt','Covasna','Întorsura Buzăului','Sfântu-Gheorghe'],
    		'Dâmboviţa':['Fieni','Găeşti','Pucioasa','Răcari','Târgovişte','Titu'],
    		'Dolj':['Bechet','Calafat','Craiova','Dăbuleni','Filiaşi','Segarcea'],
    		'Galaţi':['Bereşti-Târg','Bujor','Galaţi'],
    		'Giurgiu':['Bolintin Vale','Giurgiu','Mihăileşti'],
    		'Gorj':['Bumbeşti-Jiu','Novaci-Străini','Rovinari','Târgu Cărbuneşti','Târgu Jiu','Ţicleni','Tismana','Turceni'],
    		'Harghita':['Bălan','Cristuru Secuiesc','Miercurea-Ciuc','Vlăhiţa'],
    		'Hunedoara':['Aninoasa','Călan','Deva','Geoagiu','Haţeg','Hunedoara','Petrila','Simeria','Uricani'],
    		'Ialomiţa':['Amara','Căzăneşti','Cernavodă','Slobozia','Ţăndărei'],
    		'Iaşi':['Hârlău','Iaşi','Podu Iloaiei','Târgu Frumos','Ungheni-Prut','Victoria'],
    		'Ilfov':['Bragadiru','Buftea','Chitila','Fierbinţi-Târg','Măgurele','Otopeni','Pantelimon','Popeşti-Leordeni'],
    		'Maramureş':['Baia Mare','Baia-Sprie','Borşa','Cavnic','Dragomireşti','Săliştea de Sus','Seini','Sighetu Marmaţiei','Şomcuta Mare','Târgu Lăpuş','Tăuţii Măgheruş','Ulmeni','Vişeu de Sus'],
    		'Mehedinţi':['Baia de Aramă','Drobeta-Turnu Severin','Orşova','Strehaia','Vânju-Mare'],
    		'Mureş':['Iernut','Luduş','Miercurea Nirajului','Sângeorgiu de Pădure','Sărmaşu','Sovata','Târgu-Mureş','Ungheni'],
    		'Neamţ':['Bicaz','Piatra Neamţ','Roznov','Târgu Neamţ'],
    		'Olt':['Balş','Corabia','Drăgăneşti-Olt','Piatra Olt','Potcoava','Scorniceşti','Slatina'],
    		'Prahova':['Azuga','Băicoi','Boldeşti-Scăeni','Breaza','Buşteni','Comarnic','Mizil','Ploieşti','Plopeni','Sinaia','Slănic','Urlaţi','Vălenii de Munte'],
    		'Sălaj':['Cehu Silvaniei','Jibou','Şimleu Silvaniei','Zalău'],
    		'Satu Mare':['Ardud','Carei','Dorolţ','Livada','Negreşti-Oaş','Satu Mare','Tăşnad'],
    		'Sibiu':['Agnita','Avrig','Cisnădie','Copşa Mică','Dumbrăveni','Miercurea Sibiului','Ocna Sibiului','Sălişte','Sibiu','Tălmaciu'],
    		'Suceava':['Broşteni','Cajvana','Dolhasca','Frasin','Gura Humorului','Liteni','Milişăuţi','Salcea','Siret','Suceava','Vicovu de Sus'],
    		'Teleorman':['Alexandria','Turnu Măgurele','Videle','Zimnicea'],
    		'Timiş':['Buziaş','Cenad','Ciacova','Comloşu Mare','Deta','Făget','Gătaia','Ictar Budinţi','Jamu Mare','Jimbolia','Sânnicolau Mare','Timişoara'],
    		'Tulcea':['Babadag','Isaccea','Măcin','Sulina','Tulcea'],
    		'Vâlcea':['Băbeni','Băile Olăneşti','Bălceşti','Berbeşti','Brezoi','Călimăneşti','Horezu','Ocnele Mari','Râmnicu Vâlcea'],
    		'Vaslui':['Drânceni','Fălciu','Murgeni','Negreşti','Vaslui'],
    		'Vrancea':['Focşani','Mărăşeşti','Odobeşti','Panciu'],
      }

      var $oras = $('#oras');
      $('#judet').change(function () {
          var judet = $(this).val(), lcns = oras[judet] || [];
          var html = $.map(lcns, function(lcn){
              return '<option value="' + lcn + '">' + lcn + '</option>'
          }).join('');
          $oras.html(html)
      });
    });
  </script>
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
      $('#datepicker').datepicker('setDate', new Date());
  </script>
</body>
</html>
<!-- end document-->
