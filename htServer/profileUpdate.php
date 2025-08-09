<?php
    session_start();

    // if the user is not signed in, then this page is not accessible
    if (!isset($_SESSION['user_email']) || $_SESSION['user_email'] == '') { 
       
        echo "user is not logged in";
        die();
    }


    $user_email = $_SESSION['user_email'];


    // establish connection to database
    include_once("./connection.php");

    
    // get all the form data
    $user_name = $_POST['name'];
    $user_phone = $_POST['phone'];



    // validate the information
    // validate the name
    if (strlen($user_name) < 3 || strlen($user_name) > 50) {

        header("location: http://localhost/profile.php?error=The length of the name cannot be less than 3 or more than 50");
        die();
    
    } else if ( !preg_match("/^[a-zA-Z\s]+$/",$user_name) ) {
    
        header("location: http://localhost/profile.php?error=Only alphabetical letters and space are allowed in name");
        die();
        
    }

    // validate the phone number
    if(!preg_match('/^[0-9]{10}+$/', $user_phone)) {
        header("location: http://localhost/profile.php?error=Enter a correct phone number"); 
        die();
     }

    // sql to update phone and name
    $sql = "UPDATE `customer` SET `phone`='$user_phone',`name`='$user_name' WHERE `email` = '$user_email' ";
    
    $result = $conn->query($sql);

    // if not successfully updated, refresh the page with errors
    if ($result !== TRUE) {
        header("location: http://localhost/profile.php?error=Update phone and name failed");

        // kill the remaining process of this file
        die();
    }
    
    
    
    
    
    
    
    
    
    
    
    // if anything goes wrong above, the code will not reach here, die() function is used for this purpose
    // if everything above seems ok, refresh the page
    header("location: http://localhost/profile.php");
    
    
    
    // $sql = "SELECT * FROM customer WHERE email = '$user_email' ";
    
    // $result = $conn->query($sql);
    
    // if ($result->num_rows > 0) {
    
    //     while($row = mysqli_fetch_assoc($result))   {
    
    //         $user_name = $row['name'];
    
    //         $user_phone = $row['phone'];
    //     }
    
    // } else {
    //     header("location: http://localhost/"); 
    //         die();
    // }
    
    
    $conn->close();
    
