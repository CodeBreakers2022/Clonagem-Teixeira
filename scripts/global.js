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