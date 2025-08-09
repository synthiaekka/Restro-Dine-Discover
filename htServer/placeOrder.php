<?php
    session_start();

    // if the user is not signed in, then this page is not accessible
    if (!isset($_SESSION['user_email']) || $_SESSION['user_email'] == '') { 
       
        echo "user is not logged in";
        die();
    }


    $user_email = $_SESSION['user_email'];
    $rest_id = $_POST['restaurant-id'];

    $foods = explode("-", $_POST['food-list']);

    array_shift($foods);

    // get the form data
    $order_date = $_POST['order_date'];
    $order_time = $_POST['order_time'];
    $num_of_people = $_POST['num_of_people'];
    
    // establish connection
    include_once("./connection.php");

    $sql = "INSERT INTO `bookings`(`food_id`, `rest_id`, `cust_email`, `order_date`, `order_time`, `people`) VALUES ('','','','','','')";

    foreach ($foods as $id) {
    $order_time = $_POST['order_time'];
    $sql = "INSERT INTO `bookings`(`food_id`, `rest_id`, `cust_email`, `order_date`, `order_time`, `people`) VALUES ('$id','$rest_id','$user_email','$order_date','$order_time','$num_of_people')";

        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    echo "<html><script> alert('Order placed successfully'); window.location.href = 'http://localhost';</script></html>";
    
    mysqli_close($conn);

