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
$id = $email = $parolaveche = $parolanoua = $parolanoua2 = "";

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    do
    {
        // Preluam datele
        $id = $_SESSION["id"];
        $email = $_POST["email"];
        $parolaveche = $_POST["parolaveche"];
        $parolanoua = $_POST["parolanoua"];
        $parolanoua2 = $_POST["parolanoua2"];

        if (strcmp($parolanoua, $parolanoua2) != 0)
        {
            $_SESSION["resp"] = "Parolele noi nu corespund!";

            echo "Parolele noi nu corespund!<br>";
            // Redirectionam catre contul meu
            header("location: ../contulmeu.php");
            break;
        }

        if (strcmp($parolaveche, $parolanoua) == 0)
        {
            $_SESSION["resp"] = "Parola noua nu poate fi identica cu cea veche!";

            echo "Parola noua nu poate fi identica cu cea veche!<br>";
            // Redirectionam catre contul meu
            header("location: ../contulmeu.php");
            break;
        }

        if ($_SESSION["tip"] == "voluntar")
        {
            $sql1 = "SELECT email,parola FROM voluntar WHERE idVoluntar = " . $id;
            $sql2 = "UPDATE voluntar SET parola = ? WHERE idVoluntar = ?";
        }
        else
        {
            if ($_SESSION["tip"] == "organizatie")
            {
                $sql1 = "SELECT email,parola FROM organizatie WHERE idOrganizatie = " . $id;
                $sql2 = "UPDATE organizatie SET parola = ? WHERE idOrganizatie = ?";
            }
            else
            {
                //Distrugem sesiunea si redirectionam utilizatorul catre pagina de pornire
                $_SESSION = array();
                session_destroy();
                header("location: ../paginaPrincipala.php");
                break;
            }
        }
        // Validam parola veche
        $result = mysqli_query($link, $sql1);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck == 1)
        {
            $row = mysqli_fetch_assoc($result);
            $em = $row["email"];
            $pswd = $row["parola"];
            echo $em . " " . $pswd;

            if (strcmp($em, $email) != 0)
            {
                $_SESSION["resp"] = "Nu a fost introdus emailul bun.";
                echo "Nu a fost introdus emailul bun.<br>";
                header("location: ../contulmeu.php");
                break;
            }

            if (password_verify($parolaveche, $pswd))
            {
                // Daca totul este ok, actualizam parola
                if ($stmt = mysqli_prepare($link, $sql2))
                {

                    $hashed_password = password_hash($parolanoua, PASSWORD_DEFAULT); // Codam parola
                    mysqli_stmt_bind_param($stmt, "sd", $hashed_password, $id);

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
                    break;
                }
            }
            else
            {
                $_SESSION["resp"] = "Parola veche nu corespunde!";
                header("location: ../contulmeu.php");
                break;
            }
        }
        else
        {
            $_SESSION["resp"] = "Oops! Ceva nu a mers bine! Va rog sa reveniti mai tarziu";
            header("location: ../contulmeu.php");
            break;
        }

        mysqli_close($link);
        // Redirectionam catre contul meu
        header("location: ../contulmeu.php");
        break;
    }
    while (0);
}

?>
