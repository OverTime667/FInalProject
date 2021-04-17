<?php


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
    <div id="bodyPage">
        

        <div id= "containeseverything" >

        <!--ask the user to register info -->
            <div id="Registerdiv"  >          
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                   
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                 
                    <button type="submit" class="btn btn-primary">Sign in</button>
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

        </div>
    </div>

    <!-- end of Page -->
    <?php

        include_once("footer.php");
    ?>

</body>   
</html>
