<?php
header('Content-Type: text/html;charset=utf-8');
include ("../../includes/conectar.php"); ?>
<html>
	<head>
		<title>Principal</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../../funciones/validar.js"></script>
        <link href="../../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
		<script type="text/JavaScript" language="javascript" src="../../calendario/calendar.js"></script>
		<script type="text/JavaScript" language="javascript" src="../../calendario/lang/calendar-sp.js"></script>
		<script type="text/JavaScript" language="javascript" src="../../calendario/calendar-setup.js"></script>
		<script type="text/javascript" src="../../js/JSnuevo_evento.js"></script>
		<script language="javascript"> inicio(); </script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">INSERTAR EVENTO </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar_evento.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%">Nombre</td>
						    <td width="43%"><input NAME="Anombre" type="text" class="cajaGrande" id="nombre" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="14" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
						  <td>Información</td>
						  <td><textarea name="Ainformacion" cols="41" rows="2" id="informacion" class="areaTexto"></textarea></td>
				      </tr>
						<?php
					  	$query_deportes="SELECT * FROM deporte ORDER BY nombre ASC";
						$res_deportes=mysql_query($query_deportes);
						$contador=0;
					  ?>
						<td>Deporte</td>

                        <td width="43%"><select id="iddeporte" name="iddeporte" class="comboGrande">
							<option value="0">Seleccione un deporte</option>
								<?php
								while ($contador < mysql_num_rows($res_deportes)) { ?>
								<option value="<?php echo mysql_result($res_deportes,$contador,"iddeporte")?>"><?php echo mysql_result($res_deportes,$contador,"nombre")?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
                                </tr>
               		  <tr>
						  <td>Fecha de inicio Inscripción</td>
						  <td><input id="fechainicioins" type="text" class="cajaPequena" NAME="fechainicioins" maxlength="10" readonly><img src="../../img/calendario.png" name="Image1" id="Image1" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'" title="Calendario1">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fechainicioins",
					ifFormat   : "%Y/%m/%d",
					button     : "Image1"
					  }
					);
		</script>	</td>
				      </tr>
					  <tr>
						  <td>Fecha de fin Inscripción</td>
						  <td><input id="fechafinins" type="text" class="cajaPequena" NAME="fechafinins" maxlength="10" readonly><img src="../../img/calendario.png" name="Image2" id="Image2" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'" title="Calendario2">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fechafinins",
					ifFormat   : "%Y/%m/%d",
					button     : "Image2"
					  }
					);
		</script></td>  </tr>
					  <tr>
						  <td>Fecha de inicio Evento</td>
						  <td><input id="fechainicioeve" type="text" class="cajaPequena" NAME="fechainicioeve" maxlength="10"  readonly><img src="../../img/calendario.png" name="Image3" id="Image3" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'" title="Calendario3">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fechainicioeve",
					ifFormat   : "%Y/%m/%d",
					button     : "Image3"
					  }
					);
		</script>	</td>	</tr>
						
					<tr>
						  <td>Fecha de fin Evento</td>
						  <td><input id="fechafineve" type="text" class="cajaPequena" NAME="fechafineve" maxlength="10" readonly><img src="../../img/calendario.png" name="Image4" id="Image4" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'" title="Calendario4">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fechafineve",
					ifFormat   : "%Y/%m/%d",
					button     : "Image4"
					  }
					);
		</script>	</td>	</tr>
						
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
