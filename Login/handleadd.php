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


 R::setup('mysql:host=localhost;dbname=anmeldung', 'test', '123');
 //$mysqli = new mysqli('localhost', 'test', '123', 'anmeldung');
 //if ($mysqli->connect_errno) {
  //die('Verbindungsfehler (' . $mysqli->connect_errno. ') ' . $mysqli->connect_error);
 //}
  $b = R::dispense('benutzer'); 
  //$sql = "INSERT INTO `benutzer`(`Benutzername`, `Passwort`) VALUES ('$benutzer','$passwort')";
  $b->Benutzername = $benutzer;
  $b->Passwort = $passwort;
  //$result = $mysqli->query($sql);
  echo "Erfolgreich registriert!";
  $id = R::store($b);

  R::close();
//$mysqli->close();

?>

