<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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


        <div id="homeCards">
            <br>
            <br>
            <!-- card for listing -->
            <div class="card bg-dark text-black">
                <img src="./img/carlogoimg.jpg" class="card-img" height=300 alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title">Welcome to the best online commerce </h5>
                    <h5 class="card-title">If you are ready to find a car click here!! </h5>
                    <a href="listing.php">
                        <button type="button" class="btn btn-primary" >Go to our list </button>
                    </a>               
                </div>
            </div>

            <br/>
            <br/>
            <!-- card for promotions -->
            <div class="card bg-dark text-black">
                <img src="./img/carlogoimg.jpg" class="card-img" height=300 alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title">Welcome to the best online commerce </h5>
                    <h5 class="card-title">If you are ready to find a car click here!! </h5>
                    <a href="promotions.php">
                        <button type="button" class="btn btn-primary" >See our promotions</button>
                    </a>               
                </div>
            </div>


            <br/>
            <br/>
            
            <!-- card for promotions -->
            <div class="card bg-dark text-black">
                <img src="./img/carlogoimg.jpg" class="card-img" height=300 alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title">If you haven't register yet. Click here!</h5>
                    <a href="register.php">
                        <button type="button" class="btn btn-primary" >Register here</button>
                    </a>               
                </div>
            </div>
            <br>
            <br>
        </div>
    </div>








    <?php
        include_once("footer.php");
    ?>  

</body>   
</html>
