<?php 
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 

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
		<script type="text/javascript" src="../../funciones/validar.js"></script>
        <script type="text/javascript" src="../../js/JSmodificar_inscripcion.js"></script>
		<script language="javascript"> inicio(); </script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">MODIFICAR INSCRIPCION </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar_inscripcion.php" enctype="multipart/form-data">
				<input id="accion" name="accion" value="modificar" type="hidden">
				<input id="id" name="id" value="<?php echo $idinscripcion?>" type="hidden">
				<input id="idinscripcion" name="idinscripcion" value="<?php echo $idinscripcion?>" type="hidden">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td>C&oacute;digo Inscripcion</td>
							<td><?php echo $idinscripcion?></td>
						    <td width="42%" rowspan="14" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
                    	<?php
						$codigousuario=mysql_result($rs_query,0,"codigousuario");
					  	$query_usuarios="SELECT * FROM usuario WHERE estado=0 ORDER BY codigo ASC";
						$res_usuarios=mysql_query($query_usuarios);
						$contador=0;
					  ?>
						<tr>
							<td width="11%">Código Usuario</td>
							<td colspan="2"><select id="codigousuario" name="codigousuario" class="comboGrande">
							
								<option value="0">Seleccione un codigo usuario</option>
								<?php
								while ($contador < mysql_num_rows($res_usuarios)) { 
									if ($codigousuario==mysql_result($res_usuarios,$contador,"codigo")) {?>
								<option value="<?php echo mysql_result($res_usuarios,$contador,"codigo")?>" selected="selected"><?php echo mysql_result($res_usuarios,$contador,"codigo")?></option>
								<?php } else { ?>
								<option value="<?php echo mysql_result($res_usuarios,$contador,"codigo")?>"><?php echo mysql_result($res_usuarios,$contador,"codigo")?></option>
								<?php } 
									$contador++;
								} ?>				
								</select>							</td>
				        </tr>
                        <?php
						$idevento=mysql_result($rs_query,0,"idevento");
					  	$query_eventos="SELECT * FROM evento WHERE estado=0 ORDER BY nombre ASC";
						$res_eventos=mysql_query($query_eventos);
						$contador=0;
					  ?>
						<tr>
							<td width="11%">Evento</td>
							<td colspan="2"><select id="idevento" name="idevento" class="comboGrande">
							
								<option value="0">Seleccione un evento</option>
								<?php
								while ($contador < mysql_num_rows($res_eventos)) { 
									if ($idevento==mysql_result($res_eventos,$contador,"idevento")) {?>
								<option value="<?php echo mysql_result($res_eventos,$contador,"idevento")?>" selected="selected"><?php echo mysql_result($res_eventos,$contador,"nombre")?></option>
								<?php } else { ?>
								<option value="<?php echo mysql_result($res_eventos,$contador,"idevento")?>"><?php echo mysql_result($res_eventos,$contador,"nombre")?></option>
								<?php } 
									$contador++;
								} ?>				
								</select>							</td>
				        </tr>
					  
				  </table>
			  </div>
				<div id="botonBusqueda">
				<img src="../../img/botonaceptar.jpg" width="85" height="22" onClick="validar(formulario,true)" border="1" onMouseOver="style.cursor=cursor">
					<img src="../../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">					
			  </div>
			  </form>
			 </div>				
		  </div>
		</div>
	</body>
</html>			
