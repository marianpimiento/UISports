//Función dobleLink para Iframe
function DobleLink(url1, url2) {
	parent.iframe2.location.href = url1;
	parent.iframe1.location.href = url2;
}

			//Función Cookie - Contador de visitas
			function getCookieVal (offset) 
			{  
				var endstr = document.cookie.indexOf (";", offset);
				if (endstr == -1) endstr = document.cookie.length;
				return unescape(document.cookie.substring(offset, endstr));
			}
			
			function GetCookie (name) 
			{
			  var arg = name + "=";
			  var alen = arg.length;
			  var clen = document.cookie.length;
			  var i = 0;
			  while (i < clen)
			  {
			  	var  j = i + alen;
			  	if (document.cookie.substring(i, j) ==arg)
			  	return getCookieVal (j);
			  	i = document.cookie.indexOf(" ", i) + 1;
			  	if (i == 0) break;
			  }
			    return null;
			}
			
			function SetCookie (name, value)
			{
				var argv = SetCookie.arguments;
				var argc = SetCookie.arguments.length;
				var expires = (2 < argc ) ? argv[2] : null;
				var path = (3 < argc ) ? argv[3] : null;
				var domain = (4 < argc ) ? argv[4] : null;
				var secure = (5 < argc ) ? argv[5] : false;
				
				document.cookie = name + "=" + escape (value) +
				((expires == null) ? "" : ("; expires=" + expires.toGMTString())) +
				((path == null) ? "": ("; path=" + path)) +
				((domain == null) ? "" : ("; domain=" + domain)) +
				((secure == true) ? "; secure" : "");		
			}
			
			 function DisplayInfo ()
			  {
			  var expdate = new Date();
			  var visit;
			  expdate.setTime(expdate.getTime() + (24 * 60 * 60 * 1000 * 365));
			  if(!(visit = GetCookie("visit"))) visit = 0;
			  visit++;
			  SetCookie("visit", visit, expdate, "/", null, false);
			   var message;
			   if(visit ==1) message="Bienvenido a UISports, ésta es tu primera visita";
			   if(visit ==2) message="El deporte es salud, ésta es tu segunda visita";
			   if(visit >=3) message="Has visitado UISports " + visit + " veces";
			   
			   alert(message);
			 }
			 
			 function ResetCounts ()
			  {
			  	var expdate = new Date();
			  	expdate.setTime(expdate.getTime() + (24 * 60 * 60 * 1000 * 365));
			  	visit = 0;
			  	SetCookie("visit", visit, expdate, "/", null, false);
			  	alert('El conteo se ha reiniciado con exito');
			  	leapto();
			  	alert('La cookie fue reseteada');
			 }