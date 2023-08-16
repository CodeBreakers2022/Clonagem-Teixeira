<?php

    // Verificação de Login
    if (isset($_POST['submit']) && !empty($_POST['city_origin']) && !empty($_POST['city_destiny'])) { // Acessa através do método POST
        // Incluindo o arquivo connect.php
        include_once('connect.php');
        $city_origin = $_POST['city_origin'];
        $city_destiny = $_POST['city_destiny'];

        $sql = "SELECT * FROM travel WHERE origin = '$city_origin'";
        $result = mysqli_query($connection, $sql);
        
        if (mysqli_num_rows($result) > 0) { 
            
            $data_found = true;
        } else {
            // Email não cadastrado
            $data_found = false;
            // echo "<script>alert('E-mail não cadastrado!')</script>";
            // echo "<script>window.location.href = 'buscarPassagem.php';</script>";
        }

        mysqli_close($connection); // Fechando a conexão
    } else {
        // Campos vazios
        echo "<script>alert('Preencha seus dados!')</script>";
        // echo "<script>window.location.href = 'login.html';</script>";
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="assets/styles/global.css">
        <link rel="stylesheet" type="text/css" href="assets/styles/register.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
        </style>
        <!-- icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    </head>
    <body>
        <!-- Seu navbar aqui -->
        <nav>
            <div class="navbar-big">
                <a href="homePage.php"><img src="assets/images/teixeira_logo.png" width="auto" height="50px"/></a>
                <div>
                    <ul class="navbar-list">
                        <li class="ajuda-horarios" id="ajuda-horarios">Ajuda e horários 
                            <span class="material-symbols-outlined">
                                arrow_drop_down
                            </span>
                            <div class="menu-suspenso-op" id="menu-suspenso-ajuda">
                                <div style="width: 200px; margin-right: 1rem;">
                                    <span style="font-weight: 500; font-size: 20px;color: black;">Ajuda</span>
                                    <p>Consulte as perguntas
                                        frequentes e os horários
                                        das nossas agências.
                                    </p>
                                </div>
                                <a href="#" style="text-decoration: none; color: black;"><div style="display: flex;justify-content: center; align-items: center; font-size: 15px; color: black;">
                                    Horários de guiches 
                                    <span class="material-symbols-outlined" style="margin-left: 5px;">
                                        schedule
                                    </span>
                                </div></a>
                            </div>
                        </li>
                        <a href="#" style="text-decoration: none; color: black; margin-left: 20px; margin-right: 20px;"><li>Nossos destinos</li></a>
                        <li class="login" id="login">Entrar na sua conta
                            <span class="material-symbols-outlined">
                                arrow_drop_down
                            </span>
                            <div class="menu-suspenso-op" id="menu-suspenso-login" style="right: 1rem;">
                                <div class="menu-suspenso-op-colum1">
                                    <span>Olá, faça o seu login</span>
                                    <p>Com o seu login você tem
                                        acesso aos seus últimos
                                        pedidos, facilidades ao
                                        comprar e conteúdo exclusivo.
                                    </p>
                                    <button onclick="window.location.href='login.html'">
                                        Entrar na sua conta
                                        <span class="material-symbols-outlined">
                                            login
                                        </span>
                                    </button>
                                    <p>Cliente novo? 
                                        <a href="register.html" style="text-decoration: none; color: black; font-weight: 500;">Cadastre-se aqui</a>
                                    </p>
                                </div>
                                <div class="menu-suspenso-op-colum2">
                                    <a>
                                        Buscar pedido
                                        <span class="material-symbols-outlined">
                                            confirmation_number
                                            
                                        </span>
                                    </a>
                                    <hr>
                                    <a>
                                        Minha conta 
                                        <span class="material-symbols-outlined">
                                            person
                                        </span>
                                    </a>
                                    <a>
                                        Meus pedidos
                                        <span class="material-symbols-outlined">
                                            local_activity
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="navbar-small">

                <div class="menu-icon" id="menu-icon">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>

                <a href="homePage.html"><img src="assets/images/teixeira_logo.png" width="auto" height="30px"/></a>

                <a href="#"><span class="material-symbols-outlined" style="font-weight: bold; font-size: 35px;margin-right: 20px; color: black;">account_circle</span></a>

                <div class="navbar-small-container" id="navbar-small-container">
                    <div class="navbar-small-container-list">
                        <!-- <a href="#">Buscar pedido</a>
                        <hr> -->
                        <a href="#">Nossos destinos</a>
                        <hr>
                        <a href="#">Horários de guichês</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Conteúdo -->
        <form action="" method="post" class="form">
            <!-- Seus campos de formulário aqui -->
            <select name="city_origin" required>
                <option disabled selected>Saindo de</option>
                <option>DIVINOPOLIS - MG</option>
                <option>SÃO JOSÉ DO SALGADO -MG</option>
                <option>ITAUNA - MG</option>
            </select>
            <select name="city_destiny" required>
                <option disabled selected>Chegando em</option>
                <option>DIVINOPOLIS - MG</option>
                <option>SÃO JOSÉ DO SALGADO -MG</option>
                <option>ITAUNA - MG</option>
            </select>
            <input type="date" name="date_initial" placeholder="Data de ida"/>
            <input type="date" name="date_and" placeholder="Data de retorno"/>
            <input type="text" name="coupon" placeholder="cupom"/>
            <input class="button_form" name="submit" type="submit" value="Submit"/>
        </form>

        <div>
            <?php
                while ($row = $result->fetch_assoc()) {
                    $travel_id = $row['travel_id'];
                    $origin = $row['origin'];
                    $destiny = $row['destiny'];
                    echo '
                        <a href="reservarPassagem.php?travel_id='.$travel_id.'"><p> Origem = ' . $origin . '<br>
                        Destino = ' . $destiny . '</p></a>
                    ';
                }
            ?>
        </div>


        
        <footer class="footer" id="footer">
            <div class="footer-links-sociais">
                <img src="assets/images/teixeira_logo_branco.png" width="250px" height="auto" style="margin-bottom: 10px;">
                <label>
                    <img src="assets/images/facebook-icon.png" width="auto" height="30px" style="margin-right: 5px;"/>
                    Facebook
                </label>
                <label>
                    <img src="assets/images/instagram-icon.png" width="auto" height="30px" style="margin-right: 5px;"/>
                    Instagram
                </label>
            </div>

            <div class="footer-meios-de-pagamento">
                <span style="margin-bottom: 10px;font-weight: bold">MEIOS DE PAGAMENTO</span>
                <div style="display: flex; flex-direction: row;flex-wrap: wrap;">
                    <img src="assets/images/visa-icon.png" width="30px" height="auto" />
                    <img src="assets/images/american-express-icon.png" width="30px" height="auto" />
                    <img src="assets/images/mastercard-icon.png" width="30px" height="auto" />
                </div>
            </div>
            <div class="footer-phone-email">
                <span style="margin-bottom: 10px;font-weight: bold">COMPRE PELO TELEFONE</span>
                <label>
                    <img src="assets/images/phone-icon.png" width="20px" height="auto"/> 
                    (37) 3214-4070
                </label>
                <label>
                    <img src="assets/images/email-icon.png" width="20px" height="auto" style="margin-right: 5px;"/>
                    falecom@teixeiraturismo.com.br
                </label>
            </div>
            <div class="footer-atendimento">
                <span style="font-weight: bold">SAC (ATENDIMENTO AO CONSUMIDOR)</span><br>
                <div class="phone-atendimento">
                    (37) 3214-4070
                </div>
                <label>
                    <img src="assets/images/phone-icon.png" width="20px" height="auto" style="margin-right: 5px;"/>
                    0800 703 5203
                </label>
                para deficientes de fala e auditivos.
            </div>
        </footer>
        <script type="text/javascript" src="scripts/global.js"></script>
    </body>
</html>
