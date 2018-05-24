<?php
/*Feature: SEARCH VIDEO*/
/*  Project:  Game Clips
   Sofia Elena & Marbin
  University of Queensland
  2018
  NB. php on server side. increase php.ini memory limit to 1024M and max post upload 50M, upload 50M
*/

// Create connection

include("dbConnect.php");

// Check connection
if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);  
}

$keyWordGc=strval($_POST["keyWordGameInClipsDB"]);


//to go back and local path
//$url = "https://infs3202-c562e525.uqcloud.net/game-clips-wis/myClips.php"; 
//$url = "../index.php"; 


//Search using similar words by title
$sqlSearch=mysqli_prepare($con,"SELECT videoID,title,source,views,description,email,dateUpload,category FROM videos where (LOWER(title) LIKE LOWER(CONCAT('%',?,'%')) ) ");


   
//@param s string
mysqli_stmt_bind_param($sqlSearch,"s",$keyWordGc);


mysqli_stmt_execute($sqlSearch);
mysqli_stmt_store_result($sqlSearch);


//retrieve
mysqli_stmt_bind_result($sqlSearch,$videoID,$title,$source,$views,$description,$email,$dateUpload,$categoryVideo);

$response=array();

while(mysqli_stmt_fetch($sqlSearch)){
                
    
       $response[] = array(
     
     // "userID" => $userID,   
       "videoID" => $videoID,    
      "title" => $title,      
      "sourceLinkVideo" => $source,           
     "category" => $categoryVideo,
      "views" => $views,
      "description" => $description,
      "videoUploadBy" => $email,
      "videoDateUpload" => $dateUpload,
           
                    
      "success" => true
        );

    }

    header('Content-Type: application/json');
    //echo json_encode(array($response));
   echo json_encode(array("response"=>$response));

//close connection
 mysqli_close($con);


?>


