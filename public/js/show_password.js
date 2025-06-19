const password_input = document.getElementById('password');
const confirm_input = document.getElementById('password_confirm');
const checkbox = document.getElementById('show');

checkbox.addEventListener('change', () => {
    if (checkbox.checked) {
        if (password_input) { password_input.type = 'text'; }
        if (confirm_input) { confirm_input.type = 'text'; }
    } else {
        if (password_input) { password_input.type = 'password'; }
        if (confirm_input) { confirm_input.type = 'password'; }
    }
})