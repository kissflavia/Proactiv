<?php
// Initializam sesiunea
session_start();
// Verificam daca utilizatorul este logat. Daca nu este il redirectionam catre pagina principala
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: paginaPrincipala.php");
    exit;
}

// Includem fisierul config al bazei de date
require_once "../config.php";

// Definim variabilele si le initializam cu valori null
$nume = $precif = $judet = $oras = $data = $despre = "";

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    // Preluam datele
    $id = $_SESSION["id"];
    $nume = $_POST["nume"];
    $precif = $_POST["precif"];
    $judet = $_POST["judet"];
    $oras = $_POST["oras"];
    $data = $_POST["data"];

    if ($_SESSION["tip"] == "voluntar")
    {
        // Actualizam datele voluntarului
        echo "Voluntar <br>" . $nume . " " . $precif . " " . $judet . " " . $oras . " " . $data;
        $sql = "UPDATE voluntar SET nume = ?, prenume = ?, judet = ?,oras = ?,dataN = ? WHERE idVoluntar = ?";

        if ($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "sssssd", $nume, $precif, $judet, $oras, $data, $id);

            // Executam statementul
            if (mysqli_stmt_execute($stmt))
            {
                $_SESSION["resp"] = "Succes!";
            }
            else
            {
                $_SESSION["resp"] = "Oops! Ceva nu a mers bine! Va rog sa reveniti mai tarziu";
            }

            // Inchidem statementul
            mysqli_stmt_close($stmt);
            mysqli_close($link);
            // Redirectionam catre contul meu
            header("location: ../contulmeu.php");
        }
    }
    else
    {
        if ($_SESSION["tip"] == "organizatie")
        {
            // Actualizam datele organizatiei
            $despre = $_POST["despre"];
            echo "organizatie <br>" . $nume . " " . $precif . " " . $judet . " " . $oras . " " . $data . " " . $despre;
            $sql = "UPDATE organizatie SET denumire = ?, cif = ?, judet = ?,oras = ?,dataI = ?, despre = ? WHERE idOrganizatie = ?";

            if ($stmt = mysqli_prepare($link, $sql))
            {
                mysqli_stmt_bind_param($stmt, "ssssssd", $nume, $precif, $judet, $oras, $data, $despre, $id);

                // Executam statementul
                if (mysqli_stmt_execute($stmt))
                {
                    $_SESSION["resp"] = "Succes!";
                }
                else
                {
                    $_SESSION["resp"] = "Oops! Ceva nu a mers bine! Va rog sa reveniti mai tarziu";
                }

                // Inchidem statementul
                mysqli_stmt_close($stmt);
                mysqli_close($link);
                // Redirectionam catre contul meu
                header("location: ../contulmeu.php");
            }
        }
        else
        {
            //Distrugem sesiunea si redirectionam utilizatorul catre pagina de pornire
            $_SESSION = array();
            session_destroy();
            header("location: ../paginaPrincipala.php");
            exit;
        }
    }

}

?>
