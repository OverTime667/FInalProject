<?php

    include 'post.php';

    $postObject = new Posts();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing</title>
    <!--implement bootstrapp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<?php

include_once("header.php");

?>


    <!-- Body of page Starts here -->
    <div id="bodyPage">


        <h2>View Records
            <a href="add.php" class="btn btn-primary" style="float:right;">Add New Record</a>
        </h2>
        <table class="table table-hover">
            <thead>
            <tr>
             <th>image </th>
                <th>id </th>
                <th>Owner</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Location</th>
                <th>milage</th>
                <th>Seats</th>
                <th>Availability</th>
                <th>Date of Model</th>
                <th>other</th>
                <th>date of post</th>
                <th>date sold</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                /* $perpage = 10;
                if(isset($_GET["page"])){
                    $page = intval($_GET["page"]);
                    }
                else {
                    $page = 1;
                } */
                $posts = $postObject->displayData(); 
                foreach ($posts as $post) {
                ?>
                <tr>
                
                <td>
                <img src="<?php echo $post['image'] ?>" width="105" height="105"> 
                </td>
                <td><?php echo $post['post_id'] ?></td>
                <td><?php echo $post['owner'] ?></td>
                <td><?php echo $post['brand'] ?></td>
                <td><?php echo $post['price'] ?></td>
                <td><?php echo $post['location'] ?></td>
                <td><?php echo $post['milage'] ?></td>
                <td><?php echo $post['seats'] ?></td>
                <td><?php echo $post['availability'] ?></td>
                <td><?php echo $post['date_of_model'] ?></td>
                <td><?php echo $post['other'] ?></td>
                <td><?php echo $post['date_of_post']?></td>
                <td><?php echo $post['dateSold']?></td>
                <td>
                    <a href="edit.php?editId=<?php echo $customer['id'] ?>" style="color:green">
                    <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                    <a href="index.php?deleteId=<?php echo $customer['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
                </tr>
            <?php } ?>
            </tbody>
         </table>
    </div>

    







<?php

include_once("footer.php");
?>   

</body>   
</html>
