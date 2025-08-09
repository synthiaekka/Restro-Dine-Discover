function login(event) {
    event.preventDefault();

    // Get username and password from the form
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Replace this with actual authentication logic
    if (username === 'admin' && password === 'admin123') {
        alert('Login successful! Redirecting to admin dashboard.');
        // Redirect to the admin dashboard
        window.location.href = 'admin-dashboard.html';
    } else {
        alert('Invalid username or password. Please try again.');
    }
}

