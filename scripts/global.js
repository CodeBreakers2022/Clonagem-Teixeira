const menu_icon = document.getElementById('menu-icon');

const menu_container = document.getElementById('navbar-small-container');
const footer = document.getElementById('footer');
const lines = document.querySelectorAll('.line'); // Usando querySelectorAll para obter todos os elementos

menu_icon.addEventListener('click', function () {
    this.classList.toggle('active');
    if (menu_icon.classList.contains('active')) {
        menu_container.style.transform = 'translateY(100vh)';
        footer.style.display = 'none';
        lines.forEach(line => {
            line.style.backgroundColor = 'white';
        });
    } else {
        menu_container.style.transform = 'translateY(-100vh)';
        footer.style.display = 'flex';
        lines.forEach(line => {
            line.style.backgroundColor = '#333';
        });
    }
});
const ajudaHorarios = document.getElementById("ajuda-horarios");
const menuAjuda = document.getElementById('menu-suspenso-ajuda');
ajudaHorarios.addEventListener('click', function (){
    ajudaHorarios.classList.toggle('open');
    if(this.classList.contains('open')){
        menuAjuda.style='display: flex';
    }else{
        menuAjuda.style='display: none';
    }
});
const login = document.getElementById("login");
const menuLogin = document.getElementById('menu-suspenso-login');
login.addEventListener('click', function (){
    login.classList.toggle('open');
    if(this.classList.contains('open')){
        menuLogin.style='display: flex';
    }else{
        menuLogin.style='display: none';
    }
});

// resrevarPassagem.php script

const colorize = document.querySelectorAll('.bttchair');
const chairSelected = [];

for (let i = 0; i < colorize.length; i++) {
    var chair = colorize[i];
    chair.addEventListener('click', (event) => {
        event.target.classList.toggle("selected");
        var chairS = event.target.innerText;

        // Verificar se a cadeira já está no array
        var chairIndex = chairSelected.indexOf(chairS);

        if (chairIndex === -1) {
            // Se não estiver no array, adicione
            chairSelected.push(chairS);
        } else {
            // Se estiver no array, remova
            chairSelected.splice(chairIndex, 1);
        }

        console.log(chairS);
        console.log(chairSelected);
    });
}




var xhr = new XMLHttpRequest();
xhr.open("POST", "payment.php", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

// Convertendo o array para JSON e enviando como uma variável chamada "selectedChairs"
xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.responseText); // Resposta do PHP
    }
};

xhr.send("selectedChairs=" + encodeURIComponent(JSON.stringify(chairSelected)));

