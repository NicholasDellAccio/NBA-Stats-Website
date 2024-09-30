const form = document.querySelector('.form');
const msg = document.querySelector('.msg');

form.addEventListener('submit', isValid);

function isValid(e) {
    e.preventDefault();

    let user = document.getElementById('user').value.trim();
    let pass = document.getElementById('pass').value.trim();
    let errorMsg = "";


    msg.innerHTML = "";

    if (user.length === 0 && pass.length === 0) {
        errorMsg = "Both fields are empty!";
    } else if (user.length === 0) {
        errorMsg = "Username field is empty!";
    } else if (pass.length === 0) {
        errorMsg = "Password field is empty!";
    }

    if (errorMsg) {
        msg.innerHTML = errorMsg;
        msg.style.display = 'block';
        setTimeout(() => msg.style.display = 'none', 5000);
    } else {
        form.submit();
    }
}
document.addEventListener('DOMContentLoaded', function() {
    const errorMsg = document.getElementById('errorMsg').value;
    const msgDiv = document.querySelector('.msg');
    
    
    if (errorMsg) {
        msgDiv.innerHTML = errorMsg;
        msgDiv.style.display = 'block';
        setTimeout(() => msg.style.display = 'none', 3000);
    }
});

