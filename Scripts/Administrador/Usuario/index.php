<?php
header('Content-Type: text/html;charset=utf-8');
include ("../../includes/conectar.php");
$cadena_busqueda=isset($_GET["cadena_busqueda"]);

if (!isset($cadena_busqueda)) { $cadena_busqueda=""; } else { $cadena_busqueda=str_replace("",",",$cadena_busqueda); }

if ($cadena_busqueda<>"") {
	$array_cadena_busqueda=split("~",$cadena_busqueda);
	$codigo=$array_cadena_busqueda[1];
	$correo=$array_cadena_busqueda[2];
	$nombre=$array_cadena_busqueda[3];
	$apellido=$array_cadena_busqueda[4];
	$cedula=$array_cadena_busqueda[5];
	$direccion=$array_cadena_busqueda[6];
	$telefono=$array_cadena_busqueda[7];
	
} else {
	$codigo="";
	$correo="";
	$nombre="";
	$apellido="";
	$cedula="";
	$direccion="";
	$telefono="";
}
?>
<html>
	<head>
		<title>::Usuarios::</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../../js/JSindex_usuario.js"></script>
		<script language="javascript"> primerinicio(); </script>
	</head>
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">Buscar USUARIO </div>
				<div id="frmBusqueda">
				<form id="form_busqueda" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>					
						<tr>
							<td width="16%">Codigo de Usuario </td>
							<td width="68%"><input id="codigo" type="text" class="cajaPequena" NAME="codigo" maxlength="10" value="<?php echo $codigo?>"> <img src="../../img/ver.png" width="16" height="16" onClick="abreVentana()" title="Buscar usuario" onMouseOver="style.cursor=cursor"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
							<td width="6%" align="right"></td>
						</tr>
                        <tr>
							<td>Correo</td>
							<td><input id="correo" name="correo" type="text" class="cajaGrande" maxlength="45" value="<?php echo $correo?>"></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Nombre</td>
							<td><input id="nombre" name="nombre" type="text" class="cajaGrande" maxlength="45" value="<?php echo $nombre?>"></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
						  <td>Apellido</td>
						  <td><input id="apellido" type="text" class="cajaGrande" NAME="apellido" maxlength="3" value="<?php echo $apellido?>"></td></tr>			
                          <tr>
                          
						  <td>cedula</td>
						  <td><input id="cedula" type="text" class="cajaMedia" NAME="cedula" maxlength="15" value="<?php echo $cedula?>"></td></tr>
					  <tr><td>Direccion</td>
                           <td><input id="direccion" type="text" class="cajaGrande" NAME="direccion" maxlength="15" value="<?php echo $direccion?>"></td>
					  </tr>
						<tr>
						  <td>Tel&eacute;fono</td>
						  <td><input id="telefono" type="text" class="cajaPequena" NAME="telefono" maxlength="15" value="<?php echo $telefono?>"></td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
					  </tr>
					</table>
			  </div>
			 	<div id="botonBusqueda"><img src="../../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="buscar()" onMouseOver="style.cursor=cursor">
			 	  <img src="../../img/botonlimpiar.jpg" width="69" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor">
				    <img src="../../img/botonnuevocliente.jpg" width="107" height="22" border="1" onClick="nuevo_usuario()" onMouseOver="style.cursor=cursor"></div>
			  <div id="lineaResultado">
			  <table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
			  	<tr>
				<td width="50%" align="left">N de usuarios encontrados <input id="filas" type="text" class="cajaPequena" NAME="filas" maxlength="5" readonly></td>
				<td width="50%" align="right">Mostrados <select name="paginas" id="paginas" onChange="paginar()">
		          </select></td>
			  </table>
				</div>
				<div id="cabeceraResultado" class="header">
				  relacion de Usuarios </div>
				<div id="frmResultado">
				<table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
						<tr class="cabeceraTabla">
							<td width="8%">ITEM</td>
							<td width="20%">CODIGO</td>
                            <td width="25%">CORREO</td>
							<td width="19%">NOMBRE </td>
							<td width="19%">APELLIDO</td>
							
						  <td width="10%">&nbsp;</td>
							<td width="10%">&nbsp;</td>
							<td width="10%">&nbsp;</td>
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
