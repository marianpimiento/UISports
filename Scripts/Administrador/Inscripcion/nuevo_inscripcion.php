<?php include ("../../includes/conectar.php"); ?>
<html>
	<head>
		<title>Principal</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../../funciones/validar.js"></script>
        <link href="../../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
		<script type="text/JavaScript" language="javascript" src="../../calendario/calendar.js"></script>
		<script type="text/JavaScript" language="javascript" src="../../calendario/lang/calendar-sp.js"></script>
		<script type="text/JavaScript" language="javascript" src="../../calendario/calendar-setup.js"></script>
        <script type="text/javascript" src="../../js/JSnuevo_inscripcion.js"></script>
		<script language="javascript"> inicio(); </script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">INSERTAR INSCRIPCIÓN </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar_inscripcion.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<?php
					  	$query_usuarios="SELECT * FROM usuario ORDER BY codigo ASC";
						$res_usuarios=mysql_query($query_usuarios);
						$contador=0;
					  ?>
						<td>Codigo Usuario</td>

                        <td width="43%"><select id="codigousuario" name="codigousuario" class="comboGrande">
							<option value="0">Seleccione un usuario</option>
								<?php
								while ($contador < mysql_num_rows($res_usuarios)) { ?>
								<option value="<?php echo mysql_result($res_usuarios,$contador,"codigo")?>"><?php echo mysql_result($res_usuarios,$contador,"codigo")?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
    <td width="42%" rowspan="14" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<?php
					  	$query_eventos="SELECT * FROM evento ORDER BY nombre ASC";
						$res_eventos=mysql_query($query_eventos);
						$contador=0;
					  ?>
						<td>Evento</td>

                        <td width="43%"><select id="idevento" name="idevento" class="comboGrande">
							<option value="0">Seleccione un evento</option>
								<?php
								while ($contador < mysql_num_rows($res_eventos)) { ?>
								<option value="<?php echo mysql_result($res_eventos,$contador,"idevento")?>"><?php echo mysql_result($res_eventos,$contador,"nombre")?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
                                </tr>
				  </table>
			  
				<div id="botonBusqueda">
					<img src="../../img/botonaceptar.jpg" width="85" height="22" onClick="validar(formulario,true)" border="1" onMouseOver="style.cursor=cursor">
					<img src="../../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
					<input id="accion" name="accion" value="alta" type="hidden">
					<input id="id" name="Zid" value="" type="hidden">
			  </div>
			  </form>
			  </div>
		  </div>
		</div>
	</body>
</html>
