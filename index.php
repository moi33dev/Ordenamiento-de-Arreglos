<?php
// Autor: Moises Medina. Para: Programacion IV UBA.===========================================
// GENERAR ARREGLO CON NÚMEROS ALEATORIOS
// ===========================================

function generarArregloAleatorio($cantidad, $min, $max) {
    $arreglo = [];
    for ($i = 0; $i < $cantidad; $i++) {
        $arreglo[] = rand($min, $max);
    }
    return $arreglo;
}

// ===========================================
// FUNCIÓN DE ORDENAMIENTO (Burbuja)
// ===========================================

function ordenarAscendente($arreglo) {
    $n = count($arreglo);
    
    // Algoritmo de ordenamiento Burbuja
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arreglo[$j] > $arreglo[$j + 1]) {
                // Intercambiar elementos
                $temp = $arreglo[$j];
                $arreglo[$j] = $arreglo[$j + 1];
                $arreglo[$j + 1] = $temp;
            }
        }
    }
    
    return $arreglo;
}

// ===========================================
// FUNCIÓN PARA MOSTRAR ARREGLO
// ===========================================

function mostrarArreglo($arreglo, $titulo, $clase = "") {
    echo "<div class='arreglo-box $clase'>";
    echo "<h3>$titulo</h3>";
    echo "<div class='numeros'>";
    
    foreach ($arreglo as $indice => $valor) {
        echo "<div class='numero'>";
        echo "<span class='indice'>[$indice]</span>";
        echo "<span class='valor'>$valor</span>";
        echo "</div>";
    }
    
    echo "</div>";
    echo "<p class='info'>Total: " . count($arreglo) . " elementos</p>";
    echo "</div>";
}

// ===========================================
// CONFIGURACIÓN Y EJECUCIÓN
// ===========================================

$cantidad = 10;
$minimo = 1;
$maximo = 99;

// Generar arreglo aleatorio
$arregloOriginal = generarArregloAleatorio($cantidad, $minimo, $maximo);

// Ordenar el arreglo
$arregloOrdenado = ordenarAscendente($arregloOriginal);

// Calcular estadísticas
$menor = min($arregloOriginal);
$mayor = max($arregloOriginal);
$suma = array_sum($arregloOriginal);
$promedio = $suma / count($arregloOriginal);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenamiento de Arreglos</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <div class="contenedor">
        <h1>🔢 Ordenamiento de Arreglos</h1>
        <p class="subtitulo">Método Burbuja (Bubble Sort)</p>
        
        <!-- Configuración -->
        <div class="config-box">
            <h2>⚙️ Configuración</h2>
            <ul>
                <li><strong>Cantidad:</strong> <?php echo $cantidad; ?> números</li>
                <li><strong>Rango:</strong> <?php echo $minimo; ?> a <?php echo $maximo; ?></li>
            </ul>
            <a href="index.php" class="btn-generar">🔄 Generar nuevos números</a>
        </div>
        
        <!-- Comparación -->
        <section>
            <h2>🔄 Comparación Antes y Después</h2>
            <div class="comparacion">
                <?php mostrarArreglo($arregloOriginal, "📋 Antes (Desordenado)", "antes"); ?>
                <div class="flecha">➜</div>
                <?php mostrarArreglo($arregloOrdenado, "✅ Después (Ordenado)", "despues"); ?>
            </div>
        </section>
        
        <!-- Estadísticas -->
        <section>
            <h2>📊 Estadísticas</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>🔢 Menor</h3>
                    <p class="stat-number"><?php echo $menor; ?></p>
                </div>
                <div class="stat-card">
                    <h3>🔝 Mayor</h3>
                    <p class="stat-number"><?php echo $mayor; ?></p>
                </div>
                <div class="stat-card">
                    <h3>➕ Suma</h3>
                    <p class="stat-number"><?php echo $suma; ?></p>
                </div>
                <div class="stat-card">
                    <h3>📊 Promedio</h3>
                    <p class="stat-number"><?php echo number_format($promedio, 1); ?></p>
                </div>
            </div>
        </section>
        
        <!-- Explicación -->
        <section>
            <h2>💡 ¿Cómo funciona el Bubble Sort?</h2>
            <div class="explicacion">
                <p>El algoritmo de <strong>ordenamiento burbuja</strong> funciona comparando elementos adyacentes e intercambiándolos si están en el orden incorrecto.</p>
                <ol>
                    <li>Compara el primer elemento con el segundo</li>
                    <li>Si el primero es mayor, los intercambia</li>
                    <li>Pasa al siguiente par y repite</li>
                    <li>Continúa hasta que no haya intercambios</li>
                </ol>
                <div class="complejidad">
                    <strong>Complejidad temporal:</strong> O(n²) en el peor caso
                </div>
            </div>
        </section>
        
    </div>

</body>
</html>