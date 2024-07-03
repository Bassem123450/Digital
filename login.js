document.addEventListener("DOMContentLoaded", function() {
    const toggleLogin = document.getElementById("toggleLogin");
    const toggleRegister = document.getElementById("toggleRegister");
    const registrationForm = document.getElementById("registrationForm");
    const loginForm = document.getElementById("loginForm");

    // Show registration form, hide login form
    toggleRegister.addEventListener("click", function(event) {
        event.preventDefault();
        registrationForm.style.display = "block";
        loginForm.style.display = "none";
    });

    // Show login form, hide registration form
    toggleLogin.addEventListener("click", function(event) {
        event.preventDefault();
        loginForm.style.display = "block";
        registrationForm.style.display = "none";
    });

    // Handle registration form submission
    registrationForm.addEventListener("submit", function(event) {
        event.preventDefault();
        // Perform registration logic here (e.g., send data to server)
        console.log("Registration form submitted.");
        // Optionally, redirect user to another page after successful registration
    });

    // Handle login form submission
    loginForm.addEventListener("submit", function(event) {
        event.preventDefault();
        // Perform login logic here (e.g., send data to server)
        console.log("Login form submitted.");
        // Optionally, redirect user to another page after successful login
    });
});
