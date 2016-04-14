<?php
header('Content-Type: text/html;charset=utf-8');
include ("../../includes/conectar.php");


$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }

$nombre=$_POST["Anombre"];
$informacion=$_POST["Ainformacion"];
$iddeporte=$_POST["iddeporte"];
$fechainicioins=$_POST["fechainicioins"];
$fechafinins=$_POST["fechafinins"];
$fechainicioeve=$_POST["fechainicioeve"];
$fechafineve=$_POST["fechafineve"];

if ($accion=="alta") {
	$query_operacion="INSERT INTO evento (idevento, nombre, informacion, iddeporte, fechainicioinscripcion, fechafininscripcion, fechainicioevento, fechafinevento, estado) VALUES ('', '$nombre', '$informacion', '$iddeporte', '$fechainicioins', '$fechafinins','$fechainicioeve','$fechafineve', '0')";				
	$rs_operacion=mysql_query($query_operacion);
	if ($rs_operacion) { $mensaje="El evento ha sido dado de alta correctamente"; }
	$cabecera1="Inicio >> Eventos &gt;&gt; Nuevo Evento ";
	$cabecera2="INSERTAR EVENTO ";
	$sel_maximo="SELECT max(idevento) as maximo FROM evento";
	$rs_maximo=mysql_query($sel_maximo);
	$idevento=mysql_result($rs_maximo,0,"maximo");
}

if ($accion=="modificar") {
	$idevento=$_POST["idevento"];
	$query="UPDATE evento SET nombre='$nombre', informacion='$informacion',iddeporte='$iddeporte', fechainicioinscripcion='$fechainicioins', fechafininscripcion='$fechafinins',fechainicioevento='$fechainicioeve',fechafinevento='$fechafineve',estado=0 WHERE idevento='$idevento'";
	$rs_query=mysql_query($query);
	if ($rs_query) { $mensaje="Los datos del evento han sido modificados correctamente"; }
	$cabecera1="Inicio >> Evento &gt;&gt; Modificar Evento ";
	$cabecera2="MODIFICAR EVENTO ";
}

if ($accion=="baja") {
	$idevento=$_GET["idevento"];
	$query="UPDATE evento SET estado=1 WHERE idevento='$idevento'";
	$rs_query=mysql_query($query);
	if ($rs_query) { $mensaje="El evento ha sido eliminado correctamente"; }
	$cabecera1="Inicio >> Eventos &gt;&gt; Eliminar Evento ";
	$cabecera2="ELIMINAR EVENTO ";
	$query_mostrar="SELECT * FROM evento WHERE idevento='$idevento'";
	$rs_mostrar=mysql_query($query_mostrar);
	$nombre=mysql_result($rs_mostrar,0,"nombre");
	$informacion=mysql_result($rs_mostrar,0,"informacion");
	$iddeporte=mysql_result($rs_mostrar,0,"iddeporte");
	$fechainicioins=mysql_result($rs_mostrar,0,"fechainicioinscripcion");
	$fechafinins=mysql_result($rs_mostrar,0,"fechafininscripcion");
	$fechainicioeve=mysql_result($rs_mostrar,0,"fechainicioevento");
	$fechafineve=mysql_result($rs_mostrar,0,"fechafinevento");
}

?>

<html>
	<head>
		<title>Principal</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript">
		
		function aceptar() {
			location.href="index.php";
		}
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		</script>
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
							<td width="85%" colspan="2"><?php echo $idevento?></td>
					    </tr>
						<tr>
							<td width="15%">Nombre</td>
						    <td width="85%" colspan="2"><?php echo $nombre?></td>
					    </tr>
						<tr>
						  <td>Informacion</td>
						  <td colspan="2"><?php echo $informacion?></td>
					  </tr>
<tr>
						  <td>Deporte</td>
						  <td colspan="2"><?php echo $iddeporte?></td>
					  </tr>
						<tr>
						  <td>Fecha Inicio Inscripción</td>
						  <td colspan="2"><?php echo $fechainicioins?></td>
					  </tr>
<tr>
						  <td>Fecha Fin Inscripción</td>
						  <td colspan="2"><?php echo $fechafinins?></td>
					  </tr>
<tr>
						  <td>Fecha Inicio Evento</td>
						  <td colspan="2"><?php echo $fechainicioeve?></td>
					  </tr>
                      <tr>
						  <td>Fecha Fin Evento</td>
						  <td colspan="2"><?php echo $fechafineve?></td>
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
