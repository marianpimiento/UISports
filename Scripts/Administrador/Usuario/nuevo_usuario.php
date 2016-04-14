<?php
header('Content-Type: text/html;charset=utf-8');
include ("../../includes/conectar.php"); ?>
<html>
	<head>
		<title>Principal</title>
		<link href="../../css/estilos.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../../funciones/validar.js"></script>
        <script type="text/javascript" src="../../js/JSnuevo_usuario.js"></script>
		<script language="javascript"> inicio(); </script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">INSERTAR Usuario </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar_usuario.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
                            <td width="15%">Codigo</td>
						    <td width="43%"><input NAME="codigo" type="text" class="cajaMedia" id="codigo" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="14" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
                        <tr>
                         <td width="15%">Nombre</td>
						    <td width="43%"><input NAME="nombre" type="text" class="cajaGrande" id="nombre" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="14" align="left" valign="top"><ul id="lista-errores"></ul></td>
                        </tr>
						<tr>
						 <td>Correo electr&oacute;nico  </td>
						  <td><input NAME="correo" type="text" class="cajaGrande" id="correo" size="35" maxlength="35"></td>
				      </tr>
						<tr>
						  <td>password</td>
						  <td><input NAME="password" type="text" class="cajaGrande" id="password" size="45" maxlength="45"></td>
				      </tr>
						<tr>
						  <td>Cedula</td>
						  <td><input NAME="cedula" type="text" class="cajaMedia" id="cedula" size="35" maxlength="35"></td>
				      </tr>
						<tr>
							<td width="15%">Genero</td>
							<td width="43%"><select id="genero" name="genero" class="comboGrande">
							<option value="0">Seleccione género</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                            </select>
                            </td>
                      </tr>
								
					  <tr>
							<td>Direccion</td>
							<td><input id="direccion" type="text" class="cajaGrande" NAME="direccion" maxlength="20"></td>
				      </tr>
						<tr>
							<td>Tel&eacute;fono </td>
							<td><input id="telefono" name="telefono" type="text" class="cajaPequena" maxlength="14"></td>
					    </tr>
						<tr>
							<td>Celular</td>
							<td><input id="celular" name="celular" type="text" class="cajaPequena" maxlength="14"></td>
					    </tr>
					</table>
			  
				<div id="botonBusqueda">
					<img src="../../img/botonaceptar.jpg" width="85" height="22" onClick="validar(formulario,true)" border="1" onMouseOver="style.cursor=cursor">
					<img src="../../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
					<input id="accion" name="accion" value="alta" type="hidden">
					<input id="id" name="Zid" value="" type="hidden">
			  </div>
			  </form>
			  </div>
		  </div>
		</div>
	</body>
</html>
