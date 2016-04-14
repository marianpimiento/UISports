<?php
header('Content-Type: text/html;charset=utf-8');
include ("../../includes/conectar.php");


$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }

$nombre=$_POST["Anombre"];
$minimoparticipantes=$_POST["Aminimoparticipantes"];

if ($accion=="alta") {
	$query_operacion="INSERT INTO deporte (iddeporte, nombre, minimoparticipantes, estado) VALUES ('', '$nombre', '$minimoparticipantes', '0')";		
	echo $query_operacion;			
	$rs_operacion=mysql_query($query_operacion);
	if ($rs_operacion) { $mensaje="El deporte ha sido dado de alta correctamente"; }
	$cabecera1="Inicio >> Deportes &gt;&gt; Nuevo Deporte ";
	$cabecera2="INSERTAR DEPORTE ";
	$sel_maximo="SELECT max(iddeporte) as maximo FROM deporte";
	$rs_maximo=mysql_query($sel_maximo);
	$iddeporte=mysql_result($rs_maximo,0,"maximo");
}

if ($accion=="modificar") {
	$iddeporte=$_POST["iddeporte"];
	$query="UPDATE deporte SET nombre='$nombre', minimoparticipantes='$minimoparticipantes',estado=0 WHERE iddeporte='$iddeporte'";
	$rs_query=mysql_query($query);
	if ($rs_query) { $mensaje="Los datos del deporte han sido modificados correctamente"; }
	$cabecera1="Inicio >> Deporte &gt;&gt; Modificar Deporte ";
	$cabecera2="MODIFICAR DEPORTE ";
}

if ($accion=="baja") {
	$iddeporte=$_GET["iddeporte"];
	$query="UPDATE deporte SET estado=1 WHERE iddeporte='$iddeporte'";
	$rs_query=mysql_query($query);
	if ($rs_query) { $mensaje="El deporte ha sido eliminado correctamente"; }
	$cabecera1="Inicio >> Deportes &gt;&gt; Eliminar Deporte ";
	$cabecera2="ELIMINAR DEPORTE ";
	$query_mostrar="SELECT * FROM deporte WHERE iddeporte='$iddeporte'";
	$rs_mostrar=mysql_query($query_mostrar);
	$nombre=mysql_result($rs_mostrar,0,"nombre");
	$minimoparticipantes=mysql_result($rs_mostrar,0,"minimoparticipantes");
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
							<td width="85%" colspan="2"><?php echo $iddeporte?></td>
					    </tr>
						<tr>
							<td width="15%">Nombre</td>
						    <td width="85%" colspan="2"><?php echo $nombre?></td>
					    </tr>
						<tr>
						  <td>Minimo participantes</td>
						  <td colspan="2"><?php echo $minimoparticipantes?></td>
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
