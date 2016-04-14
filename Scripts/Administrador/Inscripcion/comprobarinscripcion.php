<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="../../js/JScomprobarinscripcion.js"></script>
</head>
<?php include ("../../includes/conectar.php"); ?>
<body>
<?php
	$idinscripcion=$_GET["idinscripcion"];
	$consulta="SELECT * FROM inscripcion WHERE idinscripcion='$idinscripcion' AND estado=0";
	$rs_tabla = mysql_query($consulta);
	if (mysql_num_rows($rs_tabla)>0) {
		?>
		<script languaje="javascript">
		pon_prefijo("<?php echo mysql_result($rs_tabla,0,codigousuario) ?>","<?php echo mysql_result($rs_tabla,0,idevento) ?>");
		</script>
		<?php 
	} else { ?>
	<script>
	alert ("No existe ninguna inscripcion con ese codigo");
	limpiar();
	</script>
	<?php }
?>
</div>
</body>
</html>
