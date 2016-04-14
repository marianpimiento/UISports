<?php
header('Content-Type: text/html;charset=utf-8');
include ("../../includes/conectar.php"); 

$idevento=$_GET["idevento"];
$cadena_busqueda=isset($_GET["cadena_busqueda"]);

$query="SELECT * FROM evento WHERE idevento='$idevento'";
$rs_query=mysql_query($query);

?>

<html>
	<head>
		<title>Principal</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript">
		
		function aceptar(idevento) {
			location.href="guardar_evento.php?idevento=" + idevento + "&accion=baja" + "&cadena_busqueda=<?php echo $cadena_busqueda?>";
		}
		
		function cancelar() {
			location.href="index.php?cadena_busqueda=<?php echo $cadena_busqueda?>";
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
				<div id="tituloForm" class="header">ELIMINAR EVENTO </div>
				<div id="frmBusqueda">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%">C&oacute;digo</td>
							<td width="85%" colspan="2"><?php echo $idevento?></td>
					    </tr>
						<tr>
							<td width="15%">Nombre</td>
						    <td width="85%" colspan="2"><?php echo mysql_result($rs_query,0,"nombre")?></td>
					    </tr>
						<tr>
						  <td>Información</td>
						  <td colspan="2"><?php echo mysql_result($rs_query,0,"informacion")?></td>
					  </tr>
						<?php
					  	$iddeporte=mysql_result($rs_query,0,"iddeporte");
						if ($iddeporte<>0) {
							$query_deporte="SELECT * FROM deporte WHERE iddeporte='$iddeporte'";
							$res_deportes=mysql_query($query_deporte);
							$nombredeporte=mysql_result($res_deportes,0,"nombre");
						} else {
							$nombredeporte="Sin determinar";
						}
					  ?>
                        <tr>
						  <td>Deporte</td>
						  <td colspan="2"><?php echo $nombredeporte?></td>
					  </tr>
						<tr>
						  <td>fecha Inicio Inscripción</td>
						  <td colspan="2"><?php echo mysql_result($rs_query,0,"fechainicioinscripcion")?></td>
					  </tr>
						<tr>
							<td width="15%">Fecha Fin Inscripción</td>
							<td width="85%" colspan="2"><?php echo mysql_result($rs_query,0,"fechafininscripcion")?></td>
					    </tr>
						<tr>
							<td width="15%">Fecha Inicio Evento</td>
							<td width="85%" colspan="2"><?php echo mysql_result($rs_query,0,"fechainicioevento")?></td>
					    </tr>
						<tr>
							<td width="15%">Fecha Fin Evento</td>
							<td width="85%" colspan="2"><?php echo mysql_result($rs_query,0,"fechafinevento")?></td>
					    </tr>
					</table>
			  </div>
				<div id="botonBusqueda">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar(<?php echo $idevento?>)" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
			  </div>
			  </div>
		  </div>
		</div>
	</body>
</html>
