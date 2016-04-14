<?php
header('Content-Type: text/html;charset=utf-8');
include ("../../includes/conectar.php");
$cadena_busqueda=isset($_GET["cadena_busqueda"]);

if (!isset($cadena_busqueda)) { $cadena_busqueda=""; } else { $cadena_busqueda=str_replace("",",",$cadena_busqueda); }

if ($cadena_busqueda<>"") {
	$array_cadena_busqueda=explode("~",$cadena_busqueda);
	$idevento=$array_cadena_busqueda[1];
	$nombre=$array_cadena_busqueda[2];
	$informacion=$array_cadena_busqueda[3];
	$iddeporte=$array_cadena_busqueda[4];
	$fechainicioins=$array_cadena_busqueda[5];
	$fechafinins=$array_cadena_busqueda[6];
	$fechainicioeve=$array_cadena_busqueda[7];
	$fechafineve=$array_cadena_busqueda[8];
	
} else {
	$idevento="";
	$nombre="";
	$informacion="";
	$iddeporte="";
	$fechainicioins="";
	$fechafinins="";
	$fechainicioeve="";
	$fechafineve="";
}
?>
<html>
	<head>
		<title>::Eventos::</title>
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
		
		function nuevo_evento() {
			location.href="nuevo_evento.php";
		}
		
		function imprimir() {
			var idevento=document.getElementById("idevento").value;
			var nombre=document.getElementById("nombre").value;
			var informacion=document.getElementById("informacion").value;
			var iddeporte=document.getElementById("iddeporte").value;			
			var fechainicioins=document.getElementById("fechainicioins").value;
			var fechafinins=document.getElementById("fechafinins").value;
			var fechainicioeve=document.getElementById("fechainicioeve").value;
			var fechainicioeve=document.getElementById("fechainicioeve").value;
			window.open("../fpdf/evento.php?idevento="+idevento+"&nombre="+nombre+"&informacion="+informacion+"&iddeporte="+iddeporte+"&fechainicioins="+fechainicioins+"&fechafinins="+fechafinins+"&fechainicioeve="+fechainicioeve+"&fechafineve="+fechafineve);
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
			var idevento=document.getElementById("idevento").value;
			var nombre=document.getElementById("nombre").value;
			var informacion=document.getElementById("informacion").value;
			var iddeporte=document.getElementById("iddeporte").value;			
			var fechainicioins=document.getElementById("fechainicioins").value;
			var fechafinins=document.getElementById("fechafinins").value;
			var fechainicioeve=document.getElementById("fechainicioeve").value;
			var fechafineve=document.getElementById("fechafineve").value;
			var cadena="";
			cadena="~"+codigo+"~"+nombre+"~"+informacion+"~"+iddeporte+"~"+fechainicioins+"~"+fechafinins+"~"+fechainicioeve+"~"+"~"+fechafineve+"~";
			return cadena;
			}
			
		function limpiar() {
			document.getElementById("form_busqueda").reset();
		}
		
		function abreVentana(){
			miPopup = window.open("ventana_evento.php","miwin","width=700,height=380,scrollbars=yes");
			miPopup.focus();
		}
		
		function validarevento(){
			var idevento=document.getElementById("idevento").value;
			miPopup = window.open("comprobarevento.php?idevento="+idevento,"frame_datos","width=700,height=80,scrollbars=yes");
		}	
		
		</script>
	</head>
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">Buscar Evento </div>
				<div id="frmBusqueda">
				<form id="form_busqueda" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>					
						<tr>
							<td width="16%">Codigo de Evento</td>
							<td width="68%"><input id="idevento" type="text" class="cajaPequena" NAME="idevento" maxlength="10" value="<?php echo $idevento?>"> <img src="../../img/ver.png" width="16" height="16" onClick="abreVentana()" title="Buscar evento" onMouseOver="style.cursor=cursor"></td>
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
							<td>Informacion</td>
							<td><input id="informacion" name="informacion" type="text" class="cajaGrande" maxlength="45" value="<?php echo $informacion?>"></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
						  <td>Id Deporte</td>
						  <td><input id="iddeporte" type="text" class="cajaPequena" NAME="iddepore" maxlength="3" value="<?php echo $iddeporte?>"></td></tr>			
                          <tr>
                          
						  <td>Fecha Inicio Inscripción</td>
						  <td><input id="fechainicioins" type="text" class="cajaPequena" NAME="fechainicioins" maxlength="15" value="<?php echo $fechainicioins?>"></td></tr>
					  <tr><td>Fecha Fin Inscripción</td>
                           <td><input id="fechafinins" type="text" class="cajaPequena" NAME="fechafinins" maxlength="15" value="<?php echo $fechafinins?>"></td>
					  </tr>
						<tr>
						  <td>Fecha Inicio Evento</td>
						  <td><input id="fechainicioeve" type="text" class="cajaPequena" NAME="fechainicioeve" maxlength="15" value="<?php echo $fechainicioeve?>"></td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
					  </tr>
                      <tr>
						  <td>Fecha Fin Evento</td>
						  <td><input id="fechafineve" type="text" class="cajaPequena" NAME="fechafineve" maxlength="15" value="<?php echo $fechafineve?>"></td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
					  </tr>
					</table>
			  </div>
			 	<div id="botonBusqueda"><img src="../../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="buscar()" onMouseOver="style.cursor=cursor">
			 	  <img src="../../img/botonlimpiar.jpg" width="69" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor">
				    <img src="../../img/botonnuevocliente.jpg" width="107" height="22" border="1" onClick="nuevo_evento()" onMouseOver="style.cursor=cursor"></div>
			  <div id="lineaResultado">
			  <table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
			  	<tr>
				<td width="50%" align="left">N de eventos encontrados <input id="filas" type="text" class="cajaPequena" NAME="filas" maxlength="5" readonly></td>
				<td width="50%" align="right">Mostrados <select name="paginas" id="paginas" onChange="paginar()">
		          </select></td>
			  </table>
				</div>
				<div id="cabeceraResultado" class="header">
				  relacion de Eventos </div>
				<div id="frmResultado">
				<table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
						<tr class="cabeceraTabla">
							<td width="6%">ITEM</td>
							<td width="6%">CODIGO</td>
                            <td width="15%">NOMBRE</td>
							<td width="15%">Fecha Ini Ins</td>
                            <td width="15%">Fecha Fin Ins</td>
							<td width="15%">Fecha Ini Eve</td>
                            <td width="15%">Fecha Fin Eve</td>
						  <td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
							<td width="6%">&nbsp;</td>
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
