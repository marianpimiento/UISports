<?php
include ('../Scripts/includes/conectar.php');
//Inicia session
session_start();

//Párametro para tiempo de inactividad de minuto y medio
$inactivo=600;

//Se hace la validación para que cuente el tiempo de inactividad
if(isset($_SESSION['tiempo']))
{
	$vida_session = time()-$_SESSION['tiempo'];
	if($vida_session>$inactivo)
	{
		//Se destruye la sesión y se direcciona a la página de inicio
		session_destroy();
		header("location: ../index.php");
		echo '<script language="javascript">alert("La sesión ha caducado");</script>'; 
	}
}
$_SESSION['tiempo']=time();

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>UIS Sports</title>
		<link rel="stylesheet" type="text/css" href="../Scripts/css/style.css" />
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">
		<link media="all" href="../Scripts/css/EstiloHome.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="../Scripts/js/JSHome.js"></script>

		<script type="text/javascript" src="../Scripts/js/modernizr-1.5.min.js"></script>
        <script type="text/javascript" src="../Scripts/js/jquery.js"></script>
		<script type="text/javascript" src="../Scripts/js/jquery.easing-sooper.js"></script>
		<script type="text/javascript" src="../Scripts/js/jquery.sooperfish.js"></script>
		
	</head>
	<body>
    	<img id="bg" src="../Datos/fondo.jpg" alt="" >

		<div id="wrapper" >

			<div id="titulo">
				<div id="log-sub">
					<div id="log-left">
						<img class="img1" src="../Datos/bannerlogin.png" alt= "Logo UIS Sports" title= "Logo UIS Sports" width="100%" height="100%"/>
					</div>
					<!-- acá inicia el login-->
					<div id="login">
						<h2><span class="fontawesome-lock"></span>Bienvenido</h2>

						<form action="modificar_usuario.php" method="POST">

							<fieldset>
							  <table width="180" border="0">
							    <tr>
							      <td height="50" align="center"><a href="modificar_usuario.php">Modificar</a></td>
                                 </tr>
                                 <tr>
							      <td height="50" align="center"><a href="logout.php">Cerrar Sesión</a></td>
						        </tr>
						      </table>
							  <p>&nbsp;</p>
								<!-- JS because of IE support; better: placeholder="password" --><!--<div id="l-f-center">

								</div>
								<div id="l-f-right" >

								</div> -->
							</fieldset>

						</form>

					</div>
					<!-- end login -->

				</div>

			</div>

			<!--Inicio del menu-->
			<nav>
				<div id="menu_container">
					<ul class="sf-menu" id="nav">
						<li>
							<a href="indexAdministrador.php">Home</a>
						</li>

						<li>
							<a href="javascript:;" onClick="DobleLink('../Scripts/MSnoticia.html','../Scripts/Noticias/Noticia-JuegosNacionales.htm');">Noticias</a>
						</li>

						<!--<a href="javascript:;" onclick="DobleLink('MSnoticia.html','MSdeportestenis.html');">--></a>

						<li>
							<a href="javascript:;" onClick="DobleLink('../Scripts/MSdeportestenis.html','../Scripts/Informacion/Informacion-Tenis.htm');">Deportes</a>
							<ul>
								<li>
									<a href="javascript:;" onClick="DobleLink('../Scripts/MSdeportestenis.html','../Scripts/Informacion/Informacion-Tenis.htm');">Tenis</a>
								</li>
								<li>
									<a href="javascript:;" onClick="DobleLink('../Scripts/MSdeportesfutbol.html','../Scripts/Informacion/Informacion-Futbol.htm');">Futbol</a>
								</li>
								<li>
									<a href="javascript:;" onClick="DobleLink('../Scripts/MSdeportesatletismo.html','../Scripts/Informacion/Informacion-Atletismo.htm');">Atletismo</a>
								</li>
								<li>
									<a href="javascript:;" onClick="DobleLink('../Scripts/MSdeporteskarate.html','../Scripts/Informacion/Informacion-Karate.htm');">Karate</a>
								</li>
								<li>
									<a href="javascript:;" onClick="DobleLink('../Scripts/MSdeportesrugby.html','../Scripts/Informacion/Informacion-Rugby.htm');">Rugby</a>
								</li>
								<li>
									<a href="javascript:;" onClick="DobleLink('../Scripts/MSdeportesbaloncesto.html','../Scripts/Informacion/Informacion-Baloncesto.htm');">Baloncesto</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="javascript:;" onClick="DobleLink('../Scripts/MSeventos.html','../Scripts/Eventos/Evento-CarreraAtletica24.htm');">Eventos Deportivos</a>
						</li>

						<li>
							<a href="javascript:;" onClick="DobleLink('../Scripts/MSsalud.html','../Scripts/Salud/Noticia-Nutricion.htm');">Salud</a>
						</li>
						<li>
							
				
		                    <a href="#">Contáctenos</a>
							<ul>
								<li>
									<a href="https://www.facebook.com/UISports?fref=ts" target="_blank">Facebook</a>
								</li>
								<li>
									<a href="https://twitter.com/UIS_sports" target="_blank">Twitter</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<div id="banner">
				<img class="img1" src="../Datos/uno.jpg" alt= "Escenarios deportivos UIS" title= "Escenarios deportivos UIS" width="100%" height="100%"/>
			</div>
			<div id="intermedio">
			<div id="menusecundario" >

				<iframe name="iframe2" src="../Scripts/MSinicioAdministrador.html"  marginwidth="0" marginheight="0" name="ventana_iframe2" border="0" frameborder="0" width="100%" height="100%">
					
				</iframe>

			</div>
			<div id="contenido">
				<iframe name="iframe1" src="../Scripts/Quienessomos/Quienessomos.html"  marginwidth="0" marginheight="0" name="ventana_iframe" border="0" frameborder="0" width="100%" height="100%">
					
				</iframe>
			</div>
			</div>

		</div>
		<div id="pie">
			<p>
				Universidad Industrial de Santader - UISports
				<br>
				<a href="https://www.google.com/maps/place/Universidad+Industrial+de+Santander+-+UIS/@7.13963,-73.12094,17z/data=!3m1!4b1!4m2!3m1!1s0x8e68156cdc612933:0x132a903398974d51" target="_blank">Bucaramanga - Colombia. Cra 27 calle 9. </a>   Pbx: (57) (7) 6344000. nit: 890201213-4
			</p>
		</div>

	
		<script type="text/javascript">
			$(document).ready(function() {
				$('ul.sf-menu').sooperfish();
			});
		</script>

	</body>

</html>