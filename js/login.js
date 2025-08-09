window.addEventListener('resize', function() {
    const loginForm = document.getElementById("login-form");
    const signupForm = document.getElementById("signup-form");

    if (window.innerWidth <= 768) {
        loginForm.style.display = "block";
        signupForm.style.display = "block";
    } else {
        loginForm.style.display = "block";
        signupForm.style.display = "none";
    }
});

const switchToSignup = document.getElementById("switch-to-signup");
const switchToLogin = document.getElementById("switch-to-login");

switchToSignup.addEventListener("click", function (e) {
    e.preventDefault();
    const loginForm = document.getElementById("login-form");
    const signupForm = document.getElementById("signup-form");

    if (window.innerWidth <= 768) {
        loginForm.style.display = "none"; // Hide the login form
        signupForm.style.display = "block"; // Show the signup form
    } else {
        loginForm.style.display = "none"; // Hide the login form
        signupForm.style.display = "block"; // Show the signup form
    }
});

switchToLogin.addEventListener("click", function (e) {
    e.preventDefault();
    const loginForm = document.getElementById("login-form");
    const signupForm = document.getElementById("signup-form");

    if (window.innerWidth <= 768) {
        loginForm.style.display = "block"; // Show the login form
        signupForm.style.display = "none"; // Hide the signup form
    } else {
        loginForm.style.display = "block"; // Show the login form
        signupForm.style.display = "none"; // Hide the signup form
    }
});
