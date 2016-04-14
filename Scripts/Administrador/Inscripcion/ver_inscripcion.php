<?php
include ("../../includes/conectar.php");

$idinscripcion=$_GET["idinscripcion"];
$cadena_busqueda=$_GET["cadena_busqueda"];

$query="SELECT * FROM inscripcion WHERE idinscripcion='$idinscripcion'";
$rs_query=mysql_query($query);

?>

<html>
	<head>
		<title>Principal</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript">
		
		function aceptar() {
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
				<div id="tituloForm" class="header">VER INSCRIPCION </div>
				<div id="frmBusqueda">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%">Id Inscripción</td>
							<td width="85%" colspan="2"><?php echo $idinscripcion?></td>
					    </tr>
						<tr>
							<td width="15%">Código Usuario</td>
						    <td width="85%" colspan="2"><?php echo mysql_result($rs_query,0,"codigousuario")?></td>
					    </tr>
						<tr>
						  <td>Evento</td>
						  <td colspan="2"><?php echo mysql_result($rs_query,0,"idevento")?></td>
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
