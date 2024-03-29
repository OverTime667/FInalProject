<?php
    include_once 'users.php';

// Create an object of type customer
$usersObject = new Users();

// Insert Record in customer table
if(isset($_POST['signin']))
{
    $usersObject->confirm($_POST);

    
}
 //This will redirect to the home page if user cookies are register
 if(isset($_COOKIE["user"])){

     header("Location: home.php");
 }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
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
    <div id="bodyPage" style="padding-left: 300px; padding-top: 150px;">
            <!-- TEST -->
        <!-- <div id= "containeseverything" style="border:1px solid black;" > -->
        <div style=" padding-left:150px;">
            <h1>Signin here</h1>
        </div>

        <!--ask the user to register info -->
            <div id="Registerdiv"  >          
                <form actions="signin.php" method="POST" >
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control"  name="email" placeholder="enter your email account" require="">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                   
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password" require="" >
                    </div>
                    <!-- <a href="home.php">
                        <button type="button" class="btn btn-primary" >Sign in </button>
                    </a> -->
                    <input type="submit" name="signin" class="btn btn-primary" value="Signin">
                </form>
            </div>

            <div id="alreadyRegDiv"> 
            
                <form>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Not Registered?</strong></label></br>
                        <label for="exampleInputPassword1" class="form-label">Register now to post, edit, and manage ads. It's quick, easy and free!</label>
                    </div>
                    <a href="register.php">
                        <button type="button" class="btn btn-primary" >Register </button>
                    </a>
                    
                </form>

            </div>

        <!-- </div> -->
    </div>

    <!-- end of Page -->
    <?php

        include_once("footer.php");
    ?>

</body>   
</html>
