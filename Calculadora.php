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

    <label for="numerox">Digite o 1º Número:</label>
    <input type="text" id="numerox" name="numero1">
 
 
    <label for="operacao">escolha a operação: </label>
    <select  id="operacao" name="operacao"  >
        <option value="adicao">+</option>
        <option value="subtriacao">-</option>
        <option value="multiplicacao">*</option>
        <option value="divisao">+</option>
        <option value="fatoracao">!</option>
        <option value="elevacao">^</option>
    </select>
 
    <label for="numeroy">Digite o 2º Número:</label>
    <input type="text" id="numeroy" name="numero2">
    
    <input type="submit" name="calcular" value="calcular"></input> 
    


</form>
    
</body>
</html>