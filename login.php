<?php
    // Verificação de Login
    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password_'])) { // Acessa através do método POST
        // Incluindo o arquivo connect.php
        include_once('connect.php');
        $email = $_POST['email'];
        $password = $_POST['password_'];

        // Consulta do email
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);
        
        if (mysqli_num_rows($result) > 0) { // Verifica se o email está cadastrado
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['password_'];
            $hash = $row['password_']; // Obtém a senha criptografada do banco de dados

            // Verifica se a senha digitada corresponde à senha criptografada
            if (password_verify($password, $hash)) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $user_id;
                
                echo "<script>alert('Direcionando, bem vindo de volta!')</script>";
                header("Location: homePage.php");
            } else {
                // Senha incorreta
                echo "<script>alert('E-mail ou senha incorretos!')</script>";
                echo "<script>window.location.href = 'login.html';</script>";
            }
        } else {
            // Email não cadastrado
            echo "<script>alert('E-mail não cadastrado!')</script>";
            echo "<script>window.location.href = 'cadastro.html';</script>";
        }

        mysqli_close($connection); // Fechando a conexão
    } else if (!isset($_POST['submit'])) { // Tentativa de acesso sem ser pelo método POST
        // Tentativa de acesso via URL, vai para a página de acesso negado
        header('Location: homePage.php');
    } else {
        // Campos vazios
        echo "<script>alert('Preencha seus dados!')</script>";
        echo "<script>window.location.href = 'login.html';</script>";
    }

?>