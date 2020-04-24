<!DOCTYPE HTML>
<html>
  
  <head>
    <title>todoadd</title>
  </head>
  
  <body>
  
  <form action="todos.php" >
    
  <input type = "submit" value = "OK">
  </form>
  </body>
  
</html>


<?php 
header('Location: todos.php');
session_start();
require 'rb.php';
R::setup('mysql:host=localhost;dbname=login', 'root', '');
$title_entry = $_POST["title"];
$lid= $_SESSION['lid'];
$td = R::dispense('todo'); 
$td->title = $title_entry;
$td->listid = $lid;
if($listid = R::store($td)){
    R::close();
    echo"Todo hinzugefügt";
}
else{
    echo"Todo konnte nicht hinzugefügt werden";
}

 
  



?>