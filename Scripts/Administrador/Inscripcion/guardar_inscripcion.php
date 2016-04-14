<?php
include ("../../includes/conectar.php");


$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }

$codigousuario=$_POST["codigousuario"];
$idevento=$_POST["idevento"];

if ($accion=="alta") {
	$query_operacion="INSERT INTO inscripcion (idinscripcion, codigousuario, idevento, estado) VALUES ('', '$codigousuario', '$idevento', '0')";				
	$rs_operacion=mysql_query($query_operacion);
	if ($rs_operacion) { $mensaje="La Inscripción ha sido dado de alta correctamente"; }
	$cabecera1="Inicio >> Inscripciones &gt;&gt; Nuevo Inscripción ";
	$cabecera2="INSERTAR INSCRIPCION ";
	$sel_maximo="SELECT max(idinscripcion) as maximo FROM inscripcion";
	$rs_maximo=mysql_query($sel_maximo);
	$idinscripcion=mysql_result($rs_maximo,0,"maximo");
}

if ($accion=="modificar") {
	$idinscripcion=$_POST["idinscripcion"];
	$query="UPDATE inscripcion SET codigousuario='$codigousuario', idevento='$idevento',estado=0 WHERE idinscripcion='$idinscripcion'";
	$rs_query=mysql_query($query);
	if ($rs_query) { $mensaje="Los datos de la inscripción han sido modificados correctamente"; }
	$cabecera1="Inicio >> Inscripción &gt;&gt; Modificar Inscripción ";
	$cabecera2="MODIFICAR INSCRIPCIÓN ";
}

if ($accion=="baja") {
	$idinscripcion=$_GET["idinscripcion"];
	$query="UPDATE inscripcion SET estado=1 WHERE idinscripcion='$idinscripcion'";
	$rs_query=mysql_query($query);
	if ($rs_query) { $mensaje="La Inscripcion ha sido eliminado correctamente"; }
	$cabecera1="Inicio >> Inscripciones &gt;&gt; Eliminar Inscripcion ";
	$cabecera2="ELIMINAR INSCRIPCIÓN ";
	$query_mostrar="SELECT * FROM inscripcion WHERE idinscripcion='$idinscripcion'";
	$rs_mostrar=mysql_query($query_mostrar);
	$codigousuario=mysql_result($rs_mostrar,0,"codigousuario");
	$idevento=mysql_result($rs_mostrar,0,"idevento");
}

?>

<html>
	<head>
		<title>Principal</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../../js/JSguardar_inscripcion.js"></script>
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
							<td width="15%">Id Inscripción</td>
							<td width="85%" colspan="2"><?php echo $idinscripcion?></td>
					    </tr>
						<tr>
							<td width="15%">Código Usuario</td>
						    <td width="85%" colspan="2"><?php echo $codigousuario?></td>
					    </tr>
						<tr>
						  <td>Evento</td>
						  <td colspan="2"><?php echo $idevento?></td>
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
