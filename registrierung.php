<?php

$errors = [];
$errors["fn"] = false;
$errors["ln"] = false;
$errors["mail"] = false;
$errors["username"] = false;
$errors["agree"] = false;
$errors["password1"] = false; //wieso funktioniert das mit dem Passwort nicht ?? 
$errors["password2"] = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") { //wenn das Formular submitted wurde
    if (empty($_POST["fn"])) { //wenn firstname leer gelassen wird --> Fehlermeldung
        $errors["fn"] = true;
    }

    if (empty($_POST["ln"])) { //wenn lastname leer gelassen wird --> Fehlermeldung
        $errors["ln"] = true;
    }

    if (empty($_POST["mail"])) {
        $errors["mail"] = true;
    }
    if (empty($_POST["username"])) {
        $errors["username"] = true;
    }

    if (empty($_POST["password1"])) {
        $errors["password1"] = true;
    }


    if (empty($_POST["password2"])) {
        $errors["password2"] = true;
    }


    if (!isset($_POST["agree"])) { //wenn das Formular submitted wurde und die AGB nicht akzeptiert wurde
        $errors["agree"] = true;
    }

  
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $pw1 = $_POST["password1"];

    $pw2 = $_POST["password2"];
    $error = "Die Passwörter stimmen nicht überein";

    $usernames = array("admin");

    $usernames_length = count($usernames);

    $uname = $_POST["username"];
    $uname_err = "Dieser Username ist schon vergeben. Bitte versuchen Sie es erneut";
}
?>



<!DOCTYPE html>

<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Registrierung</title>
</head>
<body>


<?php include "bootstrap_snippets.php"; ?>  
      

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Registrierung</h1>
            </div>
        </div>
        <form method="post">

            <!--- Anrede !--->

            <div class="form-floating mb-3">
                <label for="salutation"></label>
                <!--- Ich wusste nicht, wie ich das anders machen soll --->
                <select class="form-control" name="salutation" id="salutation">
                    <option value="Frau">Frau</option>
                    <option value="Herr">Herr</option>
                </select>
            </div>

            <!--- Vorname !--->
            <div class="form-floating mb-3">
                <input type="text" class="form-control <?php if ($errors['fn']) echo 'is-invalid'; ?>" name="fn" id="fn" placeholder="Max">
                <label for="fn">Vorname</label>
            </div>

            <!--- Nachname !--->
            <div class="form-floating mb-3">
                <input type="text" class="form-control <?php if ($errors['ln']) echo 'is-invalid'; ?>" name="ln" id="ln" placeholder="Mustermann">
                <label for="ln">Nachname</label>
            </div>


            <!--- Email - Adresse  !--->
            <div class="form-floating mb-3">
                <input type="email" class="form-control <?php if ($errors['mail']) echo 'is-invalid'; ?>" name="mail" id="mail" placeholder="MaxM@gmx.com">
                <label for="mail">E-Mail</label>
            </div>

            <!--- Username !--->
            <div class="form-floating mb-3">
                <input type="text" class="form-control <?php if ($errors['username']) echo 'is-invalid'; ?> " name="username" id="username" placeholder="Username">
                <?php

                if (isset($usernames)) {
                    if (isset($usernames_length)) {
                        if (isset($uname)) {
                            if (isset($uname_err)) {
                                for ($i = 0; $i < $usernames_length; $i++) {
                                    if ($usernames[$i] == $uname) {
                                        echo $uname_err;
                                        break;
                                    } else {
                                        $usernames[] = $uname;
                                    }
                                }
                            }
                        }
                    }
                }
                ?>

                <label for="username">Username</label>

            </div>
            <!--- Passwort 1 --->

            <div class="form-floating mb-3">
                <input type="password" name="password1" id="password1" class="form-control <?php if ($errors['password1']) echo 'is-invalid';
                                                                                            if (isset($pw1)) {

                                                                                                if (isset($pw2)) {
                                                                                                    if ($pw1 != $pw2) {
                                                                                                        echo '<span style= color:red;">' . $error . '</span>';
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                            ?>">
                <label for="password1">Passwort</label>
            </div>


            <!--- Passwort 2 !--->
            <div class="form-floating mb-3">
                <input type="password" class="form-control <?php if ($errors['password2']) echo 'is-invalid'; ?>" name="password2" id="password2">
                <label for="password2">Bitte Passwort erneut angeben</label>
            </div>

            <!--- AGB Button--->
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input <?php if ($errors['agree']) echo 'is-invalid'; ?>" name="agree" id="agree">
                <label class="form-check-label" for="agree">Hiermit bestätige ich die AGB's gelesen und verstanden zu haben.</label>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>


</body>

</html>
