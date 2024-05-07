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
    <input type="text" id="num1" name="num1" value="<?php echo isset($_GET['num1']) ? $_GET['num1'] : ''; ?>">

    <label for="operacao">Operação:</label>
    <select id="operacao" name="operacao">
        <option value="adicao" <?php echo (isset($_GET['operacao']) && $_GET['operacao'] == 'adicao') ? 'selected' : ''; ?>>+</option>
        <option value="subtracao" <?php echo (isset($_GET['operacao']) && $_GET['operacao'] == 'subtracao') ? 'selected' : ''; ?>>-</option>
        <option value="multiplicacao" <?php echo (isset($_GET['operacao']) && $_GET['operacao'] == 'multiplicacao') ? 'selected' : ''; ?>>*</option>
        <option value="divisao" <?php echo (isset($_GET['operacao']) && $_GET['operacao'] == 'divisao') ? 'selected' : ''; ?>>/</option>
        <option value="fatorial" <?php echo (isset($_GET['operacao']) && $_GET['operacao'] == 'fatorial') ? 'selected' : ''; ?>>!</option>
        <option value="elevacao" <?php echo (isset($_GET['operacao']) && $_GET['operacao'] == 'elevacao') ? 'selected' : ''; ?>>^</option>
    </select>

    <label for="num2">2º Número:</label>
    <input type="text" id="num2" name="num2" value="<?php echo isset($_GET['num2']) ? $_GET['num2'] : ''; ?>">

    <input type="submit" name="calcular" value="Calcular">

    <input type="submit" name="limpar" value="Limpar Histórico">

    <input type="hidden" name="memoria" value="<?php echo isset($_SESSION['memoria']) ? $_SESSION['memoria'] : ''; ?>">
    <input type="submit" name="memoria_botao" value="Memória">

    <input type="submit" name="salvar" value="Salvar">

</form>

<?php
session_start();

if (!isset($_SESSION['historico'])) {
    $_SESSION['historico'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['limpar'])) {
        $_SESSION['historico'] = [];
    } elseif (isset($_GET['salvar'])) {
        if (isset($_GET['num1']) && isset($_GET['operacao']) && isset($_GET['num2'])) {
            $num1 = $_GET['num1'];
            $operacao = $_GET['operacao'];
            $num2 = $_GET['num2'];
            $_SESSION['memoria'] = "$num1,$operacao,$num2";
        }
    } elseif (isset($_GET['memoria_botao'])) {
        if (isset($_SESSION['memoria'])) {
            list($num1, $operacao, $num2) = explode(',', $_SESSION['memoria']);
            echo "<script>
                    document.getElementById('num1').value = '{$num1}';
                    document.getElementById('num2').value = '{$num2}';
                    document.getElementById('operacao').value = '{$operacao}';
                  </script>";
        } else {
            echo "<p>Nenhuma operação salva na memória.</p>";
        }
    } elseif (isset($_GET['calcular'])) {
        if (isset($_SESSION['memoria'])) {
            unset($_SESSION['memoria']);
        }
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
                    $res = "$n1! = $r";
                } else {
                    $r = "Número inválido para fatoração!";
                    $res = "$n1! = Número inválido para fatoração!";
                }
                break;
            case 'elevacao':
                $r = pow($n1, $n2);
                $res = "$n1 ^ $n2 = $r";
                break;
        }

        if (isset($res)) {
            $_SESSION['resultado'] = $res;
            $_SESSION['historico'][] = $res;
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

<?php if (!empty($_SESSION['historico'])): ?>
    <h2>Histórico</h2>
    <?php foreach ($_SESSION['historico'] as $op): ?>
        <p><?php echo $op; ?></p>
    <?php endforeach; ?>
<?php else: ?>
    <p>Nenhuma operação realizada ainda.</p>
<?php endif; ?>

</body>
</html>