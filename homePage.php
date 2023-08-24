<?php
include_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit']) && !empty($_POST['city_origin']) && !empty($_POST['city_destiny'])) { // Acessa através do método POST
        $city_origin = $_POST['city_origin'];
        $city_destiny = $_POST['city_destiny'];

        $date_initial = isset($_POST['date_initial']) ? $_POST['date_initial'] : null;
        $date_and = isset($_POST['date_and']) ? $_POST['date_and'] : null;
        $coupon = isset($_POST['coupon']) ? $_POST['coupon'] : null;
        if ($date_and !== null && $date_initial === null) {
            echo 'alert("Para preencher a dara final você precisa preencher a data de ida")';
        } else {
            echo "<script>window.location.href = 'buscaPassagem1.php?city_origin=$city_origin&city_destiny=$city_destiny&date_initial=$date_initial&date_and=$date_and&coupon=$coupon';</script>";
        }

        mysqli_close($connection); // Fechando a conexão

    }
}
?>

<html>
<header>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/styles/global.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/styles/register.css"> -->
    <link rel="stylesheet" href="styles.fedbbe35ba989d852a08.css" media="all" onload="this.media='all'"><noscript>
        <link rel="stylesheet" href="styles.fedbbe35ba989d852a08.css">
    </noscript>
    <meta name="description"
        content="Compre passagens de ônibus da Teixeira. Garanta sua passagem online, com antecedência, segurança e conforto. Acesse o site e garanta já a sua!">
    <meta name="theme-color" content="#04642f">
    <link rel="canonical" href="/">
    <link type="image/x-icon" rel="shortcut icon" href="assets/images/homePage/Icons/teixeira.ico">
    <link type="image/x-icon" rel="icon" href="assets/images/homePage/Icons/teixeira.ico">
    <link type="text/css" rel="stylesheet" href="assets/styles/homePageStyles/styleHomePage.css">
    <!-- <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
    </style> -->
    <!-- icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--tecket 2-->
</header>

