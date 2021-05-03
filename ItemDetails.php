<?php

    
include_once 'header.php';
    include_once 'post.php';
    $postObject = new Posts();

     // Insert Record in customer table
     if(isset($_GET['id']) && !empty($_GET['id']))
     {
         $post_id = $_GET['id'];
        $post = $postObject->displayUniquePost($post_id);
        $contact = $postObject->displayContact($post_id);
     }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Post Details</title>
</head>

<body>



        <div id="bodyPage">

            <div style=" padding:25px;">
            <div>
                <span>
                    <h3><?php echo $post['date_of_model'] . "  "
                        . $post['brand'] . "  , " 
                        . $post['milage'] . " KMs " ?> </h3>
                </span>
            </div>
            <div style="display: inline-block;">
                <div style="display: inline-block; color:lime;">
                    <h3> <?php echo $post['price'] . " $ "?> </h3>
                </div>
                <div style="float:right">  +taxes</div>
                </br> 
            </div>

            </div>
            
            <!-- middle section with car -->
            <div>
                <!-- car picture to the left --> 
                <div style="display: inline-block; width:45%; margin-left:25px;" > 
                <img src="<?php echo $post['image'] ?>" width="680" height="400" style="float:left;" >
                </div>   

                <!-- left section in car to the rigth -->

                <div style="display: inline-block; float:right; width:50%">

               
                    <!-- section to contact the Owner -->

                <div  style="display: inline-block; background-color:#D5DBDB; width:90%; padding: 30px; margin-left: 35px; margin-top:50px;"  >
                <h1 style="text-align: center;">Contact the Seller</h1>
                </br>
                <p class="fw-normal fs-4"> If you want to learn more about the car, Contact the onwer with this information : </p>
           
                <p class="fw-normal fs-5" style="color:#2B3768">Email : <?php echo $contact["email"] ?></p>
                <p class="fw-normal fs-5" style="color:#2B3768">Phone Number : <?php echo $contact["phone"] ?> </p>

                </div>


                </div>

                
            
            
            </br></br></br>
            </div>
            </br>
            <!-- description of item -->
            <div style=" ">

            <!-- left description of item -->
                <div id="left_description"  style=" width:50%; display:inline-block; padding:30px;">
                <h2 style="background-color:#9AF094; text-align:center;">Information about the car...</h2>
                <p  class="fw-normal fs-4" >
                <?php echo "year: " . $post['date_of_model'] . " "?> </p>
                <p  class="fw-normal fs-4" ><?php echo "location: " . $post['location'] . " "?> </p>
                <p  class="fw-normal fs-4" ><?php echo "date of post: " . $post['date_of_post'] . " "?> </p>
                <p class="fw-normal fs-4"><?php echo "seats: " . $post['seats'] ?> </p>
                <p  class="fw-normal fs-4"><?php echo "availability: " . $post['availability'] ?> </p>
                <p class="fw-normal fs-4"> <?php echo "Description: " . $post['other'] ?> </p>
                
            </div>

            <!-- right description of item -->
            <div id="right_description" style= " display:inline-block; float:right; width:50%;  height: 300px; padding:30px;" >
                <h2 style="background-color:#F8C471; text-align:center;">General Information </h2>
                <p class="fw-normal fs-5">- If you are the owner, Remember to remove your post after selling the specific car. Else , We will be forced to remove it, if we find the post to be no longer active</p>
                <p class="fw-normal fs-5">- All responsabilities about the sells are organized by the owner of the car, and we won't reply to any information concerning questions about a specific car</p>
                <p class="fw-normal fs-5">- The owner is fully responsible to provided all details of the car to its customers<p> 
            </div>


                </br></br></br></br>
            </div>
        </div>


     <!-- end of page -->
    <?php
        include_once("footer.php");
    ?>  
</body>


</html>