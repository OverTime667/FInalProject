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
            $availability = "Available";
           
           
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

        // show total profits
        public function totalProfits(){
            //$profits = 0;
            $query = "SELECT SUM(fees) AS total FROM posts";
            $result = $this->con->query($query);
            $row = $result->fetch_assoc();
             return $row['total'];
        
        }

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

        //display the onwer Information 

        public function displayContact($id){
            $query = "SELECT * FROM posts WHERE post_id = '$id'";
            $result = $this ->con->query($query);

            //fetch the information from the customer
            if($result -> num_rows > 0){
                $data = $result->fetch_assoc();           
             
                
                $userObject = new Users();
                
                $userData = $userObject ->displayUserbyEmail($data['owner']);
                
                return $userData;

                

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

    

 /*    public function searchItem($searchItem){
        
      //  $query = "SELECT * FROM posts WHERE brand LIKE '%$searchItem%' OR  location LIKE '%$searchItem%' OR price <=  CONVERT(INT, '$searchItem') "; 

      $query = "SELECT * FROM posts WHERE  price <= $searchItem "; 
      //CONVERT(INT, '$searchItem') "; 
        $sql = $this->con->query($query);
        if($result->num_rows > 0){
            $data = array();
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    

    } */


    public function updateRecord($postData){

       
        $brand = $this-> con-> real_escape_string($_POST['ubrand']);
        $price = $this-> con-> real_escape_string($_POST['uprice']);
        $seats = $this-> con-> real_escape_string($_POST['useats']);
        $milage = $this-> con-> real_escape_string($_POST['umilage']);
        $availability = $this-> con ->  real_escape_string($_POST['availability']);
        $date_of_model = $this-> con ->  real_escape_string($_POST['udate']);
        $image = $this-> con ->  real_escape_string($_POST['uimage']);
        $id = $this-> con ->  real_escape_string($_POST['uid']);
        $location = $this-> con ->  real_escape_string($_POST['ulocation']);
        

        switch($availability){
            case 'Available':
                $newavailability = "Available";
            break;
            case 'Unavailable':
                $newavailability = "Unavailable";
                break;
        }



        // Edit customer record
        if(!empty($id) && !empty($postData)){
            
            $query = "UPDATE posts SET brand = '$brand', price = '$price', location='$location', seats= '$seats' , milage='$milage', availability='$newavailability', date_of_model='$date_of_model', image='$image' WHERE post_id= '$id'";
            $sql = $this->con->query($query);
            if($sql==true)
            {

                //header("Location: myPosts.php");
              //  header("Refresh:0");
            }else{
                echo "Failed to update, try again!";
            }
     
        }
    }

        
            
        public function updatepost($id,$availability){             
                
               
            $query = "UPDATE posts SET availability = '$availability' WHERE post_id = '$id'";
            $sql = $this->con->query($query);
            if($sql==true)
            {
                echo "Post was updated";
               // header("Refresh:0");
            }else{
                echo "Failed to update, try again!";
            
        }
    }



    

    
}

?>