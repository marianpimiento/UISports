<?php
header('Content-Type: text/html;charset=utf-8');
include ("../../includes/conectar.php");

$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }

$codigo=$_POST["codigo"];
$correo=$_POST["correo"];
$password=$_POST["password"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$cedula=$_POST["cedula"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$celular=$_POST["celular"];
$genero=$_POST["genero"];
$perfil='A';

if ($accion=="alta") {
	$query_operacion="Insert into usuario (codigo, correo, password, nombre, apellido, cedula, direccion, telefono, celular, genero, perfil, estado) values ('$codigo','$correo','".md5($password)."','$nombre', '$apellido', '$cedula', '$direccion', '$telefono', '$celular','$genero','$perfil','0')";					
	$rs_operacion=mysql_query($query_operacion);
	if ($rs_operacion) { $mensaje="El usuario ha sido dado de alta correctamente"; }
	$cabecera1="Inicio >> Usuarios &gt;&gt; Nuevo Usuario ";
	$cabecera2="INSERTAR Usuario ";
	$sel_maximo="SELECT count(codigo) as maximo FROM usuario";
	$rs_maximo=mysql_query($sel_maximo);
	$codigo=mysql_result($rs_maximo,0,"maximo");
}

if ($accion=="modificar") {
	$codigo=$_POST["codigo"];
	$query="UPDATE usuario SET correo='$correo', password='$password', nombre='$nombre', apellido='$apellido', cedula='$cedula', direccion='$direccion', telefono='$telefono', celular='$celular', genero='$genero',estado=0 WHERE codigo='$codigo'";
	$rs_query=mysql_query($query);
	if ($rs_query) { $mensaje="Los datos del usuario han sido modificados correctamente"; }
	$cabecera1="Inicio >> Usuarios &gt;&gt; Modificar Usuario ";
	$cabecera2="MODIFICAR Usuario ";
}

if ($accion=="baja") {
	$codigo=$_GET["codigo"];
	$query="UPDATE usuario SET estado=1 WHERE codigo='$codigo'";
	$rs_query=mysql_query($query);
	if ($rs_query) { $mensaje="El usuario ha sido eliminado correctamente"; }
	$cabecera1="Inicio >> Usuarios &gt;&gt; Eliminar Usuario ";
	$cabecera2="ELIMINAR Usuario ";
	$query_mostrar="SELECT * FROM usuario WHERE codigo='$codigo'";
	$rs_mostrar=mysql_query($query_mostrar);
	$codigo=mysql_result($rs_mostrar,0,"codigo");
	$correo=mysql_result($rs_mostrar,0,"correo");
	$nombre=mysql_result($rs_mostrar,0,"nombre");
	$apellido=mysql_result($rs_mostrar,0,"apellido");
	$direccion=mysql_result($rs_mostrar,0,"direccion");;
	$telefono=mysql_result($rs_mostrar,0,"telefono");
	$celular=mysql_result($rs_mostrar,0,"celular");
	$genero=mysql_result($rs_mostrar,0,"genero");
	$perfil=mysql_result($rs_mostrar,0,"perfil");
}

?>

<html>
	<head>
		<title>Principal</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../../js/JSguardar_usuario.js"></script>
		<script language="javascript"> inicio(); </script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header"><?php echo $cabecera2?></div>
				<div id="frmBusqueda">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%"></td>
							<td width="85%" colspan="2" class="mensaje"><?php echo $mensaje;?></td>
					    </tr>
						<tr>
							<td width="15%">C&oacute;digo</td>
							<td width="85%" colspan="2"><?php echo $codigo?></td>
					    </tr>
                        <tr>
							<td width="15%">Correo</td>
							<td width="85%" colspan="2"><?php echo $correo?></td>
					    </tr>
						<tr>
							<td width="15%">Nombre</td>
						    <td width="85%" colspan="2"><?php echo $nombre?></td>
					    </tr>
                        <tr>
							<td width="15%">Apellido</td>
						    <td width="85%" colspan="2"><?php echo $nombre?></td>
					    </tr>
						<tr>
						  <td>Cedula</td>
						  <td colspan="2"><?php echo $cedula?></td>
					  </tr>
						<tr>
						  <td>Direcci&oacute;n</td>
						  <td colspan="2"><?php echo $direccion?></td>
					  </tr>
						<tr>
							<td>Tel&eacute;fono</td>
							<td><?php echo $telefono?></td>
						</tr>
						<tr>
							<td>Celular</td>
							<td colspan="2"><?php echo $movil?></td>
						</tr>
						
					</table>
			  </div>
				<div id="botonBusqueda">
					<img src="../../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor=cursor">
			  </div>
			 </div>
		  </div>
		</div>
	</body>
</html>
