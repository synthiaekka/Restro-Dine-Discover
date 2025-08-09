<?php
    session_start();

    // if the user is not signed in, then this page is not accessible
    if (!isset($_SESSION['user_email']) || $_SESSION['user_email'] == '') { 
       
        header("location: http://localhost/");
        die();
    }


    $user_email = $_SESSION['user_email'];


    // establish connection to database
    include_once("./htServer/connection.php");

$sql = "SELECT * FROM customer WHERE email = '$user_email' ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = mysqli_fetch_assoc($result))   {

        $user_name = $row['name'];

        $user_phone = $row['phone'];
    }

} else {
    header("location: http://localhost/"); 
        die();
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <link rel="stylesheet" href="css/profile.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            PROFILE
        </h4>

        <?php 

            if (isset($_GET['error']) && $_GET['error'] != '') {
                $error = $_GET['error'];
                echo "
                <div class='col-md-9'>
                    <div class='alert alert-warning mt-3'>
                        <ul>
                            <li> $error </li>
                        </ul>
                    </div>
                </div>
                ";
            }

        ?>
        
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <!--<a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#restaurants-info">My Restarurants</a>-->
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#my-reviews">My Reviews</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">My Orders</a>
                        <a class="list-group-item list-group-item-action"
                            href="./htServer/logout.php">Log Out</a>
                    </div>
                </div>

                
                
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <!-- <div class="card-body media align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> -->
                            <hr class="border-light m-0">
                            <form class="card-body"  method="POST" action="./htServer/profileUpdate.php">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control mb-1" value="<?php echo "$user_email"; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" value="<?php echo "$user_name"; ?>" name="name">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="number" class="form-control mb-1" value="<?php echo "$user_phone"; ?>" name="phone">
                                    <!-- <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div> -->
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <form class="card-body pb-2" method="POST" action="./htServer/changePassword.php">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" class="form-control" name="currentpswd">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" class="form-control" name="newpswd">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control" name="renewpswd">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="restaurants-info">
                            <div class="card-body pb-2">
                                <ul class="list-group">
                                <li class="list-group-item"><a href="" class="btn btn-info">Add new Restaurant</a></li>

                                    <?php
                                        // get all the restaurants managed by the user

                                        $sql = "SELECT * FROM customer WHERE email = '$user_email' ";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {

                                            while($row = mysqli_fetch_assoc($result))   {

                                                $user_id = $row['id'];


                                                // get all the restaurants owned by the current user

                                                $sql2 = "SELECT * FROM restaurant WHERE manager = $user_id"; 

                                                $result2 = $conn->query($sql2);

                                                if ($result2->num_rows > 0) {

                                                    while($row2 = mysqli_fetch_assoc($result2)) {

                                                        $rest_id = $row2['id'];
    
                                                        $rest_name = $row2['Res_name'];
                                                        
                                                        echo " <li class='list-group-item'> $rest_name  <a href='./restaurant.php?id=$rest_id' class='btn btn-primary'>Manage</a> <a href='./deleteRestaurant.php?id=$rest_id' class='btn btn-danger'>Remove</a></li>";
                                                        
                                                    } 

                                                } else {
                                                    echo '<li class="list-group-item">No Restaurants Found </li>';
                                                }

                                                
                                                
                                            }

                                        } else {
                                           
                                        }
                                        
                                        
                                        
                                    ?>
                                    
                                </ul>

                               
                            </div>
                        </div>

                        <div class="tab-pane fade" id="my-reviews">
                            <ul class="list-group">
                                

                                <?php
                                    // get all the restaurants managed by the user

                                    $sql = "SELECT * FROM customer WHERE email = '$user_email' ";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {

                                        while($row = mysqli_fetch_assoc($result))   {

                                            $user_id = $row['id'];

                                            $rest_name = 'Not Found';


                                            // get all the reviews made by the user

                                            $sqll = "SELECT * FROM reviews WHERE cust_id = '$user_id' ";

                                            $resultl = $conn->query($sqll);

                                            if ($resultl->num_rows > 0) {

                                                while($rowl = mysqli_fetch_assoc($resultl)) {

                                                    $rest_id = $rowl['rest_id'];

                                                    $review_id = $rowl['id'];

                                                    $review = $rowl['review'];

                                                    $s = "SELECT * FROM restaurant WHERE id = '$rest_id' ";

                                                    $r= $conn->query($s);

                                                    while($ro = mysqli_fetch_assoc($r)) {
                                                        $rest_name = $ro['Res_name'];

                                                        echo "<li class='list-group-item'>
                                                                    <span class='h5'> $rest_name : </span> $review
                                                                    <a href='./deleteReview.php?id=$review_id' class='btn btn-danger'>delete</a>
                                                                </li>";
                                                     }
                                                }



                                            } else {

                                                echo "<li class='list-group-item'>No Reviews Found</li>";

                                            }

                                           
                                            
                                        }

                                    } else {
                                        
                                    }
                                    
                                    
                                    
                                ?>

                            </ul>
                        </div>


                        <div class="tab-pane fade" id="account-connections">
                            <ul class="list-group">

                          <?php 
                                 // get all the active orders

                                 $sql = "SELECT * FROM bookings WHERE cust_email = '$user_email' ";

                                 $result = $conn->query($sql);

                                 if ($result->num_rows > 0) {

                                     while($row = mysqli_fetch_assoc($result))   {
                                         
                                        $food_id = $row['food_id'];
                                        $rest_id = $row['rest_id'];

                                        $food_name = '';
                                        $rest_name = '';
                                         $order_date = $row['order_date'];
                                        $order_time = $row['order_time'];
                                        $people = $row['people'];

                                         


                                        //  get the food name
                                        $food_sql = "SELECT * FROM food WHERE id = $food_id";
                                        $food_result = $conn->query($food_sql);

                                        if ($food_result->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($food_result)) {
                                                $food_name = $row['name'];
                                                
                                            }
                                        }

                                        // get the Restaurant name
                                        $food_sql = "SELECT * FROM restaurant WHERE id = $rest_id";
                                        $food_result = $conn->query($food_sql);

                                        if ($food_result->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($food_result)) {
                                                $rest_name = $row['Res_name'];
                                            }
                                        }


                                        // now we have got, food and restaurant name

                                        echo "<li class='list-group-item'>
                                                <span class='h5'> $rest_name : </span> $food_name &emsp; Date: $order_date &emsp; Time: $order_time &emsp; People: $people
                                            </li>";
                                        
                                     }

                                 } 

                            ?>
                        
                         <?php /*
                           //trying
                                    // get all the active orders
                                    $sql = "SELECT * FROM bookings WHERE cust_email = '$user_email' ";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            $food_id = $row['food_id'];
                                            $rest_id = $row['rest_id'];
                                            $order_date = $row['order_date'];  // Assuming there is a column named 'order_date' in your 'bookings' table

                                            $food_name = '';
                                            $rest_name = '';

                                            // get the food name
                                            $food_sql = "SELECT * FROM food WHERE id = $food_id";
                                            $food_result = $conn->query($food_sql);

                                            if ($food_result->num_rows > 0) {
                                                while ($row = mysqli_fetch_assoc($food_result)) {
                                                    $food_name = $row['name'];
                                                }
                                            }

                                            // get the Restaurant name
                                            $rest_sql = "SELECT * FROM restaurant WHERE id = $rest_id";
                                            $rest_result = $conn->query($rest_sql);

                                            if ($rest_result->num_rows > 0) {
                                                while ($row = mysqli_fetch_assoc($rest_result)) {
                                                    $rest_name = $row['Res_name'];
                                                }
                                            }

                                            // now we have got, food and restaurant name

                                            echo "<li class='list-group-item'>
                                                    <span class='h5'> $rest_name : </span> $food_name
                                                    <br> Ordered on: $order_date
                                                </li>";
                                        }
                                    } */
                                ?>



                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>


<?php $conn->close(); ?>