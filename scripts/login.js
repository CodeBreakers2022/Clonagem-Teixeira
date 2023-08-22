
const form = document.getElementById("form");
const email = document.getElementById("email");
const senha = document.getElementById("password");

form.addEventListener("submit", (event) => {
    event.preventDefault();
    checkForm();
})


email.addEventListener("blur", () => {
    chekInputEmail();
})

password.addEventListener("blur", () => {
    checkInputPassword();
})


function chekInputEmail() {
    const emailValue = email.value;

    if (emailValue === "") {
        errorInput(email, "O e-mail e obrigatório!")
    } else {
        const formItem = email.parentElement;
        formItem.className = "form-content"
    }
}


function checkInputPassword() {
    const passwordValue = password.value;

    if (passwordValue === "") {
        errorInput(password, "A senha é obrigatória!")
    } else if (passwordValue.length < 8) {
        errorInput(password, "A senha precisa ter no mínimo 8 caracteres!")
        const formItem = password.parentElement;
        formItem.className = "form-content"
    }
}

function checkForm() {
    chekInputEmail();
    checkInputPassword();

    const formItem = form.querySelectorAll(".form-content")

    const isvalid = [...formItems].every((item) => {
        return item.className === "form-content"
    });

    if (isvalid) {
        alert("CADASTRADO COM SUCESSO")
    }

}

function errorInput(input, message) {
    const formItem = input.parentElement;
    const textMessage = formItem.querySelector("a")

    textMessage.innerText = message;

    formItem.className = "form-content error"
}
