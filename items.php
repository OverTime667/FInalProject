<?php


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
    <!--implement bootstrapp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <!--div representing the header of the page --> 
    <?php

        include_once("header.php");
    ?>

    <!-- Body of page Starts here -->
    <div id="bodyPage">
        

        <div id= "containeseverything" >
        <br>
        <br>                     
                     
        <!--ask the user to register info -->
            <div id="addItem"  >
                    
                <form>
                    <div class="mb-3">
                        <label for="exampleInputCarBrand" class="form-label">Car Brand</label>
                        <input type="text" class="form-control"  >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputCarPrice" class="form-label">Car Price</label>
                        <input type="text" class="form-control"  >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputLocation" class="form-label">Location</label>
                        <input type="text" class="form-control"  >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputmillage" class="form-label">milage</label>
                        <input type="text" class="form-control"  >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputseats" class="form-label">Seats</label>
                        <input type="text" class="form-control"  >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputAvailability" class="form-label">Availability</label>
                        <input type="text" class="form-control"  >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDateOfModel" class="form-label">Date of Model</label>
                        <input type="text" class="form-control"  >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputImage" class="form-label">Image</label>
                        <input type="text" class="form-control"  >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Description</label>
                        <input type="text" class="form-control"  >
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
            

        </div>
        <br>
        <br>
                                          
    </div>

    <!-- end of Page -->
    <?php

        include_once("footer.php");
    ?>

</body>   
</html>
