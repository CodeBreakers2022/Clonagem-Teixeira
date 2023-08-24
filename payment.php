<?php

    //Iniciando seção caso ainda não tenha sido iniciada
    if (!isset($_SESSION)) {
        // Seção iniciada
        session_start();
    }
    
    // Incluindo o arquivo connect.php
    include_once('connect.php');

?>

<!DOCTYPE html>
<html>

<head>
    <script
        src="chrome-extension://fdjamakpfbbddfjaooikfcpapjohcfmg/content/pageScripts/dashlane-tiresias-page-script.js"
        id="dashlane_tiresias"></script>
    <script
        src="chrome-extension://fdjamakpfbbddfjaooikfcpapjohcfmg/content/pageScripts/dashlane-webauthn-page-script.js"
        id="dashlane_webauthn" name="forward_webauthn_ready"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="/assets/styles/payment.css">

    <title> Passagem de ônibus | Teixeira </title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
    </style>

    <link rel="stylesheet" href="styles.fedbbe35ba989d852a08.css" media="all" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="styles.fedbbe35ba989d852a08.css">
    </noscript>

    <style type="text/css" id="operaUserStyle"></style>
    <meta name="description"
        content="Compre passagens de ônibus da Teixeira. Garanta sua passagem online, com antecedência, segurança e conforto. Acesse o site e garanta já a sua!">
    <meta name="theme-color" content="#04642f">
    <link rel="canonical" href="/onibus/checkout">
    <link type="image/x-icon" rel="shortcut icon"
        href="https://smartbus-preprod-cdn.azurewebsites.net/_common/img/favicons/teixeira.ico">
    <link type="image/x-icon" rel="icon"
        href="https://smartbus-preprod-cdn.azurewebsites.net/_common/img/favicons/teixeira.ico">
    <link type="text/css" rel="stylesheet"
        href="https://smartbus-preprod-cdn.azurewebsites.net/ecommerce/styles/companies/teixeira/teixeira.min.css">

    <!-- Bootstrap and other icon libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.14.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Biblioteca do Angular -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular/12.0.0/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular/12.0.0/angular-animate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular/12.0.0/angular-aria.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular/12.0.0/angular-messages.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular/12.0.0/forms/angular-forms.min.js"></script>



</head>

