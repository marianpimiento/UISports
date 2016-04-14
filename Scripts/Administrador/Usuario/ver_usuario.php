<?php
header('Content-Type: text/html;charset=utf-8');
include ("../../includes/conectar.php");

$codigo=$_GET["codigo"];
$cadena_busqueda=$_GET["cadena_busqueda"];

$query="SELECT * FROM usuario WHERE codigo='$codigo'";
$rs_query=mysql_query($query);

?>

<html>
	<head>
		<title>Principal</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../../js/JSver_usuario.js"></script>
		<script language="javascript"> inicio(); </script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">VER USUARIO </div>
				<div id="frmBusqueda">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%">C&oacute;digo</td>
							<td width="85%" colspan="2"><?php echo $codigo?></td>
					    </tr>
                        <tr>
							<td width="15%">Correo</td>
						    <td width="85%" colspan="2"><?php echo mysql_result($rs_query,0,"correo")?></td>
					    </tr>
						<tr>
							<td width="15%">Nombre</td>
						    <td width="85%" colspan="2"><?php echo mysql_result($rs_query,0,"nombre")?></td>
					    </tr>
						<tr>
						  <td>Apellido</td>
						  <td colspan="2"><?php echo mysql_result($rs_query,0,"apellido")?></td>
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
