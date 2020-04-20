<!DOCTYPE HTML>
<html>
  
  <head>
    <title>Registrierung</title>
  </head>
  
  <body>

	
  </body>
  
</html>




<?php 
require 'rb.php';
 $benutzer = $_POST["Benutzer"];
 $passwort = password_hash($_POST["Passwort"], PASSWORD_DEFAULT);//hash password

 R::setup('mysql:host=localhost;dbname=login', 'root', '');
  $b = R::dispense('benutzer'); 
  
  $b->Benutzername = $benutzer;
  $b->Passwort = $passwort;

  $id = R::store($b);

  R::close();


?>

