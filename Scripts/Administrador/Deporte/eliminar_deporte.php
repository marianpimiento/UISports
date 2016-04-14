<?php
header('Content-Type: text/html;charset=utf-8');
include ("../../includes/conectar.php");

$iddeporte=$_GET["iddeporte"];
$cadena_busqueda=$_GET["cadena_busqueda"];

$query="SELECT * FROM deporte WHERE iddeporte='$iddeporte'";
$rs_query=mysql_query($query);

?>

<html>
	<head>
		<title>Principal</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript">
		
		function aceptar(iddeporte) {
			location.href="guardar_deporte.php?iddeporte=" + iddeporte + "&accion=baja" + "&cadena_busqueda=<?php echo $cadena_busqueda?>";
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
				<div id="tituloForm" class="header">ELIMINAR DEPORTE </div>
				<div id="frmBusqueda">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%">C&oacute;digo</td>
							<td width="85%" colspan="2"><?php echo $iddeporte?></td>
					    </tr>
						<tr>
							<td width="15%">Nombre</td>
						    <td width="85%" colspan="2"><?php echo mysql_result($rs_query,0,"nombre")?></td>
					    </tr>
						<tr>
						  <td>Minimo participantes</td>
						  <td colspan="2"><?php echo mysql_result($rs_query,0,"minimoparticipantes")?></td>
					  </tr>
						
					</table>
			  </div>
				<div id="botonBusqueda">
					<img src="../../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar(<?php echo $iddeporte?>)" border="1" onMouseOver="style.cursor=cursor">
					<img src="../../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
			  </div>
			  </div>
		  </div>
		</div>
	</body>
</html>
