<?php
header('Content-Type: text/html;charset=utf-8');
include ("../../includes/conectar.php");
$cadena_busqueda=isset($_GET["cadena_busqueda"]);

if (!isset($cadena_busqueda)) { $cadena_busqueda=""; } else { $cadena_busqueda=str_replace("",",",$cadena_busqueda); }

if ($cadena_busqueda<>"") {
	$array_cadena_busqueda=explode("~",$cadena_busqueda);
	$iddeporte=$array_cadena_busqueda[1];
	$nombre=$array_cadena_busqueda[2];
	$miniparticipantes=$array_cadena_busqueda[3];
	
	
} else {
	$iddeporte="";
	$nombre="";
	$minimoparticipantes="";
	
}
?>
<html>
	<head>
		<title>::Deportes::</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">

		<script language="javascript">
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		function inicio() {
			document.getElementById("form_busqueda").submit();
		}
		
		function nuevo_deporte() {
			location.href="nuevo_deporte.php";
		}
		
		function imprimir() {
			var iddeporte=document.getElementById("iddeporte").value;
			var nombre=document.getElementById("nombre").value;
			var miniparticipantes=document.getElementById("minimoparticipantes").value;			
			window.open("../fpdf/deporte.php?iddeporte="+iddeporte+"&nombre="+nombre+"&minimoparticipantes="+minimoparticipantes);
		}
		
		function buscar() {
			var cadena;
			cadena=hacer_cadena_busqueda();
			document.getElementById("cadena_busqueda").value=cadena;
			if (document.getElementById("iniciopagina").value=="") {
				document.getElementById("iniciopagina").value=1;
			} else {
				document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
			}
			document.getElementById("form_busqueda").submit();
		}
		
		function paginar() {
			document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
			document.getElementById("form_busqueda").submit();
		}
		
		function hacer_cadena_busqueda() {
			var iddeporte=document.getElementById("iddeporte").value;
			var nombre=document.getElementById("nombre").value;
			var minimoparticipantes=document.getElementById("minimoparticipantes").value;			
			var cadena="";
			cadena="~"+iddeporte+"~"+nombre+"~"+minimoparticipantes+"~";
			return cadena;
			}
			
		function limpiar() {
			document.getElementById("form_busqueda").reset();
		}
		
		function abreVentana(){
			miPopup = window.open("ventana_deporte.php","miwin","width=700,height=380,scrollbars=yes");
			miPopup.focus();
		}
		
		function validardeporte(){
			var iddeporte=document.getElementById("iddeporte").value;
			miPopup = window.open("comprobardeporte.php?iddeporte="+iddeporte,"frame_datos","width=700,height=80,scrollbars=yes");
		}	
		
		</script>
	</head>
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">Buscar Deporte </div>
				<div id="frmBusqueda">
				<form id="form_busqueda" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>					
						<tr>
							<td width="16%">Codigo de Deporte</td>
							<td width="68%"><input id="iddeporte" type="text" class="cajaPequena" NAME="iddeporte" maxlength="10" value="<?php echo $iddeporte?>"> <img src="../../img/ver.png" width="16" height="16" onClick="abreVentana()" title="Buscar deporte" onMouseOver="style.cursor=cursor"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
							<td width="6%" align="right"></td>
						</tr>
                        <tr>
							<td>Nombre</td>
							<td><input id="nombre" name="nombre" type="text" class="cajaGrande" maxlength="45" value="<?php echo $nombre?>"></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Número de participantes</td>
							<td><input id="minimoparticipantes" name="minimoparticipantes" type="text" class="cajaGrande" maxlength="45" value="<?php echo $minimoparticipantes?>"></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						
					</table>
			  </div>
			 	<div id="botonBusqueda"><img src="../../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="buscar()" onMouseOver="style.cursor=cursor">
			 	  <img src="../../img/botonlimpiar.jpg" width="69" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor">
				    <img src="../../img/botonnuevocliente.jpg" width="107" height="22" border="1" onClick="nuevo_deporte()" onMouseOver="style.cursor=cursor"></div>
			  <div id="lineaResultado">
			  <table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
			  	<tr>
				<td width="50%" align="left">N de deportes encontrados <input id="filas" type="text" class="cajaPequena" NAME="filas" maxlength="5" readonly></td>
				<td width="50%" align="right">Mostrados <select name="paginas" id="paginas" onChange="paginar()">
		          </select></td>
			  </table>
				</div>
				<div id="cabeceraResultado" class="header">
				  Relacion de Deportes </div>
				<div id="frmResultado">
				<table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
						<tr class="cabeceraTabla">
							<td width="8%">ITEM</td>
							<td width="10%">CODIGO</td>
   							<td width="42%">NOMBRE </td>
							<td width="20%">MINIMO PARTICIPANTES</td>
							
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
