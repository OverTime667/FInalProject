<?php

    //include the database file
    include 'users.php';

        // Create an object of type customer
    $usersObject = new Users();
    // Insert Record in customer table
    if(isset($_POST['submit']))
    {
        $usersObject->insertUser($_POST);
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!--implement bootstrapp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <!--div representing the header of the page --> 
    <?php

        include_once("header.php");
    ?>

    <!-- Body of page Starts here -->
    <div id="bodyPage">
        

        <div id= "containeseverything" >

        <!--ask the user to register info -->
            <div id="Registerdiv"  >          
                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email"  placeholder="Enter Email" require="">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter an username" require=""> 
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPhonenumber" class="form-label">Phone number</label>
                        <input type="text"  class="form-control" name="phone" placeholder="Enter a valid phone number" require="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="enter a secret password" require="">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                   
            </div>

            <div id="alreadyRegDiv"> 
            
                <form>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Already Registered?</strong></label></br>
                        <label for="exampleInputPassword1" class="form-label"><strong>Sign in to post your ads</strong></label>
                    </div>
                 
                    <a href="signin.php">
                        <button type="button" class="btn btn-primary" >Sign in </button>
                    </a>
                </form>

            </div>

        </div>
    </div>

    <!-- end of Page -->
    <?php

        include_once("footer.php");
    ?>

</body>   
</html>
