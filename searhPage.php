<?php

include_once 'header.php';

    $postObject = new Posts();

    $search = $_GET['search'];
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



<!-- Body of page Starts here -->
<div id="bodyPage">
            <h2>View Records</h2>
            <table  class="table table-hover">
            <thead>
            <tr>
             <th> </th>                                               
                <th></th>
                
           
             
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
                $query = "SELECT * FROM posts WHERE  Location LIKE '%$search%' OR brand  LIKE '%$search%' OR seats LIKE '$search' Limit $start, $perpage";
                $result = $conn->query($query);
                $rows = mysqli_num_rows($result);
                if($rows){
                    $i = 0;
                    while($post = mysqli_fetch_assoc($result)) {
                    ?>        
                        <tbody>
                <div style=" display: inline-block;">
                <td>  <img src="<?php echo $post['image'] ?>" width="320" height="205" style="float:left;" >
                
                <!-- contains the basic information to the left of the image -->
                <div id="post_info" style=" width:800px; height:200px;  margin-left: 30%; background-color:#EEEEEF;">
                <p  class="fs-3" style="float:left; background-color:#C8CFF4;   ">  <?php echo "<b>" .$post['date_of_model'] . "  " . $post['brand'] . "</b>"  ?> </p>
         
              <p class="fs-3" style=" padding-left:88%; color:green; background-color:#C8CFF4; "><?php echo $post['price'] ."$" ?></p>
              
               <p  class="fs-6" style=" "> <?php echo $post['location'] . " | " . $post['date_of_post']  ?></p>
               
              
               <p  class="fw-normal fs-4" > <?php echo $post['other'] ?> </p>
               </br> 
                <p  class="fw-lighter fs-6" > <?php echo $post['milage'] . "km , " . $post['availability']  ?></p>
                </div>
                </td> 
                <td>
                <a href="ItemDetails.php?id=<?php echo $post['post_id'] ?>">
                        <button type="button" class="btn btn-primary" >See details</button>
                    </a>
                </td>
                    
        
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
                            echo "<span><a id='page_a_link' href='searchPage.php?page=$j'>< Prev</a></span>";
                        }
                        for($i=1; $i <= $totalPages; $i++)
                        {
                            if($i<>$page)
                            {
                                echo "<span><a id='page_a_link' href='searchPage.php?page=$i'> $i </a></span>";
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
                            echo "<span><a id='page_a_link' href='searchPage.php?page=$j'> Next </a></span>";
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
