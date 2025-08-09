<?php
/*
1. get the form data 
2. validate 
3. establish connection
4. check if the user given value is found in the database
*/



// this part is for login as user
if ($_POST['login'] == 'login_user') {


    $email = $_POST['login-email'];
    $password = $_POST['login-password'];
    
    
    //validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: http://localhost/login.php?error=Email must be in proper format");
        die();
    }
    
    // validate password
    if(!empty($password)) {
        if (strlen($password) <= 8) {
            header("location: http://localhost/login.php?error=Your Password Must Contain At Least 8 Characters!"); 
            die();
        }
    } else {
        header("location: http://localhost/login.php?error=Your Password Must Contain At Least 8 Character!"); 
            die();
    }
    
    
    
    // establish connection to database
    include_once("./connection.php");
    
    
    $sql = "SELECT * FROM customer WHERE email = '$email' AND password = '$password' ";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    
        session_start();
    
        $_SESSION['user'] = 'active';
        $_SESSION['user_email'] = $email;
    
        header("location: http://localhost/"); 
            die();
    
    } else {
        header("location: http://localhost/login.php?error=Incorrect email or password"); 
            die();
    }
    
    
    $conn->close();


}


elseif ($_POST['login'] == 'login_manager') {


    // get the user email and password
    $email = $_POST['login-email'];
    $password = $_POST['login-password'];



    //validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: http://localhost/login.php?error=Email must be in proper format");
        die();
    }
    
    // validate password
    if(!empty($password)) {
        if (strlen($password) <= 8) {
            header("location: http://localhost/login.php?error=Your Password Must Contain At Least 8 Characters!"); 
            die();
        }
    } else {
        header("location: http://localhost/login.php?error=Your Password Must Contain At Least 8 Character!"); 
            die();
    }


    //establish connection to database
    include_once("./connection.php");

    $sql = "SELECT * FROM customer WHERE email = '$email' AND password = '$password' ";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    
        session_start();

        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['user'] = 'active';
            $_SESSION['user_email'] = $email;
            $_SESSION['user_id'] = $row['id'];
        }

        
        $user_id = $_SESSION['user_id'];


        
    

        // check if the user has any restaurant or not
        $sql = "SELECT * FROM `restaurant` WHERE `manager` = '$user_id' ";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = mysqli_fetch_assoc($result) ) {
                $_SESSION['rest_id'] = $row['id'];

                $rest_id = $_SESSION['rest_id'];
            }

            header("location: http://localhost/manager.php");
            die();
        }

        else {
            // the user is valid but he doesn't have any restaurant
            header("location: http://localhost/login.php?error=You do not own any restaurant, Please login as a user"); 
            die();
        }
    
    } else {
        header("location: http://localhost/login.php?error=Incorrect email or password"); 
        die();
    }
    
    
    $conn->close();
    
}


