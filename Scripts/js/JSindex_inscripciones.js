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
		
		function nuevo_inscripcion() {
			location.href="nuevo_inscripcion.php";
		}
		
		function imprimir() {
			var idinscripcion=document.getElementById("idinscripcion").value;
			var codigousuario=document.getElementById("codigousuario").value;
			var idevento=document.getElementById("idevento").value;			
			window.open("../fpdf/inscripcion.php?idinscripcion="+idinscripcio+"&codigousuario="+codigousuario+"&idevento="+idevento);
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
			var idinscripcion=document.getElementById("idinscripcion").value;
			var codigousuario=document.getElementById("codigousuario").value;
			var idevento=document.getElementById("idevento").value;			
			var cadena="";
			cadena="~"+idinscripcion+"~"+codigousuario+"~"+idevento+"~";
			return cadena;
			}
			
		function limpiar() {
			document.getElementById("form_busqueda").reset();
		}
		
		function abreVentana(){
			miPopup = window.open("ventana_inscripcion.php","miwin","width=700,height=380,scrollbars=yes");
			miPopup.focus();
		}
		
		function validarinscripcion(){
			var idinscripcion=document.getElementById("idinscripcion").value;
			miPopup = window.open("comprobarinscripcion.php?idinscripcion="+idinscripcion,"frame_datos","width=700,height=80,scrollbars=yes");
		}	