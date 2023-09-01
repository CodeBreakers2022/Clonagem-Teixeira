<?php

include_once 'connect.php';

session_start();

    // if(isset($_SESSION['user_id'])){
    //     $user_id = $_SESSION['user_id'];
    // }

//inicializa as variáveis 
$city_origin = '';
$city_destiny = '';
$date_initial = '';
$date_and = '';
$classe = '';
$horario = '';

if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
};

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

} else {
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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['date'])) {
            $selectedDate = $_POST['date'];
    
            // Consulta SQL para buscar registros com a data selecionada
            $sql_base = "SELECT * FROM travel WHERE origin = '$city_origin' AND destiny = '$city_destiny' AND departure_date = '$selectedDate'";
    
            $result = mysqli_query($connection, $sql_base);
    
            if (!$result) {
                echo "Erro na consulta: " . mysqli_error($connection);
                // ou use die("Erro na consulta: " . mysqli_error($connection));
            }
            // mysqli_close($connection);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['Filtrar'])) {
            $horario = isset($_POST['horario']) ? $_POST['horario'] : '';
            $classe = isset($_POST['classe']) ? $_POST['classe'] : '';
    
            // Consulta SQL para buscar registros com os filtros selecionados
            if ($classe !== '') {
                $sql_base .= " AND class = '$classe'";
            }
    
            if ($horario !== '') {
                $sql_base .= " AND horario = '$horario'";
            }
    
            $result = mysqli_query($connection, $sql_base);
        }
    }

