<?php 
    declare(strict_types = 1); 
    require_once("../../config.php");
    require_once("../../Utilidades/funcionesAuxiliares.php");

    /* Comprobando si el usuario ha visitado la página antes. Si es así, mostrará la fecha de la última
    visita y el número de visitas desde entonces. Si no, mostrará el número de visitas. */
    $contador = getContadorVisitas();
    if(isset($_COOKIE['timeStampUltimaVisita'])){
        $ultimaVisita = intval($_COOKIE['timeStampUltimaVisita']);
        $numUltimaVisita = $_COOKIE['numVisita'];
        $numVisitasTranscurridas = $contador - $numUltimaVisita;
    }
    setcookie("timeStampUltimaVisita", strval(getdate()[0]), time() + 365 * 24 * 60 * 60);
    setcookie("numVisita", strval($contador), time() + 365 * 24 * 60 * 60);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02_Jorge Escobar</title>
</head>
<body>
    <?php
        /* Comprobando si el usuario ha visitado la página antes. Si es así, mostrará la fecha de la
        última visita y el número de visitas desde entonces. Si no, mostrará el número de visitas. */
        if(isset($numVisitasTranscurridas)){
            echo "Hola usuario. La ultima vez que nos visitaste fue el día: ", date("d/m/Y H:i:s", $ultimaVisita),"<br/>\n";
            echo "Desde entonces han transcurrido: $numVisitasTranscurridas visitas. <br/>\n";
        }else{
            echo "Hola usuario. Encantado de tenerte aquí por primera vez.<br/>\n";
            echo "Eres el visitante nº: $contador.<br/>\n";
        }
    ?>
</body>
</html>