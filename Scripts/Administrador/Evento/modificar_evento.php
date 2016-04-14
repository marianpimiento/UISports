<?php
header('Content-Type: text/html;charset=utf-8');
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 

include ("../../includes/conectar.php");


$idevento=$_GET["idevento"];
$cadena_busqueda=isset($_GET["cadena_busqueda"]);


$query="SELECT * FROM evento WHERE idevento='$idevento'";
$rs_query=mysql_query($query);

?>
<html>
	<head>
		<title>Principal</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../../funciones/validar.js"></script>
		<link href="../../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
		<script type="text/JavaScript" language="javascript" src="../../calendario/calendar.js"></script>
		<script type="text/JavaScript" language="javascript" src="../../calendario/lang/calendar-sp.js"></script>
		<script type="text/JavaScript" language="javascript" src="../../calendario/calendar-setup.js"></script>
		<script language="javascript">
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		function cancelar() {
			location.href="index.php?cadena_busqueda=<?php echo $cadena_busqueda?>";
		}
		
		function limpiar() {
			document.getElementById("nombre").value="";
			document.getElementById("informacion").value="";
			document.formulario.iddeporte.options[0].selected = true;
			document.getElementById("fechainicioinscripcion").value="";
			document.getElementById("fechafininscripcion").value="";
			document.getElementById("fechainicioevento").value="";
			document.getElementById("fechafinevento").value="";
		}
		
		</script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">MODIFICAR EVENTO </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar_evento.php" enctype="multipart/form-data">
				<input id="accion" name="accion" value="modificar" type="hidden">
				<input id="id" name="id" value="<?php echo $idevento?>" type="hidden">
				<input id="idevento" name="idevento" value="<?php echo $idevento?>" type="hidden">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
						<td width="20%">Nombre</td>
						<?php $nombre=mysql_result($rs_query,0,"nombre");?>
					      <td colspan="2"><input name="Anombre" id="nombre" value="<?php echo mysql_result($rs_query,0,"nombre")?>" maxlength="40" class="cajaGrande" type="text"></td>
				          <td width="4%" rowspan="15" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
                        <tr>
							<td width="11%">Información</td>
						    <td colspan="2"><textarea name="Ainformacion" cols="41" rows="2" id="informacion" class="areaTexto"><?php echo mysql_result($rs_query,0,"informacion")?></textarea></td>
				        </tr>
						
						<?php
						$iddeporte=mysql_result($rs_query,0,"iddeporte");
					  	$query_deportes="SELECT * FROM deporte WHERE estado=0 ORDER BY nombre ASC";
						$res_deportes=mysql_query($query_deportes);
						$contador=0;
					  ?>
						<tr>
							<td width="11%">Deporte</td>
							<td colspan="2"><select id="iddeporte" name="iddeporte" class="comboGrande">
							
								<option value="0">Seleccione un deporte</option>
								<?php
								while ($contador < mysql_num_rows($res_deportes)) { 
									if ($iddeporte==mysql_result($res_deportes,$contador,"iddeporte")) {?>
								<option value="<?php echo mysql_result($res_deportes,$contador,"iddeporte")?>" selected="selected"><?php echo mysql_result($res_deportes,$contador,"nombre")?></option>
								<?php } else { ?>
								<option value="<?php echo mysql_result($res_deportes,$contador,"iddeporte")?>"><?php echo mysql_result($res_deportes,$contador,"nombre")?></option>
								<?php } 
									$contador++;
								} ?>				
								</select>							</td>
				        </tr>
						<tr>
							<td>Fecha Inicio Inscripción</td>
							<td colspan="2"><input NAME="fechainicioins" type="text" class="cajaPequena" id="fechainicioins" size="10" maxlength="10" value="<?php echo mysql_result($rs_query,0,"fechainicioinscripcion")?>"><img src="../../img/calendario.png" name="Image1" id="Image1" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fechainicioins",
					ifFormat   : "%Y/%m/%d",
					button     : "Image1"
					  }
					);
		</script></td>
				      </tr>
					  <tr>
							<td>Fecha Fin Inscripción</td>
							<td colspan="2"><input NAME="fechafinins" type="text" class="cajaPequena" id="fechafinins" size="10" maxlength="10" value="<?php echo mysql_result($rs_query,0,'fechafininscripcion')?>" readonly><img src="../../img/calendario.png" name="Image2" id="Image2" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fechafinins",
					ifFormat   : "%Y/%m/%d",
					button     : "Image2"
					  }
					);
		</script></td>
				      </tr>
					  <tr>
							<td>Fecha Inicio Evento</td>
							<td colspan="2"><input NAME="fechainicioeve" type="text" class="cajaPequena" id="fechainicioeve" size="10" maxlength="10" value="<?php echo mysql_result($rs_query,0,'fechainicioevento')?>" readonly><img src="../../img/calendario.png" name="Image3" id="Image3" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fechainicioeve",
					ifFormat   : "%Y/%m/%d",
					button     : "Image3"
					  }
					);
		</script></td>
				      </tr>
					  <tr>
							<td>Fecha Fin Evento</td>
							<td colspan="2"><input NAME="fechafineve" type="text" class="cajaPequena" id="fechafineve" size="10" maxlength="10" value="<?php echo mysql_result($rs_query,0,'fechafinevento')?>" readonly><img src="../../img/calendario.png" name="Image4" id="Image4" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fechafineve",
					ifFormat   : "%Y/%m/%d",
					button     : "Image4"
					  }
					);
		</script></td>
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
