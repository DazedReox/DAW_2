document.addEventListener("DOMContentLoaded", function () {
    //menu
    const menuToggle = document.getElementById("menu-toggle");
    const navMenu = document.getElementById("nav-menu");

    if (menuToggle && navMenu) {
        menuToggle.addEventListener("click", function () {
            navMenu.classList.toggle("active");
        });
    }

    //confirmacion antes de nada
    const deleteButtons = document.querySelectorAll(".delete-btn");
    deleteButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            if (!confirm("¿Estás seguro de que deseas eliminar esto?")) {
                event.preventDefault();
            }
        });
    });

    const cartForms = document.querySelectorAll(".cart-update-form");
    cartForms.forEach(form => {
        form.addEventListener("submit", function (event) {
            event.preventDefault();
            
            const formData = new FormData(form);
            fetch(form.action, {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert("Error al actualizar el carrito");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});