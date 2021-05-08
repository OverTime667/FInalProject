<?php

    include_once 'users.php';
    include_once 'post.php';
    $userObject = new Users();
    $postObject = new Posts();
    // Insert Record in customer table
    if(isset($_POST['logout']))
    {
        setcookie("user", "");
        header("Refresh:0");
    }

    //search an specific car

    if(isset($_POST['searchitem'])){
        $searchValue = $_POST['search'];
       
        header("Location: searhPage.php?search=$searchValue");

    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--implement bootstrapp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <!--div representing the header of the page --> 
    <div id="headerDiv" style="background-color:white;">
        <!-- logo part of headerDiv -->
        <div id="logo" style="">
        <div style="display: inline-block;">
            <h2 ><b>FIND YOUR CAR</b></h2>
         </div>
         <div style="display: inline-block; margin-left: 10px" >   
            <img src="./img/carlogoimg.jpg" height=70 width=80 alt="..."  >
           </div> 
        </div>

        <!-- search part of the headerdiv -->
        <div id="searchpart" >
            <form action="" method="POST">
            <nav class=" navbar navbar-light bg-light">
                <div class="container-fluid" style="display:inline-block;">
                    
                    <input type="search" name="search" placeholder="Search" aria-label="Search" style="width:300px" >   
                    <button  name="searchitem" type="submit" style="display:inline;">Search</button>                              
                    
                </div>
            </nav>
            </form>
        </div>
        


        <!-- user information part of headerDiv -->
        <div id="currentUserInfo"> 
        <?php   
          

            if(!isset($_COOKIE["user"])){
                echo " ";
            }else{
                echo "Welcome " . $_COOKIE["user"];
            }
        
        ?>
        </div>

    </div>


    <!-- navBar header page section -->
    <div style="background-color:white; border:1px solid black">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listing.php">Listing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="promotions.php">Promotions</a>
                        </li>
                        <li>
                            <!-- post bar only appears for customer -->
                            <div id="adminSection" style="  width:100px">
                            <?php if(isset($_COOKIE["user"])) { ?>                                            
                                    <?php  $post = $userObject -> verifycustomer($_COOKIE["user"]); 
                                        if( $post) {
                                    ?>
                                        <a class="nav-link"  href="myPosts.php">My Posts</a>
                                        
                            <?php }} ?>
                            </div>
                        </li>
                        <li>
                            <!-- customer bar only appears for admins -->
                            <div id="adminSection" style="  width:100px">
                            <?php if(isset($_COOKIE["user"])) { ?>                                            
                                    <?php  $post = $userObject -> verifyAdmin($_COOKIE["user"]); 
                                        if( $post) {
                                    ?>
                                        <a class="nav-link"  href="userList.php"  style="color:#69DF0E;">list of Users</a>
                                        
                            <?php }} ?>
                            </div>
                        </li>
                        <li>
                            <!-- Post bar only appears for admins -->
                            <div id="adminSection" style="   width:100px ">
                            <?php if(isset($_COOKIE["user"])) { ?>  
                                <?php  $post = $userObject -> verifyAdmin($_COOKIE["user"]); 
                                 if( $post) {
                                    ?>                                          
                                        <a class="nav-link"  href="postlist.php" style="color:#69DF0E;" >list of post</a>
                                      
                                   
                            <?php }} ?>
                            </div>

                        </li>
                        <li>
                            <!-- Post bar only appears for admins -->
                            <div id="adminSection" style="   width:100px ">
                            <?php if(isset($_COOKIE["user"])) { ?>  
                                <?php  $post = $userObject -> verifyAdmin($_COOKIE["user"]); 
                                 if( $post) {
                                    ?>                                          
                                        <a class="nav-link"  href="createMsg.php" style="color:#69DF0E;" >Messages</a>                                
                                   
                            <?php }} ?>
                            </div>

                        </li>
                    </ul>
                            <!-- use php to disable and renable the singin and login for user  -->       
                    <div id="registerAndProfile" > 

                        <?php if(!isset($_COOKIE["user"])) { ?>                                            
                            <a href="register.php"> Register</a> or <a href="signin.php"> Sign in</a>                       
                        <?php }else{ ?>
                        <form action="home.php" method="POST" class="btn btn-default btn-sm" >                        
                            <input type="submit" name="logout" value="logout" >
                    </div>
                    <div>   
                        <?php if(isset($_COOKIE["user"])) { ?>                                            
                                <?php  $post = $userObject -> verifycustomer($_COOKIE["user"]); 
                                    if( $post) {
                                ?>                        
                        <a href="items.php">
                            <button type="button" class="btn btn-primary" >Create a post</button>
                        </a>
                        <?php }} ?>
                    </div>
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
                            </li>
                        </ul>
                        </form>
                    <?php   
                    
                
                    } ?>
                   
                    

                </div>
            </div>
        </nav>
    </div>

    

</body>   
</html>
