<?php
header('Content-Type: text/html;charset=utf-8');
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="../../js/JSframe_usuarios.js"></script>
</head>
<?php include ("../../includes/conectar.php"); ?>
<body>
<?php
	
	$consulta="SELECT * FROM usuario WHERE estado=0 ORDER BY codigo ASC";
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
			<td width="40%"><div align="center"><b>Nombre</b></div></td>
			<td width="40%"><div align="center"><b>Correo</b></div></td>
            
			<td width="10%"><div align="center"></td>
		  </tr>
		<?php
			for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
				$codigo=mysql_result($rs_tabla,$i,"codigo");
				$nombre=mysql_result($rs_tabla,$i,"nombre");
				$correo=mysql_result($rs_tabla,$i,"correo");
				$apellido=mysql_result($rs_tabla,$i,"apellido");
				$cedula=mysql_result($rs_tabla,$i,"cedula");
				$direccion=mysql_result($rs_tabla,$i,"direccion");
				$telefono=mysql_result($rs_tabla,$i,"telefono");
				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
					<td>
        <div align="center"><?php echo $codigo;?></div></td>
					<td>
        <div align="center"><?php echo utf8_encode($nombre);?></div></td>
					<td><div align="center"><?php echo $correo;?></div></td>
					<td align="center"><div align="center"><a href="javascript:pon_prefijo(<?php echo $codigo?>,'<?php echo $nombre?>','<?php echo $correo?>','<?php echo $apellido?>','<?php echo $cedula?>','<?php echo $direccion?>','<?php echo $telefono?>')"><img src="../../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
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
