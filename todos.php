
<!DOCTYPE HTML>
<html>
  
  <head>
    <title>Login</title>
  </head>
  
  <body>
  
	<h1>Neues ToDo anlegen</h1>
	<form action="todosadd.php" method="post">
    Titel:<br>
    <input type='text'name ='title'><br>
    
		<input type="submit" value="Anlegen">
	</form>
  <form action="Home.php" onsubmits>
  <input type = "submit" value = "Back">
  </form>
  
  </body>
  
</html>

<?php

    session_start();
    require 'rb.php';
    R::setup('mysql:host=localhost;dbname=login', 'root', '');
    $lid = $_SESSION['lid'];
     
    $tds = R::findAll('todo', 'listid = ?', [$lid]);
      foreach ($tds as $td){ 
        echo $td->title;
        echo"<br>";
      };
        
    

  
?>