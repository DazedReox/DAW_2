function validateField(field) {
    if (field.value.trim() === "") {
        field.style.borderColor = "red";
        return false;
    } else {
        field.style.borderColor = "#ccc";
        return true;
    }
}

function validatePassword(password) {
    if (password.value.length < 8) {
        password.style.borderColor = "red";
        return false;
    } else {
        password.style.borderColor = "#ccc";
        return true;
    }
}

function confirmPassword(password, confirmPassword) {
    if (password.value !== confirmPassword.value) {
        confirmPassword.style.borderColor = "red";
        return false;
    } else {
        confirmPassword.style.borderColor = "#ccc";
        return true;
    }
}

document.getElementById("loginForm")?.addEventListener("submit", function(event) {
    const username = document.getElementById("username");
    const password = document.getElementById("password");

    if (!validateField(username) || !validateField(password)) {
        event.preventDefault();
        alert("Por favor, completa todos los campos.");
    }
});

document.getElementById("registerForm")?.addEventListener("submit", function(event) {
    const username = document.getElementById("username");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirmPassword");

    if (!validateField(username) || !validatePassword(password) || !confirmPassword(password, confirmPassword)) {
        event.preventDefault();
        alert("Por favor, asegúrate de que todos los campos sean correctos.");
    }
});

document.getElementById("searchForm")?.addEventListener("submit", function(event) {
    const searchTerm = document.getElementById("search");

    if (searchTerm.value.trim() === "") {
        event.preventDefault();
        alert("Por favor, ingresa un término de búsqueda.");
    }
});

function confirmDelete(entity) {
    const confirmation = confirm(`¿Estás seguro de que deseas eliminar este ${entity}?`);
    return confirmation;
}

const deleteButtons = document.querySelectorAll('.delete-button');
deleteButtons.forEach(button => {
    button.addEventListener("click", function(event) {
        const entity = event.target.dataset.entity;
        if (!confirmDelete(entity)) {
            event.preventDefault();
        }
    });
});
