<?php

$la_bd="20132B102";

$db=mysql_connect("localhost", "20132B102", "rb6tHS1eca");
//$db=mysql_connect("localhost", "root", "");

if(!$db)
	die("<h3>***ERROR al conectar...</h3>");

//echo "Seleccionando la BD<br>";

if(!mysql_select_db($la_bd, $db))
	die("<h3>***ERROR al seleccionar la BD $la_bd</h3>".mysql_errno());


//mysql_close($db);
       
?>
