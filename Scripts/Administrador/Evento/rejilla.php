<?php
header('Content-Type: text/html;charset=utf-8');
include ("../../includes/conectar.php");

$idevento=$_POST["idevento"];
$nombre=$_POST["nombre"];
$informacion=$_POST["informacion"];
$iddeporte=isset($_POST["iddeporte"]);
$fechainicioins=$_POST["fechainicioins"];
$fechafinins=$_POST["fechafinins"];
$fechainicioeve=$_POST["fechainicioeve"];
$fechafineve=$_POST["fechafineve"];
$cadena_busqueda=$_POST["cadena_busqueda"];

$where="1=1";
if ($idevento <> "") { $where.=" AND idevento='$idevento'"; }
if ($nombre <> "") { $where.=" AND nombre like '%".$nombre."%'"; }
if ($informacion <> "") { $where.=" AND informacion like '%".$informacion."%'"; }
if ($iddeporte > "0") { $where.=" AND iddeporte='$iddeporte'"; }
if ($fechainicioins <> "") { $where.=" AND fechainicioins='$fechainicioins'"; }
if ($fechafinins <> "") { $where.=" AND fechafinins='$fechafinins'"; }
if ($fechainicioeve <> "") { $where.=" AND fechainicioins='$fechainicioeve'"; }
if ($fechafineve <> "") { $where.=" AND fechafinins='$fechafineve'"; }

$where.=" ORDER BY nombre ASC";
$query_busqueda="SELECT count(*) as filas FROM evento WHERE estado=0 AND ".$where;
$rs_busqueda=mysql_query($query_busqueda);
$filas=mysql_result($rs_busqueda,0,"filas");

?>
<html>
	<head>
		<title>Clientes</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript">
		
		function ver_evento(idevento) {
			parent.location.href="ver_eventos.php?idevento=" + idevento + "&cadena_busqueda=<?php echo $cadena_busqueda?>";
		}
		
		function modificar_evento(idevento) {
			parent.location.href="modificar_evento.php?idevento=" + idevento + "&cadena_busqueda=<?php echo $cadena_busqueda?>";
		}
		
		function eliminar_evento(idevento) {
			parent.location.href="eliminar_evento.php?idevento=" + idevento + "&cadena_busqueda=<?php echo $cadena_busqueda?>";
		}

		function inicio() {
			var numfilas=document.getElementById("numfilas").value;
			var indi=parent.document.getElementById("iniciopagina").value;
			var contador=1;
			var indice=0;
			if (indi>numfilas) { 
				indi=1; 
			}
			parent.document.form_busqueda.filas.value=numfilas;
			parent.document.form_busqueda.paginas.innerHTML="";		
			while (contador<=numfilas) {
				texto=contador + "-" + parseInt(contador+9);
				if (indi==contador) {
					parent.document.form_busqueda.paginas.options[indice]=new Option (texto,contador);
					parent.document.form_busqueda.paginas.options[indice].selected=true;
				} else {
					parent.document.form_busqueda.paginas.options[indice]=new Option (texto,contador);
				}
				indice++;
				contador=contador+10;
			}
		}
		</script>
	</head>

	<body onload=inicio()>	
		<div id="pagina">
			<div id="zonaContenido">
			<div align="center">
			<table class="fuente8" width="87%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
			<input type="hidden" name="numfilas" id="numfilas" value="<?php echo $filas?>">
				<?php $iniciopagina=$_POST["iniciopagina"];
				if (empty($iniciopagina)) { $iniciopagina=$_GET["iniciopagina"]; } else { $iniciopagina=$iniciopagina-1;}
				if (empty($iniciopagina)) { $iniciopagina=0; }
				if ($iniciopagina>$filas) { $iniciopagina=0; }
					if ($filas > 0) { ?>
						<?php $sel_resultado="SELECT * FROM evento WHERE estado=0 AND ".$where;
						   $sel_resultado=$sel_resultado."  limit ".$iniciopagina.",10";
						   $res_resultado=mysql_query($sel_resultado);
						   $contador=0;
						   while ($contador < mysql_num_rows($res_resultado)) { 
								 if ($contador % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
							<td class="aCentro" width="6%"><?php echo $contador+1;?></td>
							<td width="6%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"idevento")?></div></td>
							<td width="20%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"nombre")?></div></td>
							<td class="aDerecha" width="15%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"fechainicioinscripcion")?></div></td>
							<td class="aDerecha" width="15%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"fechafininscripcion")?></div></td>
                            <td class="aDerecha" width="15%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"fechainicioevento")?></div></td>
							<td class="aDerecha" width="15%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"fechafinevento")?></div></td>

							<td width="5%"><div align="center"><a href="#"><img src="../../img/modificar.png" width="16" height="16" border="0" onClick="modificar_evento(<?php echo mysql_result($res_resultado,$contador,"idevento")?>)" title="Modificar"></a></div></td>
														<td width="5%"><div align="center"><a href="#"><img src="../../img/ver.png" width="16" height="16" border="0" onClick="ver_evento(<?php echo mysql_result($res_resultado,$contador,"idevento")?>)" title="Visualizar"></a></div></td>
							<td width="6%"><div align="center"><a href="#"><img src="../../img/eliminar (2).png" width="16" height="16" border="0" onClick="eliminar_evento(<?php echo mysql_result($res_resultado,$contador,"idevento")?>)" title="Eliminar"></a></div></td>
						</tr>
						<?php $contador++;
							}
						?>			
					</table>
					<?php } else { ?>
					<table class="fuente8" width="87%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="100%" class="mensaje"><?php echo "No hay ning&uacute;n evento que cumpla con los criterios de b&uacute;squeda";?></td>
					    </tr>
					</table>					
					<?php } ?>					
				</div>
			</div>
		  </div>			
		</div>
	</body>
</html>
