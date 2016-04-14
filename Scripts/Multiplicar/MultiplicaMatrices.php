<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Multiplicacion de Matrices</title>
    <link rel="stylesheet" type="text/css" href="EstiloMatricesPhp.css" />
</head>
<body>
<h2 align="center">Multiplicación de Matrices</h2>
<?php
   function imprimeMatriz($matriz, $r, $c, $mensaje) {
     $cadena  = "<br><br><table align='center'>";
     $cadena .= "<tr><td  align='center'>".$mensaje."</td></tr>";  
     for($i = 0; $i < $r; $i++) {
        $cadena .= "<tr>";
        for($j = 0; $j < $c; $j++) {$cadena .= "<td align='right'>".$matriz[$i][$j]."</td>";};
        $cadena .= "</tr>";
	 }  
	 $cadena .= "</table>";
     echo $cadena;
   }
   
   function multiplicar($matriz, $matriz2, $fila1, $col1, $fila2, $col2){
	echo "<br><br><table class='tabla' align='center'>";
	echo "<tr><td>A x B:</td></tr>";
	for($i = 0; $i < $fila1; $i++) {
		$cadena = "<tr>";
		for($j = 0; $j < $col2; $j++) {
		 $suma = 0;
		 for($k = 0; $k < $col1; $k++){
		  $suma += $matriz[$i][$k]*$matriz2[$k][$j];
		 }
		 $cadena .= "<td><div align='right'>".($suma)."</div></td>";
		}
	echo $cadena."</tr>";
	}
	echo "</table><br><br>";
   }
   
  $calcular = $_POST['calcular'];
  if( isset($calcular) && $_SERVER["REQUEST_METHOD"] == "POST") {
     $fila1 = $_POST['filaA'];
	 $col1  = $_POST['columnaA'];
	 $fila2 = $_POST['filaB'];
	 $col2  = $_POST['columnaB'];
	 $suma  = 0;
	 unset($calcular);
     if($col1 == $fila2){
        for($i=0; $i < $fila1; $i++) 
          for($j=0; $j < $col1; $j++)  {$matriz[$i][$j] = mt_rand(1,12);}
        imprimeMatriz($matriz, $fila1, $col1, "Matriz A:");	
        for($i=0;$i < $fila2; $i++)
          for($j=0; $j <$col2; $j++) {$matriz2[$i][$j] = mt_rand(1,12);}
        imprimeMatriz($matriz2, $fila2, $col2, "Matriz B:");	
        multiplicar($matriz, $matriz2, $fila1, $col1, $fila2, $col2);
	} else {
		$cadena = "<center>Dimensiones de las matrices no válidas. <br>El número de columnas de A debe ser igual al número de filas de B.</center>";
		echo $cadena;
	}
  } else { echo "<p align='center'>Falta información así no puedes ejecutar</p>";}
?>
<p align='center'><a href='MultiplicaMatrices.html'>
<img src='../../images/icon-home.gif' alt='Salir' title='Salir'><br>Salir</a></p>
</body>
</html>
