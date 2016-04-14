<?php
include ("../../includes/conectar.php");
$cadena_busqueda=isset($_GET["cadena_busqueda"]);

if (!isset($cadena_busqueda)) { $cadena_busqueda=""; } else { $cadena_busqueda=str_replace("",",",$cadena_busqueda); }

if ($cadena_busqueda<>"") {
	$array_cadena_busqueda=explode("~",$cadena_busqueda);
	$idinscripcion=$array_cadena_busqueda[1];
	$codigosuario=$array_cadena_busqueda[2];
	$idevento=$array_cadena_busqueda[3];
	
	
} else {
	$idinscripcion="";
	$codigousuario="";
	$idevento="";
	
}
?>
<html>
	<head>
		<title>::Inscripciones::</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../../js/JSindex_inscripciones.js"></script>
		<script language="javascript"> primerinicio(); </script>
	</head>
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">Buscar Inscripcion </div>
				<div id="frmBusqueda">
				<form id="form_busqueda" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>					
						<tr>
							<td width="16%">Codigo de Inscripción</td>
							<td width="68%"><input id="idinscripcion" type="text" class="cajaPequena" NAME="idinscripcion" maxlength="10" value="<?php echo $idinscripcion?>"> <img src="../../img/ver.png" width="16" height="16" onClick="abreVentana()" title="Buscar inscripcion" onMouseOver="style.cursor=cursor"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
							<td width="6%" align="right"></td>
						</tr>
                        <tr>
							<td>Codigo Usuario</td>
							<td><input id="codigousuario" name="codigousuario" type="text" class="cajaGrande" maxlength="45" value="<?php echo $codigousuario?>"></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Id Evento</td>
							<td><input id="idevento" name="idevento" type="text" class="cajaGrande" maxlength="45" value="<?php echo $idevento?>"></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						
					</table>
			  </div>
			 	<div id="botonBusqueda"><img src="../../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="buscar()" onMouseOver="style.cursor=cursor">
			 	  <img src="../../img/botonlimpiar.jpg" width="69" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor">
				    <img src="../../img/botonnuevocliente.jpg" width="107" height="22" border="1" onClick="nuevo_inscripcion()" onMouseOver="style.cursor=cursor"></div>
			  <div id="lineaResultado">
			  <table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
			  	<tr>
				<td width="50%" align="left">N de inscripciones encontrados <input id="filas" type="text" class="cajaPequena" NAME="filas" maxlength="5" readonly></td>
				<td width="50%" align="right">Mostradas <select name="paginas" id="paginas" onChange="paginar()">
		          </select></td>
			  </table>
				</div>
				<div id="cabeceraResultado" class="header">
				  Relacion de Deportes </div>
				<div id="frmResultado">
				<table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
						<tr class="cabeceraTabla">
							<td width="13%">ITEM</td>
							<td width="12%">INSCRIPCION</td>
   							<td width="31%">CODIGO USUARIO</td>
							<td width="21%">EVENTO</td>
							
						  <td width="6%">&nbsp;</td>
							<td width="8%">&nbsp;</td>
							<td width="9%">&nbsp;</td>
						</tr>
				</table>
				</div>
				<input type="hidden" id="iniciopagina" name="iniciopagina">
				<input type="hidden" id="cadena_busqueda" name="cadena_busqueda">
			</form>
				<div id="lineaResultado">
					<iframe width="100%" height="250" id="frame_rejilla" name="frame_rejilla" frameborder="0">
						<ilayer width="100%" height="250" id="frame_rejilla" name="frame_rejilla"></ilayer>
					</iframe>
					<iframe id="frame_datos" name="frame_datos" width="0" height="0" frameborder="0">
					<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
					</iframe>
				</div>
			</div>
		  </div>			
		</div>
	</body>
</html>
