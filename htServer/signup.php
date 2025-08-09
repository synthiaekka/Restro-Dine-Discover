<?php

/**
 * 1. validate the phone number
 * 2. validate the email
 * 3. validate the password
 * 
 * 
 * Establish connection 
 * check if similar record already exists
 * if everything is ok, then enter the record
 * 
 * 
 */


$name = $_POST['fullname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['signup-password'];

// validate the information
if (strlen($name) < 3 || strlen($name) > 50) {

    header("location: http://localhost/login.php?error=The length of the name cannot be less than 3 or more than 50&from=signup");
    die();

} else if ( !preg_match("/^[a-zA-Z\s]+$/",$name) ) {

    header("location: http://localhost/login.php?error=Only alphabetical letters and space are allowed in name&from=signup");
    die();
    
}

// validate the phone number 
if(!preg_match('/^[0-9]{10}+$/', $phone)) {
   header("location: http://localhost/login.php?error=Enter a correct phone number&from=signup"); 
   die();
}

//validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("location: http://localhost/login.php?error=Enter a valid email format&from=signup"); 
   die();
}

//validate password
if(!empty($password)) {
    if (strlen($password) <= 8) {
        header("location: http://localhost/login.php?error=Your Password Must Contain At Least 8 Characters!&from=signup"); 
        die();
    }
} else {
    header("location: http://localhost/login.php?error=Your Password Must Contain At Least 8 Character!&from=signup"); 
        die();
}


















//  if everything  is ok, execution reaches here


// Make a connection to the database

$servername = "localhost";
$username = "root";
$mysqlpassword = "";
$dbname = "final";

// Create connection
$conn = new mysqli($servername, $username, $mysqlpassword, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// check if similar record already exist
$sql = "SELECT * FROM customer WHERE email = '$email' ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    header("location: http://localhost/login.php?error=The email is already registered, please use another email address&from=signup"); 
    die();

}




$sql = "INSERT INTO customer (name, phone, email, password)
VALUES ('$name', '$phone', '$email', '$password')";

if (mysqli_query($conn, $sql)) {

    header("location: http://localhost/login.php?error=Signup successful, please login");
  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);