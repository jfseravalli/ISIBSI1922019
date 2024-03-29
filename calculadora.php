<?php

if(isset($_POST["par1"]) && isset($_POST["par2"]) && isset($_POST["op"]))/*Verifica que las variables esten definidas y no sean NULL*/
{
	require "funciones.php";
								/*Asigna a las variables par1 y par2 los valores de las mismas obtenidas con el Post*/
	$par1 = $_POST["par1"];
	$par2 = $_POST["par2"];
	$op = trim($_POST["op"]);
	if(!is_numeric($par1) || !is_numeric($par2)) /*Verfica que los campos de cifras a evaluar no esten vacíos*/
	{
		$resultado = "Ingrese Números";
	} 
	else 
	{
		$par1 = intval($par1, 10);/*Obtiene el valor entero de la variable en base 10*/
		$par2 = intval($par2, 10);
		switch ($op)
		{
			case "+": $resultado = sumar($par1, $par2); break;
			case "-": $resultado = restar($par1, $par2); break;
			case "*": $resultado = multiplicar($par1, $par2); break;
			case "/":
				if($par2 != 0) {
					$resultado = dividir($par1, $par2); 
				} else {
					$resultado = "Err. Div. Cero";
				}
				break;
			default: $resultado = "Seleccione Operación";
		}
	}
	
	/*Genera respuesta en JSON, es decir obtiene el valor del servidor y lo muestra en el html*/
	echo json_encode($resultado);
	
	exit();
}

?>
<html>
<head>
	<title>Calculadora</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script src="jquery-1.4.2.js"></script>
  	<script src="json2.js"></script>
  	<script type="text/javascript">
		function CalculoTotal()
		{
			var par1 = $("#par1").val();
			var par2 = $("#par2").val();
			var op = $("#op").val();
			
			/*Solicitamos el resultado con AJAX según el método POST*/
			/*como parámetro (por POST) se envía el par1, par2 y op.*/
			$.post("calculadora.php", {par1: par1, par2: par2, op: op}, function(resultado){
				$("#res").val(resultado);
			}, "json"); /*El parámetro "json" indica que la respuesta desde PHP es en formato JSON*/
		}	
  	</script>
</head>
<body>
<body bgcolor= "#222222" text= "white">
  <h3 align="center">CALCULADORA</h3>
  <form action="calculadora.php" method="POST">
    <table border="1" align="center" width="400px" cellpadding="4">	
    <tr>		
		<td><b>1er Cifra:</b></td>
		<td>
			<input type="text" name="par1" id="par1" size="10">
		</td>
    </tr>
    <tr>		
		<td><b>2da Cifra:</b></td>
		<td>
			<input type="text" name="par2" id="par2" size="10">
		</td>
    </tr>
    <tr>		
		<td><b>Operador:</b></td>
		<td>
			<input type="text" name="op" id="op" size="5">
		</td>
    </tr>
    <tr>		
		<td colspan="2" align="center">
		  <input type="button" name="enviar" value="Resultado" onclick="CalculoTotal();">
		</td>
    </tr>
    <tr>
		<td colspan="2" align="center">
		  <input type="text" name="res" id="res" size="15">
		</td>
    </tr>
    </table>

  </form>
</body>
</html>