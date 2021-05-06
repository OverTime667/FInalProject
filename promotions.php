<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotions</title>
    <!--implement bootstrapp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<?php

include_once("header.php");
?>


    <!-- Body of page Starts here -->
    <div id="bodyPage" >

    <img src="https://standinggroups.ecpr.eu/sgoc/wp-content/uploads/sites/51/2018/09/Become-a-Member.png" width="500" height="200"   alt="...">
    <div class="card mb-3">
  <img src="https://miro.medium.com/max/4196/1*uYfVGhAYq6ss6n_wBrRvBw.jpeg" class="card-img-top"  alt="...">
  <div class="card-body">
    <h5 class="card-title">Classic</h5>
    <p class="card-text">The classic option will charges 5$ every time that a post is created. This is the default membership of this website</p>
    <a href="register.php">
         <button type="button" class="btn btn-primary" >Subscribe here </button>
    </a>       
  </div>
  </div>

  <div class="card mb-3">
  <img src="https://timecommunications.biz/wp-content/uploads/Blog/2018/February_2018/Happy-Customer-Service-Rep.png" height="600" class="card-img-top" alt="...">
    <!-- second card about Premium -->
    <div class="card-body">
    <h5 class="card-title">Premium</h5>
    <p class="card-text">The classic option will charges 15$ every month. This will allow you to make as many post as you like for the price of 15$/month.</p>
    <a href="register.php">
         <button type="button" class="btn btn-primary" >Join us now </button>
    </a>       
  </div>

    </div>
    </div>

<?php

    include_once("footer.php");
?>
  
  

</body>   
</html>