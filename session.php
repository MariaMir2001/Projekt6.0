<?php



if (
    $_SERVER["REQUEST_METHOD"] === "POST" //überprüft ob du submit gedrückt hast
    && isset($_POST["logout"]) //wenn logout geklickt wird
    && $_POST["logout"] === "true"
) {
    echo "<pre>";
    print_r($_SERVER);
    "</pre>";
    session_destroy();
    header("Registrierung.php");
    //header
    //die();
}



if (
    $_SERVER["REQUEST_METHOD"] === "POST" //überprüft ob du angemeldet bleiben möchtest (nach Login als Admin)
    && isset($_POST["weiter"]) 
    && $_POST["weiter"] === "true"
) {
   
    

   // session_destroy();
    header("Registrierung.php");
    //header
    //die();
}




if ($_SERVER["REQUEST_METHOD"] == "POST") { //wenn das Formular submitted wurde und die Daten richtig eingegeben wurden für den Login 
    if (
        isset($_POST["username"])
        && isset($_POST["password1"])
        && ($_POST["username"] === "admin"
            && $_POST["password1"] === "admin"
        )
    ) {
        $_SESSION["name"] = $_POST["username"];
        $_SESSION["password"]=$_POST["password1"];

      }
}


$errors = [];
$errors["mail"] = false;
$errors["username"] = false;
$errors["agree"] = false;
$errors["password1"] = false; 


if ($_SERVER["REQUEST_METHOD"] == "POST") { //wenn das Formular submitted wurde
   
    if (empty($_POST["mail"])) {
        $errors["mail"] = true;
    }

    
    if (empty($_POST["username"])) {
        $errors["username"] = true;
    }

    if (empty($_POST["password1"])) {
        $errors["password1"] = true;
    }

    if (!isset($_POST["agree"])) { //wenn das Formular submitted wurde und die AGB nicht akzeptiert wurde
        $errors["agree"] = true;
    }
}




?>