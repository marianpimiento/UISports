<?php

header('Content-Type: text/html;charset=utf-8');

//Incluimos la conexiòn a la base de datos
include ('../Scripts/includes/conectar.php');

//Hacer llamado de los datos de la pàgina anterior de registro
$_POST;
$codigo=trim($_POST["codigo"]);
$correo=trim($_POST["correo"]);
$password=trim($_POST["password"]);
$nombre=trim($_POST["nombre"]);
$apellido=trim($_POST["apellido"]);
$cedula=trim($_POST["cedula"]);
$direccion=trim($_POST["direccion"]);
$telefono=trim($_POST["telefono"]);
$celular=trim($_POST["celular"]);
$genero=trim($_POST["genero"]);
$perfil="U";
//$sitio="../Scripts/index.php";



    // devuelve una cadena escapada de algunos caracteres que
    // pudieran servir para un ataque de sql injection
    function escaparQuery($cadena) {
        $str_KeywordsSQL = array("select ","insert ","delete ","update ","union ");
        $str_OperadoresSQL = array("like ","and ","or ","not ","<",">","<>","=","<");
        $str_DelimitadoresSQL = array(";","(",")","'");
 
        //Quitar palabras reservadas y operadores
        for($i=0; $i<count($str_KeywordsSQL); $i++) {
            $cadena = str_replace($str_KeywordsSQL[$i], "",strtolower($cadena) );
        }
        for($i=0; $i<count($str_OperadoresSQL); $i++) {
            $cadena = str_replace($str_OperadoresSQL[$i], "",strtolower($cadena) );
        }
        for($i=0; $i<count($str_DelimitadoresSQL); $i++) {
            $cadena = str_replace($str_DelimitadoresSQL[$i], "",strtolower($cadena) );
        }
 
        return $cadena;
    }
 
 
    $mensajesAll= "";
 
    $log = $mensajesAll."<br>";
 
    //Si se generaron mensajes de error al validar...
    if ( trim($mensajesAll) != "" ) {
        //..Redireccion a la pagina de registro para mostrar msg de error al usuario
        //Enviar los datos que habia escrito antes de enviar
    ?>
    <form id="frm_error"   name="frm_error" method="post" action="registro.php">
        <input type="hidden" name="error" value="1" />
        <input type="hidden" name="msgs_error" value='<?php echo $mensajesAll ?>' />
        <input type="hidden" name="codigo" value='<?php echo $codigo ?>' />
        <input type="hidden" name="correo" value='<?php echo $correo ?>' />
        <input type="hidden" name="password" value='<?php echo $password ?>' />
        <input type="hidden" name="nombre" value='<?php echo $nombre ?>' />
        <input type="hidden" name="apellido" value='<?php echo $apellido ?>' />
        <input type="hidden" name="cedula" value='<?php echo $cedula ?>' />
        <input type="hidden" name="direccion" value='<?php echo $direccion ?>' />
        <input type="hidden" name="telefono" value='<?php echo $telefono ?>' />
        <input type="hidden" name="celular" value='<?php echo $celular ?>' />
        <input type="hidden" name="genero" value='<?php echo $genero ?>' />
        <input type="hidden" name="perfil" value='<?php echo $perfil ?>' />
    </form>
    <script type="text/javascript">
        //Redireccionar con el formulario creado
        document.frm_error.submit();
    </script>
<?php
 
       exit;
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>.:: Registrar Usuario ::. </title>
 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <META http-equiv=REFRESH content="5"; 
    <link rel="stylesheet" href="../Scripts/js/estilos.css" type="text/css">
    
    <script src="../Scripts/js/jquery171.js" type="text/javascript"></script>
    <script src="../Scripts/js/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript" src="../Scripts/js/jquery.alerts.js"></script>
    <link href="../Scripts/js/jquery.alerts.css" rel="stylesheet" type="text/css" />
 
    <script type="text/javascript">
    <!--
        $().ready(function() {
 
        });
    // -->
    </script>
 
</head>
<body>
 
<?php
    $mensajesAll = "";
    $codigo_duplicado = false;
    $email_duplicado = false;
    //Escapar las cadenas para avitar SQL Injection
    $codigo = escaparQuery($codigo);
    $correo = escaparQuery($correo);
 
    //Conectar la BD
    //Validar que el nombre de usuario no exista en la BD
    $sql = "SELECT  codigo  FROM usuario
    WHERE codigo = '".trim($codigo)."';";
	
    $rs_sql = mysql_query($sql);
    $log .=  $sql."<br>";
         
    //Si ya existe el usuario en la BD...
    if ( $fila  = mysql_fetch_object($rs_sql) ) {
        $mensajesAll = "<li>El codigo de usuario <b>".$codigo."</b> ya fue registrado
        por otra persona. Por favor, escriba otro.</li>";
        $codigo_duplicado = true;
    }
 
    //Validar que el correo no exista en la BD
    $sql = "SELECT  codigo  FROM usuario
    WHERE correo='".$correo."';";
    $rs_sql = mysql_query($sql);
    $log .=  $sql."<br>";
 
     
    //Si ya existe el email en la BD...
    if ( $fila  = mysql_fetch_object($rs_sql) ) {
        $mensajesAll = "<li>El correo electronico <b>".$correo."</b> ya fue registrado
        por otra persona. Por favor, escriba otro.</li>";
        $email_duplicado        = true;
    }
    //Si ambos datos ya estan en la Base de datos mostrar un solo msg
    if( $codigo_duplicado && $email_duplicado)
        $mensajesAll = "<li>Ambos, codigo de usuario <b>".$codigo."</b>
        y correo electronico <b>".$correo."</b> ya fueron registrados por otra persona.
        Por favor, cambie esos datos.</li>";
    //..Redireccion a la pagina de registro para mostrar msg de error al usuario
    //Enviar los datos que habia escrito antes de enviar
     
    $log .=  $mensajesAll."<br>";
 
     
    if ( trim($mensajesAll) != "" ) {
        //..Redireccion a la pagina de registro para mostrar msg de error al usuario
        //Enviar los datos que habia escrito antes de enviar
        ?>
        <form id="frm_error"   name="frm_error" method="post" action="registro.php">
            <input type="hidden" name="error" value="2" />
            <input type="hidden" name="msgs_error" value='<?php echo $mensajesAll ?>' />
            <input type="hidden" name="codigo" value='<?php echo $codigo ?>' />
            <input type="hidden" name="correo" value='<?php echo $correo ?>' />
            <input type="hidden" name="password" value='<?php echo $password ?>' />
            <input type="hidden" name="nombre" value='<?php echo $nombre ?>' />
            <input type="hidden" name="apellido" value='<?php echo $apellido ?>' />
            <input type="hidden" name="cedula" value='<?php echo $cedula ?>' />
            <input type="hidden" name="direccion" value='<?php echo $direccion ?>' />
            <input type="hidden" name="telefono" value='<?php echo $telefono ?>' />
            <input type="hidden" name="celular" value='<?php echo $celular ?>' />
            <input type="hidden" name="genero" value='<?php echo $genero ?>' />
            <input type="hidden" name="perfil" value='<?php echo $perfil ?>' />
        </form>
        <script type="text/javascript">
            //Redireccionar con el formulario creado
            document.frm_error.submit();
        </script>
            <?php
        exit;
    }
     
     
    //..Si llega hasta aqui es que todos los datos son validos, procedemos a darlo de alta en BD
    //Formar el query para el insert del nuevo usuario
    $queryInsert="Insert into usuario (codigo, correo, password, nombre, apellido, cedula, direccion, telefono, celular, genero, perfil, estado) values ('$codigo','$correo','".md5($password)."','$nombre', '$apellido', '$cedula', '$direccion', '$telefono', '$celular','$genero','$perfil','0')";
    $log .=  $queryInsert."<br>";
 
    //echo $log;
    //exit;
     
    mysql_query($queryInsert);
 
    // Le  Envio  un correo electronico  de bienvenida
    $destinatario = $correo;                    //A quien se envia
    $nomAdmin     = 'UIS SPORTS';           //Quien envia
    $mailAdmin      = 'uissports@gmail.com';       //Mail de quien envia
    $urlAccessLogin = 'http://cloudeisi.uis.edu.co:20104/20132B102/index.php';       //Url de la pantalla de login
 
    $elmensaje = "";
    $asunto = $nombre.", Gracias por registrarte!";
 
    $cuerpomsg ='
    <h2>.::Registrar usuarios::.</h2>
    <p>Le damos la mas cordial bienvenida, desde ahora usted podra gozar de los beneficios de
    haberse identificado y acceder a contenido exclusivo de esta comunidad.</p>
        <table border="0" >
        <tr>
            <td colspan="2" align="center" >Sus datos de acceso para <a href="'.$urlAccessLogin.'">'.$urlAccessLogin.'</a><br></td>
        </tr>
        <tr>
            <td> Nombre </td>
            <td> <b>'.$nombre.'</b> </td>
        </tr>
        <tr>
            <td> Código </td>
            <td> <b>'.$codigo.'</b> </td>
        </tr>
        <tr>
            <td> Contraseña </td>
            <td> <b>'.$password.'</b> </td>
        </tr>
        </table> <br/><br/>
    <p><b>Gracias por su preferencia, hasta pronto.</b></p> <br><br>';
 
    date_default_timezone_set('America/Bogotá');
 
    //Establecer cabeceras para la funcion mail()
    //version MIME
    $cabeceras = "MIME-Version: 1.0\r\n";
    //Tipo de info
    $cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
    //direccion del remitente
    $cabeceras .= "From: ".$nomAdmin." <".$mailAdmin.">";
    $i_EmailEnviado = 0;
     
    //Si se envio el email
    if( mail($destinatario,$asunto,$cuerpomsg,$cabeceras) )
        $i_EmailEnviado = 1;
     
    //Cerrrar conexion a la BD
    mysql_close($conexio);
 
    // Mostrar resultado del registro
    ?>
    <form id="frm_registro_status"   name="frm_registro_status" method="post" action="index.php">
        <input type="hidden" name="status_registro" value="1" />
        <input type="hidden" name="i_EmailEnviado" value='<?php echo $i_EmailEnviado ?>' />
    </form>
    <script type="text/javascript">
        //Redireccionar con el formulario creado
        document.frm_registro_status.submit();
    </script>
</body>
</html>
