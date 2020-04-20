<!DOCTYPE HTML>
<html>
  
  <head>
    <title>Login</title>
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
  $password_entry = $_POST["password_entry"];
  R::setup('mysql:host=localhost;dbname=login', 'root', '');
  
  if ($dbobj = R::findOne('user', 'username = ?', [$user_entry])) {
    if (password_verify($password_entry, $dbobj->password) and $user_entry == $dbobj->username) {
      echo "Login sucessfull";
    }
    else {
    echo "Wrong password!";
    };
  }
  else {
    echo "Username doesn't exist";
  }
  
  
  
  

  


?>

