<?php
    session_start();

    // if the user is not signed in, then this page is not accessible
    if (!isset($_SESSION['user_email']) || $_SESSION['user_email'] == '') { 
       
        echo "user is not logged in";
        die();
    }


    $user_email = $_SESSION['user_email'];


    // get the form values
    $cur_pswd = $_POST['currentpswd'];
    $new_pswd = $_POST['newpswd'];
    $re_new_pswd = $_POST['renewpswd'];

    
    // section for change password
    // proceed only if all three fields are not empty - current pswd, new pswd and re-enter new pswd
    /**
     * 1. check is both new pswd and re_new pswd match, otherwise return back with error
     * 2. validate if the string used in new pswd is allowed to be a pswd, use of not allowed chars etc., otherwise return with error
     * 3. check if the current pswd match with the current pswd stored in database, otherwise return with error
     * 4. if every step above seems ok, update the pswd
     */


    //  establish a connection to database
    include_once("./connection.php");
    

    // if any of the three fields are empty do not proceed
    if (strlen($cur_pswd) > 0  &&  strlen($new_pswd) > 0  &&  strlen($re_new_pswd) > 0) {

        // if new pswd and re_new pswd do not match, return back with error
        if ($new_pswd !== $re_new_pswd) {
            header("location: http://localhost/profile.php?error=New password and Repeat new password fields do not match");
            die();
        }

        // validate the password field
        if (strlen($new_pswd) <= 8) {
            header("location: http://localhost/profile.php?error=Your Password Must Contain At Least 8 Characters!");
            die();
        }

        // check if the user has entered correct current password
        $sql = "SELECT `password` FROM `customer` WHERE `email` = '$user_email' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            while($row = mysqli_fetch_assoc($result))   {
        
                $user_password = $row['password'];

                if ($cur_pswd !== $user_password) {
                    header("location: http://localhost/profile.php?error=Your have entered incorrect current password");
                    die($user_password. "   " . $new_pswd);
                }
            }
        
        }


        // seems like all conditions are fullfilled, so update the password field with the new password
        $sql = "UPDATE `customer` SET `password`='$new_pswd' WHERE `email` = '$user_email' ";
        $result = $conn->query($sql);

        // if not successfully updated, refresh the page with errors
        if ($result !== TRUE) {
            header("location: http://localhost/profile.php?error=Failed to change the password");

            // kill (stop) the remaining process of this file
            die();
        }


    } else {
        header("location: http://localhost/profile.php?error=Please fill all the fields");

        // kill the remaining process
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