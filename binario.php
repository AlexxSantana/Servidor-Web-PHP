<?php
/*
Esta forma de recuperar valores es independiente de que el método usuado sea
GET o POST
*/
echo "El method que ha usado es: ",$_SERVER['REQUEST_METHOD'],"<br>";

echo "<h1 align='center'>CONVERSOR BINARIO</h1>";
$op1=$_REQUEST['operando1'];
$bina=binario($op1);
//Declaramos la funcion binario. dónde se realiza la conversion
function binario($n1){
	return vsprintf("%08b", $n1);
}

echo "<form align='center'>";
echo "<label>Numero decimal: </label>";
echo "<input type='text' name='operando1' value='$op1' size=15><br><br>";
echo "<label>Numero Binario: </label>";
echo "<input type='text' name='operando1' value='$bina' size=15><br><br>";
echo "</form>";
?>