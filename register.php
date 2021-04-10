<?php


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
    <div id="headerDiv">
        <!-- logo part of headerDiv -->
        <div id="logo">
            <h2 ><b>FIND YOUR CAR</b></h2>
           
        </div>

        <!-- search part of the headerdiv -->
        <div id="searchpart">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" >
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            </nav>
        </div>
        

        <!-- user information part of headerDiv -->
        <div id="currentUserInfo"> 
            user
        </div>

    </div>


    <!-- navBar header page section -->
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link active" aria-current="page" href="final_project.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listing.php">Listing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="promotions.php">Promotions</a>
                        </li>
                    </ul>                        
                    <div id="registerAndProfile">                                               
                        <a href="register.php"> Register</a> or <a href="signin.php"> Sign in</a>                       
                    </div>                                         
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Body of page Starts here -->
    <div id="bodyPage">
        

        <div id= "containeseverything" >

        <!--ask the user to register info -->
            <div id="Registerdiv"  >          
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">name</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                 
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>

            <div id="alreadyRegDiv"> 
            
                <form>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Already Registered?</strong></label></br>
                        <label for="exampleInputPassword1" class="form-label"><strong>Sign in to post your ads</strong></label>
                    </div>
                 
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>

            </div>

        </div>
    </div>

    <!-- end of Page -->
    <footer>
    <div id="footerContainer">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid" >
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link " href="aboutus.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactus.php">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="question.php">Have a Question ?</a>
                        </li>
                    </ul>   
            </div>    
            
        </nav>      
    </div>
    </footer>  

</body>   
</html>