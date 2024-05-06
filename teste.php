<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
</head>
<body>

<form method="GET">

    <label for="num1">1º Número:</label>
    <input type="text" id="num1" name="num1">

    <label for="operacao">Operação:</label>
    <select id="operacao" name="operacao">
        <option value="adicao">+</option>
        <option value="subtracao">-</option>
        <option value="multiplicacao">*</option>
        <option value="divisao">/</option>
        <option value="fatorial">!</option>
        <option value="elevacao">^</option>
    </select>

    <label for="num2">2º Número:</label>
    <input type="text" id="num2" name="num2">

    <input type="submit" name="calcular" value="Calcular">

    <input type="submit" name="limpar" value="Limpar">

    <input type="submit" name="salvar" value="Salvar">

    <input type="submit" name="memoria" value="Memória">

</form>

<?php
session_start();

if (!isset($_SESSION['h'])) {
    $_SESSION['h'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['limpar'])) {
        $_SESSION['h'] = [];
    } elseif (isset($_GET['salvar'])) {
        if (isset($_SESSION['r'])) {
            $_SESSION['h'][] = $_SESSION['r'];
        }
    } elseif (isset($_GET['memoria'])) {
        if (isset($_SESSION['r'])) {
            echo "<p>{$_SESSION['r']}</p>";
        } else {
            echo "<p>Nenhuma operação salva.</p>";
        }
    } else {
        $n1 = $_GET["num1"];
        $n2 = $_GET["num2"];
        $o = $_GET["operacao"];

        switch ($o) {
            case 'adicao':
                $r = $n1 + $n2;
                $res = "$n1 + $n2 = $r";
                break;
            case 'subtracao':
                $r = $n1 - $n2;
                $res = "$n1 - $n2 = $r";
                break;
            case 'multiplicacao':
                $r = $n1 * $n2;
                $res = "$n1 * $n2 = $r";
                break;
            case 'divisao':
                if ($n2 != 0) {
                    $r = $n1 / $n2;
                    $res = "$n1 / $n2 = $r";
                } else {
                    $r = "Não é possível dividir por zero!";
                    $res = "$n1 / $n2 = Não é possível dividir por zero!";
                }
                break;
            case 'fatorial':
                if (is_int($n1) && $n1 >= 0) {
                    $r = fatorial($n1);
                    $res = "fatorial($n1) = $r";
                } else {
                    $r = "Número inválido para fatoração!";
                    $res = "fatorial($n1) = Número inválido para fatoração!";
                }
                break;
            case 'elevacao':
                $r = pow($n1, $n2);
                $res = "$n1 elevado a $n2 = $r";
                break;
        }

        if (isset($res)) {
            $_SESSION['h'][] = $res;
            $_SESSION['r'] = $res;
        }
    }
}

if (isset($r)) {
    echo "<p>Resultado: {$r}</p>";
}

function fatorial($n)
{
    if ($n == 0) {
        return 1;
    }

    return $n * fatorial($n - 1);
}
?>

<h2>Histórico</h2>
<?php
if (!empty($_SESSION['h'])) {
    foreach ($_SESSION['h'] as $op) {
        echo "<p>$op</p>";
    }
} else {
    echo "<p>Nenhuma operação realizada ainda.</p>";
}
?>

</body>
</html>