<!DOCTYPE html>
<html lang="es">
<head>
    <title>Calculadora Result</title>

</head>

<body>
<?php

session_start();
if (!isset($_SESSION['data']))
{
    $_SESSION['data'] = array();
    $pos = 0;
}
else
{
    $pos = $_POST['pos'];

}

if (isset($_POST['Calcular']))
{
    $user = $_POST['user'];
    $operand1 = $_POST['operand1'];
    $operand2 = $_POST['operand2'];
    $operand3 = $_POST['operand3'];


    $operand = array(
      "pos" => $pos,
      "user" => $user,
      "operand1" => $operand1,
      "operand2" => $operand2,
      "operand3" => $operand3
    );


    $_SESSION['data'][$pos] = $operand;
    echo "La posicio actual es: ". $pos. "<br>";
    print_r($_SESSION['data']);
    $pos = $pos + 1;

}


?>
<h1> Calculadora</h1>
<form method="post">
    <label for="user">User</label>
    <input type="text" id="user" name="user"  required>
    <label for="operand1">Operand1</label>
    <input type="text" id="operand1" name="operand1" required>

    <label for="operand2">Operand2</label>
    <input type="text" id="operand2" name="operand2" required>

    <label for="operand3">Operand3</label>
    <input type="text" id="operand3" name="operand3">


    <input type="hidden" name="pos" value="<?php echo $pos ?>">
    <button type="submit" name="Calcular"> Calcular</button>
</form>


<?php

if (is_numeric($operand1) && is_numeric($operand2) && is_numeric($operand3))
{
    echo "<br><h3>Eren 3 valors numerics consecutius</h3>";
    $result =$operand1+$operand2+$operand3;
    echo "<h4>".$result."</h4>";

}
else
{
    echo "<br><h3>Hi ha elements alfanumerics</h3> El resultat no es numeric: ". $operand1." ". $operand2. " ". $operand3;
}

if ($pos != 0)
{

    foreach ($_SESSION['data'] as $key => $value)
    {

        if ($operand1 == $value['operand1'] && $operand2 == $value['operand2'] && $operand3 == $value['operand3'])
        {
            if ($user != $value['user'])
            {
                echo "Hem tret el mateix resultat que el usuari: ". $value['user'];
            }
        }
    }
}

?>
</body>
</html>
