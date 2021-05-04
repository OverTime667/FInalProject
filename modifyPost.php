<?php
include 'users.php';
include_once 'header.php';
// Create an object of type customer
$postObject = new Posts();



  // Update Record in post table
  if(isset($_POST['update'])) {
    $post ->   $postObject->updateRecord($_POST);
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
   

    <!-- Body of page Starts here -->
    <div id= "profileBody" >

    <!--ask the user to register info -->
        <div id="profileDiv" class="center" >          
            <form action="editProfile.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Brand</label>
                    <input readonly type="email" class="form-control" name="uemail"  value="<?php echo $post['brand']; ?>" require="">
         
                </div>
                <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Price</label>
                    <input type="text" class="form-control" name="uprice"  value="<?php echo $user['username']; ?>" require="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPhonenumber" class="form-label" >Seats</label>
                    <input type="text" class="form-control" name="useats" value="<?php echo $user['phone']; ?>" require="" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword" class="form-label">milage</label>
                    <input type="text" class="form-control" name="umilage" value="<?php echo $user['password']; ?>" require="" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword" class="form-label">milage</label>
                    <input type="text" class="form-control" name="umilage" value="<?php echo $user['password']; ?>" require="" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword" class="form-label">availability</label>
                    <input type="text" class="form-control" name="umilage" value="<?php echo $user['password']; ?>" require="" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword" class="form-label">date of model</label>
                    <input type="text" class="form-control" name="umilage" value="<?php echo $user['password']; ?>" require="" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword" class="form-label">image</label>
                    <input type="text" class="form-control" name="umilage" value="<?php echo $user['password']; ?>" require="" >
                </div>
      

                <div class="mb-3">
           
                            <!-- choose the status of the user-->
                    <form action="userList.php?editId=<?php echo $user['user_id'] ?>" method="POST"> 
                </div>
                
                <input type="submit" name="update" class="btn btn-primary"  value="Update">
            </form>
        </div>
    </div>
    

    <!-- end of Page -->
    <?php

        include_once("footer.php");
    ?>

</body>   
</html>
