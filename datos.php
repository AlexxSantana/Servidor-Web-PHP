<!DOCTYPE html>

<html>
<head>

<style>
table {
	border-collapse: collapse;
}
th, td {
	border: 1px solid #dddddd;
	width:46px;
	}
label{
  display: inline-block;
  width: 80px;
}
.uno{
	color:red;
}
</style>
</head>
<body>
<?php
/*
Esta forma de recuperar valores es independiente de que el método usuado sea
GET o POST
*/
echo "El method que ha usado es: ",$_SERVER['REQUEST_METHOD'],"<br>";

echo "<h1>DATOS ALUMNOS</h1>";
//GUARDAMOS EN VARIABLES, CADA UNO DE LOS ELEMENTOS PARA PODER HACER USO DE ELLOS POSTERIORMENTE
$op1=$_REQUEST['nombre'];
$op2=$_REQUEST['apellido1'];
$op3=$_REQUEST['apellido2'];
$op4=$_REQUEST['email'];
$op5=$_REQUEST['sexo'];

//Variables 2 del 2º formulario
$ope1=$_REQUEST['nombre2'];
$ope2=$_REQUEST['ape1-2'];
$ope3=$_REQUEST['ape2'];
$ope4=$_REQUEST['email2'];
$ope5=$_REQUEST['sexo2'];



//SE PROCEDE A Crear EL FICHERTO datosAlumnos.txt, guardándolo en una variable para su posterior uso

$n="Nombre"; $a="Apellidos"; $e="Email"; $s="Sexo";//Variables para uso en el documento .txt
//guardar datos
$datosAl= fopen("datosAlumnos.txt", "ab");
// Escribe los datos introducidos separados por " "
fwrite($datosAl, "$n     $a           $e           $s"."\r\n".$op1."       ".$op2." ".$op3."     ".$op4."   ".$op5."\r\n".$ope1."       ".$ope2." ".$ope3."     ".$ope4."\r\n");
fclose($datosAl);

 

 
 
 
//Visualizamos la función tabla y por ende la tabla HTML	
tabla($op1,$op2,$op3,$op4,$op5);
echo "<br><br><br><br>";
Formulario($ope1,$ope2,$ope3,$ope4,$ope5);

//Función dónde se realiza la tabla y se pasa las variables
function Tabla($nombre,$ap1,$ap2,$email,$sex){
		echo "<table align='center' border=\"1\">";
			echo "<tr>";
				echo "<th>Nombre</th>";
				echo "<th>Apellidos</th>";
				echo "<th>Email</th>";
				echo "<th>Sexo</th>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>$nombre</td>";
				echo "<td>$ap1&nbsp;$ap2</td>";
				echo "<td>$email</td>";
				echo "<td>$sex</td>";
			echo"</tr>";
		echo "</table>";
	  
}
//Función para validar el formulario, con sus respectivos mensajes de erroes en cada campo


function Formulario($nombre,$ap1,$ap2,$email,$sex){
	//VALIDACIÓN
	/*Validaciones a realizar:
Campo  		Validación
Nombre 		Obligatorio. Solo puede contener letras y espcios en blanco
Email		Obligatorio. Comprobar es email válido (inlcuye @ y .)
Sexo 	Obligatorio. Debe seleccionar alguna de las opciones
*/
	// definición de variables de error
	$errNombre=""; $errEmail=""; $errApe1=""; $errApe2=""; $errSex="";
	
	// definición de variables para recuperar valor campos
	//$nombre2="";//Como las variables ya estan definida en la function no hace falta definirlas nuevamente
	if ($_SERVER["REQUEST_METHOD"] == "POST"){//Definimos una condición para verificar errores
		if(empty($_POST["nombre2"])){//si en el campo nombre2 (de la tabla html) esta vacío muestra el siguiente error
			$errNombre= "Campo Obligatorio!!";
		} else {
			$nombre= LimpiaCampos($_POST["nombre2"]);
				// Comprueba solo letras y espacios
				if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {//Realiza una comparación con una expresión regular
				$errNombre = "Solo se permiten letras y espacios en blanco";
				}
			}
		// Comprobamos Apellido1 
		if(!empty($_POST["ape1-2"])){
			$ap1= LimpiaCampos($_POST["ape1-2"]);
			// Comprueba solo letras y espacios
				if (!preg_match("/^[a-zA-Z ]*$/",$ap1)){//Realiza una comparación con una expresión regular
				$errApe1 = "Solo se permiten letras y espacios en blanco";
				}
		}
		// Comprobamos Apellido2 
		if(!empty($_POST["ape2"])){
			$ap2= LimpiaCampos($_POST["ape2"]);
			// Comprueba solo letras y espacios
				if (!preg_match("/^[a-zA-Z ]*$/",$ap2)){//Realiza una comparación con una expresión regular
				$errApe2 = "Solo se permiten letras y espacios en blanco";
				}
		}
		//Comprobamos que el campo email no este vacío, en tal caso aparecerá un error
		if(empty($_POST["email2"])){
			$errEmail= "Campo Obligatorio!!";
		} else {
			$email= LimpiaCampos($_POST["email2"]);
			// Comprueba que el email introducido es correcto
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errEmail = "Comprobar que el email introducido es correcto (@servidor '.' com/es/net)";
				}
			}
		//Comprobamos que el sexo hay que marcarlo
		 if (empty($_POST["sexo2"])) {
			$errSex = "Sexo es obligatorio";
		  } else {
			$sex = LimpiaCampos($_POST["sexo2"]);
			}

	}
	//Presentamos el formulario en HTML
	echo "<form>";
		echo "<label>Nombre:</label>";
		echo "<input type='text' value='$nombre'>";
		echo "<span class='uno'>&nbsp;". $errNombre."</span><br><br>";
		echo "<label>Apellido1:</label>";
		echo "<input type='text' value='$ap1'>";
		echo "<span class='uno'>&nbsp;". $errApe1."</span><br><br>";
		echo "<label>Apellido2:</label>";
		echo "<input type='text' value='$ap2'>";
		echo "<span class='uno'>&nbsp;". $errApe2."</span><br><br>";
		echo "<label>Email:</label>";
		echo "<input type='text' value='$email'>";
		echo "<span class='uno'>&nbsp;". $errEmail."</span><br><br>";
		echo "<label>Sexo:</label>";
		echo "<input type='radio' value=''>Mujer";
		echo "<input type='radio' value=''>Hombre &nbsp;&nbsp;";
		echo "<span class='uno'>&nbsp;". $errSex."</span>";
	echo "</form>";
}



function LimpiaCampos($datos){
	$datos=trim($datos);//Limpia espacios al principio y al final
	$datos=stripslashes($datos);//Elimina los '\'
	$datos=htmlspecialchars($datos);//Aún no me queda claro su uso.
	return $datos;
}

?>
</body>
</html>