<body>

    <div class="body-loading">
        <i class="fad fa-circle-notch fa-spin"></i>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <app-teixeira-header>
                    <header class="mobile-header-menu teixeira">
                        <div class="burger-container">
                            <div id="burger">
                                <div class="bar topBar"></div>
                                <div class="bar btmBar"></div>
                            </div>
                        </div>
                        <img src="https://smartbus-preprod-cdn.azurewebsites.net/ecommerce/imgs/teixeira/teixeira.png"
                            alt="Teixeira" class="main-company-logo" tabindex="0">
                        <!---->
                        <a class="main-header-link login-link" href="/login.php">
                            <i class="fa-solid fa-circle-user"></i>
                        </a>
                        <!---->
                        <ul class="menu-items">
                            <li class="menu-item" tabindex="0">
                                <a class="main-header-link">Minha conta</a>
                            </li>
                            <!---->
                            <li class="menu-item m-b-60" tabindex="0">
                                <a class="main-header-link">
                                    Meus pedidos
                                </a>
                            </li>
                            <!---->
                            <li class="menu-item" tabindex="0">
                                <a class="main-header-link">
                                    Buscar pedido
                                </a>
                            </li>
                            <li class="menu-item" tabindex="0">
                                <a class="main-header-link">
                                    Nossos destinos
                                </a>
                            </li>
                            <li class="menu-item" tabindex="0">
                                <a class="main-header-link">
                                    Horários de guichês
                                </a>
                            </li>
                            <li class="menu-item m-t-60">
                                <a class="main-header-link">
                                    SAIR
                                </a>
                            </li>
                            <!---->
                        </ul>
                    </header>
                    <header class="above-mobile-header-menu teixeira on-sale">
                        <div class="container">
                            <div class="row">
                                <div class="company-logo">
                                    <img src="https://smartbus-preprod-cdn.azurewebsites.net/ecommerce/imgs/teixeira/teixeira.png"
                                        alt="Teixeira" class="main-company-logo" tabindex="0">
                                </div>
                                <div class="header-links">
                                    <div class="main-header-links">
                                        <a class="main-header-link">
                                            Ajuda e horários
                                            <i class="fas fa-sort-down main-header-link-icon"></i>
                                            <div class="main-header-sub-menu-wrapper">
                                                <div class="main-header-sub-menu-side-content">
                                                    <h3 class="side-content-title">
                                                        Ajuda
                                                    </h3>
                                                    <h4 class="side-content-sub-title">Consulte as
                                                        perguntas<br>frequentes e os horários<br>das nossas agências.
                                                    </h4>
                                                </div>
                                                <div class="main-header-sub-menu-links">
                                                    <a class="main-header-sub-menu-link" href="/horarios-de-agencias">
                                                        Horários de guichês
                                                        <i class="fal fa-clock fa-fw icon"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="main-header-link" href="/onibus">Nossos destinos</a>
                                        <!---->
                                        <app-customer-menu>
                                            <a class="main-header-link">
                                                Olá, Henrique
                                                <i class="fas fa-sort-down main-header-link-icon">

                                                </i>
                                                <div class="main-header-sub-menu-wrapper">
                                                    <div class="main-header-sub-menu-side-content">
                                                        <h3 class="side-content-title">
                                                            Bem vindo(a)!
                                                        </h3>
                                                        <h4 class="side-content-sub-title">Com o seu login você
                                                            tem<br>acesso aos seus últimos<br>pedidos, facilidades
                                                            ao<br>comprar e conteúdo exclusivo.</h4>
                                                        <a class="side-content-logout-link">
                                                            SAIR
                                                        </a>
                                                    </div>
                                                    <div class="main-header-sub-menu-links">
                                                        <a class="main-header-sub-menu-link">
                                                            Buscar pedido
                                                            <i class="fal fa-ticket fa-fw icon"></i>
                                                        </a>
                                                        <span class="menu-split-item"></span>
                                                        <a class="main-header-sub-menu-link">
                                                            Minha conta
                                                            <i class="fal fa-user fa-fw icon"></i>
                                                        </a>
                                                        <a class="main-header-sub-menu-link">
                                                            Meus pedidos
                                                            <i class="fal fa-ticket-alt fa-fw icon"></i>
                                                        </a>
                                                        <a class="main-header-sub-menu-link" hidden="">
                                                            Gratuidade
                                                            <i class="fal fa-user-tag fa-fw icon"></i>
                                                        </a>
                                                        <a class="main-header-sub-menu-link" hidden="">
                                                            Compra de voucher
                                                            <i class="fal fa-user-tag fa-fw icon"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </a>
                                        </app-customer-menu>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                </app-teixeira-header>

                <router-outlet></router-outlet>

                <app-booking-process>
                    <app-sale-header>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <!---->
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="sale-header-step-title">
                                        <h1 class="sale-header-step-title-text">
                                            Confirmação e dados do passageiro
                                        </h1>
                                        <div class="trip-steps">passo <b>2</b> de <b>2</b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </app-sale-header>
                    <!---->
                    <router-outlet></router-outlet>
                    <app-checkout>
                        <!---->
                        <app-br-checkout>
                            <!---->
                            <div class="form-container">
                                <div class="container">
                                    <div class="row row-checkout-form">
                                        <div class="col-md-7 col-lg-9">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card card-checkout">
                                                        <h3 class="card-section-title">
                                                            <i class="fad fa-fw fa-phone-alt"></i>
                                                            Comprador
                                                        </h3>
                                                        <div class="checkout-info">
                                                            <form novalidate="" class="ng-untouched ng-pristine"
                                                                data-dashlane-rid="6167a8b3a550bc65"
                                                                data-form-type="other">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-lg-12">
                                                                        <div class="input-container">
                                                                            <label>
                                                                                Nome completo *
                                                                            </label>
                                                                            <input formcontrolname="name" type="text"
                                                                                value="" placeholder="Nome completo"
                                                                                disabled=""
                                                                                class="ng-untouched ng-pristine"
                                                                                data-dashlane-rid="20c715de4ca658f1"
                                                                                data-form-type="other">
                                                                            <!---->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-lg-12">
                                                                        <div class="input-container">
                                                                            <label>E-mail *</label>
                                                                            <input id="customerEmail"
                                                                                formcontrolname="email" type="text"
                                                                                value="" placeholder="E-mail"
                                                                                disabled=""
                                                                                class="ng-untouched ng-pristine"
                                                                                data-dashlane-rid="0727db6529d75715"
                                                                                data-kwcachedvalue="henriquevrios@gmail.com"
                                                                                data-kwimpalastatus="asleep"
                                                                                data-kwimpalaid="1692397960065-6"
                                                                                data-form-type="email">
                                                                            <!---->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-lg-6">
                                                                        <div class="input-container">
                                                                            <label>CPF *</label>
                                                                            <input id="customerId"
                                                                                formcontrolname="document" type="text"
                                                                                mask="000.000.000-00" placeholder="CPF"
                                                                                class="ng-untouched ng-pristine"
                                                                                disabled=""
                                                                                data-dashlane-rid="3ecfc858f5bc6da1"
                                                                                data-form-type="id_document">
                                                                            <!---->
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-lg-6">
                                                                        <div class="input-container">
                                                                            <label for="customerPhoneNumber">N° de
                                                                                telefone *</label>
                                                                            <input formcontrolname="customerPhone"
                                                                                id="customerPhoneNumber"
                                                                                mask="(00) 00000-0000" type="text"
                                                                                placeholder="N° do telefone de contato"
                                                                                class="ng-untouched ng-pristine"
                                                                                disabled=""
                                                                                data-dashlane-rid="a603ecad94e9f2e5"
                                                                                data-kwcachedvalue="(37) 98406-7937"
                                                                                data-kwimpalastatus="asleep"
                                                                                data-kwimpalaid="1692397960065-7"
                                                                                data-form-type="phone"><!---->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row row-about-text">
                                                                    <div class="col-md-12">
                                                                        <mat-checkbox class="mat-checkbox mat-accent"
                                                                            id="mat-checkbox-1">
                                                                            <label class="mat-checkbox-layout"
                                                                                for="mat-checkbox-1-input"
                                                                                data-dashlane-label="true">
                                                                                <span
                                                                                    class="mat-checkbox-inner-container">
                                                                                    <input type="checkbox"
                                                                                        class="mat-checkbox-input cdk-visually-hidden"
                                                                                        id="mat-checkbox-1-input"
                                                                                        tabindex="0"
                                                                                        aria-checked="false"
                                                                                        data-dashlane-rid="1b3e44e898126f61"
                                                                                        data-form-type="other">
                                                                                    <span matripple=""
                                                                                        class="mat-ripple mat-checkbox-ripple mat-focus-indicator">
                                                                                        <span
                                                                                            class="mat-ripple-element mat-checkbox-persistent-ripple"></span>
                                                                                    </span>
                                                                                    <span
                                                                                        class="mat-checkbox-frame"></span>
                                                                                    <span
                                                                                        class="mat-checkbox-background">
                                                                                        <!--<svg version="1.1" focusable="false" viewBox="0 0 24 24" xml:space="preserve" class="mat-checkbox-checkmark">
                                                                                        <path fill="none" stroke="white" d="M4.1,12.7 9,17.6 20.3,6.3" class="mat-checkbox-checkmark-path"></path>
                                                                                    </svg>-->
                                                                                        <span
                                                                                            class="mat-checkbox-mixedmark"></span>
                                                                                    </span>
                                                                                </span>
                                                                                <span class="mat-checkbox-label">
                                                                                    <span
                                                                                        style="display: none;">&nbsp;</span>
                                                                                    Aceito receber informações, alertas
                                                                                    de cancelamentos e/ou alterações das
                                                                                    viagens.
                                                                                </span>
                                                                            </label>
                                                                        </mat-checkbox>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!---->
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <form novalidate="" class="ng-untouched ng-pristine ng-invalid"
                                                        data-dashlane-rid="be9a5c26f8f369cd" data-form-type="other">
                                                        <div formarrayname="documents"
                                                            class="ng-untouched ng-pristine ng-invalid">
                                                            <div
                                                                class="card card-checkout m-b-10 ng-untouched ng-pristine ng-invalid">
                                                                <h3 class="card-section-title">
                                                                    <i class="fad fa-fw fa-address-card"></i>
                                                                    Passageiro #1
                                                                    <span class="passenger-seat">
                                                                        Poltrona
                                                                        <b class="seat-number">
                                                                            <i class="fa fa-chair-office icon-seat">
                                                                            </i>
                                                                            26
                                                                        </b>
                                                                    </span>
                                                                    <!---->
                                                                </h3>
                                                                <div class="checkout-info">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-lg-6">
                                                                            <div class="input-container">
                                                                                <label>Nome completo *</label>
                                                                                <input formcontrolname="name"
                                                                                    type="text" value="" id="name0"
                                                                                    placeholder="Nome completo"
                                                                                    class="ng-untouched ng-pristine ng-invalid"
                                                                                    data-dashlane-rid="e0f3c38855e1a2af"
                                                                                    data-form-type="other">
                                                                                <!---->
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-lg-2">
                                                                            <div class="input-container">
                                                                                <label>Documento *</label>
                                                                                <select id="typeOfPassengerDoc"
                                                                                    data-dashlane-rid="d8523b2943f75f6f"
                                                                                    data-form-type="other">
                                                                                    <option value="2" selected=""> RG
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-lg-4">
                                                                            <div class="input-container">
                                                                                <label>N° do documento *</label>
                                                                                <input formcontrolname="documentValue"
                                                                                    type="text" value="" minlength="2"
                                                                                    maxlength="20"
                                                                                    placeholder="Nro documento"
                                                                                    class="ng-untouched ng-pristine ng-invalid"
                                                                                    data-dashlane-rid="c19c1d81bf48d1c4"
                                                                                    data-form-type="id_document,id_card">
                                                                            </div>
                                                                            <!---->
                                                                        </div>
                                                                    </div>
                                                                    <!---->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!---->
                                                    </form>
                                                </div>
                                            </div>
                                            <br>
                                            <!---->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card card-checkout">
                                                        <h3 class="card-section-title">
                                                            <i class="fad fa-usd-circle"></i>
                                                            Pagamento
                                                            <span class="payment-images">
                                                                <!---->
                                                                <img alt="PIX"
                                                                    src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/pix.png"
                                                                    title="PIX" class="payment-image">
                                                                <!---->
                                                                <img alt="Master Card"
                                                                    src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/mastercard.png"
                                                                    title="Master Card" class="payment-image">
                                                                <img alt="Visa"
                                                                    src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/visa.png"
                                                                    title="Visa" class="payment-image">
                                                                <img alt="Amex"
                                                                    src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/amex.png"
                                                                    title="Amex" class="payment-image">
                                                            </span>
                                                        </h3>
                                                        <div class="payment-mode-wrapper">
                                                            <div class="payment-mode payment-mode-container">
                                                                <input type="radio" id="card" name="payment-modes"
                                                                    class="input-payment-mode">
                                                                <label for="card" class="lbl-payment-mode">
                                                                    <i class="payment-mode-image fad fa-credit-card"
                                                                        title="Cartão de crédito"></i>
                                                                    <span class="payment-mode-text">Cartão de
                                                                        crédito</span>
                                                                </label>
                                                            </div>
                                                            <!---->
                                                            <!---->
                                                            <div class="payment-mode payment-mode-container">
                                                                <input type="radio" id="mercadoPagoPix"
                                                                    name="payment-modes" class="input-payment-mode">
                                                                <label for="mercadoPagoPix" class="lbl-payment-mode">
                                                                    <img src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/pix.png"
                                                                        title="mercadoPagoPix"
                                                                        class="payment-mode-image">
                                                                    <span class="payment-mode-text">Pix</span>
                                                                </label>
                                                            </div>
                                                            <!---->
                                                            <!---->
                                                        </div>
                                                        <!---->
                                                        <!---->
                                                    </div>
                                                </div>
                                            </div>
                                            <!---->
                                            <!---->
                                            <!---->
                                            <div class="row payment-details-container" style="display: none;">
                                                <div class="col">
                                                    <app-mp-checkout-provider>
                                                        <div class="card card-checkout">
                                                            <h3 class="card-section-title">
                                                                <i class="fad fa-usd-circle"></i>
                                                                Detalhes do pagamento
                                                                <span class="payment-images">
                                                                    <img alt="Visa"
                                                                        src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/visa.png"
                                                                        title="Visa" class="payment-image">
                                                                    <img alt="Master Card"
                                                                        src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/mastercard.png"
                                                                        title="Master Card" class="payment-image">
                                                                    <img alt="Amex"
                                                                        src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/amex.png"
                                                                        title="Amex" class="payment-image">
                                                                    <img alt="Elo"
                                                                        src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/elo.png"
                                                                        title="Elo" class="payment-image">
                                                                </span>
                                                            </h3>
                                                            <form novalidate="" action="" method="post" id="pay"
                                                                name="pay" class="ng-untouched ng-pristine ng-valid">
                                                                <input type="hidden" name="paymentMethodId">
                                                                <div class="payment-sub-form m-b-30">
                                                                    <h4 class="payment-sub-form-title"> Dados do titular
                                                                        do cartão
                                                                        <span class="payment-sub-form-title-info">
                                                                            <i class="icon fad fa-question-circle"></i>
                                                                            <span class="info">
                                                                                <b class="info-title">Por que
                                                                                    solicitamos essas informações?</b>
                                                                                <br><br>
                                                                                Nós solicitamos essas informações
                                                                                para<br> reduzir o risco de fraude e
                                                                                poder levar<br> até você a passagem no
                                                                                menor preço possível.
                                                                            </span>
                                                                        </span>
                                                                    </h4>
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-lg-9">
                                                                            <div class="input-container">
                                                                                <label for="cardholderName">Nome do
                                                                                    titular *</label>
                                                                                <input type="text" id="cardholderName"
                                                                                    data-checkout="cardholderName"
                                                                                    placeholder="Nome proprietário">
                                                                                <!---->
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-lg-3">
                                                                            <div
                                                                                class="input-container input-contact-document">
                                                                                <label class="checkbox-label">
                                                                                    <mat-checkbox
                                                                                        class="mat-checkbox mat-accent"
                                                                                        id="mat-checkbox-3">
                                                                                        <label
                                                                                            class="mat-checkbox-layout"
                                                                                            for="mat-checkbox-3-input">
                                                                                            <span
                                                                                                class="mat-checkbox-inner-container">
                                                                                                <input type="checkbox"
                                                                                                    class="mat-checkbox-input cdk-visually-hidden"
                                                                                                    id="mat-checkbox-3-input"
                                                                                                    tabindex="0"
                                                                                                    aria-checked="false">
                                                                                                <span matripple=""
                                                                                                    class="mat-ripple mat-checkbox-ripple mat-focus-indicator">
                                                                                                    <span
                                                                                                        class="mat-ripple-element mat-checkbox-persistent-ripple"></span>
                                                                                                </span>
                                                                                                <span
                                                                                                    class="mat-checkbox-frame"></span>
                                                                                                <span
                                                                                                    class="mat-checkbox-background">
                                                                                                    <!--<svg version="1.1"
                                                                                                    focusable="false"
                                                                                                    viewBox="0 0 24 24"
                                                                                                    xml:space="preserve"
                                                                                                    class="mat-checkbox-checkmark">
                                                                                                    <path fill="none"
                                                                                                        stroke="white"
                                                                                                        d="M4.1,12.7 9,17.6 20.3,6.3"
                                                                                                        class="mat-checkbox-checkmark-path">
                                                                                                    </path>
                                                                                                </svg>-->
                                                                                                    <span
                                                                                                        class="mat-checkbox-mixedmark"></span>
                                                                                                </span>
                                                                                            </span>
                                                                                            <span
                                                                                                class="mat-checkbox-label">
                                                                                                <span
                                                                                                    style="display: none;">&nbsp;</span>
                                                                                                Mesmo CPF do contato.
                                                                                            </span>
                                                                                        </label>
                                                                                    </mat-checkbox>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-lg-2">
                                                                            <div class="input-container">
                                                                                <label for="docType">Documento *</label>
                                                                                <select id="docType"
                                                                                    data-checkout="docType">
                                                                                    <option value="CPF">CPF</option>
                                                                                    <option value="CNPJ">CNPJ</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-lg-7">
                                                                            <div class="input-container">
                                                                                <label for="docNumber">N° do documento
                                                                                    *</label>
                                                                                <input type="text" id="payerId"
                                                                                    placeholder="N° do documento"
                                                                                    autocomplete="on" maxlength="14"
                                                                                    oninput="formatDocument(this)">
                                                                                <input type="hidden" id="docNumber"
                                                                                    data-checkout="docNumber">
                                                                                <!---->
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-lg-3">
                                                                            <div class="input-container">
                                                                                <label for="zipCode">CEP da fatura
                                                                                    *</label>
                                                                                <input id="zipCode" type="text"
                                                                                    placeholder="CEP da fatura"
                                                                                    pattern="\d{5}-\d{3}" maxlength="9"
                                                                                    oninput="formatZipCode(this)">
                                                                                <!---->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="payment-sub-form">
                                                                    <h4 class="payment-sub-form-title">Dados do cartão *
                                                                    </h4>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-lg-6">
                                                                            <div class="input-container">
                                                                                <label for="cardNumber">N° do cartão
                                                                                    *</label>
                                                                                <input id="cnumber"
                                                                                    mask="0000 0000 0000 0000"
                                                                                    placeholder="N° do cartão"
                                                                                    maxlength="19"
                                                                                    oninput="formatCardNumber(this)">
                                                                                <!---->
                                                                                <input type="hidden"
                                                                                    data-checkout="cardNumber"
                                                                                    onselectstart="return false"
                                                                                    onpaste="return false"
                                                                                    oncopy="return false"
                                                                                    oncut="return false"
                                                                                    ondrag="return false"
                                                                                    ondrop="return false"
                                                                                    autocomplete="off" value="">
                                                                                <!---->
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-lg-6">
                                                                            <div class="input-container">
                                                                                <label>Parcelas *</label>
                                                                                <select>
                                                                                    <option value="-1"> Aguardando nº do
                                                                                        cartão </option>
                                                                                    <!---->
                                                                                </select>
                                                                                <!---->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <input maxlength="4" type="hidden"
                                                                            id="cardExpirationYear"
                                                                            data-checkout="cardExpirationYear"
                                                                            onselectstart="return false"
                                                                            onpaste="return false" oncopy="return false"
                                                                            oncut="return false" ondrag="return false"
                                                                            ondrop="return false" autocomplete="off"
                                                                            placeholder="Ano de expiração">
                                                                        <input maxlength="2" type="hidden"
                                                                            id="cardExpirationMonth"
                                                                            data-checkout="cardExpirationMonth"
                                                                            onselectstart="return false"
                                                                            onpaste="return false" oncopy="return false"
                                                                            oncut="return false" ondrag="return false"
                                                                            ondrop="return false" autocomplete="off"
                                                                            placeholder="Mês de expiração">
                                                                        <div class="col-md-12 col-lg-3">
                                                                            <div class="input-container">
                                                                                <label for="securityCode">Cód de
                                                                                    segurança *</label>
                                                                                <input maxlength="5" type="text"
                                                                                    id="securityCode"
                                                                                    data-checkout="securityCode"
                                                                                    onselectstart="return false"
                                                                                    onpaste="return false"
                                                                                    oncopy="return false"
                                                                                    oncut="return false"
                                                                                    ondrag="return false"
                                                                                    ondrop="return false"
                                                                                    autocomplete="off"
                                                                                    placeholder="Cód de segurança"
                                                                                    oninput="formatSecurityCode(this)">
                                                                            </div>
                                                                            <!---->
                                                                        </div>
                                                                        <div class="col-md-6 col-lg-3">
                                                                            <div class="input-container">
                                                                                <label for="cardExpirationYear">Data de
                                                                                    validade *</label>
                                                                                <input id="validateDate" type="text"
                                                                                    mask="00/00" placeholder="mm/aa">
                                                                            </div>
                                                                            <!---->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </app-mp-checkout-provider>
                                                    <app-cielo-checkout-provider hidden="">
                                                        <div class="card card-checkout">
                                                            <h3 class="card-section-title">
                                                                <i class="fad fa-usd-circle"></i>
                                                                Detalhes do pagamento com cartão
                                                            </h3>
                                                            <form novalidate="" method="post" id="cieloPay"
                                                                class="ng-untouched ng-pristine ng-valid">
                                                                <div class="payment-sub-form m-b-30">
                                                                    <h4 class="payment-sub-form-title"> Dados do titular
                                                                        do cartão
                                                                        <span class="payment-sub-form-title-info">
                                                                            <i class="icon fad fa-question-circle"></i>
                                                                            <span class="info">
                                                                                <b class="info-title">Por que
                                                                                    solicitamos essas informações?</b>
                                                                                <br><br>
                                                                                Nós solicitamos essas informações
                                                                                para<br> reduzir o risco de fraude e
                                                                                poder levar<br> até você a passagem no
                                                                                menor preço possível.
                                                                            </span>
                                                                        </span>
                                                                    </h4>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-lg-12">
                                                                            <div class="input-container">
                                                                                <label for="cardholderName">Nome do
                                                                                    titular</label>
                                                                                <input type="text"
                                                                                    data-checkout="cardholderName"
                                                                                    class="bp-sop-cardholdername"
                                                                                    placeholder="Nome proprietário">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="payment-sub-form">
                                                                    <h4 class="payment-sub-form-title">Dados do cartão
                                                                    </h4>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-lg-6">
                                                                            <div class="input-container">
                                                                                <label for="cardNumber">N° do
                                                                                    cartão</label>
                                                                                <input id="cieloCnumber"
                                                                                    mask="0000 0000 0000 0000"
                                                                                    placeholder="N° do cartão">
                                                                                <!---->
                                                                                <input onselectstart="return false"
                                                                                    type="hidden" onpaste="return false"
                                                                                    oncopy="return false"
                                                                                    oncut="return false"
                                                                                    ondrag="return false"
                                                                                    ondrop="return false"
                                                                                    autocomplete="off" value=""
                                                                                    class="bp-sop-cardnumber">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-lg-6">
                                                                            <div class="input-container">
                                                                                <label>Parcelas</label>
                                                                                <select>
                                                                                    <!---->
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-lg-3">
                                                                            <div class="input-container">
                                                                                <label for="cieloSecurityCode">Cód de
                                                                                    segurança</label>
                                                                                <input id="cieloSecurityCode"
                                                                                    type="text" maxlength="3" mask="000"
                                                                                    data-checkout="securityCode"
                                                                                    onselectstart="return false"
                                                                                    onpaste="return false"
                                                                                    oncopy="return false"
                                                                                    oncut="return false"
                                                                                    ondrag="return false"
                                                                                    ondrop="return false"
                                                                                    autocomplete="off"
                                                                                    class="bp-sop-cardcvv"
                                                                                    placeholder="Cód de segurança">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-lg-3">
                                                                            <div class="input-container">
                                                                                <label for="cardExpirationYear">Data de
                                                                                    validade</label>
                                                                                <input id="cardExpiration" type="text"
                                                                                    minlength="7" maxlength="7"
                                                                                    mask="00/0000"
                                                                                    class="bp-sop-cardexpirationdate"
                                                                                    placeholder="mm/aaaa">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </app-cielo-checkout-provider>
                                                    <app-paymee-checkout-provider hidden="">
                                                        <div class="card card-checkout">
                                                            <h3 class="card-section-title">
                                                                <i class="fad fa-usd-circle"></i>
                                                                Detalhes do pagamento com transferência bancária
                                                            </h3>
                                                            <div class="m-t-45 m-b-15 text-center">Selecione o seu banco
                                                                abaixo</div>
                                                            <div class="paymee-bank-list">
                                                                <img id="payment-method-1"
                                                                    src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/banco-do-brasil.png"
                                                                    title="Banco do Brasil" class="paymee-bank">
                                                                <img id="payment-method-2"
                                                                    src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/bradesco.png"
                                                                    title="Bradesco" class="paymee-bank">
                                                                <img id="payment-method-3"
                                                                    src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/itau.png"
                                                                    title="Itaú" class="paymee-bank">
                                                                <img id="payment-method-9"
                                                                    src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/santander.png"
                                                                    title="Santander" class="paymee-bank">
                                                                <img id="payment-method-7"
                                                                    src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/caixa.png"
                                                                    title="Caixa Econômica Federal" class="paymee-bank">
                                                                <img id="payment-method-8"
                                                                    src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/original.png"
                                                                    title="Banco Original" class="paymee-bank">
                                                                <img id="payment-method-11"
                                                                    src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/banco-inter.png"
                                                                    title="Banco Inter" class="paymee-bank">
                                                                <img id="payment-method-12"
                                                                    src="https://smartbus-cdn.azurewebsites.net/_common/img/payment/bs2.png"
                                                                    title="Banco BS2" class="paymee-bank">
                                                            </div>
                                                            <!---->
                                                        </div>
                                                    </app-paymee-checkout-provider>
                                                    <app-paymee-pix-checkout-provider
                                                        hidden=""></app-paymee-pix-checkout-provider>
                                                    <app-mercado-pago-pix-checkout-provider
                                                        hidden=""></app-mercado-pago-pix-checkout-provider>
                                                    <app-nupay-checkout-provider
                                                        hidden=""></app-nupay-checkout-provider>
                                                </div>
                                            </div>
                                            <br>
                                            <!---->
                                            <!---->
                                            <div class="row row-about-text">
                                                <div class="mat-checkbox mat-accent" id="mat-checkbox-2">
                                                    <label class="mat-checkbox-layout" for="mat-checkbox-2-input">
                                                        <div class="mat-checkbox-inner-container">
                                                            <input type="checkbox"
                                                                class="mat-checkbox-input cdk-visually-hidden"
                                                                id="mat-checkbox-2-input" tabindex="0"
                                                                aria-checked="false">
                                                            <span matripple=""
                                                                class="mat-ripple mat-checkbox-ripple mat-focus-indicator">
                                                                <span
                                                                    class="mat-ripple-element mat-checkbox-persistent-ripple"></span>
                                                            </span>
                                                            <span class="mat-checkbox-frame"></span>
                                                            <span class="mat-checkbox-background">
                                                                <!--<svg version="1.1" focusable="false"
                                                                        viewBox="0 0 24 24" xml:space="preserve"
                                                                        class="mat-checkbox-checkmark">
                                                                        <path fill="none" stroke="white"
                                                                            d="M4.1,12.7 9,17.6 20.3,6.3"
                                                                            class="mat-checkbox-checkmark-path"></path>
                                                                    </svg>-->
                                                                <span class="mat-checkbox-mixedmark"></span>
                                                            </span>
                                                        </div>

                                                        <span style=" display: none;">&nbsp;</span>
                                                        Ao confirmar a compra eu concordo com os&nbsp;<a target="_blank"
                                                            href="/termos">termos de uso&nbsp;</a>
                                                        e&nbsp;
                                                        <a target="_blank" href="/privacidade">política de
                                                            privacidade</a>.
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!---->
                                            <div class="row row-checkout-btns">
                                                <div class="col-lg-4 col-md-12 m-t-15">
                                                    <button class="btn btn-outline">
                                                        <a href="/buscaPassagem.php"
                                                            style="text-decoration: none; color: black;">
                                                            <i class="fa fa-chevron-circle-left"></i>
                                                            &nbsp;&nbsp;
                                                            VOLTAR
                                                        </a>
                                                    </button>
                                                </div>
                                                <div class="col-lg-8 col-md-12 m-t-15 text-right">
                                                    <button class="btn btn-primary">
                                                        FINALIZAR SUA COMPRA
                                                        &nbsp;&nbsp;&nbsp;
                                                        <i class="fa fa-check-circle icon-next"></i>
                                                    </button>
                                                    <!---->
                                                    <!---->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-lg-3">
                                            <app-sale-summary>
                                                <div class="sale-summary">
                                                    <div class="sale-summary-title">
                                                        <strong>SUA COMPRA</strong>
                                                        <!---->
                                                        <br>
                                                        <!---->
                                                        <br>
                                                        <b>R$&nbsp;70,60</b>&nbsp;&nbsp;
                                                        <strong>no total</strong>
                                                    </div>
                                                    <div class="summary-info-block">
                                                        <span class="summary-info-title">IDA</span>
                                                        <div class="summary-info-subtitle-block departure m-b-15">
                                                            <span class="summary-info-subtitle"
                                                                title="DIVINOPOLIS - MG">
                                                                <i class="fad fa-fw fa-map-marker-alt"></i>
                                                                DIVINOPOLIS - MG
                                                            </span>
                                                            <span class="departure-location-description"> </span>
                                                        </div>
                                                        <div class="summary-info-subtitle-block m-b-30">
                                                            <span class="summary-info-subtitle"
                                                                title="BELO HORIZONTE - MG">
                                                                <i class="fad fa-fw fa-map-marker-alt"></i>
                                                                BELO HORIZONTE - MG
                                                            </span>
                                                        </div>
                                                        <span class="summary-info-text">
                                                            <i class="fad fa-fw fa-calendar"></i>
                                                            19 de agosto - 06:30
                                                            <!---->
                                                            <!---->
                                                            <!---->
                                                        </span>
                                                        <!---->
                                                        <span class="summary-info-text">
                                                            <i class="fad fa-fw fa-chair-office"></i>
                                                            Poltrona 26
                                                            <!---->
                                                            <!---->
                                                            <!---->
                                                        </span>
                                                        <!---->
                                                        <!---->
                                                        <!---->
                                                    </div>
                                                    <!---->
                                                    <div class="summary-info-block">
                                                        <span class="summary-info-title">VALORES</span>
                                                        <!---->
                                                        <div>
                                                            <span class="summary-info-text">
                                                                <i class="fad fa-usd-circle"></i>
                                                                <b>R$&nbsp;60,90</b>
                                                                <span class="gray push-right">bilhete</span>
                                                            </span>
                                                            <!---->
                                                            <span class="summary-info-text">
                                                                <i class="fad fa-usd-circle"></i>
                                                                <b>R$&nbsp;9,70</b>
                                                                <span class="gray push-right">tx de serviço</span>
                                                            </span>
                                                            <!---->
                                                            <!---->
                                                            <!---->
                                                        </div>
                                                        <!---->
                                                        <!---->
                                                    </div>
                                                    <!---->
                                                    <!---->
                                                    <!---->
                                                    <div class="summary-info-block coupon-block">
                                                        <label>Cupom de Desconto</label>
                                                        <div class="content" data-dashlane-rid="ef2366d817fbc7f9"
                                                            data-form-type="other">
                                                            <input type="text" value=""
                                                                class="ng-untouched ng-pristine ng-valid"
                                                                data-dashlane-rid="b0f697939db181d1"
                                                                data-form-type="other">
                                                            <button class="btn btn-primary" disabled=""
                                                                data-dashlane-rid="ed51a99dbd47320c"
                                                                data-dashlane-label="true"
                                                                data-form-type="action">Aplicar</button>
                                                        </div>
                                                    </div>
                                                    <!---->
                                                </div>
                                            </app-sale-summary>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </app-br-checkout>
                    </app-checkout>
                </app-booking-process>
            </div>
            <!---->
            <!---->

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
                                            <div class="social">
                                                <a href="https://www.facebook.com/teixeiraturismooficial/"
                                                    target="_blank" class="main-footer-social-icon">
                                                    <i class="fab fa-facebook"></i>
                                                    <span>Facebook</span>
                                                </a>
                                                <a href="https://www.instagram.com/teixeiraturismo/" target="_blank"
                                                    class="main-footer-social-icon">
                                                    <i class="fab fa-instagram"></i>
                                                    <span>Instagram</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="help footer-box">
                                            <h4 class="footer-title">Ajuda</h4>
                                            <ul>
                                                <li class="footer-menu-item" tabindex="0">Horários dos guichês</li>
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
                                                    alt="Master Card" title="Master Card" class="payment-img">
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
                                                    <a href="mailto:falecom@teixeiraturismo.com.br" class="fs-13">
                                                        <i class="fad fa-envelope envelope-icon"></i>
                                                        &nbsp;&nbsp;falecom@teixeiraturismo.com.br
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="info-content">
                                            <h4 class="footer-title">SAC
                                                <small>(atendimento ao consumidor)</small>
                                            </h4>
                                            <a href="tel:3732144070" class="a-sac"> (37) 3214-4070 </a>
                                            <br><br>
                                        </div>
                                        <div class="info-content">
                                            <span class="sac-number">
                                                <a href="tel:0800 703 5203" class="a-number">
                                                    <i class="fad fa-phone phone-icon"></i>
                                                    0800 703 5203
                                                </a>
                                                <br>
                                                para deficientes de fala e auditivos.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!---->
    <iframe
        src="https://www.mercadolibre.com/jms/lgz/background?dps=armor.0f544cb78efb1e79c1c099b4ece094108f8cc86d5a12496518f7b12cc2deda7b9ef02e48b752744972a144c3be20bffd8bc279d7a3a7e53755624614321ddfac52120e864b00ec6a3c4fa6b53044c11c161cee0efe673b19e346d97dcbe6bfeb.7e4922c3e98543d6994ad65aa0446207"
        style="display: none; width: 0; height: 0; border: none; margin: 0;" data-dashlane-frameid="28"></iframe>
    <iframe
        src="https://www.mercadolibre.com/jms/lgz/background?dps=armor.9306ff95f72ea7b9f76b2f17e1249a373707f4046d4ec275225bcd75d25f853e0ca00d8991f592493aaf570312197a855f85ad1be8cdc310cf0f84fe31c3e5277f9fc7ed1a8c28e33ff196b0e6bbf66af7e38c9b2d5867ed65d8e46940cc59e3.22bd7612cf0473db723680a7913c4e6d"
        style="display: none; width: 0; height: 0; border: none; margin: 0;" data-dashlane-frameid="29"></iframe>

    <script type="text/javascript" src="scripts/payment.js"></script>


</body>

</html>