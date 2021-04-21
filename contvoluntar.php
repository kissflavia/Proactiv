<?php
    // Include config file
    require_once "config.php";

    // Define variables and initialize with empty values
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

        //verificam emailul
        $sql = "SELECT idVoluntar FROM voluntar WHERE email = \"".$email."\"";
        $sql2 = "SELECT idOrganizatie FROM organizatie WHERE email = \"".$email."\"";
        $result = mysqli_query($link, $sql);
        $result2 = mysqli_query($link, $sql2);
        $resultCheck = mysqli_num_rows($result);
        $resultCheck2 = mysqli_num_rows($result2);
        if ($resultCheck > 0 || $resultCheck2 > 0){
            $email_err = "Acest e-mail este deja utilizat";
        }
          //verificam parola
          if($password != $confirm_password){
              $confirm_password_err = "Parolele nu se potrivesc";
          }
          // Check input errors before inserting in database
          if(empty($email_err) && empty($confirm_password_err)){

            // Prepare an insert statement
            $sql = "INSERT INTO voluntar (idVoluntar,nume,prenume,dataN,judet,oras,email,parola) VALUES (?,?,?,?,?,?,?,?)";

            if($stmt = mysqli_prepare($link, $sql)){
                $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "dsssssss", $id, $nume, $prenume, $datan, $judet, $oras, $email, $hashed_password);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    header("location: paginaPrincipala.php");
                } else{
                  echo '<script type="text/javascript">
                      window.onload = function () { alert("Oops! Ceva nu a mers bine! Va rog sa reveniti mai tarziu"); }
                      </script>';
                }

                // Close statement
                mysqli_stmt_close($stmt);
              }

          }
          // Close connection
          mysqli_close($link);
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="Imagini\logo.png">

    <title>Cont nou - VOLUNTAR</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="assets/dist/css/carousel.css" rel="stylesheet">
    <link href="assets/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"/>

    <style>
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
        <a  href="paginaPrincipala.php"><img src="Imagini\proactiv.png" width="150px" height="40px" class="d-inline-block align-top" alt=""></a>
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
                      <select class="form-select" name="judetV" id="judet" value="<?php echo $judet; ?>" required>
                        <option value="<?php echo $judet; ?>"></option>
                        <option>Optiunea 1</option>
                        <option>Optiunea 2</option>
                        <option>Optiunea 3</option>
                      </select>
      							</div>
      							<div class="col-sm-6 form-group">
                      <br>
                      <label for="oras" class="form-label">Oraș</label>
                      <select name="orasV" id="oras" required class="form-select" value="<?php echo $oras; ?>">
                        <option value="<?php echo $oras; ?>"></option>
                        <option>Optiunea 1</option>
                        <option>Optiunea 2</option>
                        <option>Optiunea 3</option>
                        </select>
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

      					<button type="submit" name="btnVol" class="btn btn-lg btn-outline-dark" style="margin:auto; display:block; width:50%">Submit</button>
                <br><br><br>
      					</div>
      				</form>
      			</div>
      	</div>
	</div>
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
  </script>
</body>
</html>
<!-- end document-->
