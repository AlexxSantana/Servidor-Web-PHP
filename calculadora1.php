<?php
/*
Esta forma de recuperar valores es independiente de que el método usuado sea
GET o POST
*/
echo "El method que ha usado es: ",$_SERVER['REQUEST_METHOD'],"<br>";

echo "<h1 align='center'>CALCULDORA</h1>";
$op1=$_REQUEST['operando1'];
$op2=$_REQUEST['operando2'];
$op=$_REQUEST['operacion'];
echo "<form align='center'>";
echo "<label>Operando1: </label>";
echo "<input type='text' name='operando1' value='$op1' size=15><br><br>";
echo "<label>Operando1: </label>";
echo "<input type='text' name='operando1' value='$op2' size=15><br><br>";

if($op=="+"){
	$solucion= suma($op1,$op2);
}else if($op=="-"){
	$solucion= resta($op1,$op2);
}else if($op=="*"){
	$solucion= producto($op1,$op2);
}else if($op=="/"){
	$solucion= division($op1,$op2);
}
//Declaración de funciones
function suma($n1,$n2){
	return $n1+$n2;
}
function resta($n1,$n2){
	return $n1-$n2;
}
function producto($n1,$n2){
	return $n1*$n2;
}
function division($n1,$n2){
	return $n1/$n2;
}
echo "Resultado de la operacion: ".$op1." $op ".$op2."=" .$solucion;
echo "</form>";
?>