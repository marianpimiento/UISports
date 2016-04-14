function pon_prefijo(nombre,correo,apellido,cedula,direccion,telefono) {
	parent.document.form_busqueda.nombre.value=nombre;
	parent.document.form_busqueda.correo.value=correo;
	parent.document.form_busqueda.apellido.value=apellido;
	parent.document.form_busqueda.cedula.value=cedula;
	parent.document.form_busqueda.direccion.value=direccion;
	parent.document.form_busqueda.telefono.value=telefono;
}

function limpiar() {
	parent.document.form_busqueda.nombre.value="";
	parent.document.form_busqueda.correo.value="";
	parent.document.form_busqueda.apellido.value="";
	parent.document.form_busqueda.cedula.value="";
	parent.document.form_busqueda.direccion.value="";
	parent.document.form_busqueda.telefono.value="";
	parent.document.form_busqueda.codigo.value="";
}
