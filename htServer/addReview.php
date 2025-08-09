<?php
    session_start();

    // if the user is not signed in, then this page is not accessible
    if (!isset($_SESSION['user_email']) || $_SESSION['user_email'] == '') { 
       
        echo "user is not logged in";
        die();
    }

    // get all the form values
    $user_email = $_SESSION['user_email'];
    $rest_id = $_POST['restaurantId'];
    $review = $_POST['review'];
    $stars = $_POST['stars'];
    $cust_id = 0;


         // establish connection
        include_once("./connection.php");

        // get the customer id
        $sql = "SELECT * FROM `customer` WHERE `email` = '$user_email'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $cust_id = $row["id"];
            }
        }

       
        $sql = "INSERT INTO `reviews`(`review`, `stars`, `cust_id`, `rest_id`) VALUES ('$review','$stars','$cust_id','$rest_id')";

        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        echo "<html><script> alert('Review placed successfully'); window.location.href = 'http://localhost';</script></html>";
        
        mysqli_close($conn);
