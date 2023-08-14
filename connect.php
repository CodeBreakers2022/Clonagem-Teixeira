<?php
    // Conectando ao banco
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'teixeira_turismo';

    // Passando os parâmetros para conectar ao banco
    $connection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
    if(!$connection) {
        die("Houve um erro: ". mysqli_connect_error());

    } else {
        // Conxão estabelecida, não precisa ser mostrado
    }

?>
