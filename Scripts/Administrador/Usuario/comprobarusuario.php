<?php
header('Content-Type: text/html;charset=utf-8');
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="../../js/JScomprobarusuario.js"></script>
</head>
<?php include ("../../includes/conectar.php"); ?>
<body>
<?php
	$codigo=$_GET["codigo"];
	$consulta="SELECT * FROM usuario WHERE codigo='$codigo' AND estado=0";
	$rs_tabla = mysql_query($consulta);
	if (mysql_num_rows($rs_tabla)>0) {
		?>
		<script languaje="javascript">
		pon_prefijo("<?php echo mysql_result($rs_tabla,0,nombre) ?>","<?php echo mysql_result($rs_tabla,0,correo) ?>,"<?php echo mysql_result($rs_tabla,0,apellido) ?>,"<?php echo mysql_result($rs_tabla,0,cedula) ?>,"<?php echo mysql_result($rs_tabla,0,direccion) ?>,"<?php echo mysql_result($rs_tabla,0,telefono) ?>");
		</script>
		<?php 
	} else { ?>
	<script>
	alert ("No existe ningun usuario con ese codigo");
	limpiar();
	</script>
	<?php }
?>
</div>
</body>
</html>
