<?
function implota($fechainicioinscripcion) // bd2local
{
	if (($fechainicioinscripcion == "") || ($fechainicioinscripcion == "0000-00-00"))
		return "";
	$vector_fecha = explode("-",$fechainicioinscripcion);
	$aux = $vector_fecha[2];
	$vector_fecha[2] = $vector_fecha[0];
	$vector_fecha[0] = $aux;
	return implode("/",$vector_fecha);
}

function explota($fechainicioinscripcion) // local2bd
{
	$vector_fecha = explode("/",$fechainicioinscripcion);
	$aux = $vector_fecha[2];
	$vector_fecha[2] = $vector_fecha[0];
	$vector_fecha[0] = $aux;
	return implode("-",$vector_fecha);
};
?>
