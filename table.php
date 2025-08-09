<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/table.css">
    <title>Document</title>
</head>
<body>
    <section id="table-booking">
        <div class="booking-container container">
            <h2>Table Booking</h2>
            <form>
                <label for="date">Select Date:</label>
                <input type="date" id="date" name="date" required>
                
                <label for="time">Select Time:</label>
                <input type="time" id="time" name="time" required>
    
                <label for="guests">Number of Guests:</label>
                <input type="number" id="guests" name="guests" min="1" required>
    
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>
    
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>
    
                <label for="phone">Your Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
    
                <button type="submit" class="btn btn-primary">Book Table</button>
            </form>
        </div>
    </section>
    
    <footer id="footer">
        <h2>Restaurant &copy; all rights reserved</h2>
    </footer> -->
    <!-- .................../ JS Code for smooth scrolling /...................... -->
    <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./js/table.js"></script>
    
</body>
</html> -->

<?php 
// get the restaurant id
$restaurantId = $_GET['restaurant'];

// establish a connection to db
include_once("./htServer/connection.php");



$sql = "SELECT * FROM restaurant WHERE id = $restaurantId";

$result = $conn->query($sql);



if ($result->num_rows > 0) {

  while($row = mysqli_fetch_assoc($result))
  {
    $restaurantName = $row['Res_name'];
  }

}

?>


