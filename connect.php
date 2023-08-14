<?php
    // Conectando ao banco
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'teixeira_clonagem';

    // Passando os parâmetros para conectar ao banco
    $conexao = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
    if(!$conexao) {
        die("Houve um erro: ". mysqli_connect_error());

    } else {
        // Conxão estabelecida, não precisa ser mostrado
    }

?>
