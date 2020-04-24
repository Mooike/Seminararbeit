
<!DOCTYPE HTML>
<html>
  
  <head>
    <title>Login</title>
  </head>
  
  <body>
  
	<h1>Neue Liste anlegen:</h1>
	<form action="listadd.php" method="post">
    Titel:<br>
    
    <input type='text'name ='title'><br>
    <input type="hidden" name="sent" value="1" />
		<input type="submit" value="Anlegen">
	</form>
  <form action="handleLogin.html" onsubmits>
  <input type = "submit" value = "Back">
  </form>
  
  </body>
  
</html>

<?php

    session_start();
    require 'rb.php';
    R::setup('mysql:host=localhost;dbname=login', 'root', '');
    
      $uid= $_SESSION['uid']; 
      
      //echo $uid;
       
      $lists = R::findAll('list', 'userid = ?', [$uid]);
      echo "<form  action='todos.php' method='post'>";
      foreach ($lists as $list){ 
        echo "<input type = 'radio' name = 'list' value =";
        echo $_SESSION['lid'] = $list->id; 
        echo ">";   
        echo $list->title;
        echo"<br>";
      };
      echo "<input type='submit' value = 'anzeigen'>";
      echo "</form>";

  

  
?>