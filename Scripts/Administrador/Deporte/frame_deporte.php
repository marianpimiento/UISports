<?php
header('Content-Type: text/html;charset=utf-8');
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../../css/estilos.css" type="text/css" rel="stylesheet">

</head>
<script language="javascript">

function pon_prefijo(pref,nombre,minimoparticipantes) {
	parent.opener.document.form_busqueda.iddeporte.value=pref;
	parent.opener.document.form_busqueda.nombre.value=nombre;
	parent.opener.document.form_busqueda.minimoparticipantes.value=minimoparticipantes;
	parent.window.close();
}

</script>
<?php include ("../../includes/conectar.php");
 ?>
<body>
<?php
	
	$consulta="SELECT * FROM deporte WHERE estado=0 ORDER BY iddeporte ASC";
	$rs_tabla = mysql_query($consulta);
	$nrs=mysql_num_rows($rs_tabla);
?>
<div id="tituloForm2" class="header">
<div align="center">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="10%"><div align="center"><b>Codigo</b></div></td>
			<td width="40%"><div align="center"><b>Deporte</b></div></td>
			<td width="40%"><div align="center"><b>Minimo Participantes</b></div></td>
			<td width="10%"><div align="center"></td>
		  </tr>
		<?php
			for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
				$iddeporte=mysql_result($rs_tabla,$i,"iddeporte");
				$nombre=mysql_result($rs_tabla,$i,"nombre");
				$minimoparticipantes=mysql_result($rs_tabla,$i,"minimoparticipantes");
				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
					<td>
        <div align="center"><?php echo $iddeporte;?></div></td>
					<td>
        <div align="center"><?php echo utf8_encode($nombre);?></div></td>
					<td><div align="center"><?php echo $minimoparticipantes;?></div></td>
					<td align="center"><div align="center"><a href="javascript:pon_prefijo(<?php echo $iddeporte?>,'<?php echo $nombre?>','<?php echo $minimoparticipantes?>')"><img src="../../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
				</tr>
			<?php }
		?>
  </table>
		<?php 
		}  ?>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
<input type="hidden" id="accion" name="accion">
</form>
</div>
</div>

</body>
</html>
