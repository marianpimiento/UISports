function pon_prefijo(pref,codigousuario,idevento) {
	parent.opener.document.form_busqueda.idinscripcion.value=pref;
	parent.opener.document.form_busqueda.codigousuario.value=codigousuario;
	parent.opener.document.form_busqueda.idevento.value=idevento;
	parent.window.close();
}