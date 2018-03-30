<?php
/*Feature: SEARCH VIDEO*/
/*  Project:  Game Clips
   Sofia Elena & Marbin
  University of Queensland
  2018
  NB. php on server side. increase php.ini memory limit to 1024M and max post upload 50M, upload 50M
*/

// Create connection
//$conn = new mysqli($host, $username, $password,$database);
//$conn=mysqli_connect($host,$usernameC,$passwordC,$database);
include("dbConnect.php");

// Check connection
if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);  
}



$videoTitle=$_POST["searchTitle"];
$category=$_POST["searchCategory"];
$ageRange=$_POST["searchAgeRange"];

//to go back and local path
//$url = "https://infs3202-c562e525.uqcloud.net/game-clips-wis/myClips.php"; 

$url = "../index.php"; 


//LIMIT 1
$sqlSearch=mysqli_prepare($con,"SELECT title,source,views FROM videos where title=?");


//"ss" means datatype order. one s string 
//@param s string
mysqli_stmt_bind_param($sqlSearch,"s",$videoTitle);
mysqli_stmt_execute($sqlSearch);
mysqli_stmt_store_result($sqlSearch);


//retrieve
mysqli_stmt_bind_result($sqlSearch,$title,$source,$views);

$response=array();

if(mysqli_stmt_fetch($sqlSearch)){
    
    
    $response[] = array(
      
          "success" => true
         );    
              
              session_start();//Set session
              $_SESSION['source'] = "$source";    
              $_SESSION['title'] = "$title";    
              $_SESSION['views'] = "$views";  
    
              $loadedCheck=1;
    
             
            echo ("<SCRIPT LANGUAGE='JavaScript'>
              console.log('$source');
               window.alert('clip loaded sucessfully ')
               window.location.href='$url';
               
               </SCRIPT>
               <NOSCRIPT>
                   <a href='$url'>Successfully loaded  . Click here if you are not redirected.</a>
                   
               </NOSCRIPT>"); 
    
        }
 
            echo ("<SCRIPT LANGUAGE='JavaScript'>
               window.alert('clip was not found')
               window.location.href='$url';
                     
               
               </SCRIPT>
               <NOSCRIPT>
                   <a href='$url'>successful. Click here if you are not redirected.</a>
               </NOSCRIPT>");       

        //end search         


mysqli_close($con);


?>


