// Step 1 - Get the reference of input elements

let form = document.querySelector("#form");
let userName = document.querySelector("#userName");
let userEmail = document.querySelector("#userEmail");
let userPassword = document.querySelector("#userPassword");
let userConfirmPassword = document.querySelector("#userConfirmPassword");


// Step 2 - From Submit Event Handling

form.addEventListener("submit", e => {
    e.preventDefault();

    validateInputs();

});

// Step 3 - Validate Input Fields

function validateInputs() {

    const name = userName.value.trim();
    const email = userEmail.value.trim();
    const password = userPassword.value.trim();
    const confirmPassword = userConfirmPassword.value.trim();


    // name validation
    if (name === "") {
        setError(userName, "User Name is Required");
    } else {
        SetSuccess(userName);
    }

    // email validation
    if (email === "") {
        setError(userEmail, "User email is Required");
    } else if (!isValidEmail(email)) {
        setError(email, "Provide a valid email address");
    }
    else {
        SetSuccess(userEmail);
    }

    // password validation
    if (password === "") {
        setError(userPassword, "User password is Required");
    } else if (password.length < 8) {
        setError(userPassword, "Password must be at least 8 character.");
      }
    else {
        SetSuccess(userPassword);
    }

    // Confirm Password validation
    if (confirmPassword === "") {
        setError(userConfirmPassword, "User Confirm Password is Required");
    }else if(confirmPassword !== password){
        setError(userConfirmPassword, "Password doesn't match");
    } else {
        SetSuccess(userConfirmPassword);
    }



}

// Step 4 - Display Error Messages

function setError(elements, messages) {
    const inputControl = elements.parentElement;
    const errorDisplay = inputControl.querySelector(".error");

    errorDisplay.innerText = messages;

    inputControl.classList.add("error");
    inputControl.classList.remove("success");

}

// Step 4 - Display Success Messages

function SetSuccess(elements) {
    const inputControl = elements.parentElement;
    const errorDisplay = inputControl.querySelector(".error");

    errorDisplay.innerText = "";

    inputControl.classList.add("success");
    inputControl.classList.remove("error");
}


function isValidEmail(elements) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(elements).toLowerCase());
}