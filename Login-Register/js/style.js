document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('showPassword').addEventListener('change', function() {
        let passwordInput = document.getElementById('password');
        passwordInput.type = this.checked ? 'text' : 'password';
    });
});