<?php

    //create the user class

    class Users{
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "finalproject";
        public $con;


        public function __construct(){

            $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
            if(mysqli_connect_error())
            {
                trigger_error("Not possible to connect to MySQL: ".mysqli_connect_error());
            }
            else
            {
                return $this->con;
            }
        }

        //Create Insert function

        public function insertUser($post){

            //Fetch the data 

            $email = $this-> con-> real_escape_string($_POST['email']);
            $username = $this-> con-> real_escape_string($_POST['username']);
            $phone = $this-> con-> real_escape_string($_POST['phone']);
            $password = $this-> con-> real_escape_string($_POST['password']);
         
            $status = "customer";
            $reg_date = date('d-m-y h:i:s');

            $subscription = $this-> con ->  real_escape_string($_POST['subscription']);

            switch($subscription){
                case 'Classic':
                    $newsubscription = "Classic";
                break;
                case 'Premium':
                    $newsubscription = "Premium";
                    break;
            }

            $query = " INSERT INTO users(email,username,phone,password,subscription,status,reg_date)
            VALUES ('$email','$username','$phone','$password','$newsubscription','$status','$reg_date')"; 
           
            $sql = $this->con->query($query);
            if($sql == true){
                echo "Data inserted!";
                header("Location: signin.php");
            }
            else{
                echo "Registration failed, please try again!";
            }
        }

        //comfirm user function

        public function confirm($post){

            $email = $this-> con-> real_escape_string($_POST['email']);
            $password = $this-> con-> real_escape_string($_POST['password']);

            $query =" SELECT * FROM users WHERE email = '$email' AND password = '$password'";

            $result = $this->con->query($query);
            if($result-> num_rows > 0){

       
            
                //save username in cookies
                $cookie_name = "user";
                $cookie_value = $email;
                setcookie($cookie_name,$cookie_value);
                header("Refresh:0");
             

            }else{
                echo "Account not found.";
            }

        }


        public function displayUserbyEmail($email){

      
             $query = "SELECT * FROM users WHERE email = '$email'";
            $result = $this->con->query($query);
            if($result->num_rows > 0){
                $data = $result->fetch_assoc();           
                return $data;
            }
            else{
                echo "Record not found";
            }
 

        }

            // verify if the user has admin crendentials

            public function verifyAdmin($email){
                $query = "SELECT * FROM users WHERE email = '$email' AND status = 'admin'";

                $result = $this->con->query($query);
            if($result->num_rows > 0){
                           
                return true;
            }
            else{
               return false;
            }

            }

            
            public function verifycustomer($email){
                $query = "SELECT * FROM users WHERE email = '$email' AND status = 'customer'";

                $result = $this->con->query($query);
            if($result->num_rows > 0){
                           
                return true;
            }
            else{
               return false;
            }

            }


        //Update the values in users db 
        public function updateRecord($email){

            $email = $this-> con-> real_escape_string($_POST['uemail']);
            $username = $this-> con-> real_escape_string($_POST['uusername']);
            $phone = $this-> con-> real_escape_string($_POST['uphone']);
            $password = $this-> con-> real_escape_string($_POST['upassword']);
            $subscription = $this-> con ->  real_escape_string($_POST['subscription']);

            switch($subscription){
                case 'Classic':
                    $newsubscription = "Classic";
                break;
                case 'Premium':
                    $newsubscription = "Premium";
                    break;
                
            }
            // Edit customer record
            if(isset($_COOKIE["user"])){ 
                
                $query = "UPDATE users SET username = '$username', phone = '$phone', password= '$password' , subscription='$newsubscription' WHERE email = '$email'";
                $sql = $this->con->query($query);
                if($sql==true)
                {
                    header("Location:profile.php");
                }else{
                    echo "Failed to update, try again!";
                }
            }

        }

            //display all user data for admins

            public function showAdmin(){

                $query = "SELECT * FROM users";
                $result = $this->con->query($query);
                if($result->num_rows > 0){
                    $data = array();
                    while($row = $result->fetch_assoc()){
                        $data[] = $row;
                    }
                    return $data;
                }
                else{
                    echo "No found records";
                }

            }

            public function deleteRecord($id){


                $query = "DELETE FROM users WHERE user_id = '$id' AND status != 'admin'";
        $sql = $this->con->query($query);
        if($sql==true){
            echo "Keep in mind that you cannot delete an admin";
        }
        else{
            echo "Not possible to delete, please try again!";
        }
            }

            
            public function deleteUser($user){


                $query = "DELETE FROM users WHERE email = '$user' AND status != 'admin'";
        $sql = $this->con->query($query);
        if($sql==true){
            setcookie("user", "");
            header("Location:home.php");
          
        }
        else{
            echo "Not possible to delete, please try again!";
        }
            }
            

            
            public function updateUser($id,$status){             
                
               
                    $query = "UPDATE users SET status = '$status' WHERE user_id = '$id'";
                    $sql = $this->con->query($query);
                    if($sql==true)
                    {
                        echo "User status was updated";
                       // header("Refresh:0");
                    }else{
                        echo "Failed to update, try again!";
                    
                }
            }

           


          // charge 5$ to the user when they purchase a post
          
          public function verifySub($email){

            //step 1 access all the data
           
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = $this->con->query($query);
            if($result->num_rows > 0){

                //get the specific subscription a charge a price
                while($row = mysqli_fetch_assoc($result)){
                   

                    if(  $row['subscription'] == "Classic")
                    {
                      
                        return true;
                    }else{
                      
                        return false;
                    }
                }
                
                
                
             }else{
            
             }


          }

    }





?>