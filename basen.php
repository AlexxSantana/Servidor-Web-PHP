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

echo "<h1>CAMBIO DE BASE</h1>";
$op1=$_REQUEST['operando1'];
$op2=$_REQUEST['operando2'];

$val1= divide($op1)[0];//esto vale 200
$val2= divide($op1)[1];//esto vale 10
echo "<br><br>";
echo "Numero ".$val1." en base ".$val2." = ".cambioBase($val1,$val2,$op2)." en base ".$op2;

//Con esta función dividimos los valores de $op1 con el separador '/'
function divide($n1){
	$valor=explode("/",$n1);
	return $valor;
}
//Función para convertir un numero decimal a base, y convertirlo nuevamente con otra base
function cambioBase($n1,$n2,$n3){
	$total= base_convert($n1, $n2, $n3);
	return $total;
}

?>
