<?php

    // session_start();

    // $_SESSION["nome"] = "Luis Lindo";
    // $_SESSION["sexo"] = " o brabo do mandela  MACHO ALFA";
    // se sabe que o professor vai ver essa fita né ?

?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: black;">
    <main style="padding-top: 2rem; margin-left: 15rem; margin-right: 15rem; justify-content: center; align-items: center;">
    <div style="background-color: red; padding: 1rem; border-radius: 8px;">

        <h4><p style="text-align: center; padding: 8px; color: white;">CALCULADORA</p></h4>

        <form method= "get" class="row" >
            <div class="row">
                <div class="col">
                    <div class="input-group flex-nowrap ">
                        <label class="input-group-text" id="addon-wrapping">Número 1</label>
                        <input  type="int" id="num1" name="num1" class="form-control" placeholder="Número 1" aria-label="Número 1" aria-describedby="addon-wrapping">
                    </div>
                </div>
                
                <select class="form-select w-auto" id="operacao" name="operacao" aria-label="Default select example">
                    <option value="adicao">+</option>
                    <option value="subtriacao">-</option>
                    <option value="multiplicacao">*</option>
                    <option value="divisao">/</option>
                    <option value="fatoracao">!</option>
                    <option value="elevacao">^</option>
                </select> 
                
                <div class="col">
                    <div class="input-group flex-nowrap ">
                        <label class="input-group-text" id="addon-wrapping">Número 2</label>
                        <input type="int" id="num2" name="num2" class="form-control" placeholder="Número 2" aria-label="Número 2" aria-describedby="addon-wrapping">
                    </div>                
                </div>
                <input type="submit" name="calcular" class="btn btn-primary w-auto" value="Calcular">
            </div>
            
            <div class="d-flex" style=" padding: 1rem">
                
            <input type="submit" name="limpar"class="btn btn-primary " value="Limpar Histórico" style="margin-right: 10px;">
            
            <input type="submit" name="salvar"class="btn btn-primary " value="Salvar" style="margin-right: 10px;">
            
            <input type="submit" name="memoria"class="btn btn-primary" value="Memória">
        </div>
        
    </form>
    
    <div style="padding: 8px; background-color: white;border-radius: 15px;">
        <?php
            session_start();
            
            if (!isset($_SESSION['historico'])) {
                $_SESSION['historico'] = [];
            }
            
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if (isset($_GET['limpar'])) {
                    $_SESSION['historico'] = [];
                } elseif (isset($_GET['salvar'])) {
                    if (isset($_SESSION['resultado'])) {
                        $_SESSION['historico'][] = $_SESSION['resultado'];
                        $_SESSION['memoria'] = $_SESSION['resultado'];
                    }
                } elseif (isset($_GET['memoria'])) {
                    if (isset($_SESSION['memoria'])) {
                        echo "<p>Memória: {$_SESSION['memoria']}</p>";
                    } else {
                        echo "<p>por acaso salvou alguma coisa na memória pra estar querendo buscar ?! </p>";
                    }
                } elseif (isset($_GET['calcular'])) {
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
                                            $r = "Não tem como dividir por zero! vá estudar. ";
                                            $res = "$n1 / $n2 = Não tem como dividir por zero! vá estudar.";
                                        }
                                        break;
                                        case 'fatorial':
                                            if (is_int($n1) && $n1 >= 0) {
                                                $r = fatorial($n1);
                                $res = "$n1! = $r";
                            } else {
                                $r = "só se fatora um número mano ! ";
                                $res = "$n1! = como que fatora isso ?! volte a estudar.  ";
                            }
                            break;
                            case 'elevacao':
                                $r = pow($n1, $n2);
                                $res = "$n1 ^  $n2 = $r";
                                break;
                            }
                            
                            if (isset($res)) {
                                $_SESSION['resultado'] = $res;
                                $_SESSION['historico'][] = $res;
                            }
                        }
                    }
                    
                    if (isset($r)) {
                        echo "<h5><p>Resultado: {$r}</p><h5>";
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
    <h2 style="text-align: center; border: 1px solid; border-radius: 10px; background-color: gray; color: black">Histórico</h2>
    <?php foreach ($_SESSION['historico'] as $op): ?>
        <p style="margin-left: 15px;"><?php echo $op; ?></p>
        <?php endforeach; ?>
        <?php else: ?>
            <h4><p style="text-align: center; padding: 15px;">realize uma operação!</p></h4>
            <?php endif; ?>
        </div>
    </div>
    </main>
    
</body>
</html>