<?php
include 'users.php';

// Create an object of type customer
$usersObject = new Users();

// Edit customer record
if(isset($_COOKIE["user"])){
  $editemail =  $_COOKIE["user"];
  $user = $usersObject->displayUserbyEmail($editemail);
}

  // Update Record in customer table
  if(isset($_POST['update'])) {
    $usersObject->updateRecord($_POST);
  } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
    <div id= "profileBody" style="height:800px;">
    <br><br><br><br>
    <div style="text-align: center;">
        <h1>Edit Profile</h1>
    </div>
    <br>

    <!--ask the user to register info -->
        <div id="profileDiv" class="center" >          
            <form action="editProfile.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input readonly type="email" class="form-control" name="uemail"  value="<?php echo $user['email']; ?>" require="">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" name="uusername"  value="<?php echo $user['username']; ?>" require="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPhonenumber" class="form-label" >Phone number</label>
                    <input type="text" class="form-control" name="uphone" value="<?php echo $user['phone']; ?>" require="" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword" class="form-label">New Password</label>
                    <input type="text" class="form-control" name="upassword" value="<?php echo $user['password']; ?>" require="" >
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword" class="form-label">Subscription</label>
                            <!-- choose the status of the user-->
                    <form action="userList.php?editId=<?php echo $user['user_id'] ?>" method="POST"> 
                
                
                <select name="subscription" id="subscription">
                    <option name="main">  <?php echo $user['subscription'] ?> </option>
                    <option  name="Classic" value="Classic">Classic</option>
                    <option name ="Premium" value="Premium">Premium</option>
                    
                </select>
                <a href="promotions.php"> need more information? </a>
                  
                
                            
                
                </div>
                
                <input type="submit" name="update" class="btn btn-primary"  value="Update">
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
