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
         
        </h2>

        <body>
    <table  class="table table-hover">
    <thead>
            <tr>
             <th> </th>
            
             
                <th>Brand</th>
                <th>Price</th>
                <th>Location</th>
                <th>Milage</th>
                <th>Seats</th>
                <th>Availability</th>
                <th>Date of Model</th>
                
           
             
            </tr>
            </thead>
        <?php
        $perpage = 3;
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
                <?php echo $post['other'] ?>
              
                </td> 
               
              
                <td><?php echo $post['brand'] ?></td>
                <td><?php echo $post['price'] ."$"?></td>
                <td><?php echo $post['location'] ?></td>
                <td><?php echo $post['milage'] ?></td>
                <td><?php echo $post['seats'] ?></td>
                <td><?php echo $post['availability'] ?></td>
                <td><?php echo $post['date_of_model'] ?></td>
               
 
            <?php
            }
        }
        ?>
                </tbody>
    </table>
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
                            echo "<span><a id='page_a_link' href='listing.php?page=$j'>< Prev</a></span>";
                        }
                        for($i=1; $i <= $totalPages; $i++)
                        {
                            if($i<>$page)
                            {
                                echo "<span><a id='page_a_link' href='listing.php?page=$i'> $i </a></span>";
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
                            echo "<span><a id='page_a_link' href='listing.php?page=$j'> Next </a></span>";
                        }
                    }
                ?></td>
                <td></td>
                </tr>
        </tbody>
    </table>



















      <!--   <table class="table table-hover">
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
         </table> -->
    </div>

    







<?php

include_once("footer.php");
?>   

</body>   
</html>
