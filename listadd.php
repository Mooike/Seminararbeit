<!DOCTYPE HTML>
<html>
  
  <head>
    <title>todoadd</title>
  </head>
  
  <body>
  
  <form action="Home.php" >
    
  <input type = "submit" value = "OK">
  </form>
  </body>
  
</html>




<?php 
//header('Location: handleLogin.php');
session_start();
require 'rb.php';
R::setup('mysql:host=localhost;dbname=login', 'root', '');
$title_entry = $_POST["title"];
$uid = $_SESSION['uid'];
if ($dbobj = R::findOne('list', 'title = ? AND userid = ?' , [$title_entry, $uid])){
  echo "Listennamen bereits vergeben";
}
else {
  $l = R::dispense('list'); 
  $l->title = $title_entry;
  
  $l->userid = $uid;
  $listid = R::store($l);

  R::close();

  echo "Anlegen erfolgreich!";
}
 
  



?>