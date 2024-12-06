document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registrationForm');

    form.addEventListener('submit', function (event) {
        const nombre = document.getElementById('nombre_usuario').value.trim();
        const apellido = document.getElementById('apellido_paterno').value.trim();
        const telefono = document.getElementById('telefono').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        let isValid = true;

        // Validación de nombre
        if (nombre === '') {
            document.getElementById('nombreError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('nombreError').style.display = 'none';
        }

        // Validación de apellido
        if (apellido === '') {
            document.getElementById('apellidoError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('apellidoError').style.display = 'none';
        }

        // Validación de teléfono
        if (!/^\d{10}$/.test(telefono)) {
            document.getElementById('telefonoError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('telefonoError').style.display = 'none';
        }

        // Validación de correo
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            document.getElementById('emailError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('emailError').style.display = 'none';
        }

        // Validación de contraseña
        if (password.length < 6) {
            document.getElementById('passwordError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('passwordError').style.display = 'none';
        }

        // Validación de confirmación de contraseña
        if (password !== confirmPassword) {
            document.getElementById('confirmPasswordError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('confirmPasswordError').style.display = 'none';
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
});
