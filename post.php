<?php 



    class Posts{
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


        public function insertPost($post){

            $owner = $_COOKIE["user"];
            $brand = $this-> con-> real_escape_string($_POST['brand']);
            $price = $this-> con-> real_escape_string($_POST['price']);
            $location = $this-> con-> real_escape_string($_POST['location']);
            $milage = $this-> con-> real_escape_string($_POST['milage']);
            $seats = $this-> con-> real_escape_string($_POST['seats']);
            $availability = $this-> con-> real_escape_string($_POST['availability']);
           
           
            $dateofpost = date('d-m-y h:i:s');
            $fees =  5 ;
            $datesold =  $this-> con-> real_escape_string("");
            $image = $this-> con-> real_escape_string($_POST['image']);
            $other = $this-> con-> real_escape_string($_POST['other']);
            $datemodel= $this-> con-> real_escape_string($_POST['trial']);
           
            //charge depending of the subscription
            
            $userObject = new Users();

            if($userObject -> verifySub($owner) == true){
               $fees = 5;
            }else{
            
             $fees = 0;
            }

            $query = " INSERT INTO posts(owner, brand, price, location, milage, seats, availability, date_of_model, date_of_post, fees, dateSold, image, other)
            VALUES ('$owner','$brand','$price','$location','$milage','$seats','$availability', '$datemodel', '$dateofpost', '$fees', '$datesold', '$image', '$other')"; 
           
            $sql = $this->con->query($query);
            if($sql == true){
               




            }
            else{
                echo "Registration failed, please try again!";
            }
        }

        // public function checksubscription($email){
        //     $userObject = new Users();


        //     if(var_dump( $userObject -> verifySub($owner))){
        //         return true;
        //     }else{
        //         return false;
        //     }
            
            
            
       // }

        public function displayData(){

            $query = "SELECT * FROM posts";
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
        

        public function displayUniquePost($id){

        $query = "SELECT * FROM posts WHERE post_id = '$id'";
        $result = $this ->con->query($query);

        if($result -> num_rows > 0){
            $data = $result->fetch_assoc();           
            return $data;
        }
        else{
            echo "Record not found";
        }


        }



        public function deleteRecord($id){
            $query = "DELETE FROM posts WHERE post_id = '$id'";
            $sql = $this->con->query($query);
            if($sql==true){
                echo "Record deleted successfully";
            }
            else{
                echo "Not possible to delete, please try again";        
            }
        }

    

    public function searchItem($searchItem){
        
        $query = "SELECT * FROM posts WHERE brand OR price OR location LIKE '%$searchItem%'"; 

        $sql = $this->con->query($query);
        if($result->num_rows > 0){
            $data = array();
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    

    }
}

?>