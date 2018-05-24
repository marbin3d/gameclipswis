
<?php

/*  Project:  Game Clips
   Sofia & Marbin
  University of Queensland
  2018  
*/

// Create connection
include("dbConnect.php");

// Check connection
if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);  
}


//AJAX js values from client
/*user email receive user*/
$email=$_POST["emailDB"];
$email=str_replace('"','',$email);

$videoId=$_POST["videoIdDB"];


//LIMIT 1
$deleteVideo=mysqli_prepare($con,"DELETE FROM videos where email=? AND videoID=?");


//"ss" means datatype order. one s string 
//@param s string
mysqli_stmt_bind_param($deleteVideo,"si",$email,$videoId);
mysqli_stmt_execute($deleteVideo);
mysqli_stmt_store_result($deleteVideo);

//result
mysqli_stmt_bind_result($deleteVideo);

$responseUserId=array();


if(mysqli_stmt_fetch($deleteVideo)){
    
    
  $responseUserId[] = array(
         
         //"videoId" => $videoId, 
      
          "success" => true
       );     
              
           
    
    //LIMIT 1
    $deleteVideoIdUserVideo=mysqli_prepare($con,"DELETE FROM uservideo where videoID=?");

    //"ss" means datatype order. one s string 
    //@param s string
    mysqli_stmt_bind_param($deleteVideoIdUserVideo,"i",$videoId);
    mysqli_stmt_execute($deleteVideoIdUserVideo);
    mysqli_stmt_store_result($deleteVideoIdUserVideo);

    //retrieve
    mysqli_stmt_bind_result($deleteVideoIdUserVideo);

    
    if(mysqli_stmt_fetch($deleteVideoIdUserVideo)){

        $responseUserId[] = array(
         
           "success" => true           
          
       );   
        
    }
    
   
    
    
} //end delete video
    
//header('Content-Type: application/json');
   
//echo json_encode(array("response"=>$responseUserId));

mysqli_close($con);

?>