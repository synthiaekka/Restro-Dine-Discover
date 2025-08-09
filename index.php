<?php

session_start();

// include the connection file
include_once ("./htServer/connection.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restaurant</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <input type="checkbox" name="" id="">
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#food">Restaurant</a></li>
                <li><a href="#food-menu">Menu</a></li>

                <?php if (isset($_SESSION['user_email']) && $_SESSION['user_email'] != '') { 

                echo "<li><a href='profile.php'>Profile</a></li>";

                }
                else {
                    echo "<li><a href='login.php'>Login</a></li>";
                }

                ?>    

            </ul>

            <h1 class="logo">D&D</h1>
        </div>
    </nav>
    <section class="showcase-area" id="showcase">
        <div class="showcase-container">
            <h1 class="main-title" id="home">Restro - Dine and Discover</h1>
            <p>Eat Healthy, at the right Place.</p>
            
        </div>
    </section>

    <section id="about">
        <div class="about-wrapper container">
            <div class="about-text">
                <p class="small">About Us</p>
                <h2>We've been serving people for last for 10 years</h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse ab
                    eos omnis, nobis dignissimos perferendis et officia architecto,
                    fugiat possimus eaque qui ullam excepturi suscipit aliquid optio,
                    maiores praesentium soluta alias asperiores saepe commodi
                    consequatur? Perferendis est placeat facere aspernatur!
                </p>
            </div>
            <div class="about-img">
                <img src="./images/restaurant_about.jpg" alt="food" />
            </div>
        </div>
    </section>
    <section id="food">
        <h2>Restaurants</h2>
        <div class="food-container container">

<?php

// get random restaurants 


$sql = "SELECT * FROM restaurant ORDER BY RAND() LIMIT 3";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = mysqli_fetch_assoc($result))
    {
       echo '
       <div class="food-type fruit">
           <div class="img-container">
               <img src="'. $row['image'] .'" alt="error" />
               <div class="img-content">
                   <h3>'. $row['Res_name'] .'</h3>
                   <a href="table.php?restaurant='.$row['id'].'" class="btn btn-primary">Book Table</a>
               </div>
           </div>
       </div>';
    }

}




?>
            <!--
            <div class="food-type grin">
                <div class="img-container">
                    <img src="./images/restaurant3.jpg" alt="error" />
                    <div class="img-content">
                        <h3>Terra Maya</h3>
                        <a href="table.html" class="btn btn-primary">Book Table</a>
                    </div>
                </div>
            </div> -->
            
        </div>
    </section>
    <section id="food-menu">
        <h2 class="food-menu-heading">Food Menu</h2>
        <div class="food-menu-container container">



        <?php

            // get random food itemss
            $sql = "SELECT * FROM food ORDER BY RAND() LIMIT 3";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while($row = mysqli_fetch_assoc($result))
                {
                echo '<div class="food-menu-item">
                        <div class="food-img">
                            <img src="'.$row['image'].'" alt="" />
                        </div>
                        <div class="food-description">
                            <h1 class="food-title">'.$row['name'].'</h1>
                            <p>
                                '.$row['description'].'
                            </p>
                            <p class="food-price">Price: &#8377; '.$row['price'].'</p>
                            <p class="food-price"><a href="./table.php?restaurant='.$row['rest_id'].'">BOOK</a></p>   
                        </div>
                    </div>';
                }

            }

