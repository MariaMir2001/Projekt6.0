<?php

include ("admin_nav.php");

session_start();
if (isset($_SESSION["name"])) {
       
    echo "Du befindest dich in der Session vom Administrator.";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pw=$_POST["password1"];
        $user=$_SESSION["name"];
    }
}
    ?>
    <!--- Passwort 1 --->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>Stammdaten</title>
</head>
<body>

<form method="post">

<div class="form-floating mb-3">
    <?php  echo "Willkommen, bitte geben Sie ihr altes Passwort ein und darafuffolgend ihr neues Passwort."?>
   
        <input type="password" name="password1" id="password1" class="form-control">
        <label for="password1">Altes Passwort</label>
       
      
        <?php

        if(isset($pw)){
            if(isset($_SESSION['password'])){
      
         if ($pw!=$_SESSION['password']) {
            echo 'is-invalid';} }
        }
        
        ?>
                                                              
       <input type="password" name="passwordneu" id="passwordneu" class="form-control">
        <label for="password1">Neues Passwort</label>
        
        <?php
        if(isset($pw)){
            if(isset($_SESSION['password'])){
      
         if ($pw==$_SESSION['password']) { 
         if(isset($_SESSION["password"])){
            if(isset($_POST["passwordneu"])){
            $pw=$_POST["passwordneu"];
            $_SESSION["password"]=$pw;
         }
        }

        //echo $_SESSION["password"]  ,$_POST["password1"] ,$pw;
       
        echo "Passwort erfolgreich gespeichert.";
         }}}
        ?>
  <form action="startseite.php" method="POST"> 

<form method="POST">
    <input type="hidden" name="Passwort ändern" value="true">  <!--eingeloggt bleiben-->
    <button class="btn btn-primary">Passwort ändern</button>

</form>
</form>
    </div>
</body>
</html>