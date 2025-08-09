<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page Selection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Login Page Selection</h1>
    
    <button onclick="redirectToManagerLogin()">Manager Login</button>
    <button onclick="redirectToUserLogin()">User Login</button>

    <script>
        function redirectToManagerLogin() {
            window.location.href = 'manager-login.php'; // Replace with the actual URL of your manager login page
        }

        function redirectToUserLogin() {
            window.location.href = 'login.php'; // Replace with the actual URL of your user login page
        }
    </script>
</body>
</html>
