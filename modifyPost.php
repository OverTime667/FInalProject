<?php
include_once "header.php";
// Create an object of type customer
$postObject = new Posts();
$updateId;

// Edit customer record
if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $updateId = $_GET['editId'];
  $post = $postObject->displayUniquePost($updateId);
}
  // Update Record in post table
  if(isset($_POST['updatePost'])) {

  $postObject->updateRecord($_POST);
  $post = $postObject->displayUniquePost($updateId);
  } 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <!--implement bootstrapp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="script.js" type="text/javascript">
    </script>

    
</head>
<body>
    <!--div representing the header of the page --> 
   <!--div representing the header of the page --> 
  

    <!-- Body of page Starts here -->
    <div id= "profileBody" >

    <!--ask the user to register info -->
        <div id="profileDiv" class="center" >          
            
            <form id="frmupdate" action="<?php echo $_SERVER['PHP_SELF'] . "?editId=" .  $_GET['editId']; ?>" method="POST"  >  
           
            <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"></label>
                    <input  type="hidden" class="form-control" name="uid"  value="<?php echo $post['post_id']; ?>" require="">
         
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Brand</label>
                    <input  type="text" class="form-control" name="ubrand"  value="<?php echo $post['brand']; ?>" require="">
         
                </div>
                <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Price</label>
                    <input type="text" class="form-control" name="uprice"  value="<?php echo $post['price']; ?>" require="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Location</label>
                    <input type="text" class="form-control" name="ulocation"  value="<?php echo $post['location']; ?>" require="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPhonenumber" class="form-label" >Seats</label>
                    <input type="text" class="form-control" name="useats" value="<?php echo $post['seats']; ?>" require="" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword" class="form-label">milage</label>
                    <input type="text" class="form-control" name="umilage" value="<?php echo $post['milage']; ?>" require="" >
                </div>
            
                <div class="mb-3">

                <!-- slect if the customer has sold and it is avaialable or if it isn't-->
                    <label for="exampleInputPassword" class="form-label">availability</label>
            <select name="availability" id="availability">
                <option name="main"> <?php echo $post['availability']; ?> </option>
                <option  name="Available" value="Available">Available</option>
                <option name ="Unavailable" value="Unavailable">Unavailable</option>
            </select>

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword" class="form-label">date of model</label>
                    <input type="text" class="form-control" name="udate" value="<?php echo $post['date_of_model']; ?>" require="" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword" class="form-label">image url</label>
                    <input type="text" class="form-control" name="uimage" value="<?php echo $post['image']; ?>" require="" >
                </div>
      

               
                
                <input type="submit" name="updatePost" class="btn btn-primary"  value="Update" >
            </form>
           <!--  <script >


               // const refresh = () => setTimeout(function(){window.location.replace("http://localhost/finalproject/myPosts.php");},15000);
                window.onload = (event) => 
                {
                  //  document.getElementById("frmupdate").onsubmit = refresh();
                        
                    
                };
           

            </script> -->
            <div id="trialdiv" class="mb-3" >

                        
            </div>
        </div>
    </div>
    

    <!-- end of Page -->
    <?php

        include_once("footer.php");
    ?>

</body>   
</html>
