<?php

$dataX2= "'from js: " . $_POST["x2"] . " '";

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



///////////////////////////////////////////
////////////SQL DB REQUEST////////////

//$url = "../myClips.php"; 

//@ensure: request all users
$sqlAllUsers=mysqli_prepare($con,"SELECT userId,FName FROM users");

//"ss" means datatype order. one s string 
//@param s string
mysqli_stmt_bind_param($sqlAllUsers);
mysqli_stmt_execute($sqlAllUsers);
mysqli_stmt_store_result($sqlAllUsers);

//retrieve
mysqli_stmt_bind_result($sqlAllUsers,$userID,$FName);

$responseAllUsers=array();

while(mysqli_stmt_fetch($sqlAllUsers)){    
    
    $responseAllUsers[] = array(
        
         "userId" => strval($userID), 
         "name" => $FName,
      
          "success" => true
         );                
}



//@ensure: request all videos
$sqlAllVideos=mysqli_prepare($con,"SELECT videoID,title FROM videos");

//"ss" means datatype order. one s string 
//@param s string
mysqli_stmt_bind_param($sqlAllVideos);
mysqli_stmt_execute($sqlAllVideos);
mysqli_stmt_store_result($sqlAllVideos);

//retrieve
mysqli_stmt_bind_result($sqlAllVideos,$videoID,$title);

$responseAllVideos=array();

while(mysqli_stmt_fetch($sqlAllVideos)){
    
    $responseAllVideos[] = array(
        
         "videoId" => strval($videoID), 
         "title" => $FName,
      
          "success" => true
         );                
}


//@ensure: request all usersId videoId rating
$sqlAllusersvideosRated=mysqli_prepare($con,"SELECT uservideoID,userID,videoID,rating FROM uservideo");

//"ss" means datatype order. one s string 
//@param s string
mysqli_stmt_bind_param($sqlAllusersvideosRated);
mysqli_stmt_execute($sqlAllusersvideosRated);
mysqli_stmt_store_result($sqlAllusersvideosRated);

//retrieve
mysqli_stmt_bind_result($sqlAllusersvideosRated,$uservideoID,$userID,$videoID,$rating);

$responseAllusersVideosRatings=array();

while(mysqli_stmt_fetch($sqlAllusersvideosRated)){
    
    $responseAllusersVideosRatings[] = array(
        
         //"uservideoId" => $uservideoID, 
         "userId" => strval($userID) ,
         "videoId" => strval($videoID),
         "rating" => $rating ,
      
          "success" => true
         );                
}



//////////////////////////////////////////
//Record as an array ////

 $responseDbAllUsers[] = array(
     
     // request all users from DB      
      "userId" => '$userId', 
      "name" => 'Marbin',
              
      "success" => true
        );


$responseDbAllVideos[] = array(
     
       // request all videos from DB  
      "videoId" => '$videoID',
  
      "success" => true
        );


$responseDbRatings[] = array(
           
       "videoId" => '$videoID',    
      "userId" => '$userId',      
      "rating" => '3',
          
      "success" => true
        );


# Data consolidation as json object to be Sent to API recommender
$dataToRecommender[] = array(
           
       "users" => $responseAllUsers,    
      "videos" => $responseAllVideos,      
      "userVideosRated" =>$responseAllusersVideosRatings,
          
      "success" => true
        );


//API recommender Service integration
$urlAPI = 'https://www.linkservicesonline.com/recommend';
//$url = 'https://www.linkservicesonline.com'; 


//Preparing data for API recommender
$dataToSend=$dataToRecommender;

$options = array(
  'http' => array(
    'method'  => 'POST',
   'content' => json_encode($dataToSend),         
    'header'=>  "Content-Type: application/json\r\n" .
               "Accept: application/json\r\n"
                
    )
);

//all body context WORKS!
$context  = stream_context_create( $options );
//ensure response from RESTful API recommender
$json_response = file_get_contents( $urlAPI , false, $context );


//decoding response from API recommender
$jsonDecoded=json_decode($json_response,true);
#$jsonRest =  respJ;

$respJsonRest=array();

$respJsonRest[] = array( 
    
    //ids video clips recommended
    
     "recommendIdVideos" => $jsonDecoded["recommendIdVideos"], 
    
    
      "success" => true
    
        );

//Response to game clips client js
header('Content-Type:application/json');
echo json_encode(array("response"=>$respJsonRest));
#echo json_encode($respJsonRest);


/*
echo ("<SCRIPT LANGUAGE='JavaScript'>
               window.alert('$json_response ')
               window.location.href='$url';
               </SCRIPT>
               <NOSCRIPT>
                   <a href='$url'>Successfully login . Click here if you are not redirected.</a>
               </NOSCRIPT>");   */

mysqli_close($con);

?>


