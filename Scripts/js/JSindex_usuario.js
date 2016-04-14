		function primerinicio() {
			var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		}
		
		function inicio() {
			document.getElementById("form_busqueda").submit();
		}
		
		function nuevo_usuario() {
			location.href="nuevo_usuario.php";
		}
		
		function imprimir() {
			var codigo=document.getElementById("codigo").value;
			var correo=document.getElementById("correo").value;
			var nombre=document.getElementById("nombre").value;
			var apellido=document.getElementById("apellido").value;			
			var cedula=document.getElementById("cedula").value;
			var direccion=document.getElementById("direccion").value;
			var telefono=document.getElementById("telefono").value;
			window.open("../fpdf/usuario.php?codigo="+codigo+"&nombre="+nombre+"&apellido="+apellido+"&cedula="+cedula+"&direccion="+direccion+"&telefono="+telefono);
		}
		
		function buscar() {
			var cadena;
			cadena=hacer_cadena_busqueda();
			document.getElementById("cadena_busqueda").value=cadena;
			if (document.getElementById("iniciopagina").value=="") {
				document.getElementById("iniciopagina").value=1;
			} else {
				document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
			}
			document.getElementById("form_busqueda").submit();
		}
		
		function paginar() {
			document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
			document.getElementById("form_busqueda").submit();
		}
		
		function hacer_cadena_busqueda() {
			var codigo=document.getElementById("codigo").value;
			var correo=document.getElementById("correo").value;
			var nombre=document.getElementById("nombre").value;
			var apellido=document.getElementById("apellido").value;			
			var cedula=document.getElementById("cedula").value;
			var direccion=document.getElementById("direccion").value;
			var telefono=document.getElementById("telefono").value;
			var cadena="";
			cadena="~"+codigo+"~"+correo+"~"+nombre+"~"+apellido+"~"+cedula+"~"+direccion+"~"+telefono+"~";
			return cadena;
			}
			
		function limpiar() {
			document.getElementById("form_busqueda").reset();
		}
		
		function abreVentana(){
			miPopup = window.open("ventana_usuarios.php","miwin","width=700,height=380,scrollbars=yes");
			miPopup.focus();
		}
		
		function validarusuario(){
			var codigo=document.getElementById("codigo").value;
			miPopup = window.open("comprobarusuario.php?codigo="+codigo,"frame_datos","width=700,height=80,scrollbars=yes");
		}	