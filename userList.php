<?php   

include_once 'header.php';

    $userObject = new Users();

      // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $userObject->deleteRecord($deleteId);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    

<h2>View Records
   
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>email</th>
        <th>username</th>
        <th>phone</th>
        <th>password</th>
        <th>subscription</th>
        <th>status</th>
        <th>registration date</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $users = $userObject->showAdmin(); 
          foreach ($users as $user) {
        ?>
        <tr>
          <td><?php echo $user['user_id'] ?></td>
          <td><?php echo $user['email'] ?></td>
          <td><?php echo $user['username'] ?></td>
          <td><?php echo $user['phone'] ?></td>
          <td><?php echo $user['password'] ?></td>
          <td><?php echo $user['subscription'] ?></td>
          <td><?php echo $user['status'] ?></td>
          <td><?php echo $user['reg_date'] ?></td>
          <td>
            
            <a href="userList.php?deleteId=<?php echo $user['user_id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>





<?php

include_once("footer.php");
?>   
</body>
</html>