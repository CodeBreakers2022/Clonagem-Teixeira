<?php

    include_once 'connect.php';

    // Inicializa a sessão
    session_start();

    if (isset($_GET['travel_id'])) {
        $travel_id = $_GET['travel_id'];
    } else {
        // echo "user_id não foi passado via GET.";
    }

    if (isset($_GET['user_id']) && !empty($_GET['user_id'])){
        $user_id = $_GET['user_id'];
    }

    // if(isset($_SESSION['user_id'])){
    //     $user_id = $_SESSION['user_id'];
    // }
    // Verifica se o array de seleções já foi criado na sessão
    if (!isset($_SESSION['selected_numbers'])) {
        $_SESSION['selected_numbers'] = array();
    }

    // Função para adicionar ou remover um número do array de seleções
    function toggleNumber($number) {
        if (in_array($number, $_SESSION['selected_numbers'])) {
            $_SESSION['selected_numbers'] = array_diff($_SESSION['selected_numbers'], array($number));
        } elseif (count($_SESSION['selected_numbers']) < 6) {
            $_SESSION['selected_numbers'][] = $number;
        } else {
            echo "<script>alert('Limite de passagens alcançado')</script>";
        }
    }

    // Verifica se um botão foi clicado e adiciona ou remove o número do array
    if (isset($_POST['number'])) {
        $selectedNumber = $_POST['number'];
        toggleNumber($selectedNumber);
    }

    // Verifica se o botão de redefinir foi clicado
    if (isset($_POST['reset'])) {
        $_SESSION['selected_numbers'] = array();
    }

    // Função para verificar se um número já foi selecionado
    function isNumberSelected($number) {
        return in_array($number, $_SESSION['selected_numbers']);
    }

    if (isset($_POST['reset'])) {
        $_SESSION['selected_numbers'] = array();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Seus meta tags, links para estilos e scripts aqui -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/styles/global.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/register.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/bus.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
    </style>
    <!-- icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
    
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


    <div class="container-father" id="div-father" style="display: block;">
        <form method="post">
            <div class="container-bus">
                <div class="container-vehicle">
                    <div class="bus-front"></div>
                    <div class="bus-middle">
                        <div class='boxchair'> 
                        <?php
                            $sql_cadeiras_reservadas = "SELECT chair_number FROM user_chair WHERE busy = 1";
                            $result_cadeiras_reservadas = mysqli_query($connection, $sql_cadeiras_reservadas);
                            $reservadas = array();

                            while ($row_cadeiras_reservadas = mysqli_fetch_assoc($result_cadeiras_reservadas)) {
                                $reservadas[] = $row_cadeiras_reservadas['chair_number'];
                            }

                            for ($i = 1; $i <= 42; $i++) {
                                if (isNumberSelected($i)) {
                                    echo "<button style='background-color: orange;' class='bttchair selected' name='number' value='$i'>$i</button>";
                                } else if (in_array($i, $reservadas)) {
                                    echo "<button style='background-color: red;' class='bttchair' name='number' value='$i' disabled>$i</button>";
                                } else {
                                    echo "<button class='bttchair' name='number' value='$i'>$i</button>";
                                }
                                
                                if ($i % 7 === 0) {
                                    echo "<br>";
                                }
                            }
                        ?>
                        </div>
                    </div>
                    <div class="bus-back"></div>
                </div>
                <div class="sum">
                    <div class="disponivel">disponivel</div>
                    <div class="ocupado">ocupado</div>
                    <div class="selecionado">selecionado</div>
                </div>
            </div>
            <div class="container-father-footer">
                <input class="close-div-father" name="reset" type="submit" value="LIMPAR SELEÇÃO"/>
                <?php 
                    if (empty($_SESSION['selected_numbers'])){
                        $href = "reservarPassagem.php";
                    }else if (empty($_GET['user_id'])) {
                        $href = "payment.php?travel_id=" . $travel_id . "";
                    } else {
                        $href = "payment.php?travel_id=" . $travel_id . "&user_id=" . $user_id . "";
                    }
                ?>
                <?php if (!empty($_SESSION['selected_numbers'])): ?>
                    <p class="select-chair">Poltronas selecionadas <br> <?php echo implode(", ", $_SESSION['selected_numbers']); ?></p>
                <?php endif; ?>
                <a class="close-div-father" type="submit" name="submit" href="<?php echo $href?>">RESERVAR</a>
                
            </div>
        </form>
        
    </div>

    <footer class="footer" id="footer">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.bttchair');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    this.classList.toggle('selected');
                });
            });
        });
    </script>
</body>
</html>
