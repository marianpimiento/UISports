<?php
header('Content-Type: text/html;charset=utf-8');
include ('../Scripts/includes/conectar.php');

$_POST;

$correo=$_POST["correo"];
$password=$_POST["password"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$cedula=$_POST["cedula"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$celular=$_POST["celular"];
$genero=$_POST["genero"];

$sitio="../Scripts/index.php";

$codigo=$_POST["codigo"];
$sql="UPDATE usuario SET correo='$correo', nombre='$nombre', apellido='$apellido', cedula='$cedula', direccion='$direccion', telefono='$telefono', celular='$celular', genero='$genero',estado=0 WHERE codigo='$codigo'";

$rs_query=mysql_query($sql);
	if ($rs_query) { 
	$mensaje="Los datos del usuario han sido modificados correctamente";
	header("Location: index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modificar Script</title>
</head>

<body>
</body>
</html>