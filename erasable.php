<?php 
session_start();

// this class allows to interact with the db without using raw SQL statements.
global $wpdb;


?>

<!-- Contains the styles of the page -->
<!-- fr will allow the grid to grow depending on the space available -->



    
<!-- this line of code will print the header of the page -->
<?php mesmerize_get_header(); ?>

    
  <?php
//this line will allow the use of elementor
// depending of where you add this code, it will allow the user to change from t
the_content();

// allows the use of wpml translation pluging
do_action('wpml_add_language_selector'); 
?>
<!-- Fetch the style from the style page of the Mesmerize theme -->
 <link rel="stylesheet" type="text/css" href="<?php echo site_url('/wp-content/themes/mesmerize/adoption-assets/style.css'); ?>">

 <link rel="stylesheet" type="text/css" href="<?php echo site_url('/wp-content/themes/mesmerize/trial/style.css'); ?>">

    <!-- Front-end Code starts here -->
    <div id='page-content' class="page-content">
        <div class="<?php mesmerize_page_content_wrapper_class(); ?>">
            
             <!-- Filter Section -->
             <hr style="width:50%; margin: auto;">
           <?php
           //fecth the information from the database
            $countries_total = $wpdb -> get_results("SELECT * FROM countries");
            $specifies_total = $wpdb -> get_results("SELECT * FROM species");
            
            
           ?>
           
           
             <h3> Filter</h3>
                <div style="display: flex; width:100%"> 
                  <div id="species-container" style="width:40%;" >
                       <h4>Species</h4>
                       <form action="" method="get">
                        <select name="species" style="margin: auto; width:100%" id="species">
                             <option value="" selected disabled hidden>Select species</option>
                         <?php
                     foreach( $specifies_total as $species)
                         { ?>
                           <option value="<?php echo $species -> species_name ?>"><?php echo $species -> species_name ?></option>
                           
                           <?php } ?>
                       </select>
                        
                   </div>
                   <div id="country-container" style="width:40%; margin-left: 12%;" >
                           <h4>Country</h4>
                       <select name="country" style="margin: auto; width:100%;" id="species">
                            <option value="" selected disabled hidden>Select a country</option>
                              <?php
                     foreach( $countries_total as $country)
                         { ?>
                           <option value="<?php echo $country -> country_name ?>"><?php echo $country -> country_name ?></option>
                           
                           <?php } ?>
                       </select>
                        
                    </div>
                    <div class="container" style="width:100%" >
                        <?php 
                        //obtain the select values
                            //Value for species
                                if(isset($_GET['species']))
                                {
                                    $species = $_GET['species'];
                                }else
                                {
                                    $species = "nothing";
                                }
                            //value for country
                                 if(isset($_GET['country']))
                                {
                                   $country = $_GET['country'];
                                }else
                                {
                                    $country = "nothing";
                                }
                        ?>
                        
                      <input type="submit" name="submit" value="search"  style="font-size: 0.9rem;padding: 0.2rem;  margin-left:22%;text-align: center;border: 0.1rem solid #56a5eb;text-decoration: none; color: #56a5eb; background-color: white;">
                       </form>
                          
<!--                   <a class="button" href="" style="font-size: 0.9rem;padding: 0.2rem;  margin-left:22%;text-align: center;border: 0.1rem solid #56a5eb;text-decoration: none; color: #56a5eb; background-color: white;">Advance search</a>
-->                    </div>
                        
                    
            </div>
           <br>
             <hr style="width:50%; margin: auto;">
               <!-- Grid List Section -->
                <h3>Testing grid</h3>
                
                <div style="height:auto; widht: auto;" >
                    <div class="my-container" >
                        
                        <?php 
                        
                      //fecth information from url
                         $species =  htmlspecialchars($_GET["species"]);
                         $country_url =  htmlspecialchars($_GET["country"]);
                    
                        // limit the number of records per page
                         $perpage = 6;
                        $calc = $perpage * $page;
                        $start = $calc - $perpage;
                        
                        //find the total number of results stored in adoption
                        $adoptions_total  = $wpdb -> get_var("SELECT count(*) FROM adoptions ");
                        
                        // determine the number of pages available
                           $number_of_page = ceil($adoptions_total / $perpage);
                        
                        //determine the page number that user is currently visiting
                        if(isset($_GET["pid"])){
                            $page = intval($_GET["pid"]);
                        }else{
                             $page = 1;
                        }
                        
                        //determine the sql Limit starting number
                        $page_first_result = ($page -1) * $perpage;
                        
                        //retrieve selected result 
                        $results = $wpdb -> get_results("SELECT * FROM adoptions  Limit  $page_first_result , $perpage ");
                        
                        
                        
                        
                        
                       // $adoptions = $wpdb -> get_results("SELECT * FROM adoptions Limit $start , $perpage ");
                        
                        foreach( $results as $key => $adopt): ?>
                        
                        <div class="grid-item" style="border-style: solid; height: 480px; ">
                            
                            <!-- store my values -->
                            <?php
                            $country_name = $adopt->country_id ; 
                             $pets_image_location = $adopt -> profile_picture_filename ;
                            ?>
                            
                                <!-- optain specific values from adoptions -->
                                   <?php 
                                   $country = $wpdb -> get_row("SELECT * FROM countries WHERE country_id = '$country_name' "); 
                                   
                                     ?>
                                    
                                <!-- inside the list box customization  -->
                                <div style:" heigh: 350px; width :200px;">
                                <img src="https://www.gazdiravar.com/wp-content/plugins/mesmerize-companion/theme-data/mesmerize/sections/images/<?php echo $pets_image_location?>.png" alt="Adopt pet" width="350" height="200">
                                
                                </div>
                                <label><?php  echo $adopt->name  ?></label>
                                <br>
                                <label><?php echo $country ->country_name  ?></label>
                                <br>
                                  <label><?php  echo $pets_image_location  ?></label>
                            <!--   <?= $key; ?>  -->
                          
                        </div>
                         <?php endforeach; ?>
                    </div>
                    
                   <div>
                    <!-- pagination Section -->
                    <div class="pagination ">
                        <a href="#">&laquo;</a>
                        
                        <?php
                        $address = "https://www.gazdiravar.com/adoptions1/?pid=";
                        for($page = 1; $page<= $number_of_page; $page++) 
                     {  
                     ?>
                        
                    <a href="https://www.gazdiravar.com/adoptions1/?pid=<?php echo $page ?>&species=<?php echo $species?>&country=<?php echo $country_url?>&submit=search"><?php echo "$page" ?></a>
                       
                    
                        
                        <?php } ?>
                        <a href="#">&raquo;</a>
                    </div>
                         
                        
                    
               </div>
            
                //Testing translation
                 <div >
                 <?php 
                  echo '<h5 >' . __('Details', 'textdomain') . '</h5>';
             
                  ?>
                
                 
            
                
                 </div>
        
        
        
        </div>
    </div>


<!--this line of code will print the footer of the page -->
<script src="<?php echo site_url('/wp-content/themes/mesmerize/adoption-assets/adoptionsScript.js'); ?>" type="text/javascript">
<?php get_footer(); ?>
