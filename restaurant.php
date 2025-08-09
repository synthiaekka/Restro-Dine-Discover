<?php

// check if the user is signed in 
// check if the signed in user is the manager of the current restaurant



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Restaurant Manager</title>
    <style>
        /* Hide sections initially */
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<div class="container light-style flex-grow-1 container-p-y" method="POST" action='./htServer/profileUpdate.php'>
        <h4 class="font-weight-bold py-3 mb-4">
            RESTAURANT NAME
        </h4>

        
        
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#food-orders">Food Orders</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#food">Food</a>
                    </div>
                </div>

                
                
                <div class="col-md-9">
                    <div class="tab-content">
                        
                        <div class="tab-pane fade" id="food-orders">
                            <div class="card-body pb-2">
                                <h1>this is food orders</h1>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="food">
                            <div class="card-body pb-2">
                               <h1>list of food in the restaurant</h1>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Function to toggle visibility of sections
    function toggleSection(sectionId) {

        // Show the corresponding section
        var section = document.getElementById(sectionId);
        if (section.style.display === 'none' || section.style.display === '') {
            section.style.display = 'block';
        } else {
            section.style.display = 'none';
        }
    }
</script>
</body>
</html>
