<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP </title>
    <style></style>
</head>

<body>

<form method= "get " >

    <label for="numero1">Digite o 1º Número:</label><br>
    <input type="int" id="numero1" name="numero1"><br>
 
 
    <label for="operacao">escolha a operação: </label><br>
    <select type="list" id="operacao" name="operacao" list="operacao" ><br>
    <datalist id="operacao">
        <option value="adicao">+</option>
        <option value="subtriacao">-</option>
        <option value="multiplicacao">*</option>
        <option value="divisao">+</option>
        <option value="fatoracao">!</option>
        <option value="elevacao">^</option>
    </datalist>
 
    <label for="numero1">Digite o 1º Número:</label><br>
    <input type="int" id="numero1" name="numero1"><br>
    
   <input type="submit" name="calcular" value="calcular"></input> 


</form>
    
</body>
</html>