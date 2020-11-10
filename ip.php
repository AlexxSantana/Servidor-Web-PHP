<style>
	.uno{
		color:red;
	}
</style>
<?php
/*
Esta forma de recuperar valores es independiente de que el método usuado sea
GET o POST
*/
echo "El method que ha usado es: ",$_SERVER['REQUEST_METHOD'],"<br>";

echo "<h1>CAMBIO IP</h1>";
$op1=$_REQUEST['operando1'];
//Guardamos en una variable, el resultado de la función ipSeparar
$total= ipSeparar($op1);
//Función para separar la ip delimitada por puntos
function ipSeparar($n){
	$num1= vsprintf("%08b", substr($n,0,3));
	$num2= vsprintf("%08b", substr($n,4,7)); //"%08b" para que aparezcan los '0' a la izquierda
	$num3=vsprintf ("%08b", substr($n,8,10 ));//"%08b" para que aparezcan los '0' a la izquierda
	$num4=vsprintf ("%b", substr($n,11,12));
	$resul= $num1.".". $num2.".". $num3.".". $num4;
	return $resul;
}
//VALIDACIÓN
// definición de variables de error
$errNombre="";
$nombre="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if(empty($_POST["operando1"])){
		$errNombre= "Campo de ip esta vac&iacute;o!!";
		
	} else {
		$nombre= LimpiaCampos($_POST["operando1"]);
	}
}


function LimpiaCampos($datos){
	$datos=trim($datos);
	$datos=stripslashes($datos);
	$datos=htmlspecialchars($datos);
	return $datos;
}

echo "<form>";
	echo "<label>IP notacion decimal: </label>";
	echo "<input type='text' name='opera1' value='$nombre' size=18>
	<span class='uno'>*". $errNombre."</span><br><br>";
	echo "<label>IP Binario: </label>";
	echo "<input type='text' name='opera2' value='$total' size=50><br><br>";
echo "</form><br><br>";


/*
echo "OTRA FORMA<br><br><br>";

$val1=Divide($op1)[0];//se guarda el primer valor de la ip
$val2=Divide($op1)[1];//se guarda la 2º posición del valor de la ip
$val3=Divide($op1)[2];//se guarda el tercer valor de la ip
$val4=Divide($op1)[3];//se guarda el cuarto valor de la ip
echo $val1, $val2, $val3, $val4."<br>";
$bin1= decbin($val1);
$bin2= decbin($val2);
$bin3= decbin($val3);
$bin4= decbin($val4);
$tot= $bin1.".". $bin2.".". $bin3.".". $bin4;
echo $tot;
echo "<form>";
	echo "<input type='text' name='' value='$tot' size=100>";
echo "</form>";
function Divide($n1){
	$valor=explode(".",$n1);
	return $valor;
}
*/

?>

