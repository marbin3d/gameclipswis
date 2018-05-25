<?php
/*Feature: ANALYTICS RATINGS BY VIDEO*/
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



$email= $_POST["userEmail"];
//remove double quotes
$email=str_replace('"','',$email);

//test
//$email="no email defined";

//to go back and local path
//$url = "https://infs3202-c562e525.uqcloud.net/game-clips-wis/myClips.php"; 

$url = "../myClips.php"; 


 
//limit to active user--
 //$sqlAnalytics=mysqli_prepare($con,"SELECT videoID,title,source,views,description,email,dateUpload,category FROM videos where email=?");

//$sqlAnalytics=mysqli_prepare($con,"SELECT videoID,title SUM(rating) AS ratingsAdded FROM uservideo where email=? GROUP BY videoID");

$sqlAnalytics=mysqli_prepare($con,"SELECT videoID,title, SUM(rating) AS ratingsAdded FROM uservideo GROUP BY videoID");



   //"s" datatype order. one s string 
  //@param s string
mysqli_stmt_bind_param($sqlAnalytics);

mysqli_stmt_execute($sqlAnalytics);
mysqli_stmt_store_result($sqlAnalytics);


//retrieve
mysqli_stmt_bind_result($sqlAnalytics,$videoID,$title,$ratingsAdded);

$response=array();

while(mysqli_stmt_fetch($sqlAnalytics)){
                
    
       $response[] = array(
     
     // "userID" => $userID,   
       "videoID" => $videoID, 
           
       "title" => $title,
           
      "ratingsAdded" => $ratingsAdded,      
                  
      "success" => true
        );

    }

    header('Content-Type: application/json');
    //echo json_encode(array($response));
   echo json_encode(array("response"=>$response));

//close connection
 mysqli_close($con);


?>


