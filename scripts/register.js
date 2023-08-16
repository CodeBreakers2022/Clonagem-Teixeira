const citiesByState = {
    AC: ["Rio Branco", "Cruzeiro do Sul", "Sena Madureira"],
    AL: ["Maceió", "Arapiraca", "Palmeira dos Índios"],
    AP: ["Macapá", "Santana", "Mazagão"],
    AM: ["Manaus", "Parintins", "Itacoatiara"],
    BA: ["Salvador", "Feira de Santana", "Vitória daConquista"],
    CE: ["Fortaleza", "Caucaia", "Juazeiro do Norte"],
    DF: ["Brasília"],
    ES: ["Vitória", "Vila Velha", "Cariacica"],
    GO: ["Goiânia", "Aparecida de Goiânia", "Anápolis"],
    MA: ["São Luís", "Imperatriz", "Timon"],
    MT: ["Cuiabá", "Várzea Grande", "Rondonópolis"],
    MS: ["Campo Grande", "Dourados", "Três Lagoas"],
    MG: ["Belo Horizonte", "Uberlândia", "Contagem"],
    PA: ["Belém", "Ananindeua", "Santarém"],
    PB: ["João Pessoa", "Campina Grande", "Santa Rita"],
    PR: ["Curitiba", "Londrina", "Maringá"],
    PE: ["Recife", "Jaboatão dos Guararapes", "Olinda"],
    PI: ["Teresina", "Parnaíba", "Picos"],
    RJ: ["Rio de Janeiro", "São Gonçalo", "Duque de Caxias"],
    RN: ["Natal", "Mossoró", "Parnamirim"],
    RS: ["Porto Alegre", "Caxias do Sul", "Canoas"],
    RO: ["Porto Velho", "Ji-Paraná", "Ariquemes"],
    RR: ["Boa Vista", "Rorainópolis", "Caracaraí"],
    SC: ["Florianópolis", "Joinville", "Blumenau"],
    SP: ["São Paulo", "Guarulhos", "Campinas"],
    SE: ["Aracaju", "Nossa Senhora do Socorro", "Lagarto"],
    TO: ["Palmas", "Araguaína", "Gurupi"]
};

    
const stateSelect = document.getElementById("state");
const citySelect = document.getElementById("city");

stateSelect.addEventListener("change", () => {
    const selectedState = stateSelect.value;
    const cities = citiesByState[selectedState];

    citySelect.innerHTML = ""; // Limpa as opções existentes

    if (cities) {
        cities.forEach(city => {
            const option = document.createElement("option");
            option.value = city;
            option.textContent = city;
            citySelect.appendChild(option);
        });
    }
});

// confirmação de senha: 
function checkPassword() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm-password").value;
    if (password !== confirmPassword) {
        alert("As senhas não correspondem. Por favor, verifique.");
    } else {
        alert("Senhas correspondem. Formulário pode ser enviado.");
    }
}

// Verificando se o checkbox de notificações foi selecionado
function checkNotification() {
    var getNotific = 0;
    if (document.getElementById("notific").checked) {
        var getNotific = 1;
    } else {
        var getNotific = 0;
    }
    console.log(getNotific);
}
