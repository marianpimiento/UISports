<?php

$la_bd="20132B102";
$la_tabla="inscripcion";

$db=mysql_connect("localhost", "20132B102", "rb6tHS1eca");
if(!$db)
	die("<h3>***ERROR al conectar...</h3>");

//echo "Seleccionando la BD<br>";

if(!mysql_select_db($la_bd, $db))
	die("<h3>***ERROR al seleccionar la BD $la_bd</h3>".mysql_errno());

$sql="CREATE TABLE IF NOT EXISTS inscripciones (
	idinscripcion INT NOT NULL AUTO_INCREMENT,
	codigousuario CHAR(7) NOT NULL,
	idevento INT NOT NULL,
	PRIMARY KEY(idinscripcion),
	FOREIGN KEY (codigousuario) REFERENCES usuarios (codigo),
	FOREIGN KEY (idevento) REFERENCES eventos (idevento)
	);";

if(!$result=mysql_query($sql,$db))
	die("<h3>***ERROR al ejecutar: '$sql' (".mysql_error());
 
 /*
echo "Insertando datos en la tabla<br>";

$sql="INSERT INTO inscripciones (idinscripcion, codigousuario, idevento)
	VALUES (1, '2110611', 3),
	(2, '2110611', 2),
	(3, '2110624', 1),
	(4, '2110617', 1),
	(5, '2110617', 3),
	(6, '2110626', 2),
	(7, '2110628', 1);
	";
	
if(!$result=mysql_query($sql,$db))
	die("<h3>***ERROR al insertar registros en la BD: '$sql' (".mysql_error());
*/

//echo "Creada la BD, la tabla y sus datos";

mysql_close($db);
       
?>
