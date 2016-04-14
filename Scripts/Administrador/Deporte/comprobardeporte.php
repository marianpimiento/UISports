<?php
header('Content-Type: text/html;charset=utf-8');
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../../css/estilos.css" type="text/css" rel="stylesheet"></head>
<script language="javascript">

function pon_prefijo(nombre,minimoparticipantes) {
	parent.document.form_busqueda.nombre.value=nombre;
	parent.document.form_busqueda.minimoparticipantes.value=minimoparticipantes;
}

function limpiar() {
	parent.document.form_busqueda.nombre.value="";
	parent.document.form_busqueda.minimoparticipantes.value="";
	parent.document.form_busqueda.iddeporte.value="";
}

</script>
<?php include ("../../includes/conectar.php"); ?>
<body>
<?php
	$iddeporte=$_GET["iddeporte"];
	$consulta="SELECT * FROM deporte WHERE iddeporte='$iddeporte' AND estado=0";
	$rs_tabla = mysql_query($consulta);
	if (mysql_num_rows($rs_tabla)>0) {
		?>
		<script languaje="javascript">
		pon_prefijo("<?php echo mysql_result($rs_tabla,0,nombre) ?>","<?php echo mysql_result($rs_tabla,0,minimoparticipantes) ?>");
		</script>
		<?php 
	} else { ?>
	<script>
	alert ("No existe ningun deporte con ese codigo");
	limpiar();
	</script>
	<?php }
?>
</div>
</body>
</html>
