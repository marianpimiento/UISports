<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="../../js/JSframe_inscripciones.js"></script>
</head>
<?php include ("../../includes/conectar.php"); ?>
<body>
<?php
	
	$consulta="SELECT * FROM inscripcion WHERE estado=0 ORDER BY idinscripcion ASC";
	$rs_tabla = mysql_query($consulta);
	$nrs=mysql_num_rows($rs_tabla);
?>
<div id="tituloForm2" class="header">
<div align="center">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="20%"><div align="center"><b>Id Inscripción</b></div></td>
			<td width="50%"><div align="center"><b>Codigo Usuario</b></div></td>
			<td width="20%"><div align="center"><b>Código Evento</b></div></td>
			<td width="10%"><div align="center"></td>
		  </tr>
		<?php
			for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
				$idinscripcion=mysql_result($rs_tabla,$i,"idinscripcion");
				$codigousuario=mysql_result($rs_tabla,$i,"codigousuario");
				$idevento=mysql_result($rs_tabla,$i,"idevento");
				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
					<td>
        <div align="center"><?php echo $idinscripcion;?></div></td>
					<td>
        <div align="center"><?php echo utf8_encode($codigousuario);?></div></td>
					<td><div align="center"><?php echo $idevento;?></div></td>
					<td align="center"><div align="center"><a href="javascript:pon_prefijo(<?php echo $idinscripcion?>,'<?php echo $codigousuario?>','<?php echo $idevento?>')"><img src="../../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
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
