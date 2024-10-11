document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        const password = document.querySelector('input[name="password"]').value;
        if (password.length < 6) {
            event.preventDefault();
            alert('La contraseña debe tener al menos 6 caracteres');
        }
    });
});
