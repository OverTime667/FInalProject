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
                <img src="https://www.rolls-roycemotorcars.com/content/dam/rrmc/marketUK/rollsroycemotorcars_com/1-0-home/page-properties/rolls-royce-motor-cars-models-share-image.jpg" class="card-img" height=500 alt="...">
                <div class="card-img-overlay" style="border: 1px solid black;   text-align: center; ">
                   
                    <h2 class="card-title" style="margin-top:40px; color:blue; ">Welcome to the best online e-commerce </h2>
                    <h2 class="card-title">If you are ready to find a car click here!! </h2>
                    <a href="listing.php">
                        <button type="button" class="btn btn-primary"  style="margin-top:19% " >Go to our list </button>
                    </a>
                                
                </div>
            </div>

            <br/>
            <br/>
            <!-- card for promotions -->
            <div class="card bg-dark text-black">
                <img src="https://www.napiermkt.com/uploads/1/0/9/8/10981970/published/promotion-image-sm_3.jpg?1559742827" class="card-img" height=500 alt="...">
                <div class="card-img-overlay" style="border: 1px solid black;   text-align: center; ">
                    <h2 class="card-title" style="margin-top:30px">Welcome to the best online commerce </h2>
                    <h2 class="card-title">If you are ready to find a car click here!! </h2>
                    </br>
                    <a href="promotions.php">
                        <button type="button" class="btn btn-primary" style="margin-top:15%"  >See our promotions</button>
                    </a>               
                </div>
            </div>


            <br/>
            <br/>
            
            <!-- card for promotions -->
            <div class="card bg-dark text-black" style=" height:300px; border: 1px solid black; ">
               
                <div class="card-img-overlay" style=" background-color: #373373;  text-align: center;">
                </br> </br>
                    <h1 class="card-title" style="color:white;">If you haven't register yet.</h1>
                    <h1 style="color:white;"> Click here!</h1>                 
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
