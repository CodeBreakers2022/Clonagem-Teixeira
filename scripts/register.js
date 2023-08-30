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
        // alert("Senhas correspondem. Formulário pode ser enviado.");
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

/// Formata o número de telefone
function formatPhoneNumber(input) {
    let value = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (value.length > 11) {
        value = value.slice(0, 11); // Limita a 11 dígitos
    }

    if (value.length >= 10) {
        value = value.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3'); // Formato (99) 99999-9999
    } else if (value.length >= 6) {
        value = value.replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3'); // Formato (99) 9999-9999
    } else if (value.length >= 3) {
        value = value.replace(/^(\d{2})(\d{0,5})$/, '($1) $2'); // Formato (99) 9...
    }

    input.value = value;
}

// Adicionando ouvinte de evento para formatação de celular
const phoneInput = document.getElementById('customerPhoneNumber');
phoneInput.addEventListener('input', function () {
    formatPhoneNumber(this);
});


// Formata o número de CPF
function formatCPF(input) {
    let value = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (value.length > 11) {
        value = value.slice(0, 11); // Limita a 11 dígitos
    }

    if (value.length > 9) {
        value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4'); // Formato 000.000.000-00
    } else if (value.length > 6) {
        value = value.replace(/^(\d{3})(\d{3})(\d{0,3})$/, '$1.$2.$3'); // Formato 000.000.000
    } else if (value.length > 3) {
        value = value.replace(/^(\d{3})(\d{0,3})$/, '$1.$2'); // Formato 000.000
    }

    input.value = value;
}

// Adicionando ouvinte de evento para formatação de CPF
const cpfInput = document.getElementById('customerId');
cpfInput.addEventListener('input', function () {
    formatCPF(this);
});
