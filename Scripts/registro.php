<?php
header('Content-Type: text/html;charset=utf-8');
include ('../Scripts/includes/conectar.php');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<title>Registro</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link media="all" href="css/EstiloHome.css" type="text/css" rel="stylesheet" />
		<style type="text/css">
		body {
	background-color: #FFFFFF;
}
        </style>
		<script type="text/javascript" src="js/JSIngreso.js"></script>
	</head>

	<body>
		
		<div>
			<br>
			<img src="../Datos/registro.png" name="bgg" width="42" height="31" id="bgg"/>
			<a href="..\index.php"><img class="img3" src="../Datos/home2.png" title="Home" width="66" height="63"></a>
		</div>

		<div id="contact-form">

			<p id="failure">
				Revisa tu registro, y vuelve a enviar.
			</p>
			<p id="success">
				Tu registro se llevo a cabo exitosamente.
			</p>

			<form method="post" action="registro_script.php">
			  <table width="796" border="0">
			    <tr>
			      <td width="365" align="center"><label for="codigo">Código: <span class="required">*      
			           	 <br>
		            <input type="tel" pattern="[0-9]+" maxlength="8" id="codigo" name="codigo" value="" placeholder="xxxxxxxx" required title="Solo se aceptan números" autofocus />
			      </span></label>
                  <td width="403" align="center"><label for="correo">Correo electrónico: <span class="required">*<br>
                  <input type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="correo" name="correo" value="" placeholder="tuemail@email.com" required/>
                  <br>
                  </span></label>
			    <tr>
			      <td align="center">  <p>
			        <label>Contraseña:<span class="required">*</span></label>
			      </p>
			        <p>
			          <input type="password" id="password" name="password" placeholder="********">
	              </p></td>
			      <td align="center"><p>
			        <label>Confirmar contraseña:<span class="required">*</span></label>
			        </p>
			        <p>
			          <input type="password" id="passwordconf" name="passwordconf" placeholder="********" oninput="check(this)">  <script>
				check(input);
				</script>
	              </p></td>
			    </tr>
			      <tr>
			        <td align="center"><p>
			          <label for="texto">Nombres: <span class="required">*</span></label>
			          </p>
			          <p>
			            <input type="text" id="nombre" pattern="[a-zA-ZáéíóúñÁÉÍÓÚÑs ]*" name="nombre"  value=""  placeholder="Tus nombres acá" required title="Solo se aceptan caracteres alfabéticos" />
	                </p></td>
			        <td align="center"><p>
			          <label for="apellidos3">Apellidos: <span class="required">*</span></label>
			        </p>
			          <p>
			            <input type="text" id="apellido" pattern="[a-zA-ZáéíóúñÁÉÍÓÚÑs ]*" name="apellido" value=""  placeholder="Tus apellidos acá" required title="Solo se aceptan caracteres alfabéticos"/>
	                </p></td>
	            </tr>
			    <tr>
			      <td align="center"> <p>
			        <label for="cedula">Documento de Identidad: <span class="required">*</span></label>
			      </p>
			        <p>
			          <input type="tel" pattern="[0-9]+" maxlength="10" min="8" id="cedula" name="cedula" value="" placeholder="xxxxxxxxxx" required title="Solo se aceptan números" />
	              </p></td>
			      <td align="center"><label for="Direccion3">Dirección: <span class="required">*<br>
			      </span></label>
                  <input type="text" id="direccion"  name="direccion" value="" placeholder="Tu dirección acá" required /></td>
		        </tr>
			    <tr>
			      <td align="center">	<label for="Telefono">Teléfono: <span class="required">*<br>
			      </span></label>
				  <input type="tel" pattern="[0-9]+" maxlength="10" id="telefono" name="telefono" value="" placeholder="xxxxxxxxxx" required title="Solo se aceptan números" /> </td>
			      <td align="center"><label for="celular2">Celular: <span class="required">*<br>
			        </span></label>
                  <input type="tel" pattern="[0-9]+" maxlength="10" min="10" id="celular" name="celular" value="" placeholder="xxxxxxxxxx" required title="Solo se aceptan números" /></td>
			     
		        </tr>
			    <tr>
			      <td align="center">  <label for="Genero">Género: <span class="required">*<br>
				  </span></label>
				  <select name="genero">
				    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                  </select></td>
                  <td align="center"> </td>
		        </tr>
			    <tr>
			      <td colspan="4" align="center"><input type="submit" value="REGISTRAR" id="submit" /></td>
		        </tr>
			    
		      </table>

		  </form>
			
		</div>
		
	</body>
</html>