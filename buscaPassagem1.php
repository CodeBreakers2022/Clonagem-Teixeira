<?php

    include_once 'connect.php';

    //inicializa as variáveis 
    $city_origin = '';
    $city_destiny = '';
    $date_initial = '';
    $date_and = '';

    //get
    if (isset($_GET['city_origin']) && isset($_GET['city_destiny'])) {
        $city_origin = $_GET['city_origin'];
        $city_destiny = $_GET['city_destiny'];
        $date_initial = $_GET['date_initial'];
        $date_and = $_GET['date_and'];
        $coupon = $_GET['coupon'];
    
        // Construir a parte básica da consulta
        $sql_base = "SELECT * FROM travel WHERE origin = '$city_origin' AND destiny = '$city_destiny'";
    
        // Adicionar condição para date_initial, se não for vazio
        if ($date_initial !== '') {
            $sql_base .= " AND departure_date = '$date_initial'";
        }
    
        // Adicionar condição para date_and, se não for vazio
        if ($date_and !== '') {
            $sql_base .= " AND arrival_date = '$date_and'";
        }
    
        
        $result = mysqli_query($connection, $sql_base);
    
    }else {
        echo "Erro de carregamento";
    }

    $alertMessage = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) { // Verifica se o formulário foi submetido via POST
        if (!empty($_POST['city_origin_search']) && !empty($_POST['city_destiny_search'])) {
            // Dados do formulário foram preenchidos corretamente
            
            $city_origin = $_POST['city_origin_search'];
            $city_destiny = $_POST['city_destiny_search'];
            $date_initial = $_POST['date_initial_search'];
            $date_and = $_POST['date_and_search'];
            $coupon = $_POST['coupon_search'];

            $sql_base = "SELECT * FROM travel WHERE origin = '$city_origin' AND destiny = '$city_destiny'";
    
            // Adicionar condição para date_initial, se não for vazio
            if ($date_initial !== '') {
                $sql_base .= " AND departure_date = '$date_initial'";
            }
        
            // Adicionar condição para date_and, se não for vazio
            if ($date_and !== '') {
                $sql_base .= " AND arrival_date = '$date_and'";
            }

            $result = mysqli_query($connection, $sql_base);
            
        }
    }

    function calculateDate($daysToAddOrSubtract) {
        $date = new DateTime(); // Data atual
        
        // Adiciona ou subtrai a quantidade de dias desejada
        $date->modify($daysToAddOrSubtract . ' days');
        
        // Define a configuração regional para pt-BR
        setlocale(LC_TIME, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
        
        // Formata a data no formato desejado (dia da semana, dia do mês e mês)
        $formattedDate = ucfirst(strftime('%A, %e de %B', $date->getTimestamp()));
        
        return $formattedDate;
    }
    

?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teixeira</title>
        <link rel="stylesheet" href="assets/styles/busca.css">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="assets/styles/global.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body style="margin-top: 4em;">
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

        <!-- conteúdo -->
        <form action="" method="post" class="form">
            <label>Origem:</label>
            <select name="city_origin_search" required>
                <option <?php if (($city_origin !== null) && ($city_origin === 'DIVINOPOLIS - MG')) echo 'selected'; ?>>DIVINOPOLIS - MG</option>
                <option <?php if (($city_origin !== null) && ($city_origin === 'SÃO JOSÉ DO SALGADO - MG')) echo 'selected'; ?>>SÃO JOSÉ DO SALGADO - MG</option>
                <option <?php if (($city_origin !== null) && ($city_origin === 'ITAUNA - MG')) echo 'selected'; ?>>ITAUNA - MG</option>
            </select>

            <label>Destino: </label>
            <select name="city_destiny_search" required>
                <option <?php if (($city_destiny !== null) && ($city_destiny === 'DIVINOPOLIS - MG')) echo 'selected'; ?>>DIVINOPOLIS - MG</option>
                <option <?php if (($city_destiny !== null) && ($city_destiny === 'SÃO JOSÉ DO SALGADO - MG')) echo 'selected'; ?>>SÃO JOSÉ DO SALGADO - MG</option>
                <option <?php if (($city_destiny !== null) && ($city_destiny === 'ITAUNA - MG')) echo 'selected'; ?>>ITAUNA - MG</option>
            </select>
            <input type="date" name="date_initial_search" placeholder="Data de ida" value="<?php if (($date_initial !== null) && (!empty($date_initial))) echo $date_initial; ?>"/>
            <input type="date" name="date_and_search" placeholder="Data de retorno" value="<?php if (($date_and !== null) && (!empty($date_and))) echo $date_and; ?>"/>
            <input type="text" name="coupon_search" placeholder="cupom" value="<?php if (($coupon !== null) && (!empty($coupon))) echo $date_and; ?>"/>

            
            <input class="button_form" name="submit" type="submit" value="Alterar busca"/>
        </form>

        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="step-title">
                            <h1 class="title">Passagens de ônibus de <?php echo "$city_origin"?> para <?php echo "$city_destiny"?>&nbsp;&nbsp;<span class="ida">ida</span></h1>
                            <div class="steps">passo <b>1</b> de <b>2</b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <section>
                <div class="row">
                    <div class="col">
                        <div class="list">
                            <div class="other-day"><span class="date"><?php echo calculateDate(-2);?></span>indisponível</div>
                            <div class="other-day"><span class="date"><?php echo calculateDate(-1);?></span>indisponível</div>
                            <div class="other-day-today"><span class="date"><?php echo calculateDate(0);?></span><span class="price2">R$&nbsp;7,90</span></div>
                            <div class="other-day"><span class="date"><?php echo calculateDate(+1);?></span><span class="price2">R$&nbsp;7,90</span></div>
                            <div class="other-day-u"><span class="date"><?php echo calculateDate(+2);?></span><span class="price2">R$&nbsp;7,90</span></div>
                        </div>
                    </div>
                </section>
                <div class="actions">
                    <div class="length"><b>30</b> viagens encontradas</div>
                        <div class="filters">&nbsp;&nbsp;filtrar viagens por 
                            <span title="Filtrar por classe" class="filter-type">classe</span>
                            <span title="Filtrar por horário" class="filter-type">horário</span>
                        </div>
                    </div>
                </div>
        </div>

        <div class="tripcol">
            <div class="titlelist">
                <div class="empresa">
                    Empresa
                </div>

                <div class="trechoclasse">
                    Trecho / Classe
                </div>

                <div class="duracao">
                    Horário / Duração
                </div>

                <div class="tarifa">
                    Tarifa
                </div>

            </div>
            <?php
                if ($result->num_rows > 0) {
                    // Loop para percorrer os resultados
                    while ($row = $result->fetch_assoc()) {
                        // Aqui você pode acessar cada coluna do resultado usando $row['nome_da_coluna']
                        //echo "ID: " . $row['travel_id']. "";
                        $separador = ','; //separa as casas decimais com vpirgula
                        $price_formatted = number_format($row['price'], 2, $separador); //formata o preço
                        echo "
                            <div class='triplist-father'>
                                <div class='triplist'>
                                    <div class='imgmargin'>
                                        <img class='Image' style='width: 100px; height: 38.95px' src='assets/images/Z.png'>
                                    </div>

                                    <div class='route'>
                                        <div class='loc'>
                                            <i class='fa fa-map-marker' aria-hidden='true'></i>
                                        </div>
                                        <div class='divita'>
                                            ".$row['origin']."<br>".$row['destiny']."
                                        </div>
                                    </div>

                                    <div class='conv-area'>
                                        <div class='conv'>
                                        ".$row['class']."
                                        </div>
                                    </div>

                                    <div class='triptime'>
                                        <div class='hourcontainer'>
                                            <div class='hours'>
                                                <span class='time'> ".$row['arrival_time']." </span>
                                            </div>
                                        </div>
                                        <div class='duration'>
                                            <div class='duration-container'>
                                            <div class='arrow-icon'>
                                                <i class='fa fa-long-arrow-right'aria-hidden='true'></i>
                                            </div>
                                                <div class='dur'>
                                                    <span class='h'>00h</span>
                                                    <span class='min'>55m</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='hourcontainer2'>
                                        <div class='clock'> <i class='fa fa-clock-o' aria-hidden='true'></i></div>
                                            <div class='hours'>
                                                <span class='time'> ".$row['exit_time']." </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='tripprice'>
                                        <div class='textprice'>
                                            a partir de</div>
                                        <div class='price'>
                                        R$ ".$price_formatted."</div>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                } else {
                        echo "Nenhum resultado encontrado.";
                }
            ?>


        </div>

        <footer class="footer">
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