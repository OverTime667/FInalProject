<?php 



    class posts{
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


        public function insertPost(){

            $owner = $this-> con-> real_escape_string($_POST['owner']);
            $brand = $this-> con-> real_escape_string($_POST['brand']);
            $price = $this-> con-> real_escape_string($_POST['price']);
            $location = $this-> con-> real_escape_string($_POST['location']);
            $milage = $this-> con-> real_escape_string($_POST['milage']);
            $seats = $this-> con-> real_escape_string($_POST['seats']);
            $availability = $this-> con-> real_escape_string($_POST['availability']);
            $dateofmodel = $this-> con-> real_escape_string($_POST['date_of_model']);
            $dateofpost = date('d-m-y h:i:s');
            $fees = $this-> con-> real_escape_string($_POST['fees']);
            $datesold = $this-> con-> real_escape_string($_POST['dateSold']);
            $image = $this-> con-> real_escape_string($_POST['image']);
            $other = $this-> con-> real_escape_string($_POST['other']);
            
            

            $query = " INSERT INTO posts(owner, brand, price, location, milage, seats, availability, date_of_model, date_of_post, fees, dateSold, image, other)
            VALUES ('$owner','$brand','$price','$location','$milagen','$seats','$availability', '$dateofmodel', '$dateofpost', '$fees', '$datesold', '$image', '$other')"; 
           
            $sql = $this->con->query($query);
            if($sql == true){
                echo "Data inserted!";
            }
            else{
                echo "Registration failed, please try again!";
            }



        }
    }







?>