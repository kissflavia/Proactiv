<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      if(isset($_POST['btnVol']))
      {
        echo "VOLUNTARUL<br>";
        echo 'Nume: ' . htmlspecialchars($_POST["numeV"]).' '. htmlspecialchars($_POST["prenumeV"])."<br>";
        echo 'Nascut in: ' . htmlspecialchars($_POST["datanV"])."<br>";
        echo 'Domiciliat in: ' . htmlspecialchars($_POST["judetV"]).' '. htmlspecialchars($_POST["orasV"])."<br>";
        echo 'Email: ' . htmlspecialchars($_POST["emailV"])."<br>";
        echo 'Parola: ' . htmlspecialchars($_POST["pswV"]).' <----> '. htmlspecialchars($_POST["psw2V"])."<br>";
      }
      if(isset($_POST['btnOrg']))
      {
        echo "ORGANIZATIA<br>";
        echo 'Denumire: ' . htmlspecialchars($_POST["numeO"])."<br>";
        echo 'CIF: ' . htmlspecialchars($_POST["cifO"])."<br>";
        echo 'Infiintata in: ' . htmlspecialchars($_POST["datanO"])."<br>";
        echo 'Cu sediul in: ' . htmlspecialchars($_POST["judetO"]).' '. htmlspecialchars($_POST["orasO"])."<br>";
        echo 'Despre: ' . htmlspecialchars($_POST["despreO"])."<br>";
        echo "<br>";
        echo 'Email: ' . htmlspecialchars($_POST["emailO"])."<br>";
        echo 'Parola: ' . htmlspecialchars($_POST["pswO"]).' <----> '. htmlspecialchars($_POST["psw2O"])."<br>";
      }

    }

?>
