<?php

    // Incluindo o arquivo connect.php
    include("connect.php");

    // Verifica se os dados foram passados via método POST e se todos estão preenchidos
    if (isset($_POST['submit']) && !empty($_POST['user_name']) && !empty($_POST['email']) && !empty($_POST['password_'])) {
        // Linkando com o banco de dados
        $name = $_POST['user_name'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $birth = $_POST['birth'];
        $phone = $_POST['phone'];
        $state = $_POST['state_'];
        $city = $_POST['city'];
        $password = password_hash($_POST['password_'], PASSWORD_DEFAULT);

        // Verifica se o e-mail já está cadastrado
        $consult = "SELECT COUNT(*) FROM user WHERE email = '$email'";
        $resultConnect = mysqli_query($connection, $consult);
        $count = mysqli_fetch_array($resultConnect)[0];

        // Verificar se o e-mail já existe
        if ($count > 0) { // Se existir surge um alert e retorna à página inicial
            echo "<script>alert('Este e-mail já foi utilizado!')</script>";
            echo "<script>window.location.href = 'login.html';</script>";

        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Verificar se o email possui um formato válido
            echo "<script>alert('O e-mail digitado é inválido!')</script>";
            echo "<script>window.location.href = 'login.html';</script>";

        } else { // Preparando a consulta SQL
            $sql = "INSERT INTO user (user_name, email, cpf, birth, phone, state_, city, password_) VALUES ('$name', '$email', '$cpf', '$birth', '$phone', '$state', '$city', '$password')";
            $resultInsertUser = mysqli_query($connection, $sql);
            
            // Execução da consulta
            if ($resultInsertUser) { // Cadastro efetuado com sucesso
                $consultaUsers = "SELECT user_id FROM user WHERE email = '$email' AND user_name = '$name'";
                $result = mysqli_query($connection, $consultaUsers);
                $row = $result->fetch_assoc();
                $_SESSION['user_id'] = $row["user_id"];
            
                // $consultaTrilhas = "SELECT id FROM trilhas";
                // $resultTrilhas = mysqli_query($conexao, $consultaTrilhas);
                // while ($row = $resultTrilhas->fetch_assoc()) {
                //     $idTrilha = $row["id"];
                //     $insertUsuarioTrilha = "INSERT INTO usuariotrilha (user_id, trilha_id) VALUES ('$idUser', '$idTrilha')";
                //     mysqli_query($conexao, $insertUsuarioTrilha);
                // }

                // Iniciando sessão caso ainda não tenha sido iniciada
                if (!isset($_SESSION)) {
                    session_start();
                }

                echo "<script>alert('Cadastro realizado com sucesso!')</script>";
                echo "<script>window.location.href = 'homePage.php?user_id=" . $_SESSION['user_id'] . "</script>";

            } else { // Cadastro não efetuado
                echo "Erro ao cadastrar no banco de dados " . mysqli_error($connection);
            }
        }

    // Acesso pelo método POST
    } else if (isset($_POST['submit']) && (empty($_POST['user_name']) || empty($_POST['email']) || empty($_POST['password_']))) { // Campos vazios
        echo "<script>alert('Preecha todos os campos.')</script>";
        echo "<script>window.location.href = 'register.html';</script>";

    } else { // Tentativa de acesso via URL
        header('Location: login.html');
      }

    // Fim da conexão
    mysqli_close($connection);

?>
