<?php

$la_bd="20132B102";
$la_tabla="evento";

$db=mysql_connect("localhost", "20132B102", "rb6tHS1eca");
if(!$db)
	die("<h3>***ERROR al conectar...</h3>");

//echo "Seleccionando la BD<br>";

if(!mysql_select_db($la_bd, $db))
	die("<h3>***ERROR al seleccionar la BD $la_bd</h3>".mysql_errno());
	
$sql="CREATE TABLE IF NOT EXISTS $la_tabla (
	idevento INT NOT NULL AUTO_INCREMENT,
	nombreevento CHAR(30) NOT NULL,
	informacion CHAR(450) NOT NULL,
	iddeporte INT NOT NULL,
	fechainicioinscripcion DATE NOT NULL,
	fechafininscripcion DATE NOT NULL,
	fechainicioevento DATE NOT NULL,
	fechafinevento DATE NOT NULL,
	PRIMARY KEY(idevento),
	FOREIGN KEY (iddeporte) REFERENCES deportes (iddeporte)
	);";

if(!$result=mysql_query($sql,$db))
	die("<h3>***ERROR al ejecutar: '$sql' (".mysql_error());
 
 /*
echo "Insertando datos en la tabla<br>";

$sql="INSERT INTO eventos (idevento, nombreevento, iddeporte, fechainicioinscripcion, fechafininscripcion, fechainicioevento, fechafinevento)
	VALUES (1, 'Carrera Atlética UIS 2014', 2, '2014-03-01', '2014-03-15', '2014-03-16', '2014-03-16'),
	(2, 'Competencia Karate 2014', 4, '2014-03-12', '2014-04-03', '2014-04-04', '2014-04-08'),
	(3, 'Torneo Tenis 2014', 1, '2014-03-16', '2014-04-05', '2014-04-07', '2014-04-11');
	";
	
if(!$result=mysql_query($sql,$db))
	die("<h3>***ERROR al insertar registros en la BD: '$sql' (".mysql_error());
*/	

//echo "Creada la BD, la tabla y sus datos";

mysql_close($db);
       
?>
