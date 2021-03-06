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
      							<label>Data na??terii</label>
                    <br>
                    <input class="form-control" name="datanV" data-date-format="dd/mm/yyyy" id="datepicker" value="<?php echo $datan; ?>">
      						</div>

                  <div class="row">
      							<div class="col-sm-6 form-group">
                      <br>
                      <label for="judet" class="form-label">Jude??</label>
                      <select class="form-select"  name="judetV" id="judet" required>
                    		<option></option>
                    		<option>Alba</option>
                    		<option>Arad</option>
                    		<option>Arge??</option>
                    		<option>Bac??u</option>
                    		<option>Bihor</option>
                    		<option>Bistri??a-N??s??ud</option>
                    		<option>Boto??ani</option>
                    		<option>Br??ila</option>
                    		<option>Bra??ov</option>
                    		<option>Bucure??ti</option>
                    		<option>Buz??u</option>
                    		<option>C??l??ra??i</option>
                    		<option>Cara??-Severin</option>
                    		<option>Cluj</option>
                    		<option>Constan??a</option>
                    		<option>Covasna</option>
                    		<option>D??mbovi??a</option>
                    		<option>Dolj</option>
                    		<option>Gala??i</option>
                    		<option>Giurgiu</option>
                    		<option>Gorj</option>
                    		<option>Harghita</option>
                    		<option>Hunedoara</option>
                    		<option>Ialomi??a</option>
                    		<option>Ia??i</option>
                    		<option>Ilfov</option>
                    		<option>Maramure??</option>
                    		<option>Mehedin??i</option>
                    		<option>Mure??</option>
                    		<option>Neam??</option>
                    		<option>Olt</option>
                    		<option>Prahova</option>
                    		<option>S??laj</option>
                    		<option>Satu Mare</option>
                    		<option>Sibiu</option>
                    		<option>Suceava</option>
                    		<option>Teleorman</option>
                    		<option>Timi??</option>
                    		<option>Tulcea</option>
                    		<option>V??lcea</option>
                    		<option>Vaslui</option>
                    		<option>Vrancea</option>
                      </select>
      							</div>
      							<div class="col-sm-6 form-group">
                      <br>
                      <label for="oras" class="form-label">Ora??</label>
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
      								<label>Parol??</label>
      								<input type="password" name="pswV" required class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
      							</div>
      							<div class="col-sm-6 form-group">
                      <br>
      								<label>Confirm?? parola</label>
      								<input type="password" name="psw2V" required class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                      <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
      							</div>
      						</div>

                <hr class="featurette-divider">

      					<button type="submit" name="btnVol" class="btn btn-lg btn-outline-dark" style="margin:auto; display:block; width:50%">Creeaz?? cont</button>
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
        'Alba':['Abrud','Alba Iulia','Baia de Arie??','C??mpeni','Cugir','Ocna Mure??','Teiu??','Zlatna'],
    		'Arad':['Arad','Chi??ineu Cri??','Curtici','Ineu','Lipova','N??dlac','P??ncota','Pecica','S??ntana','Sebi??','Vladimirescu'],
    		'Arge??':['Coste??ti','Mioveni','Pite??ti','??tef??ne??ti','Topoloveni'],
    		'Bac??u':['Bac??u','Buhu??i','Com??ne??ti','D??rm??ne??ti','Sl??nic-Moldova','T??rgu Ocna'],
    		'Bihor':['Ale??d','Bor??','Doctor Petru Groza','Oradea','S??cueni','Salonta','Valea lui Mihai'],
    		'Bistri??a-N??s??ud':['Beclean','Bistri??a','N??s??ud','S??ngeorz-B??i'],
    		'Boto??ani':['Boto??ani','Bucecea','Darabani','Fl??m??nzi','S??veni','??tef??ne??ti'],
    		'Br??ila':['Br??ila','F??urei','Ianca','??nsur????ei'],
    		'Bra??ov':['Bra??ov','Ghimbav','Predeal','R????nov','Rupea','Victoria','Z??rne??ti'],
    		'Bucure??ti':['Bucure??ti','Voluntari'],
    		'Buz??u':['Buz??u','Nehoiu','P??t??rlagele','Pogoanele'],
    		'C??l??ra??i':['Bude??ti','C??l??ra??i','Fundulea','Lehliu-Gar??','Olteni??a'],
    		'Cara??-Severin':['Anina','B??ile Herculane','Boc??a','Moldova Nou??','Oravi??a','O??elu Ro??u','Pojejena','Re??i??a'],
    		'Cluj':['Cluj-Napoca','Huedin'],
    		'Constan??a':['Constan??a','H??r??ova','Lipni??a','Murfatlar','N??vodari','Negru Vod??','Ostrov','Ovidiu','Techirghiol'],
    		'Covasna':['Baraolt','Covasna','??ntorsura Buz??ului','Sf??ntu-Gheorghe'],
    		'D??mbovi??a':['Fieni','G??e??ti','Pucioasa','R??cari','T??rgovi??te','Titu'],
    		'Dolj':['Bechet','Calafat','Craiova','D??buleni','Filia??i','Segarcea'],
    		'Gala??i':['Bere??ti-T??rg','Bujor','Gala??i'],
    		'Giurgiu':['Bolintin Vale','Giurgiu','Mih??ile??ti'],
    		'Gorj':['Bumbe??ti-Jiu','Novaci-Str??ini','Rovinari','T??rgu C??rbune??ti','T??rgu Jiu','??icleni','Tismana','Turceni'],
    		'Harghita':['B??lan','Cristuru Secuiesc','Miercurea-Ciuc','Vl??hi??a'],
    		'Hunedoara':['Aninoasa','C??lan','Deva','Geoagiu','Ha??eg','Hunedoara','Petrila','Simeria','Uricani'],
    		'Ialomi??a':['Amara','C??z??ne??ti','Cernavod??','Slobozia','????nd??rei'],
    		'Ia??i':['H??rl??u','Ia??i','Podu Iloaiei','T??rgu Frumos','Ungheni-Prut','Victoria'],
    		'Ilfov':['Bragadiru','Buftea','Chitila','Fierbin??i-T??rg','M??gurele','Otopeni','Pantelimon','Pope??ti-Leordeni'],
    		'Maramure??':['Baia Mare','Baia-Sprie','Bor??a','Cavnic','Dragomire??ti','S??li??tea de Sus','Seini','Sighetu Marma??iei','??omcuta Mare','T??rgu L??pu??','T??u??ii M??gheru??','Ulmeni','Vi??eu de Sus'],
    		'Mehedin??i':['Baia de Aram??','Drobeta-Turnu Severin','Or??ova','Strehaia','V??nju-Mare'],
    		'Mure??':['Iernut','Ludu??','Miercurea Nirajului','S??ngeorgiu de P??dure','S??rma??u','Sovata','T??rgu-Mure??','Ungheni'],
    		'Neam??':['Bicaz','Piatra Neam??','Roznov','T??rgu Neam??'],
    		'Olt':['Bal??','Corabia','Dr??g??ne??ti-Olt','Piatra Olt','Potcoava','Scornice??ti','Slatina'],
    		'Prahova':['Azuga','B??icoi','Bolde??ti-Sc??eni','Breaza','Bu??teni','Comarnic','Mizil','Ploie??ti','Plopeni','Sinaia','Sl??nic','Urla??i','V??lenii de Munte'],
    		'S??laj':['Cehu Silvaniei','Jibou','??imleu Silvaniei','Zal??u'],
    		'Satu Mare':['Ardud','Carei','Dorol??','Livada','Negre??ti-Oa??','Satu Mare','T????nad'],
    		'Sibiu':['Agnita','Avrig','Cisn??die','Cop??a Mic??','Dumbr??veni','Miercurea Sibiului','Ocna Sibiului','S??li??te','Sibiu','T??lmaciu'],
    		'Suceava':['Bro??teni','Cajvana','Dolhasca','Frasin','Gura Humorului','Liteni','Mili????u??i','Salcea','Siret','Suceava','Vicovu de Sus'],
    		'Teleorman':['Alexandria','Turnu M??gurele','Videle','Zimnicea'],
    		'Timi??':['Buzia??','Cenad','Ciacova','Comlo??u Mare','Deta','F??get','G??taia','Ictar Budin??i','Jamu Mare','Jimbolia','S??nnicolau Mare','Timi??oara'],
    		'Tulcea':['Babadag','Isaccea','M??cin','Sulina','Tulcea'],
    		'V??lcea':['B??beni','B??ile Ol??ne??ti','B??lce??ti','Berbe??ti','Brezoi','C??lim??ne??ti','Horezu','Ocnele Mari','R??mnicu V??lcea'],
    		'Vaslui':['Dr??nceni','F??lciu','Murgeni','Negre??ti','Vaslui'],
    		'Vrancea':['Foc??ani','M??r????e??ti','Odobe??ti','Panciu'],
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
