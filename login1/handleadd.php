<!DOCTYPE HTML>
<html>
  
  <head>
    <title>Registrierung</title>
  </head>
  
  <body>

	
  </body>
  
</html>




<?php 
 $benutzer = $_POST["Benutzer"];
 $passwort = $_POST["Passwort"];



 $mysqli = new mysqli('localhost', 'test', '123', 'anmeldung');
 if ($mysqli->connect_errno) {
  die('Verbindungsfehler (' . $mysqli->connect_errno. ') ' . $mysqli->connect_error);
 }

  $sql = "INSERT INTO `benutzer`(`Benutzername`, `Passwort`) VALUES ('$benutzer','$passwort')";
  $result = $mysqli->query($sql);
  echo "Erfolgreich registriert!";


$mysqli->close();

?>

