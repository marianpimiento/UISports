<?php
header('Content-Type: text/html;charset=utf-8');
include ("../../includes/conectar.php"); 

$codigo=$_POST["codigo"];
$correo=$_POST["correo"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$cadena_busqueda=$_POST["cadena_busqueda"];

$where="1=1";
if ($codigo <> "") { $where.=" AND codigo like '$codigo%'"; }
if ($correo <> "") { $where.=" AND correo like '%".$correo."%'"; }
if ($nombre <> "") { $where.=" AND nombre like '%".$nombre."%'"; }
if ($apellido <> "") { $where.=" AND apellido like '%".$apellido."%'"; }

$where.=" ORDER BY nombre ASC";
$query_busqueda="SELECT count(*) as filas FROM usuario WHERE estado=0 AND ".$where;
$rs_busqueda=mysql_query($query_busqueda);
$filas=mysql_result($rs_busqueda,0,"filas");

?>
<html>
	<head>
		<title>Usuarios</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../../js/JSrejilla_usuario.js"></script>

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
						<?php $sel_resultado="SELECT * FROM usuario WHERE estado=0 AND ".$where;
						   $sel_resultado=$sel_resultado."  limit ".$iniciopagina.",10";
						   $res_resultado=mysql_query($sel_resultado);
						   $contador=0;
						   while ($contador < mysql_num_rows($res_resultado)) { 
								 if ($contador % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
							<td class="aCentro" width="8%"><?php echo $contador+1;?></td>
							<td width="20%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"codigo")?></div></td>
                            <td width="30%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"correo")?></div></td>
							<td width="20%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"nombre")?></div></td>
							<td class="aDerecha" width="20%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"apellido")?></div></td>
							
						  <td width="5%"><div align="center"><a href="#"><img src="../../img/modificar.png" width="16" height="16" border="0" onClick="modificar_usuario(<?php echo mysql_result($res_resultado,$contador,"codigo")?>)" title="Modificar"></a></div></td>
														<td width="5%"><div align="center"><a href="#"><img src="../../img/ver.png" width="16" height="16" border="0" onClick="ver_usuario(<?php echo mysql_result($res_resultado,$contador,"codigo")?>)" title="Visualizar"></a></div></td>
							<td width="6%"><div align="center"><a href="#"><img src="../../img/eliminar (2).png" width="16" height="16" border="0" onClick="eliminar_usuario(<?php echo mysql_result($res_resultado,$contador,"codigo")?>)" title="Eliminar"></a></div></td>
						</tr>
						<?php $contador++;
							}
						?>			
					</table>
					<?php } else { ?>
					<table class="fuente8" width="87%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="100%" class="mensaje"><?php echo "No hay ning&uacute;n usuario que cumpla con los criterios de b&uacute;squeda";?></td>
					    </tr>
					</table>					
					<?php } ?>					
				</div>
			</div>
		  </div>			
		</div>
	</body>
</html>
