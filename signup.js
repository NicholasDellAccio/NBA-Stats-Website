const form = document.querySelector('.form');
const msg = document.querySelector('.msg');
form.addEventListener('submit', isvalid);

function isvalid(e) {
    e.preventDefault(); 
    

    var user = document.getElementById('user').value;
    var name = document.getElementById('name').value;
    var state = document.getElementById('state').value;
    var pass = document.getElementById('pass').value;

    msg.innerHTML = ""; 

    
    let isValid = true; 
    if (user.length === 0) {
        msg.innerHTML += "Username is empty!!! ";
        isValid = false; 
    } 
    if (name.length === 0) {
        msg.innerHTML += "Name is empty!!! ";
        isValid = false;
    } 
    if (state.length === 0) {
        msg.innerHTML += "State is empty!!! ";
        isValid = false;
    } 
    if (pass.length === 0) {
        msg.innerHTML += "Password is empty!!! ";
        isValid = false;
    } 

    if (isValid) {
        form.submit(); 
    }
    else{
        msg.style.display = "block";
        setTimeout(() => msg.style.display = 'none', 3000);
    }

}
