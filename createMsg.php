<?php

    include_once 'message.php';

    $msgObject = new Message();

    

 if(isset($_POST['update'])) {
    $msgObject->updateMsg();
    $message = $msgObject -> showMsg();
  } 

  if(isset($_POST['fees'])) {
    $msgObject->updatefees();
    $fee = $msgObject -> showfees();
  } 

  $message = $msgObject -> showMsg();
  $fee = $msgObject -> showfees();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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

       <form action="createMsg.php" method="POST"> 
            <label for="exampleInputEmail1" class="form-label">Enter Message </label>
            <input  type="text" class="form-control" name="message"  value="<?php echo $message  ?>" require="">

            <input type="submit" name="update" class="btn btn-primary"  style="float:right;" value="create Message">
            <br><br>

            <div>
            <form action="createMsg.php" method="POST"> 
            <label for="exampleInputEmail1" class="form-label">Change post price </label>
            <input  type="text" class="form-control" name="fee"  value="<?php echo $fee  ?>" require="">

            <input type="submit" name="fees" class="btn btn-primary"  style="float:right;" value="change">
            </div>
        </div>
    <!-- end of Page -->
   
    <?php
            include_once("footer.php");
        ?>
    

</body>   
</html>