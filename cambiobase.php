<style>
	table {border-collapse: collapse;}
	th, td {border: 1px solid #dddddd;
			width:46px;}
</style>
<?php
/*
Esta forma de recuperar valores es independiente de que el método usuado sea
GET o POST
*/
echo "El method que ha usado es: ",$_SERVER['REQUEST_METHOD'],"<br>";

echo "<h1>CONVERSOR NUMERICO</h1>";
$op1=$_REQUEST['operando1'];
$op=$_REQUEST['conversion'];
echo "<form>";
	echo "<label>Numero decimal: </label>";
	echo "<input type='text' name='operando1' value='$op1' size=15><br><br>";
if($op=="binario"){
	$solucion= binario($op1);
}else if($op=="octal"){
	$solucion= octal($op1);
}else if($op=="hexa"){
	$solucion= hexadecimal($op1);
}else if($op=="todos"){
	$solucion= todos($op1);
}
echo "Resultado de la operacion: ".$op1."= " .$solucion;
echo "</form>";
//Declaración de funciones
function binario($n1){
	return vsprintf("%08b", $n1);
	//return decbin($n1);
}
function octal($n1){
	return decoct($n1);
}
function hexadecimal($n1){
	return dechex($n1);
}
//funcione de todas las operaciones, en el cual se llama a las funciones definidas anteriormente
function todos($n1){
	  echo "<table align='center' border=\"1\">";
	  return "<tr><td>Binario</td><td>".binario($n1)."</td></tr>
			  <tr><td>Octal</td><td>".octal($n1)."</td></tr>
			  <tr><td>Hexadecimal</td><td>".hexadecimal($n1)."</td></tr>";		  
	  echo "</table>";
}

?>