?>


        
        <!--
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="https://i.postimg.cc/wTLMsvSQ/food-menu1.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h1 class="food-title">Café B-You</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
                        quae.
                    </p>
                    <p class="food-price">Price: &#8377; 250</p>
                </div>
            </div>

            <div class="food-menu-item">
                <div class="food-img">
                    <img src="https://i.postimg.cc/sgzXPzzd/food-menu2.jpg" alt="error" />
                </div>
                <div class="food-description">
                    <h2 class="food-title">Café B-You</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
                        quae.
                    </p>
                    <p class="food-price">Price: &#8377; 250</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="https://i.postimg.cc/8zbCtYkF/food-menu3.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-title">Terra Maya</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
                        quae.
                    </p>
                    <p class="food-price">Price: &#8377; 250</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="https://i.postimg.cc/Yq98p5Z7/food-menu4.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-title">Terra Maya</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
                        quae.
                    </p>
                    <p class="food-price">Price: &#8377; 250</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="https://i.postimg.cc/KYnDqxkP/food-menu5.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-title">The Great Kabab Factory</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
                        quae.
                    </p>
                    <p class="food-price">Price: &#8377; 250</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="https://i.postimg.cc/Jnxc8xQt/food-menu6.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-title">The Great Kabab Factory</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
                        quae.
                    </p>
                    <p class="food-price">Price: &#8377; 250</p>
                </div>
            </div>

        -->
        </div>
    </section>

   

    <section id="testimonials">
        <h2 class="testimonial-title">What Our Customers Say</h2>
        <div class="testimonial-container container">

        <?php 
        // get random three reviews 
        $sql = "SELECT * FROM reviews ORDER BY RAND() LIMIT 3";

        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        

            while($row = mysqli_fetch_assoc($result)) {

                // get the name of the current reviewer
                $user_id = $row['cust_id'];
                $sql2 = "SELECT `name` FROM `customer` WHERE `id` = '$user_id' ";
                $result2 = $conn->query($sql2);
                $current_name = 'Name not Found';
                if ($result2->num_rows > 0) {
                    while($row2 = mysqli_fetch_assoc($result2)) {
                        $current_name = $row2['name']; 
                    }
                }

                // get the name of the restaurant the review is for
                $rest_id = $row['rest_id'];
                $sql3 = "SELECT `Res_name` FROM `restaurant` WHERE `id` = '$rest_id' ";
                $result3 = $conn->query($sql3);
                $current_rest_name = 'Name not Found';
                if ($result3->num_rows > 0) {
                    while($row3 = mysqli_fetch_assoc($result3)) {
                        $current_rest_name = $row3['Res_name']; 
                    }
                }

                // create stars for the current review
                $stars = $row['stars'];
                $stars_string = '';
                for ($i = 0; $i < $stars; $i++) {
                    $stars_string .= '<span class="fa fa-star checked"></span>';
                }

                // the reivew
                $review = $row['review'];
                
                echo '<div class="testimonial-box">
                        <div class="customer-detail">
                            <div class="customer-photo">
                                <img src="./images/customer/default.png" alt="" />
                                <p class="customer-name">' . $current_name . '</p>
                            </div>
                        </div>
                        <div class="star-rating">
                            ' . $stars_string . '
                        </div>
                        <p class="testimonial-text">
                           '. $current_rest_name . " => " . $review . '
                        </p>

                    </div>';
            }

        }




    ?>
        
        
            <!-- <div class="testimonial-box">
                <div class="customer-detail">
                    <div class="customer-photo">
                        <img src="https://i.postimg.cc/5Nrw360Y/male-photo1.jpg" alt="" />
                        <p class="customer-name">Ross Lee</p>
                    </div>
                </div>
                <div class="star-rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </div>
                <p class="testimonial-text">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit
                    voluptas cupiditate aspernatur odit doloribus non.
                </p>

            </div> -->
            <!-- <div class="testimonial-box">
                <div class="customer-detail">
                    <div class="customer-photo">
                        <img src="https://i.postimg.cc/sxd2xCD2/female-photo1.jpg" alt="" />
                        <p class="customer-name">Amelia Watson</p>
                    </div>
                </div>
                <div class="star-rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </div>
                <p class="testimonial-text">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit
                    voluptas cupiditate aspernatur odit doloribus non.
                </p>

            </div> -->
            <!-- <div class="testimonial-box">
                <div class="customer-detail">
                    <div class="customer-photo">
                        <img src="https://i.postimg.cc/fy90qvkV/male-photo3.jpg" alt="" />
                        <p class="customer-name">Ben Roy</p>
                    </div>
                </div>
                <div class="star-rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </div>
                <p class="testimonial-text">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit
                    voluptas cupiditate aspernatur odit doloribus non.
                </p>

            </div> -->
        </div>
    </section>
    
    <footer id="footer">
        <h2>Restaurant &copy; all rights reserved</h2>
    </footer>
    <!-- .................../ JS Code for smooth scrolling /...................... -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./js/index.js"></script>

</html>

</body>

</html>


<?php $conn->close(); ?>