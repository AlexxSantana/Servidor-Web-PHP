<?php
/*
Esta forma de recuperar valores es independiente de que el método usuado sea
GET o POST
*/
echo "El method que ha usado es: ",$_SERVER['REQUEST_METHOD'],"<br>";
echo  $_REQUEST['operando1'],"<br>";
echo  $_REQUEST['operando2'],"<br>";
echo "<br>";
echo "<h1>CALCULDORA</h1>";
$op1=$_REQUEST['operando1'];
$op2=$_REQUEST['operando2'];
$op=$_REQUEST['operacion'];

//Esta condición indica si se hace alguna operacin determinada se mostrará por pantalla, recogiendo el valor desde una función
if($op=="+"){
	$solucion= suma($op1,$op2);
}else if($op=="-"){
	$solucion= resta($op1,$op2);
}else if($op=="*"){
	$solucion= producto($op1,$op2);
}else if($op=="/"){
	$solucion= division($op1,$op2);
}

//Declaramos varias funciones para cada tipo de operación
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
//Se visualiza el resultado de la operación 
echo "Resultado de la operacion: ".$op1." $op ".$op2."=" .$solucion;

?>