<?php

$la_bd="20132B102";
$la_tabla="deporte";

$db=mysql_connect("localhost", "20132B102", "rb6tHS1eca");
if(!$db)
	die("<h3>***ERROR al conectar...</h3>");

//echo "Seleccionando la BD<br>";

if(!mysql_select_db($la_bd, $db))
	die("<h3>***ERROR al seleccionar la BD $la_bd</h3>".mysql_errno());

$sql="CREATE TABLE IF NOT EXISTS $la_tabla (
	iddeporte INT NOT NULL AUTO_INCREMENT,
	nombre CHAR (15) NOT NULL,
	minimoparticipantes INT NOT NULL,
	PRIMARY KEY(iddeporte)
	);";

if(!$result=mysql_query($sql,$db))
	die("<h3>***ERROR al ejecutar: '$sql' (".mysql_error());

/*
echo "Insertando datos en la tabla<br>";

$sql="INSERT INTO deportes (iddeporte, nombre, minimoparticipantes)
	VALUES (1, 'Tenis', 1),
	(2, 'Atletismo', 1),
	(3, 'Futbol', 10),
	(4, 'Karate', 1),
	(5, 'Rugby', 10),
	(6, 'Baloncesto', 10);
	";
	
if(!$result=mysql_query($sql,$db))
	die("<h3>***ERROR al insertar registros en la BD: '$sql' (".mysql_error());
*/
//echo "Creada la BD, la tabla y sus datos";

mysql_close($db);
       
?>
