<?php

include_once 'header.php';

    $postObject = new Posts();
    $usersObject = new Users();

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $deleteId = $_GET['id'];
        $postObject->deleteRecord($deleteId);
    }

    
    // update the availability of the ppst
    if(isset($_POST['availability']))
    {
    $status = $_POST['availability'];
    
    $id = $_GET['editId'];
    // echo $id;
    switch($status){
        case 'Available':
        
        $postObject -> updatepost($id,$status);
        break;
        case 'Unavailable':
            $postObject -> updatepost($id,$status);
            break;
            
        // $userObject->updateUser($_POST);
    }
 }
    
     $total = $postObject -> totalProfits();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts List</title>
    <!--implement bootstrapp -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>


<!-- Body of page Starts here -->
<div id="bodyPage">
    <h2>Posts List</h2>
    <table  class="table table-hover">
    <thead>
            <tr>
                <th> </th>
                <th>Id</th>      
                <th>Owner</th>                    
                <th>Brand</th>
                <th>Price</th>
                <th>Location</th>
                <th>Milage</th>
                <th>Seats</th>
                <th>Availability</th>
                <th>Date Of Model</th>          
                <th>Date Of Post</th>   
                <th>Fees</th>   
                <th>DateSold</th>  
                <th>Description</th> 
            </tr>
            </thead>
        <?php
        $perpage = 5;
        $conn = new mysqli("localhost", "root", "" ,"finalproject" );
        
        // get the page number in url else page is equal to page 1
        if(isset($_GET["page"])){
        $page = intval($_GET["page"]);
        }
        else {
        $page = 1;
        }

        $calc = $perpage * $page;
        $start = $calc - $perpage;
        $query = "SELECT * FROM posts Limit $start, $perpage";
        $result = $conn->query($query);
         $rows = mysqli_num_rows($result);
        if($rows){
            $i = 0;
            while($post = mysqli_fetch_assoc($result)) {
            ?>        
                <tbody>
                <td>  <img src="<?php echo $post['image'] ?>" width="150" height="150" style="float:left;" >
                
              
                </td> 
               
                <td><?php echo $post['post_id'] ?></td>
                <td><?php echo $post['owner'] ?></td>
                <td><?php echo $post['brand'] ?></td>
                <td><?php echo $post['price'] ."$"?></td>
                <td><?php echo $post['location'] ?></td>
                <td><?php echo $post['milage'] ?></td>
                <td><?php echo $post['seats'] ?></td>

                <td>
                <!-- the admin will be allow to modify the availability of a post -->
                <div>
                <form action="postlist.php?editId=<?php echo $post['post_id'] ?>" method="POST"> 
                
                    <select name="availability" id="availability">
                        <option name="main"> <?php echo $post['availability']; ?> </option>
                        <option  name="Available" value="Available">Available</option>
                        <option name ="Unavailable" value="Unavailable">Unavailable</option>
                    </select>
                    <input type="submit" name="update" class="btn btn-primary"  style="float:right;" value="Update">
                    </form>
                </div></td>
                <td><?php echo $post['date_of_model'] ?>
                <td><?php echo $post['date_of_post'] ?></td>
                <td><?php echo $post['fees'] . "$"?></td>
                <td><?php echo $post['dateSold'] ?></td>
                <td><?php echo $post['other'] ?></td>
                <!-- <a href="ItemDetails.php?id=<?php echo $post['post_id'] ?>">
                    <button type="button" class="btn btn-primary" >Sign in </button>
                </a> -->
                
                </td>
                <td>
                <a href="postlist.php?id=<?php echo $post['post_id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                <i class="fa fa-trash" aria-hidden="true"></i>
                </a> 
                </td>
               
 
            <?php
            }
        }
        ?>
                </tbody>
    </table>

    <h2>Total profit: <?php echo $total . "$"?></h2>


    <!-- this section is for the paging -->
    <table width="400" cellspacing="2" cellpadding="2" align="center">
        <tbody>
            <tr>
            <td align="center">
 
                    <?php
                    if(isset($page))
                    {
                        $result = mysqli_query($conn,"SELECT Count(*) As Total from posts");
                        $rows = mysqli_num_rows($result);

                      
                        if($rows)
                        {
                            $rs = mysqli_fetch_assoc($result);
                            $total = $rs["Total"];
                        }
                        $totalPages = ceil($total / $perpage);
                        if($page <=1 )
                        {
                            echo "<span id='page_links' style='font-weight: bold;'> Prev </span>";
                        }
                        else
                        {
                            $j = $page - 1;
                            echo "<span><a id='page_a_link' href='postlist.php?page=$j'>< Prev</a></span>";
                        }
                        for($i=1; $i <= $totalPages; $i++)
                        {
                            if($i<>$page)
                            {
                                echo "<span><a id='page_a_link' href='postlist.php?page=$i'> $i </a></span>";
                            }
                            else
                            {
                                echo "<span id='page_links' style='font-weight: bold;'> $i </span>";
                            }
                        }
                        if($page == $totalPages )
                        {
                            echo "<span id='page_links' style='font-weight: bold;'>Next ></span>";
                        }
                        else
                        {
                            $j = $page + 1;
                            echo "<span><a id='page_a_link' href='postlist.php?page=$j'> Next </a></span>";
                        }
                    }
                ?></td>
                <td></td>
                </tr>
        </tbody>
    </table>
    </div>
  
    <?php
    include_once("footer.php");
    ?>

</body>   

</html>


