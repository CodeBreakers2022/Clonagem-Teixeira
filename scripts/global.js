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
