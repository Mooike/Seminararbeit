<!DOCTYPE HTML>
<html>
  
  <head>
    <title>Registration</title>
  </head>
  
  <body>

  <form action="handleLogin.html">
    <input type = "submit" value = "Back">
  </form>
  </body>
  
</html>




<?php 
require 'rb.php';
 $user_entry = $_POST["user_entry"];
 $password_entry = password_hash($_POST["password_entry"], PASSWORD_DEFAULT);//hash password

 R::setup('mysql:host=localhost;dbname=login', 'root', '');
  $u = R::dispense('user'); 
  
  $u->username = $user_entry;
  $u->password = $password_entry;

  $id = R::store($u);

  R::close();

  echo "Registrierung erfolgreich!"


?>

