const togglePassword = document.querySelector('#togglePassword');

const password = document.querySelector('#password');

const iconTP = document.querySelector('#iconTogglePassword');

togglePassword.addEventListener('click', () => {

    // Toggle the type attribute using
    // getAttribure() method
    const type = password.getAttribute('type') ===
        'password' ?
        'text' : 'password';
            
    password.setAttribute('type', type);

    // getAttribure() method
    const icon = iconTP.classList[1] ===
        'bi-eye-fill' ?
        'bi-eye-slash-fill' : 'bi-eye-fill';
            
    iconTP.classList.toggle("bi-eye-slash-fill");
    iconTP.classList.toggle("bi-eye-fill");
});