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
                echo "cookie save";

            }else{
                echo "Account not found.";
            }

        }


    }





?>