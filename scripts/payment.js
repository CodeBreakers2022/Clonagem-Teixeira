// Detecta o evento de rolagem
window.addEventListener('scroll', function () {
    var navbar = document.querySelector('nav');
    var scrolled = window.scrollY;

    if (scrolled > 100) { // Define o ponto de rolagem a partir do qual a navbar deve ser ocultada
        navbar.classList.add('hide');
    } else {
        navbar.classList.remove('hide');
    }
});

// Formata o número de telefone
function formatPhoneNumber(input) {
    let value = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (value.length > 11) {
        value = value.slice(0, 11); // Limita a 11 dígitos
    }

    if (value.length > 10) {
        value = value.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3'); // Formato (99) 99999-9999
    } else if (value.length > 5) {
        value = value.replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3'); // Formato (99) 9999-9999
    } else if (value.length > 2) {
        value = value.replace(/^(\d{2})(\d{0,5})$/, '($1) $2'); // Formato (99) 9...
    }

    input.value = value;
}

// Adiciona classe "clicked" ao modo de pagamento selecionado
document.addEventListener("DOMContentLoaded", function() {
  const paymentModes = document.querySelectorAll(".payment-mode");

  paymentModes.forEach(function(mode) {
      mode.addEventListener("click", function() {
          // Remove a classe "clicked" de todos os modos de pagamento
          paymentModes.forEach(function(item) {
              item.classList.remove("clicked");
          });

          // Adiciona a classe "clicked" ao modo de pagamento clicado
          this.classList.add("clicked");
      });
  });
});

// Formata a entrada da data como mm/aa
const input = document.getElementById("validateDate");
input.addEventListener("input", function() {
    const value = this.value.replace(/\D/g, ""); // Remove caracteres não numéricos
    
    if (value.length > 4) {
        this.value = value.slice(0, 4); // Limita o comprimento a 4 caracteres
    }
    
    if (value.length > 2) {
        const formattedValue = value.slice(0, 2) + "/" + value.slice(2, 4); // Formata como 00/00
        this.value = formattedValue;
    }
});

// Formata o número do cartão como grupos de 4 dígitos separados por espaços
function formatCardNumber(input) {
  let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
  value = value.replace(/(\d{4})(?=\d)/g, '$1 '); // Add a space after every 4 digits
  input.value = value;
}

// Formata o código de segurança como no máximo 3 dígitos
function formatSecurityCode(input) {
  let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
  value = value.slice(0, 3); // Limit input to 3 characters
  input.value = value;
}

// Formata o CEP como "00000-000"
function formatZipCode(input) {
  let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
  value = value.slice(0, 8); // Limit input to 8 characters
  if (value.length > 5) {
      value = value.slice(0, 5) + '-' + value.slice(5); // Format as "00000-000"
  }
  input.value = value;
}

// Formata o CPF ou CNPJ de acordo com o tipo selecionado
function formatDocument(input) {
    let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters

    const docType = document.getElementById('docType').value;
    if (docType === 'CPF') {
        if (value.length > 11) {
            value = value.slice(0, 11); // Limit input to 11 characters (CPF length)
        }
        if (value.length > 9) {
            value = value.slice(0, 9) + '-' + value.slice(9); // Format as "000.000.000-00"
        }
        if (value.length > 6) {
            value = value.slice(0, 6) + '.' + value.slice(6); // Format as "000.000.000-00"
        }
        if (value.length > 3) {
            value = value.slice(0, 3) + '.' + value.slice(3); // Format as "000.000.000-00"
        }
    } else if (docType === 'CNPJ') {
        if (value.length > 14) {
            value = value.slice(0, 14); // Limit input to 14 characters (CNPJ length)
        }
        if (value.length > 12) {
            value = value.slice(0, 2) + '.' + value.slice(2, 5) + '.' + value.slice(5, 8) + '/' + value.slice(8, 12) + '-' + value.slice(12); // Format as "00.000.000/0000-00"
        }
    }

    input.value = value;
}

// Selecionando os elementos relevantes da página
const creditCardPaymentCard = document.querySelector('[for="card"]');
const paymentDetailsContainer = document.querySelector('.payment-details-container');

// Adicionando um ouvinte de evento para o card de Cartão de Crédito
creditCardPaymentCard.addEventListener('click', function() {
    paymentDetailsContainer.style.display = 'block'; // Mostra o container de detalhes do pagamento
});

// Função que é chamada quando o método de pagamento é alterado
function handlePaymentMethodChange() {
    const paymentMethodRadios = document.querySelectorAll('input[name="payment-modes"]');
    
    paymentMethodRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (radio.id === 'card') {
                paymentDetailsContainer.style.display = 'block'; // Mostra o container de detalhes do pagamento
            } else {
                paymentDetailsContainer.style.display = 'none'; // Oculta o container de detalhes do pagamento
            }
        });
    });
}

// Chama a função para lidar com a mudança inicial do método de pagamento
handlePaymentMethodChange();
