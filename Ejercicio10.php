<html>
<head>
<title>Ejercicio10</title>
<h1>Formulario con PHP</h1>

</head>

<body>


<FORM METHOD="POST" ACTION="FormRecibe.php">

<h2> Campo de texto plano</h2>
Nombre Completo: <input type="text" name="name" /><br/> 

<h2> Tres l�neas de texto</h2>
<textarea name="textArea" rows="3" cols="12" wrap="soft"> Escriba tres de sus Hobbies</textarea> <br/> 

<h2>Campo de Selecci�n</h2>
Seleccione su carrera: <select name="Carrera">

<option> Ing. en Sistemas</option>

<option> Ing. Industrial</option>

<option> Ense�anza de la Inform�tica</option>

</select> <br> <br> <br>

<h2>Selecci�n por checkboxes</h2>
 A�o de Finalizaci�n de la carrera:<br>

    <label><input type="checkbox" name="2019" value="2019">2019 </label><br>

    <label><input type="checkbox" name="2020" value="2020">2020 </label><br>

    <label><input type="checkbox" name="2021" value="2021">2021 </label> <br>

	<label><input type="checkbox" name="2022" value="2022">2022 </label> <br> <br>

<h2>Selecci�n por Radiales</h2>
Esta cursando TCU:<br>

<input type="radio" name="TCU_si" value="SI">TCU-Si <br>

<input type="radio" name="TCU_no" value="No">TCU-No <br>


<h2>Selecci�n por Rango</h2>
Seleccione la cantidad de materias que est� cursando:<br>

Cantidad de materias: <input type="range" name="materias" min="1" max="6" step="1"> <br> <br>


<input type="submit" value="Enviar Informaci�n" />
</form>


</body>