function calculateDate($daysToAddOrSubtract)
{
    $date = new DateTime(); // Data atual

    // Adiciona ou subtrai a quantidade de dias desejada
    $date->modify($daysToAddOrSubtract . ' days');

    // Define a configuração regional para pt-BR
    setlocale(LC_TIME, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');

    // Formata a data no formato desejado (dia da semana, dia do mês e mês)
    $formattedDate = ucfirst(strftime('%A, %e de %B', $date->getTimestamp()));

    return $formattedDate;
}

    function calculateDateNumber($daysToAddOrSubtract) {
        $date = new DateTime(); // Data atual
        
        // Adiciona ou subtrai a quantidade de dias desejada
        $date->modify($daysToAddOrSubtract . ' days');
        
        // Obtém os componentes da data (ano, mês, dia)
        $year = $date->format('Y');
        $month = $date->format('m');
        $day = $date->format('d');
        
        // Retorna a data no formato (ano, mês, dia)
        return $year . '/' . $month . '/' . $day;
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

<header>
<div class="container2">
    
    <form class="bus-search-form" method="post">
        <div class="form-row">
            <div class="form-item">
                <label class="name" >Origem:</label>
                
                <select class="itms" name="city_origin_search" required>
                <option <?php if (($city_origin !== null) && ($city_origin === 'DIVINOPOLIS - MG'))
                    echo 'selected'; ?>>DIVINOPOLIS - MG</option>
                <option <?php if (($city_origin !== null) && ($city_origin === 'SÃO JOSÉ DO SALGADO - MG'))
                    echo 'selected'; ?>>SÃO JOSÉ DO SALGADO - MG</option>
                <option <?php if (($city_origin !== null) && ($city_origin === 'ITAUNA - MG'))
                    echo 'selected'; ?>>ITAUNA - MG</option>
                <option value="" disabled selected>Saindo de</option>
                </select>
            </div>
            <div class="form-item">
                <label class="name" >Destino:</label>
                <select class="itms" name="city_destiny_search" required>
                <option <?php if (($city_destiny !== null) && ($city_destiny === 'DIVINOPOLIS - MG'))
                    echo 'selected'; ?>>DIVINOPOLIS - MG</option>
                <option <?php if (($city_destiny !== null) && ($city_destiny === 'SÃO JOSÉ DO SALGADO - MG'))
                    echo 'selected'; ?>>SÃO JOSÉ DO SALGADO - MG</option>
                <option <?php if (($city_destiny !== null) && ($city_destiny === 'ITAUNA - MG'))
                    echo 'selected'; ?>>ITAUNA - MG</option>
                <option value="" disabled selected>Chegando em</option>
                 
                </select>
            </div>

            <div class="form-item">
            <label class="name" >Data de ida:</label>
                <input class="itms" type="date" name="date_initial_search" placeholder="Data de ida" value="<?php if (($date_initial !== null) && (!empty($date_initial)))
                echo $date_initial; ?>"/>
            </div>
            <div class="form-item">
            <label class="name" >Data de volta</label>
            <input class="itms" type="date" name="date_and_search" placeholder="Data de retorno" value="<?php if (($date_and !== null) && (!empty($date_and)))
                echo $date_and; ?>"/>
            </div>
            <div class="form-item">
            <label class="name" >Cupom de desconto:</label>
            <input class="itms" type="text" name="coupon_search" placeholder="Cupom de desconto" value="<?php if (($coupon !== null) && (!empty($coupon)))
                echo $date_and; ?>"/>
                
            </div>
            <div class="form-item">
             <input class="butt" name="submit" type="submit" value="Alterar busca"/>
            </div>
        </div>
    </form>
</div>
</header>

<body >
    <nav>
        <div class="navbar-big">
            <a href="homePage.php"><img src="assets/images/teixeira_logo.png" width="auto" height="50px" /></a>
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
                            <a href="#" style="text-decoration: none; color: black;">
                                <div
                                    style="display: flex;justify-content: center; align-items: center; font-size: 15px; color: black;">
                                    Horários de guiches
                                    <span class="material-symbols-outlined" style="margin-left: 5px;">
                                        schedule
                                    </span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <a href="#" style="text-decoration: none; color: black; margin-left: 20px; margin-right: 20px;">
                        <li>Nossos destinos</li>
                    </a>
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
                                    <a href="register.html"
                                        style="text-decoration: none; color: black; font-weight: 500;">Cadastre-se
                                        aqui</a>
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

            <a href="homePage.html"><img src="assets/images/teixeira_logo.png" width="auto" height="30px" /></a>

            <a href="#"><span class="material-symbols-outlined"
                    style="font-weight: bold; font-size: 35px;margin-right: 20px; color: black;">account_circle</span></a>

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
                        <form action="" method="post" class="list">
                            <!-- ... seus outros campos de entrada ... -->
                            <button class="other-day" type="submit" id="other-day-start" name="date" data-value="<?php echo calculateDateNumber(-2); ?>" data-sql="SELECT * FROM travel WHERE origin = '$city_origin' AND destiny = '$city_destiny'" value="<?php echo calculateDateNumber(-2); ?>">
                                <span class="date">
                                    <?php echo calculateDate(-2); ?>
                                </span>
                                indisponível
                            </button>
                            <button class="other-day" type="submit" name="date" data-value="<?php echo calculateDateNumber(-1); ?>" data-sql="SELECT * FROM travel WHERE origin = '$city_origin' AND destiny = '$city_destiny'" value="<?php echo calculateDateNumber(-1); ?>">
                                <span class="date">
                                    <?php echo calculateDate(-1); ?>
                                </span>
                                indisponível
                            </button>
                            <button class="other-day" type="submit" name="date" data-value="<?php echo calculateDateNumber(0); ?>" data-sql="SELECT * FROM travel WHERE origin = '$city_origin' AND destiny = '$city_destiny'" value="<?php echo calculateDateNumber(0); ?>">
                                <span class="date">
                                    <?php echo calculateDate(0); ?>
                                </span>
                                indisponível
                            </button>
                            <button class="other-day" type="submit" name="date" data-value="<?php echo calculateDateNumber(1); ?>" data-sql="SELECT * FROM travel WHERE origin = '$city_origin' AND destiny = '$city_destiny'" value="<?php echo calculateDateNumber(+1); ?>">
                                <span class="date">
                                    <?php echo calculateDate(+1); ?>
                                </span>
                                indisponível
                            </button>
                            <button class="other-day" id="other-day-and" type="submit" name="date" data-value="<?php echo calculateDateNumber(2); ?>" data-sql="SELECT * FROM travel WHERE origin = '$city_origin' AND destiny = '$city_destiny'" value="<?php echo calculateDateNumber(+2); ?>">
                                <span class="date">
                                    <?php echo calculateDate(+2); ?>
                                </span>
                                indisponível
                            </button>
                        </form>
                    </div>
                </div>
            </section>
            
            <div class="actions">
                <div class="length"><b> <?php echo $result->num_rows;?></b> viagens encontradas</div>
                    <!-- <div class="filters">&nbsp;&nbsp;filtrar viagens por 
                        <span title="Filtrar por classe" class="filter-type">classe</span>
                        <span title="Filtrar por horário" class="filter-type">horário</span>
                    </div> -->
                   
                    
                    <div class="filters">&nbsp;&nbsp;filtrar viagens por 
                        <form action="" method="post">
                            <select class="sel1" name="classe">
                                <option selected disabled>Classe</option>
                                <option>EXECUTIVO</option>
                                <option>CONVENCIONAL</option>
                                <option>ECONOMICA</option>
                            </select>
                            <select class="sel" name="horario">
                                <option selected disabled>Horário</option>
                                <option>MADRUGADA</option>
                                <option>MANHÃ</option>
                                <option>TARDE</option>
                                <option>NOITE</option>
                            </select>
                            <input type="submit" value="Filtrar" name="Filtrar">
                        </form>
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

                //formatação de horário
                $arrivalTime = new DateTime($row['arrival_time']);
                $formattedArrivalTime = $arrivalTime->format('H:i');

                $exitTime = new DateTime($row['exit_time']);
                $formattedExitTime = $exitTime->format('H:i');
                if (empty($_GET['user_id'])) {
                    echo "<div class='triplist'>
                    <a class='link' href='reservarPassagem.php?travel_id=" . $row['travel_id'] . "'>

                            <div class='imgmargin'>
                                <img class='Image' src='assets/images/Z.png'>
                            </div>

                            <div class='route'>
                                <div class='loc'>
                                    <i class='fa fa-map-marker' aria-hidden='true'></i>
                                </div>
                                <div class='divita'>
                                    " . $row['origin'] . "<br>" . $row['destiny'] . "
                                </div>
                            </div>

                            <div class='conv-area'>
                                <div class='conv'>
                                " . $row['class'] ."
                                </div>
                            </div>

                            <div class='triptime'>
                                <div class='hourcontainer'>
                                <div class='clock'> <i class='fa fa-clock-o' aria-hidden='true'></i></div>
                                    <div class='hours'>
                                        <span class='time'> " . $formattedArrivalTime . " </span>
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

                                    <div class='hours'>
                                        <span class='time'> " . $formattedExitTime . " </span>
                                    </div>
                                </div>
                            </div>

                            <div class='tripprice'>
                                <div class='textprice'>
                                    a partir de</div>
                                <div class='price'>
                                R$ " . $price_formatted . "</div>
                            </div>
                    </a>        
                </div>";
                } else {
                    echo "<div class='triplist'>
                    <a class='link' href='reservarPassagem.php?travel_id=" . $row['travel_id'] . "&user_id=" . $user_id . "'>

                            <div class='imgmargin'>
                                <img class='Image' src='assets/images/Z.png'>
                            </div>

                            <div class='route'>
                                <div class='loc'>
                                    <i class='fa fa-map-marker' aria-hidden='true'></i>
                                </div>
                                <div class='divita'>
                                    " . $row['origin'] . "<br>" . $row['destiny'] . "
                                </div>
                            </div>

                            <div class='conv-area'>
                                <div class='conv'>
                                " . $row['class'] ."
                                </div>
                            </div>

                            <div class='triptime'>
                                <div class='hourcontainer'>
                                <div class='clock'> <i class='fa fa-clock-o' aria-hidden='true'></i></div>
                                    <div class='hours'>
                                        <span class='time'> " . $formattedArrivalTime . " </span>
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

                                    <div class='hours'>
                                        <span class='time'> " . $formattedExitTime . " </span>
                                    </div>
                                </div>
                            </div>

                            <div class='tripprice'>
                                <div class='textprice'>
                                    a partir de</div>
                                <div class='price'>
                                R$ " . $price_formatted . "</div>
                            </div>
                    </a>        
                </div>";
                }

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
                <img src="assets/images/facebook-icon.png" width="auto" height="30px" style="margin-right: 5px;" />
                Facebook
            </label>
            <label>
                <img src="assets/images/instagram-icon.png" width="auto" height="30px" style="margin-right: 5px;" />
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
                <img src="assets/images/phone-icon.png" width="20px" height="auto" />
                (37) 3214-4070
            </label>
            <label>
                <img src="assets/images/email-icon.png" width="20px" height="auto" style="margin-right: 5px;" />
                falecom@teixeiraturismo.com.br
            </label>
        </div>
        <div class="footer-atendimento">
            <span style="font-weight: bold">SAC (ATENDIMENTO AO CONSUMIDOR)</span><br>
            <div class="phone-atendimento">
                (37) 3214-4070
            </div>
            <label>
                <img src="assets/images/phone-icon.png" width="20px" height="auto" style="margin-right: 5px;" />
                0800 703 5203
            </label>
            para deficientes de fala e auditivos.
        </div>
    </footer>
    <script type="text/javascript" src="scripts/global.js"></script>


</body>

</html>