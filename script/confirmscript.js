//Saves and validate subscribe email
function saveEmail() {
    let validMail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    let inputEmail = document.getElementById('subEmail').value;
    let displayEmail = document.getElementById('emailConfirm');
    if (inputEmail.match(validMail)) {
        displayEmail.style.color = "Green";
        displayEmail.innerText = inputEmail + " has been added to our email list.";
    } else {
        displayEmail.style.color = "red";
        displayEmail.innerText = "Please provide us valid email.";
    }

}