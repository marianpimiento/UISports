<?php
include ("../../includes/conectar.php");

$idinscripcion=$_POST["idinscripcion"];
$codigousuario=$_POST["codigousuario"];
$idevento=$_POST["idevento"];
$cadena_busqueda=$_POST["cadena_busqueda"];
echo $codigousuario;
$where="1=1";
if ($idinscripcion <> "") { $where.=" AND idinscripcion='$idinscripcion'"; }
if ($codigousuario <> "") { $where.=" AND codigousuario like '%".$codigousuario."%'"; }
if ($idevento > "0") { $where.=" AND idevento='$idevento'"; }

$where.=" ORDER BY idinscripcion ASC";
$query_busqueda="SELECT count(*) as filas FROM inscripcion WHERE estado=0 AND ".$where;
$rs_busqueda=mysql_query($query_busqueda);
$filas=mysql_result($rs_busqueda,0,"filas");

?>
<html>
	<head>
		<title>Inscripciones</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../../js/JSrejilla_inscripcion.js"></script>

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
						<?php $sel_resultado="SELECT * FROM inscripcion WHERE estado=0 AND ".$where;
						   $sel_resultado=$sel_resultado."  limit ".$iniciopagina.",10";
						   $res_resultado=mysql_query($sel_resultado);
						   $contador=0;
						   while ($contador < mysql_num_rows($res_resultado)) { 
								 if ($contador % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
							<td class="aCentro" width="13%"><?php echo $contador+1;?></td>
							<td width="12%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"idinscripcion")?></div></td>
							<td width="32%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"codigousuario")?></div></td>
							<td class="aDerecha" width="22%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"idevento")?></div></td>
		
							<td width="6%"><div align="center"><a href="#"><img src="../../img/modificar.png" width="16" height="16" border="0" onClick="modificar_inscripcion(<?php echo mysql_result($res_resultado,$contador,"idinscripcion")?>)" title="Modificar"></a></div></td>
														<td width="8%"><div align="center"><a href="#"><img src="../../img/ver.png" width="16" height="16" border="0" onClick="ver_inscripcion(<?php echo mysql_result($res_resultado,$contador,"idinscripcion")?>)" title="Visualizar"></a></div></td>
							<td width="7%"><div align="center"><a href="#"><img src="../../img/eliminar (2).png" width="16" height="16" border="0" onClick="eliminar_inscripcion(<?php echo mysql_result($res_resultado,$contador,"idinscripcion")?>)" title="Eliminar"></a></div></td>
						</tr>
						<?php $contador++;
							}
						?>			
					</table>
					<?php } else { ?>
					<table class="fuente8" width="87%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="100%" class="mensaje"><?php echo "No hay ninguna inscripcion que cumpla con los criterios de b&uacute;squeda";?></td>
					    </tr>
					</table>					
					<?php } ?>					
				</div>
			</div>
		  </div>			
		</div>
	</body>
</html>
