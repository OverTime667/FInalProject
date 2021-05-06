<?php

include 'users.php';

// Create an object of type customer
$usersObject = new Users();

// Edit customer record
if(isset($_COOKIE["user"])){
  $editemail =  $_COOKIE["user"];
  $user = $usersObject->displayUserbyEmail($editemail);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
    <div id= "profileBody" style="height:800px;" >
    <br><br><br><br><br>
    <div style="text-align: center;">
        <h1>Profile</h1>
    </div>
    <br>
    <!--ask the user to register info -->
        <div id="profileDiv" class="center" >          
            <form action="profile.php" method="POST" >
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input readonly type="email" class="form-control" name="uemail"  aria-describedby="emailHelp" value="<?php echo $user['email']; ?>" require="" >
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Username</label>
                    <input readonly type="text" class="form-control" name="uusername" value="<?php echo $user['username']; ?>" require="" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPhonenumber" class="form-label">Phone number</label>
                    <input readonly type="text" class="form-control" name="uphone" value="<?php echo $user['phone']; ?>" require="" >
                </div>
               
                
                <a href="editProfile.php">
                    <button type="button" class="btn btn-primary" >Edit </button>
                </a>
            </form>
        </div>
    </div>
    

    <!-- end of Page -->
   <footer class="profilefooter" style="position: absolute;bottom: 0; width: 100%; height: 2.5rem;  ">
    <?php
        include_once("footer.php");
    ?>
</footer>

</body>   
</html>
