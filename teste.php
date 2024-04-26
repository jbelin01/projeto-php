<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP </title>
    <style></style>
</head>

<body>

<form method= "get" >
        <div style="display: flex">
            <div class="input-group flex-nowrap w-25">
                <span class="input-group-text" id="addon-wrapping">Número 1</span>
                <input type="int" id="numero1" name="numero1" class="form-control" placeholder="Número 1" aria-label="Número 1" aria-describedby="addon-wrapping">
            </div>
                
            <select class="form-select w-25" id="opcao" aria-label="Default select example">
                <option value="adicao">+</option>
                <option value="subtriacao">-</option>
                <option value="multiplicacao">*</option>
                <option value="fatoracao">!</option>
                <option value="elevacao">^</option>
            </select>    
                
                
            
            <div class="input-group flex-nowrap w-25">
                <span class="input-group-text" id="addon-wrapping">Número 2</span>
                <input type="int" id="numero2" name="numero2" class="form-control" placeholder="Número 2" aria-label="Número 2" aria-describedby="addon-wrapping">
            </div>

                
        </div>
        
        <input type="submit" name="calcular" value="calcular"></input>

</form>
    
</body>
</html>