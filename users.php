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
            $subscription = "default";
            $status = "customer";
            $reg_date = date('d-m-y h:i:s');

            $query = " INSERT INTO users(email,username,phone,password,subscription,status,reg_date)
            VALUES ('$email','$username','$phone','$password','$subscription','$status','$reg_date')"; 
           
            $sql = $this->con->query($query);
            if($sql == true){
                echo "Data inserted!";
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


        //Update the values in users db 
        public function updateRecord($email){

            $email = $this-> con-> real_escape_string($_POST['uemail']);
            $username = $this-> con-> real_escape_string($_POST['uusername']);
            $phone = $this-> con-> real_escape_string($_POST['uphone']);
            $password = $this-> con-> real_escape_string($_POST['upassword']);

            // Edit customer record
            if(isset($_COOKIE["user"])){ 
                
                $query = "UPDATE users SET username = '$username', phone = '$phone', password= '$password' WHERE email = '$email'";
                $sql = $this->con->query($query);
                if($sql==true)
                {
                    header("Location:profile.php");
                }else{
                    echo "Failed to update, try again!";
                }
            }

        }


    }





?>