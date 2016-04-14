<?php
header('Content-Type: text/html;charset=utf-8');
include ("../../includes/conectar.php");

$iddeporte=$_POST["iddeporte"];
$nombre=$_POST["nombre"];
$minimoparticipantes=$_POST["minimoparticipantes"];
$cadena_busqueda=$_POST["cadena_busqueda"];

$where="1=1";
if ($iddeporte <> "") { $where.=" AND iddeporte='$iddeporte'"; }
if ($nombre <> "") { $where.=" AND nombre like '%".$nombre."%'"; }
if ($minimoparticipantes <> "") { $where.=" AND minimoparticipantes='$minimoparticipantes'"; }

$where.=" ORDER BY nombre ASC";
$query_busqueda="SELECT count(*) as filas FROM deporte WHERE estado=0 AND ".$where;
$rs_busqueda=mysql_query($query_busqueda);
$filas=mysql_result($rs_busqueda,0,"filas");

?>
<html>
	<head>
		<title>Deporte</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">

		<script language="javascript">
		
		function ver_deporte(iddeporte) {
			parent.location.href="ver_deporte.php?iddeporte=" + iddeporte + "&cadena_busqueda=<?php echo $cadena_busqueda?>";
		}
		
		function modificar_deporte(iddeporte) {
			parent.location.href="modificar_deporte.php?iddeporte=" + iddeporte + "&cadena_busqueda=<?php echo $cadena_busqueda?>";
		}
		
		function eliminar_deporte(iddeporte) {
			parent.location.href="eliminar_deporte.php?iddeporte=" + iddeporte + "&cadena_busqueda=<?php echo $cadena_busqueda?>";
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
						<?php $sel_resultado="SELECT * FROM deporte WHERE estado=0 AND ".$where;
						   $sel_resultado=$sel_resultado."  limit ".$iniciopagina.",10";
						   $res_resultado=mysql_query($sel_resultado);
						   $contador=0;
						   while ($contador < mysql_num_rows($res_resultado)) { 
								 if ($contador % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
							<td class="aCentro" width="8%"><?php echo $contador+1;?></td>
							<td width="10%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"iddeporte")?></div></td>
							<td width="40%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"nombre")?></div></td>
							<td class="aDerecha" width="20%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"minimoparticipantes")?></div></td>
						
							<td width="5%"><div align="center"><a href="#"><img src="../../img/modificar.png" width="16" height="16" border="0" onClick="modificar_deporte(<?php echo mysql_result($res_resultado,$contador,"iddeporte")?>)" title="Modificar"></a></div></td>
														<td width="5%"><div align="center"><a href="#"><img src="../../img/ver.png" width="16" height="16" border="0" onClick="ver_deporte(<?php echo mysql_result($res_resultado,$contador,"iddeporte")?>)" title="Visualizar"></a></div></td>
							<td width="6%"><div align="center"><a href="#"><img src="../../img/eliminar (2).png" width="16" height="16" border="0" onClick="eliminar_deporte(<?php echo mysql_result($res_resultado,$contador,"iddeporte")?>)" title="Eliminar"></a></div></td>
						</tr>
						<?php $contador++;
							}
						?>			
					</table>
					<?php } else { ?>
					<table class="fuente8" width="87%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="100%" class="mensaje"><?php echo "No hay ning&uacute;n deporte que cumpla con los criterios de b&uacute;squeda";?></td>
					    </tr>
					</table>					
					<?php } ?>					
				</div>
			</div>
		  </div>			
		</div>
	</body>
</html>