<body>
    <!-- navbar -->
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
                                <a href="login.html">
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

    <!-- conteudo -->
    <!-- <form action="" class="form-container" method="post" class="form"> -->
    <!-- Seus campos de formulário aqui -->
    <!-- <select name="city_origin" required>
            <option disabled selected value="">Saindo de</option>
            <option>DIVINOPOLIS - MG</option>
            <option>SÃO JOSÉ DO SALGADO -MG</option>
            <option>ITAUNA - MG</option>
        </select>
        <select name="city_destiny" required>
            <option disabled selected value="">Chegando em</option>
            <option>DIVINOPOLIS - MG</option>
            <option>SÃO JOSÉ DO SALGADO -MG</option>
            <option>ITAUNA - MG</option>
        </select>
        <input type="date" name="date_initial" placeholder="Data de ida" />
        <input type="date" name="date_and" placeholder="Data de retorno" />
        <input type="text" name="coupon" placeholder="cupom" />
        <input class="button_form" name="submit" type="submit" value="Submit" />
    </form> -->

    <body ng-version="12.1.0">
        <div class="body-loading">
            <i class="fad fa-circle-notch fa-spin"></i>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div>
                    <router-outlet>

                    </router-outlet>
                    <app-teixeira-home class="ng-star-inserted">
                        <div class="home-main-banner-container">
                            <app-carousel>
                                <!---->
                                <a loading="lazy" target="_blank" href="#" class="ng-star-inserted">
                                    <img class="main-banner-image" src="assets/images/homePage/main-banner.jpg"
                                        alt="Em Minas Gerais Viaje Com Conforto E Segurança">
                                </a>
                                <!---->
                            </app-carousel>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-search-container">
                                        <app-search-horizontal style="background-color: rgb(234, 234, 234);">
                                            <div class="form-container">
                                                <form action="" class="form-container" method="post" class="form">
                                                    <div class="row-search-title">
                                                        <h1 class="search-title">Compre aqui</h1>
                                                    </div>
                                                    <div class="search-fields">
                                                        <div class="search-field">
                                                            <label class="lbl">Origem</label>
                                                            <div class="no-icon-input">
                                                                <select name="city_origin" required
                                                                    class="input-location ng-untouched ng-pristine ng-invalid ng-star-inserted">
                                                                    <option disabled selected value=""> Saindo de
                                                                    </option>
                                                                    <option>DIVINOPOLIS - MG</option>
                                                                    <option>SÃO JOSÉ DO SALGADO - MG</option>
                                                                    <option>ITAUNA - MG</option>
                                                                </select>
                                                                <!----><!----><!---->
                                                            </div>
                                                            <button class="btn-change-direction ng-star-inserted"
                                                                style="background-color: rgb(237, 28, 36);">
                                                                <i class="fas fa-exchange-alt"></i>
                                                            </button>
                                                            <!---->
                                                        </div>
                                                        <div class="search-field search-field-destination">
                                                            <label class="lbl">Destino</label>
                                                            <div class="no-icon-input">
                                                                <select name="city_destiny" required
                                                                    class="input-location ng-untouched ng-pristine ng-invalid ng-star-inserted">
                                                                    <option disabled selected value=""> Chegando em
                                                                    </option>
                                                                    <option>DIVINOPOLIS - MG</option>
                                                                    <option>SÃO JOSÉ DO SALGADO - MG</option>
                                                                    <option>ITAUNA - MG</option>
                                                                </select>
                                                                <!----><!----><!---->
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 search-field-departure-date">
                                                                <div class="search-field date-field ng-star-inserted">
                                                                    <label class="lbl">Data</label>
                                                                    <div
                                                                        class="no-icon-input input-date-search departure">
                                                                        <input type="date" name="date_initial"
                                                                            class="ng-star-inserted">
                                                                        <style>
                                                                            input[type="date"]::-webkit-calendar-picker-indicator {
                                                                                display: none;
                                                                            }
                                                                        </style>
                                                                        <!---->
                                                                        <app-custom-datepicker
                                                                            class="departure ng-star-inserted">
                                                                            <!----><!----><!---->
                                                                        </app-custom-datepicker>
                                                                        <!----><!---->
                                                                    </div>
                                                                </div>
                                                                <!---->
                                                            </div>
                                                            <div class="col-md-6 search-field-return-date">
                                                                <div class="search-field date-field ng-star-inserted">
                                                                    <label class="lbl">Data retorno</label>
                                                                    <div
                                                                        class="no-icon-input input-date-search arrival">
                                                                        <input type="date"
                                                                            class="no-border-left ng-star-inserted">
                                                                        <!---->
                                                                        <app-custom-datepicker subtitle="volta"
                                                                            class="arrival ng-star-inserted">
                                                                            <!----><!----><!---->
                                                                        </app-custom-datepicker>
                                                                        <!----><!---->
                                                                    </div>
                                                                </div>
                                                                <!---->
                                                            </div>
                                                        </div>
                                                        <div class="search-field discount-field ng-star-inserted">
                                                            <label class="lbl">Cupom</label>
                                                            <div class="no-icon-input">
                                                                <input formcontrolname="discount" type="text"
                                                                    placeholder="01"
                                                                    class="ng-untouched ng-pristine ng-valid">
                                                            </div>
                                                        </div>
                                                        <!----><!----><!---->
                                                        <button
                                                            class="btn-primary search-button button-home button_form"
                                                            name="submit" type="submit"
                                                            style="background-color: rgb(237, 28, 36);">
                                                            <span>Buscar Passagens</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </app-search-horizontal>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <app-features>
                            <div class="company-features-wrapper ng-star-inserted">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="company-features">
                                                <!---->
                                                <app-feature class="ng-star-inserted">
                                                    <div class="feature ng-star-inserted">
                                                        <img class="image"
                                                            src="assets/images/homePage/Icons/embarque-digital-icon.png"
                                                            alt="Embarque Digital">
                                                        <div style="color: rgb(79, 79, 79);">Embarque Digital</div>
                                                    </div>
                                                    <!---->
                                                </app-feature>
                                                <app-feature class="ng-star-inserted">
                                                    <div class="feature ng-star-inserted">
                                                        <img class="image"
                                                            src="assets/images/homePage/Icons/descontos-icon.png"
                                                            alt="Descontos">
                                                        <div style="color: rgb(79, 79, 79);">Descontos</div>
                                                    </div>
                                                    <!---->
                                                </app-feature>
                                                <app-feature class="ng-star-inserted">
                                                    <div class="feature ng-star-inserted">
                                                        <img class="image"
                                                            src="assets/images/homePage/Icons/100seguro-icon.png"
                                                            alt="100% Seguro">
                                                        <div style="color: rgb(79, 79, 79);">100% Seguro</div>
                                                    </div>
                                                    <!---->
                                                </app-feature>
                                                <app-feature class="ng-star-inserted">
                                                    <div class="feature ng-star-inserted">
                                                        <img class="image"
                                                            src="assets/images/homePage/Icons/sanitizados-icon.png"
                                                            alt="Ônibus Sanitizados">
                                                        <div style="color: rgb(79, 79, 79);">Ônibus Sanitizados</div>
                                                    </div>
                                                    <!---->
                                                </app-feature>
                                                <app-feature class="ng-star-inserted">
                                                    <div class="feature ng-star-inserted">
                                                        <img class="image"
                                                            src="assets/images/homePage/Icons/remarcacao-icon.png"
                                                            alt="Remarcação Fácil">
                                                        <div style="color: rgb(79, 79, 79);">Remarcação Fácil</div>
                                                    </div>
                                                    <!---->
                                                </app-feature>
                                                <!----><!---->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
                        </app-features>
                        <div class="home-company-offers">
                            <h2>Passagens de ônibus mais baratas</h2>
                            <app-owl-carousel>
                                <div class="container ng-star-inserted">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!---->
                                            <div class="owl-carousel-filters tags ng-star-inserted">
                                                <div class="owl-carousel-filter active ng-star-inserted"> Ofertas
                                                    especiais
                                                </div>
                                                <!---->
                                            </div>
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                                <!---->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <owl-carousel-o _nghost-serverapp-c54="" class="ng-star-inserted">
                                                <div _ngcontent-serverapp-c54=""
                                                    class="owl-carousel owl-theme owl-loaded owl-drag">
                                                    <div _ngcontent-serverapp-c54=""
                                                        class="owl-stage-outer ng-star-inserted">
                                                        <owl-stage _ngcontent-serverapp-c54=""
                                                            class="ng-tns-c55-0 ng-star-inserted">
                                                            <div class="ng-tns-c55-0">
                                                                <div class="owl-stage ng-tns-c55-0"
                                                                    style="width: 1101px; transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                                                                    <div class="owl-item ng-tns-c55-0 ng-trigger ng-trigger-autoHeight active ng-star-inserted"
                                                                        style="width: 346.667px; margin-right: 20px;">
                                                                        <a class="ng-star-inserted"> <!--style--->
                                                                            <!---->
                                                                            <img class="img-slide ng-star-inserted"
                                                                                style="max-width: 350px;"
                                                                                src="assets/images/homePage/divinopolis-bh.png"
                                                                                alt="DIVINOPOLIS VS BH1"
                                                                                title="DIVINOPOLIS VS BH1">
                                                                            <!---->
                                                                        </a>
                                                                        <!----><!---->
                                                                    </div>
                                                                    <!---->
                                                                    <div class="owl-item ng-tns-c55-0 ng-trigger ng-trigger-autoHeight active ng-star-inserted"
                                                                        style="width: 346.667px; margin-right: 20px;">
                                                                        <a class="ng-star-inserted"> <!--style--->
                                                                            <!---->
                                                                            <img class="img-slide ng-star-inserted"
                                                                                style="max-width: 350px;"
                                                                                src="assets/images/homePage/bh-betim.png"
                                                                                alt="BELO HORIZONTE VS BETIN"
                                                                                title="BELO HORIZONTE VS BETIN">
                                                                            <!---->
                                                                        </a>
                                                                        <!----><!---->
                                                                    </div>
                                                                    <!---->
                                                                    <div class="owl-item ng-tns-c55-0 ng-trigger ng-trigger-autoHeight active ng-star-inserted"
                                                                        style="width: 346.667px; margin-right: 20px;">
                                                                        <a class="ng-star-inserted"> <!--style--->
                                                                            <!---->
                                                                            <img class="img-slide ng-star-inserted"
                                                                                style="max-width: 350px;"
                                                                                src="assets/images/homePage/itauna-div.png"
                                                                                alt="ITUANA VS DIV"
                                                                                title="ITUANA VS DIV">
                                                                            <!---->
                                                                        </a>
                                                                        <!----><!---->
                                                                    </div>
                                                                    <!----><!---->
                                                                </div>
                                                            </div>
                                                        </owl-stage>
                                                    </div>
                                                    <!---->
                                                    <div _ngcontent-serverapp-c54=""
                                                        class="owl-nav disabled ng-star-inserted">
                                                        <div _ngcontent-serverapp-c54="" class="owl-prev">prev</div>
                                                        <div _ngcontent-serverapp-c54="" class="owl-next">next</div>
                                                    </div>
                                                    <div _ngcontent-serverapp-c54=""
                                                        class="owl-dots disabled ng-star-inserted">
                                                        <div _ngcontent-serverapp-c54=""
                                                            class="owl-dot active ng-star-inserted">
                                                            <span _ngcontent-serverapp-c54=""></span>
                                                        </div>
                                                        <!---->
                                                    </div>
                                                    <!----><!---->
                                                </div>
                                            </owl-carousel-o>
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                            </app-owl-carousel>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="latest-searches">
                                        <div class="row ng-star-inserted">
                                            <div class="col-md-12">
                                                <h3 class="latest-searches-title">Suas últimas pesquisas</h3>
                                                <div class="search-list">
                                                    <div class="search ng-star-inserted">
                                                        <span class="search-text-block"
                                                            title="Divinopolis - MG">Divinopolis
                                                            - MG</span>
                                                        <i class="far fa-chevron-right icon-arrow"></i>
                                                        <span class="search-text-block" title="Itauna - MG">Itauna -
                                                            MG</span>
                                                        <i class="fas fa-times-circle icon-remove"></i>
                                                    </div>
                                                    <!---->
                                                </div>
                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            <app-site-tripbanner>
                                <div class="row ng-star-inserted">
                                    <div class="col">
                                        <div class="main-routes">
                                            <h1 class="main-routes-title"> Passagens de ônibus mais buscadas
                                                <a class="main-routes-title-link" href="/onibus">Ver todas</a>
                                            </h1>
                                            <div class="row">
                                                <div class="col-md-4 promotional-banner ng-star-inserted">
                                                    <a class="route ng-star-inserted">
                                                        <div class="route-info">
                                                            <span class="label">De BETIM para</span>
                                                            <b class="value">Belo Horizonte</b>
                                                        </div>
                                                        <img class="route-image"
                                                            src="assets/images/homePage/rota-divinopolis.png">
                                                        <h4 class="route-title-destination"> A PARTIR DE<span
                                                                class="price">R$&nbsp;14,20</span></h4>
                                                    </a>
                                                    <!---->
                                                </div>
                                                <div class="col-md-4 promotional-banner ng-star-inserted">
                                                    <a class="route ng-star-inserted">
                                                        <div class="route-info">
                                                            <span class="label">De BELO HORIZONTE para</span>
                                                            <b class="value">Divinopolis</b>
                                                        </div>
                                                        <img class="route-image"
                                                            src="assets/images/homePage/rota-divinopolis.png">
                                                        <h4 class="route-title-destination"> A PARTIR DE<span
                                                                class="price">R$&nbsp;34,90</span></h4>
                                                    </a>
                                                    <!---->
                                                </div>
                                                <div class="col-md-4 promotional-banner ng-star-inserted">
                                                    <a class="route ng-star-inserted">
                                                        <div class="route-info">
                                                            <span class="label">De BETIM para</span>
                                                            <b class="value">Vista Alegre</b>
                                                        </div>
                                                        <img class="route-image"
                                                            src="assets/images/homePage/rota-vista-alegre.png">
                                                        <h4 class="route-title-destination"> A PARTIR DE <span
                                                                class="price">R$&nbsp;31,05</span></h4>
                                                    </a>
                                                    <!---->
                                                </div>
                                                <div class="col-md-4 promotional-banner ng-star-inserted">
                                                    <a class="route ng-star-inserted">
                                                        <div class="route-info">
                                                            <span class="label">De VISTA ALEGRE para</span>
                                                            <b class="value">Itauna</b>
                                                        </div>
                                                        <img class="route-image"
                                                            src="assets/images/homePage/rota-itauna.png">
                                                        <h4 class="route-title-destination"> A PARTIR DE<span
                                                                class="price">R$&nbsp;6,20</span></h4>
                                                    </a>
                                                    <!---->
                                                </div>
                                                <div class="col-md-4 promotional-banner ng-star-inserted">
                                                    <a class="route ng-star-inserted">
                                                        <div class="route-info">
                                                            <span class="label">De ITAUNA para</span>
                                                            <b class="value">Mateus Leme</b>
                                                        </div>
                                                        <img class="route-image"
                                                            src="assets/images/homePage/rota-itauna.png">
                                                        <h4 class="route-title-destination"> A PARTIR DE<span
                                                                class="price">R$&nbsp;10,00</span></h4>
                                                    </a>
                                                    <!---->
                                                </div>
                                                <div class="col-md-4 promotional-banner ng-star-inserted">
                                                    <a class="route ng-star-inserted">
                                                        <div class="route-info">
                                                            <span class="label">De MATEUS LEME para</span>
                                                            <b class="value">Betim</b>
                                                        </div>
                                                        <img class="route-image"
                                                            src="assets/images/homePage/rota-betim.png">
                                                        <h4 class="route-title-destination"> A PARTIR DE<span
                                                                class="price">R$&nbsp;14,80</span></h4>
                                                    </a>
                                                    <!---->
                                                </div>
                                                <!---->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!---->
                            </app-site-tripbanner>
                        </div>
                    </app-teixeira-home>
                    <!---->
                    <app-teixeira-footer>
                        <footer>
                            <div class="row">
                                <div class="col">
                                    <div class="main-footer-first-line">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="top footer-box">
                                                        <figure>
                                                            <img src="https://smartbus-preprod-cdn.azurewebsites.net/ecommerce/imgs/teixeira/teixeira-branco.png"
                                                                alt="Teixeira" class="main-footer-logo" tabindex="0">
                                                        </figure>
                                                        <div class="social"><a
                                                                href="https://www.facebook.com/teixeiraturismooficial/"
                                                                target="_blank" class="main-footer-social-icon">
                                                                <i class="fab fa-facebook"></i><span>Facebook</span>
                                                            </a>
                                                            <a href="https://www.instagram.com/teixeiraturismo/"
                                                                target="_blank" class="main-footer-social-icon">
                                                                <i class="fab fa-instagram"></i><span>Instagram</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="help footer-box">
                                                        <h4 class="footer-title">Ajuda</h4>
                                                        <ul>
                                                            <li class="footer-menu-item" tabindex="0">Horários dos
                                                                guichês
                                                            </li>
                                                            <li class="footer-menu-item" tabindex="0">Sobre Nós</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="payments footer-box">
                                                        <h4 class="footer-title">Meios de pagamento</h4>
                                                        <div class="payment-images">
                                                            <img src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/visa.png"
                                                                alt="Visa" title="Visa" class="payment-img">
                                                            <img src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/mastercard.png"
                                                                alt="Master Card" title="Master Card"
                                                                class="payment-img">
                                                            <img src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/amex.png"
                                                                alt="Amex" title="Amex" class="payment-img">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="buy-by-phone footer-box">
                                                        <h4 class="footer-title">COMPRE PELO TELEFONE</h4>
                                                        <ul>
                                                            <li class="footer-menu-item">
                                                                <a href="tel:3732144070">
                                                                    <i class="fad fa-phone phone-icon"></i>
                                                                    (37) 3214-4070
                                                                </a>
                                                            </li>
                                                            <li class="footer-menu-item footer-menu-item-email">
                                                                <a href="mailto:falecom@teixeiraturismo.com.br"
                                                                    class="fs-13">
                                                                    <i class="fad fa-envelope envelope-icon"></i>
                                                                    &nbsp;&nbsp;falecom@teixeiraturismo.com.br</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="info-content">
                                                        <h4 class="footer-title">SAC <small>(atendimento ao
                                                                consumidor)</small></h4>
                                                        <a href="tel:3732144070" class="a-sac"> (37) 3214-4070 </a>
                                                        <br><br>
                                                    </div>
                                                    <div class="info-content">
                                                        <span class="sac-number">
                                                            <a href="tel:0800 703 5203" class="a-number">
                                                                <i class="fad fa-phone phone-icon"></i> 0800 703
                                                                5203</a>
                                                            <br>para deficientes de fala e auditivos.
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-footer-second-line">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-4"> © 2023 Grupo Teixeira <br>
                                                    <a href="https://smarttravelit.com.br/" target="_blank"
                                                        class="smart-travel-footer">powered by Smart Travel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </app-teixeira-footer>
                </div>
            </div>
        </div>
        <whatsapp-link>
            <!---->
        </whatsapp-link>
        <!---->
        <script type="text/javascript" src="scripts/scriptBusca.js"></script>
        <script type="text/javascript" src="scripts/global.js"></script>
    </body>

</html>