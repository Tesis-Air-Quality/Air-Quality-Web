// Para el primer campo de contraseña
var outer_eye = document.querySelector(".passcode");
var eye = document.querySelector(".passcode");
var input = document.querySelector("#password-input");

outer_eye.addEventListener('click', function () {
    if (input.type === 'password') {
        input.type = "text";
        eye.classList.remove('fa-eye-slash');
        eye.classList.add('fa-eye');
        input.classList.add('warning');
    } else {
        input.type = "password";
        eye.classList.remove('fa-eye');
        eye.classList.add('fa-eye-slash');
        input.classList.remove('warning');
    }
});

// Para el segundo campo de contraseña
var outer_eye2 = document.querySelector(".passcode2");
var eye2 = document.querySelector(".passcode2");
var input2 = document.querySelector("#password-input2");

outer_eye2.addEventListener('click', function () {
    if (input2.type === 'password') {
        input2.type = "text";
        eye2.classList.remove('fa-eye-slash');
        eye2.classList.add('fa-eye');
        input2.classList.add('warning');
    } else {
        input2.type = "password";
        eye2.classList.remove('fa-eye');
        eye2.classList.add('fa-eye-slash');
        input2.classList.remove('warning');
    }
});
