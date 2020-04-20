<!DOCTYPE HTML>
<html>
  
  <head>
    <title>Login-Mechanismus</title>
  </head>
  
  <body>

	
  </body>
  
</html>




<?php 
require 'rb.php';
 $benutzer = $_POST["Benutzer"];
 $passwort = $_POST["Passwort"];


  

 $mysqli = new mysqli('localhost', 'test', '123', 'anmeldung');
 if ($mysqli->connect_errno) {
  die('Verbindungsfehler (' . $mysqli->connect_errno. ') ' . $mysqli->connect_error);
 }

  $sql = "SELECT * FROM `benutzer` WHERE `Benutzername` = '$benutzer'";
  $result = $mysqli->query($sql);
  $rowObj = $result->fetch_object();
  

 

 if (password_verify($passwort, $rowObj->Passwort) and $benutzer == $rowObj->Benutzername) {
   echo "Login erfolgreich";
 }
else {
  echo "Falsche Eingabe";
};

$mysqli->close();

?>

