<?php 
header('Content-Type: text/html;charset=utf-8');
include ("../../includes/conectar.php"); 

$codigo=$_GET["codigo"];

$query="SELECT * FROM usuario WHERE codigo='$codigo'";
$rs_query=mysql_query($query);

?>
<html>
	<head>
		<title>Principal</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../../funciones/validar.js"></script>
        <script type="text/javascript" src="../../js/JSmodificar_usuario.js"></script>
		<script language="javascript">  inicio(); </script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">MODIFICAR USUARIO </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar_usuario.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td>C&oacute;digo</td>
							<td><?php echo $codigo?></td>
						    <td width="42%" rowspan="14" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
                        <tr>
							<td width="15%">Correo</td>
						    <td width="43%"><input NAME="correo" type="text" class="cajaGrande" id="correo" size="45" maxlength="45" value="<?php echo mysql_result($rs_query,0,"correo")?>"></td>
				        </tr>
						<tr>
							<td width="15%">Nombre</td>
						    <td width="43%"><input NAME="nombre" type="text" class="cajaGrande" id="nombre" size="45" maxlength="45" value="<?php echo mysql_result($rs_query,0,"nombre")?>"></td>
				        </tr>
                        <tr>
							<td width="15%">Apellido</td>
						    <td width="43%"><input NAME="apellido" type="text" class="cajaGrande" id="apellido" size="45" maxlength="45" value="<?php echo mysql_result($rs_query,0,"apellido")?>"></td>
				        </tr>
						<tr>
						  <td>Password</td>
						  <td><input id="password" type="text" class="cajaPequena" NAME="password" maxlength="15" value="<?php echo mysql_result($rs_query,0,"password")?>"></td>
				      </tr>
                      <tr>
							<td width="15%">Cedula</td>
						    <td width="43%"><input NAME="cedula" type="text" class="cajaMedia" id="cedula" size="45" maxlength="45" value="<?php echo mysql_result($rs_query,0,"cedula")?>"></td>
			          </tr>
						<tr>
						  <td>Direcci&oacute;n</td>
						  <td><input NAME="direccion" type="text" class="cajaGrande" id="direccion" size="45" maxlength="45" value="<?php echo mysql_result($rs_query,0,"direccion")?>"></td>
				      </tr>
                      <tr>
						  <td>Telefono</td>
						  <td><input NAME="telefono" type="text" class="cajaMedia" id="telefono" size="45" maxlength="45" value="<?php echo mysql_result($rs_query,0,"telefono")?>"></td>
				      </tr>
                      <tr>
						  <td>Celular</td>
						  <td><input NAME="celular" type="text" class="cajaGrande" id="celular" size="45" maxlength="45" value="<?php echo mysql_result($rs_query,0,"celular")?>"></td>
				      </tr>
						<tr>
							<td width="15%">Genero</td>
							<td width="43%"><select id="genero" name="genero" class="comboGrande">
							<option value="0">Seleccione un género</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
							</select>
                            </td>
			          </tr>
					</table>
			  </div>
              
				<div id="botonBusqueda">
					<img src="../../img/botonaceptar.jpg" width="85" height="22" onClick="validar(formulario,true)" border="1" onMouseOver="style.cursor=cursor">
					<img src="../../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
					<input id="accion" name="accion" value="modificar" type="hidden">
					<input id="id" name="id" value="" type="hidden">
					<input id="codigo" name="codigo" value="<?php echo $codigo?>" type="hidden">
			  </div>
			  </form>
		  </div>
		  </div>
		</div>
	</body>
</html>
