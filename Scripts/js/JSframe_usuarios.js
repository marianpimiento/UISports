function pon_prefijo(pref,nombre,correo,apellido,cedula, direccion, telefono) {
	parent.opener.document.form_busqueda.codigo.value=pref;
	parent.opener.document.form_busqueda.nombre.value=nombre;
	parent.opener.document.form_busqueda.correo.value=correo;
	parent.opener.document.form_busqueda.apellido.value=apellido;
	parent.opener.document.form_busqueda.cedula.value=cedula;
	parent.opener.document.form_busqueda.direccion.value=direccion;
		parent.opener.document.form_busqueda.telefono.value=telefono;
	parent.window.close();
}
