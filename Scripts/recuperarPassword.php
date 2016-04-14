<?php
header('Content-Type: text/html;charset=utf-8');
include ('../Scripts/includes/conectar.php');

        if(isset($_POST['enviar'])) { // comprobamos que se han enviado los datos del formulario
            if(empty($_POST['codigo'])) {
                echo "No ha ingresado el usuario. <a href='javascript:history.back();'>Reintentar</a>";
            }else {
                $codigo = mysql_real_escape_string($_POST['codigo']);
                $codigo = trim($codigo);
                $sql = mysql_query("SELECT codigo, password, correo FROM usuario WHERE codigo='".$codigo."'");
                if(mysql_num_rows($sql)) {
                    $row = mysql_fetch_assoc($sql);
                    $num_caracteres = "10"; // asignamos el número de caracteres que va a tener la nueva contraseña
                    $nueva_clave = substr(md5(rand()),0,$num_caracteres); // generamos una nueva contraseña de forma aleatoria
                    $codigo = $row['codigo'];
                    $usuario_clave = $nueva_clave; // la nueva contraseña que se enviará por correo al usuario
                    $usuario_clave2 = md5($usuario_clave); // encriptamos la nueva contraseña para guardarla en la BD
                    $usuario_email = $row['correo'];
                    // actualizamos los datos (contraseña) del usuario que solicitó su contraseña
                    mysql_query("UPDATE usuario SET password='".$usuario_clave2."' WHERE codigo='".$codigo."'");
                    // Enviamos por email la nueva contraseña
                    $remite_nombre = "UISSPORTS"; // Tu nombre o el de tu página
                    $remite_email = "UISSPORTS"; // tu correo
                    $asunto = "Recuperación de contraseña"; // Asunto (se puede cambiar)
                    $mensaje = "Se ha generado una nueva contraseña para el usuario <strong>".$codigo."</strong>. La nueva contraseña es: <strong>".$usuario_clave."</strong>.";
                    $cabeceras = "From: ".$remite_nombre." <".$remite_email.">\r\n";
                    $cabeceras = $cabeceras."Mime-Version: 1.0\n";
                    $cabeceras = $cabeceras."Content-Type: text/html";
                    $enviar_email = mail($usuario_email,$asunto,$mensaje,$cabeceras);
                    if($enviar_email) {
                        echo "La nueva contraseña ha sido enviada al email asociado al usuario ".$codigo.".";
                    }else {
                        echo "No se ha podido enviar el email. <a href='javascript:history.back();'>Reintentar</a>";
                    }
                }else {
                    echo "El usuario <strong>".$codigo."</strong> no está registrado. <a href='javascript:history.back();'>Reintentar</a>";
                }
            }
        }else {
  
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<title>Recuperar Contraseña</title>
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
			<a href="../index.php"><img class="img3" src="../Datos/home2.png" title="Home" width="66" height="63"></a>
		</div>

		<div id="contact-form">

			<p id="failure">
				Revisa tu correo, y vuelve a enviar.
			</p>
			<p id="success">
				Tu transacción se llevó a cabo exitosamente.
			</p>

			<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
			  <table width="796" border="0">
			    <tr>
			      <td width="403" align="center"><label for="email"><h2>¿Olvidaste tu contraseña?</h2><br><br>
                  Ingresa tu Código:<span class="required">*<br>
		            <input type="tel" pattern="[0-9]+" maxlength="8" id="codigo" name="codigo" value="" placeholder="xxxxxxxx" required title="Solo se aceptan números" autofocus  />
			      </span></label>
                  <br>
                  </span></label>
			    </td>
			    <tr>
			      <td colspan="0" align="center"><input type="submit" name="enviar" value="Enviar" id="enviar" /></td>
		        </tr>
			    
		      </table>

		  </form>
           <?php
        }
    ?> 
			
		</div>
		
	</body>
</html>
