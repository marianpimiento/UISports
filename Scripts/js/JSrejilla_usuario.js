function ver_usuario(codigo) {
			parent.location.href="ver_usuario.php?codigo=" + codigo + "&cadena_busqueda=<?php echo $cadena_busqueda?>";
		}
		
		function modificar_usuario(codigo) {
			parent.location.href="modificar_usuario.php?codigo=" + codigo + "&cadena_busqueda=<?php echo $cadena_busqueda?>";
		}
		
		function eliminar_usuario(codigo) {
			parent.location.href="eliminar_usuario.php?codigo=" + codigo + "&cadena_busqueda=<?php echo $cadena_busqueda?>";
		}

		function inicio() {
			var numfilas=document.getElementById("numfilas").value;
			var indi=parent.document.getElementById("iniciopagina").value;
			var contador=1;
			var indice=0;
			if (indi>numfilas) { 
				indi=1; 
			}
			parent.document.form_busqueda.filas.value=numfilas;
			parent.document.form_busqueda.paginas.innerHTML="";		
			while (contador<=numfilas) {
				texto=contador + "-" + parseInt(contador+9);
				if (indi==contador) {
					parent.document.form_busqueda.paginas.options[indice]=new Option (texto,contador);
					parent.document.form_busqueda.paginas.options[indice].selected=true;
				} else {
					parent.document.form_busqueda.paginas.options[indice]=new Option (texto,contador);
				}
				indice++;
				contador=contador+10;
			}
		}