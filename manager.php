<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/manager.css">
    <title>Manager's Homepage</title>
    <script src="js/manager.js"></script>

</head>
<body>

    <header>
        <h1>Manager's Dashboard</h1>
    </header>

    <section>
        <h2>Reservation Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Party Size</th>
                    <th>Food Order</th>
                    <th>Order Completion</th>
                </tr>
            </thead>
            <tbody>
                <!-- Placeholder data, replace with actual data from the database 
                <tr>
                    <td>John Doe</td>
                    <td>john@example.com</td>
                    <td>123-456-7890</td>
                    <td>2023-11-25</td>
                    <td>18:30</td>
                    <td>4</td>
                    <td>Pasta, Salad, Water</td>
                </tr>
                
               Add more rows as needed -->

                <?php 
                    $user_id = $_SESSION['user_id'];
                    $rest_id = $_SESSION['rest_id'];

                    include_once("./htServer/connection.php");

                    $sql = "SELECT * FROM `bookings` WHERE `rest_id` = '$rest_id' && `completed` = 0";
                    
                    $result = $conn->query($sql);


                    if ($result->num_rows > 0) {

                        while ($row = mysqli_fetch_assoc($result) ) {
                            $bookingId = $row['id'];

                            $cust_email = $row['cust_email'];
                            $order_date = $row['order_date'];
                            $order_time = $row['order_time'];
                            $party_size = $row['people'];
                            $food_id = $row['food_id'];
                            
                            
                            $user_query = "SELECT * FROM `customer` WHERE `email` = '$cust_email' ";
                            
                            $user = $conn->query($user_query);

                            while ($user_row = mysqli_fetch_assoc($user)) {
                                $user_name = $user_row['name'];
                                $user_phone = $user_row['phone'];

                            }

                            $food_query = "SELECT * FROM `food` WHERE `id` = '$food_id' ";

                            $food = $conn->query($food_query);

                            while ($food_row = mysqli_fetch_assoc($food) ) {
                                $food_name = $food_row['name'];
                            }
                            
                            echo "
                            <tr>
                                <td> $user_name </td>
                                <td> $cust_email </td>
                                <td> $user_phone </td>
                                <td> $order_date </td>
                                <td> $order_time </td>
                                <td> $party_size </td>
                                <td> $food_name </td>
                                <td> <a href='./completeOrder?id=$bookingId'>Order Completed</a> </td>
                            </tr>
                            ";
                        }
                    }
                ?>
                
            </tbody>
        </table>

        <h2>Real-time Booking Notifications</h2>
        <!-- Placeholder for real-time notifications -->
        <div id="notifications"></div>
        <button onclick="goToManagementTable()">Go to Management Table</button>
    </section>
    <script>
        // Function to go to Management Table
        function goToManagementTable() {
            window.location.href = "tablem.html"; // Adjust the path accordingly
        }
        
        // Function to go back to the previous page (you can use this function for the "Go Back" button as well)
        function goBack() {
            window.history.back();
        }
    </script>

</body>
</html>



  


