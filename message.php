<?php

    //create the user class

    class Message{
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

        /* public function insertmsg($post){

            //Fetch the data 

            $message = $this-> con-> real_escape_string($_POST['message']);
            $owner = $this-> con-> real_escape_string($_POST['admin']);
            $reg_date = date('d-m-y h:i:s');

           

            $query = " INSERT INTO messages(message,owner,reg_date)
            VALUES ('$message','$owner','$reg_date')"; 
           
            $sql = $this->con->query($query);
            if($sql == true){
                echo "Data inserted!";
               // header("Location: signin.php");
            }
            else{
                echo "Messagge failed, please try again!";
            }
        } */
        
        public function updateMsg(){

             // Edit customer record
            
             $message = $this-> con-> real_escape_string($_POST['message']);
                $query = "UPDATE configure SET message = '$message' WHERE message_id = 1";
                $sql = $this->con->query($query);
                if($sql==true)
                {
                 
                }else{
                    echo "Failed to update, try again!";
                }
            }

            public function updatefees(){

                // Edit customer record
               
                $fees = $this-> con-> real_escape_string($_POST['fee']);
                   $query = "UPDATE configure SET fees = '$fees' WHERE message_id = 1";
                   $sql = $this->con->query($query);
                   if($sql==true)
                   {
                    
                   }else{
                       echo "Failed to update, try again!";
                   }
               }
        
        
        public function showMsg(){
            $query = "SELECT message AS msg FROM configure where message_id = 1";
            $result = $this->con->query($query);
            $row = $result->fetch_assoc();
             return $row['msg'];

        }

        public function showfees(){
            $query = "SELECT fees AS fee FROM configure where message_id = 1";
            $result = $this->con->query($query);
            $row = $result->fetch_assoc();
             return $row['fee'];

        }
    }


        ?>