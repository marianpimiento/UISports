<?php

$la_bd="20132B102";
$la_tabla="usuario";

$db=mysql_connect("localhost", "20132B102", "rb6tHS1eca");
//$db=mysql_connect("localhost", "root", "");
if(!$db)
	die("<h3>***ERROR al conectar...</h3>");

//echo "Seleccionando la BD<br>";

if(!mysql_select_db($la_bd, $db))
	die("<h3>***ERROR al seleccionar la BD $la_bd</h3>".mysql_errno());

$sql="CREATE TABLE IF NOT EXISTS $la_tabla (
	codigo CHAR(7) NOT NULL,
	correo CHAR (25) NOT NULL,
	password CHAR(15) NOT NULL,
	nombre CHAR(50)NOT NULL,
	apellido CHAR(50) NOT NULL,
	cedula CHAR(12) NOT NULL,
	direccion CHAR(60) NOT NULL,
	telefono CHAR(10) NOT NULL,
	celular CHAR(10) NOT NULL,
	genero CHAR(1) NOT NULL,
	perfil CHAR(1) NOT NULL,
	estado INT NOT NULL,
	PRIMARY KEY(codigo)
	);";

if(!$result=mysql_query($sql,$db))
	die("<h3>***ERROR al ejecutar: '$sql' (".mysql_error());

/*
echo "Insertando datos en la tabla<br>";

$sql="INSERT INTO usuarios (codigo,	correo,	password, nombres, apellidos, cedula, direccion, telefono, celular, genero, perfil)
	VALUES ('2110624', 'yenypf@gmail.com', 'admin2412', 'Yeny Patricia', 'Portilla', '1098763526', 'Cr. 27 nro. 15-26', '6325488', '3214398480', 'F', 'A', '0'),

	('2110611', 'marianpo_94@hotmail.com', 'depor2111', 'Maria Andrea', 'Pimiento', '1098766325', 'Trinitarios Torre 6-245', '63602541', '3104889674', 'F', 'A', '0'),

	('2110617', 'danieljosevillamizar@gmail.com', 'secur2711', 'Daniel José', 'Villamizar',  '1098764512', 'Cll 25 nro. 15-45', '6254789', '3172548576', 'M', 'A', '0'),

	('2110626', 'jujonama@gmail.com', 'junonm37', 'Junior', 'Narváez Martínez', '1098769654', 'Piedecuesta Crr 52 nro 58-14', '6857214', '3205847524', 'M', 'U', '0'),

	('2110628', 'juanesp_03@hotmail.com', 'guerr1098', 'Julián', 'Guerrero Corzo', '1098767451', 'Crr 27 nro 120-257', '6254218', '3214721202', 'M', 'U', '0');";

	
if(!$result=mysql_query($sql,$db))
	die("<h3>***ERROR al insertar registros en la BD: '$sql' (".mysql_error());
*/

//echo "Creada la BD, la tabla y sus datos";

//mysql_close($db);
       
?>
