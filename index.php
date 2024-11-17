<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 3 - Programación básica</title>
</head>
<body>
    <h1>Tarea 3 - Programación básica</h1>

    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <label for="valor">Ingrese un valor:</label>
        <input type="text" id="valor" name="valor" required>
        <input type="submit" value="Enviar">
    </form>

    <?php
    function generarArray($valor) {
        $numeros = array(); 
        for ($i = $valor; $i >= 0; $i -= 3) { 
            $numeros[] = $i; 
        }
        return $numeros;    
    }

    function tabla($valores) {
        $html = "<table border='1'>"; // Se crea una tabla HTML
        $html .= "<tr>"; 
       
        for ($i = 0; $i < count($valores); $i++) {
            $html .= "<td>" . $valores[$i] . "</td>"; // Se añaden los valores en celdas
        }

        $html .= "</tr>";
        $html .= "</table>"; 
        return $html; 
    }

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['valor'])) { 
            $valor = htmlspecialchars($_POST['valor']); 

            // Validaciones
            if (empty($valor)) {
                echo "<h2>Introduzca un valor</h2>";
            } 
            elseif (!is_numeric($valor)) {
                echo "<h2>Introduzca un valor numérico</h2>";
            } 
            elseif ($valor < 0) {
                echo "<h2>Introduzca un valor positivo</h2>";
            } 
            elseif ($valor > 10) {
                echo "<h2>Número demasiado grande</h2>";
            } 
            elseif ($valor >= 0 && $valor <= 10) {
                
                echo "<h3>Valor ingresado: $valor</h3>";
                $array_generado = generarArray($valor); 
                echo "<h3>Array generado:</h3>";
                print_r($array_generado);
                echo "<h3>Tabla generada:</h3>";
                echo tabla($array_generado); 
            } 
            else {
                echo "<h2>Valor desconocido</h2>";
            }
        } else {
            echo "<h2>No se ha introducido ningún valor</h2>"; 
        }
    } else {
        echo "<h2>No se ha introducido ningún valor</h2>";
    }
    ?>
</body>
</html>