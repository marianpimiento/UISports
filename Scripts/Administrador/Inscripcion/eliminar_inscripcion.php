<?php
include ("../../includes/conectar.php"); 

$idinscripcion=$_GET["idinscripcion"];
$cadena_busqueda=isset($_GET["cadena_busqueda"]);

$query="SELECT * FROM inscripcion WHERE idinscripcion='$idinscripcion'";
$rs_query=mysql_query($query);

?>

<html>
	<head>
		<title>Principal</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../../js/JSeliminar_inscripcion.js"></script>
		<script language="javascript"> inicio(); </script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">ELIMINAR INSCRIPCION </div>
				<div id="frmBusqueda">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%">id Inscripción</td>
							<td width="85%" colspan="2"><?php echo $idinscripcion?></td>
					    </tr>
						<tr>
							<td width="15%">Codigo Usuario</td>
						    <td width="85%" colspan="2"><?php echo mysql_result($rs_query,0,"codigousuario")?></td>
					    </tr>
						<?php
					  	$idevento=mysql_result($rs_query,0,"idevento");
						if ($idevento<>0) {
							$query_evento="SELECT * FROM evento WHERE idevento='$idevento'";
							$res_eventos=mysql_query($query_evento);
							$nombreevento=mysql_result($res_eventos,0,"nombre");
						} else {
							$nombreevento="Sin determinar";
						}
					  ?>
                        <tr>
						  <td>Evento</td>
						  <td colspan="2"><?php echo $nombreevento?></td>
					  </tr>
						</table>
			  </div>
				<div id="botonBusqueda">
					<img src="../../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar(<?php echo $idinscripcion?>)" border="1" onMouseOver="style.cursor=cursor">
					<img src="../../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
			  </div>
			  </div>
		  </div>
		</div>
	</body>
</html>