<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Menu</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('./images/restaurant/restaurant3.jpg');
      background-size: cover;
      background-position: center;
      color:000;
      display: flex;
      position: relative;
      flex-direction: column;
      min-height: 100vh;
    }

    .overlay {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 20px;
      text-align: center;
    }

    h1 {
      margin: 0;
    }

    .content-wrapper {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      flex-grow: 1;
      padding: 20px;
    }

    .food-container {
      flex: 2; /* Larger size */
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      overflow-y: auto;
    }

    .food-item {
      border: 1px solid #ddd;
      padding: 20px;
      margin: 20px;
      width: 200px;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      transition: transform 0.3s ease-in-out;
    }

    .food-item:hover {
      transform: scale(1.05);
    }

    button {
      background-color: #4caf50;
      color: #fff;
      padding: 8px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #45a049;
    }

    .cart {
      flex: 1; /* Smaller size */
      border: 1px solid #ddd;
      padding: 20px;
      margin: 20px;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    ul {
      list-style-type: none;
      padding: 0;
    }

    li {
      margin-bottom: 10px;
      display: flex;
      justify-content: space-between;
    }

    p {
      margin: 0;
    }
  </style>
</head>
<body>

  <div class="overlay">
    <h1 style="color: #fff;"> <?php echo $restaurantName; ?> </h1>
  </div>

  <div class="content-wrapper">

    <!-- Food Items -->
    <div class="food-container">


    
<?php

// fill with food

$sql = "SELECT * FROM food WHERE rest_id =$restaurantId ";

$result = $conn->query($sql);


if ($result->num_rows > 0) {

    while($row = mysqli_fetch_assoc($result))
    {
       echo '<div class="food-item" data-id="'.$row['id'].'" data-name="'.$row['name'].'" data-price="'.$row['price'].'">
       <h3>'.$row['name'].'</h3>
       <img src="'.$row['image'].'" alt="Burger Image" style="width: 100%; border-radius: 4px; margin-bottom: 10px;">
       <p>'.$row['description'].'</p>
       <button onclick="addToCart('. $row['id'] .', \''.$row['name'].'\', '.$row['price'].')">Add to Cart</button>
     </div>';
    }

}



?>
 
            <!-- <div class="food-item" data-id="1" data-name="Burger" data-price="10.99">
                <h3>Burger</h3>
                <img src="./images/restaurant/restaurant1.jpg" alt="Burger Image" style="width: 100%; border-radius: 4px; margin-bottom: 10px;">
                <p>Delicious burger with all the fixings.</p>
                <button onclick="addToCart(1, 'Burger', 10.99)">Add to Cart</button>
              </div> -->
        
              <!-- <div class="food-item" data-id="2" data-name="Pizza" data-price="12.99">
                <h3>Pizza</h3>
                <img src="./images/restaurant/restaurant1.jpg" alt="Pizza Image" style="width: 100%; border-radius: 4px; margin-bottom: 10px;">
                <p>Classic pizza with your favorite toppings.</p>
                <button onclick="addToCart(2, 'Pizza', 12.99)">Add to Cart</button>
              </div>
        
              Add more items here -->
              <!-- <div class="food-item" data-id="3" data-name="Salad" data-price="7.99">
                <h3>Salad</h3>
                <img src="./images/restaurant/restaurant1.jpg" alt="Salad Image" style="width: 100%; border-radius: 4px; margin-bottom: 10px;">
                <p>Fresh and healthy salad.</p>
                <button onclick="addToCart(3, 'Salad', 7.99)">Add to Cart</button>
              </div>
        
              <div class="food-item" data-id="4" data-name="Pasta" data-price="9.99">
                <h3>Pasta</h3>
                <img src="./images/restaurant/restaurant1.jpg" alt="Pasta Image" style="width: 100%; border-radius: 4px; margin-bottom: 10px;">
                <p>Delicious pasta with homemade sauce.</p>
                <button onclick="addToCart(4, 'Pasta', 9.99)">Add to Cart</button>
              </div> -->
      
    </div>

    <!-- Shopping Cart 
    <div class="cart" id="cart">
      <h2>Shopping Cart</h2>
      <ul id="cart-list"></ul>
      <p>Total: Rs: <span id="cart-total">0.00</span></p>
      <form action="./htServer/placeOrder.php" method="POST" id="cart-form">
        <input type="hidden" name="food-list" value="" id="food-list">
        <input type="hidden" name="restaurant-id" value="<?php echo $restaurantId; ?>">
        <input type="submit" class="btn btn-primary" id="submitButton" disabled>
      </form>
    </div>
  </div>-->

<!-- Shopping Cart -->
<div class="cart" id="cart">
  <h2>Shopping Cart</h2>
  <ul id="cart-list"></ul>

  <p>Total: Rs: <span id="cart-total">0.00</span></p>

  <form action="./htServer/placeOrder.php" method="POST" id="cart-form">
    <!-- Additional Hidden Inputs for Date, Time, and Number of People -->
    Date :  <input type="date" name="order_date" id="order_date"> <br>
    Time :  <input type="time" name="order_time" id="order_time"> <br>
    Number of people: <input type="number" name="num_of_people" id="" required>

    <input type="hidden" name="food-list" value="" id="food-list">
    <input type="hidden" name="restaurant-id" value="<?php echo $restaurantId; ?>">
    <input type="submit" class="btn btn-primary" id="submitButton" disabled>

    
  </form>

  <form action="./htServer/addReview.php" method="post" class="mt-4">
    <h2>Add Review for the Restaurant</h2>
    <textarea name="review" id="" cols="30" rows="10" required></textarea>
    <input type="hidden" name="restaurantId" value="<?php echo $restaurantId; ?>"> <br>
    <label for="stars">Select no of stars:</label>

    <select name="stars" id="stars" required>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <input type="submit" class="btn btn-primary">
  </form>
</div>
</div>

<script>
  // default date and time
  // const curDate = new Date();

  var date = document.getElementById('order_date');
  var time = document.getElementById('order_time');

  date.value = new Date().toISOString().split('T')[0];
  time.value = new Date().toISOString().substring(11,16);

  console.log("this script is running");

</script>






  <!-- JavaScript for handling the cart -->
  <script>

    var food = '';

    var list = document.getElementById('cart-list');

    var priceTag = document.getElementById('cart-total');

    var foodList = document.getElementById('food-list');

    var submitButton = document.getElementById('submitButton');

    totalPrice = 0;
    
    // Function to add an item to the cart
    function addToCart(id, name, price) {
      food += '-'+id;

      totalPrice += price;

      list.innerHTML += "<li>" + name + "(1) : rs " + price + "</li>";
      priceTag.innerHTML = totalPrice;

      foodList.value = food;

      // enable the submit button
      submitButton.removeAttribute("disabled");
    }

   
  </script>


</body>
</html>

