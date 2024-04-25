<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <style></style>
</head>
<body>

<form method="GET">

    <label for="numero1">Digite o 1º Número:</label>
    <input type="text" id="numero1" name="numero1">

    <label for="operacao">Escolha a operação:</label>
    <select id="operacao" name="operacao">
        <option value="adicao">+</option>
        <option value="subtracao">-</option>
        <option value="multiplicacao">*</option>
        <option value="divisao">/</option>
        <option value="fatorial">!</option>
        <option value="elevacao">^</option>
    </select>

    <label for="numero2">Digite o 2º Número:</label>
    <input type="text" id="numero2" name="numero2">

    <input type="submit" name="calcular" value="Calcular">

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $numero1 = $_GET["numero1"];
    $numero2 = $_GET["numero2"];
    $operacao = $_GET["operacao"];

    switch ($operacao) {
        case 'adicao':
            $resultado = $numero1 + $numero2;
            break;
        case 'subtracao':
            $resultado = $numero1 - $numero2;
            break;
        case 'multiplicacao':
            $resultado = $numero1 * $numero2;
            break;
        case 'divisao':
            if ($numero2 != 0) {
                $resultado = $numero1 / $numero2;
            } else {
                $resultado = "Não é possível dividir por zero!";
            }
            break;
        case 'fatorial':
            if (is_int($numero1) && $numero1 >= 0) {
                $resultado = $this->fatorial($numero1);
            } else {
                $resultado = "Número inválido para fatoração!";
            }
            break;
        case 'elevacao':
            $resultado = MAthpow($numero1, $numero2);
            break;
    }
}

if (isset($resultado)) {
    echo "<p>O resultado é: {$resultado}</p>";
}

function fatorial($n)
{
    if ($n == 0) {
        return 1;
    }

    return $n * $this->fatorial($n - 1);
}
?>

</body>
</html>