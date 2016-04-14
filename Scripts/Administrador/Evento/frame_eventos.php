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

function pon_prefijo(pref,nombre,informacion,iddeporte,fechainicioins,fechafinins,fechainicioeve,fechafineve) {
	parent.opener.document.form_busqueda.idevento.value=pref;
	parent.opener.document.form_busqueda.nombre.value=nombre;
	parent.opener.document.form_busqueda.informacion.value=informacion;
	parent.opener.document.form_busqueda.iddeporte.value=iddeporte;
	parent.opener.document.form_busqueda.fechainicioins.value=fechainicioins;
	parent.opener.document.form_busqueda.fechafinins.value=fechafinins;
	parent.opener.document.form_busqueda.fechainicioeve.value=fechainicioeve;
	parent.opener.document.form_busqueda.fechafineve.value=fechafineve;
	parent.window.close();
}

</script>
<?php include ("../../includes/conectar.php");
 ?>
<body>
<?php
	
	$consulta="SELECT * FROM evento WHERE estado=0 ORDER BY idevento ASC";
	$rs_tabla = mysql_query($consulta);
	$nrs=mysql_num_rows($rs_tabla);
?>
<div id="tituloForm2" class="header">
<div align="center">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="6%"><div align="center"><b>Codigo</b></div></td>
			<td width="10%"><div align="center"><b>Nombre</b></div></td>
			<td width="10%"><div align="center"><b>Información</b></div></td>
            <td width="10%"><div align="center"><b>ID Deporte</b></div></td>
			<td width="10%"><div align="center"><b>F. Ini Ins</b></div></td>
			<td width="10%"><div align="center"><b>F. Fin Ins</b></div></td>
			<td width="10%"><div align="center"><b>F. Ini Eve</b></div></td>
			<td width="10%"><div align="center"><b>F. Fin Eve</b></div></td>
            <td width="6%"><div align="center"></td>
		  </tr>
		<?php
			for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
				$idevento=mysql_result($rs_tabla,$i,"idevento");
				$nombre=mysql_result($rs_tabla,$i,"nombre");
				$informacion=mysql_result($rs_tabla,$i,"informacion");
				$iddeporte=mysql_result($rs_tabla,$i,"iddeporte");
				$fechainicioins=mysql_result($rs_tabla,$i,"fechainicioinscripcion");
				$fechafinins=mysql_result($rs_tabla,$i,"fechafininscripcion");
				$fechainicioeve=mysql_result($rs_tabla,$i,"fechainicioevento");
				$fechafineve=mysql_result($rs_tabla,$i,"fechafinevento");
				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
					<td>
        <div align="center"><?php echo $idevento;?></div></td>
					<td>
        <div align="left"><?php echo utf8_encode($nombre);?></div></td>
					<td><div align="center"><?php echo $informacion;?></div></td>
                    <td><div align="center"><?php echo $iddeporte;?></div></td>
                    <td><div align="center"><?php echo $fechainicioins;?></div></td>
                    <td><div align="center"><?php echo $fechafinins;?></div></td>
                    <td><div align="center"><?php echo $fechainicioeve;?></div></td>
                    <td><div align="center"><?php echo $fechafineve;?></div></td>
					<td align="center"><div align="center"><a href="javascript:pon_prefijo(<?php echo $idevento?>,'<?php echo $nombre?>','<?php echo $informacion?>','<?php echo $iddeporte?>','<?php echo $fechainicioins?>','<?php echo $fechafinins?>','<?php echo $fechainicioeve?>','<?php echo $fechafineve?>')"><img src="../../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
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
