function cancelar() {
			location.href="index.php";
		}
		function inicio() {
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		}
		
		function limpiar() {
			document.getElementById("formulario").reset();
		}