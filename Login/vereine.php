<?php 
require 'rb.php';

R::setup('mysql:host=localhost;dbname=bundesliga', 'root', '');


$suche = R::findAll('verein', 'stadion LIKE ? ', [ '%Benz%' ]);
foreach ($suche as $verein) {
    echo $verein->stadion;}

R::close();
?>  