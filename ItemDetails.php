<?php

    include 'post.php';

    $postObject = new Posts();

     // Insert Record in customer table
     if(isset($_GET['id']) && !empty($_GET['id']))
     {
         $post_id = $_GET['id'];
        $post = $postObject->displayUniquePost($post_id);
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

<?php
    include_once("header.php");
    ?>

        <div id="bodyPage">
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
                </br>  </br>  
            </div>
            <!-- middle section with car -->
            <div>
                <!-- car picture to the left --> 
                <div style="display: inline-block;  border: 1px solid black; width:50%;" > 
                <img src="<?php echo $post['image'] ?>" width="500" height="250" style="float:left;" >
                </div>   

                <!-- left section in car to the rigth -->

                <div style="display: inline-block; float:right; border: 1px solid black; width:50%">

                <p> something to say </p>

                </div>
            
            
            </br></br></br>
            </div>
            </br>
            <!-- description of item -->
            <div style=" border: 1px solid black;">

            <!-- left description of item -->
                <div id="left_description"  style="display: inline-block; float:left;  border: 1px solid black; width:50%; ">
                <h4>
                <?php echo "year: " . $post['date_of_model'] . " $ "?> </h4>
              
                </div>

            <!-- right description of item -->
                <div id="right_description" style= " display:inline-block; float:right;  border: 1px solid black; width:50%;  height: 300px" >
                <h4><?php echo "seats: " . $post['seats'] ?> </h4>
                <h4><?php echo "availability: " . $post['availability'] ?> </h4>
                </div>


                </br></br></br></br></br></br></br></br></br></br></br></br></br>
            </div>
        </div>


     <!-- end of page -->
    <?php
        include_once("footer.php");
    ?>  
</body>


</html>