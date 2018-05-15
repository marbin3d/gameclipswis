
<?php

/*  Project:  Game Clips
   Sofia Elena & Marbin
  University of Queensland
  2018
  NB. php on server side. increase php.ini memory limit to 1024M and max post upload 850M, upload 850M
*/

// Create connection
//$conn = new mysqli($host, $username, $password,$database);
//$conn=mysqli_connect($host,$usernameC,$passwordC,$database);
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
$ratingVideo=$_POST["ratingDB"];

//test with values from here
//$email='marbin3d@hotmail.com';


 

//LIMIT 1
$getUserId=mysqli_prepare($con,"SELECT userID FROM users where email=?");


//"ss" means datatype order. one s string 
//@param s string
mysqli_stmt_bind_param($getUserId,"s",$email);
mysqli_stmt_execute($getUserId);
mysqli_stmt_store_result($getUserId);

//retrieve
mysqli_stmt_bind_result($getUserId,$userID);

$responseUserId=array();


if(mysqli_stmt_fetch($getUserId)){
    
    
  $responseUserId[] = array(
         
         "videoId" => $videoId, 
      
          "success" => true
       );     
              
       // session_start();//Set session
       // $_SESSION['userID'] = "$userID";
    
    
   // $selectuserVideoId= "SELECT uservideoID FROM uservideo  WHERE userID='$userID' AND videoID='$videoId' "; 
    
   // $resUsrvideoId=mysqli_query($con,$selectuserVideoId);
    
    
   // $rowCount=mysqli_num_rows($resUsrvideoId);
    
   // if( $rowCount==0){
     //Query to update rating 
     //$updateVideoQuery= "UPDATE uservideo SET rating='$ratingVideo' WHERE uservideoID='$resUsrvideoId' AND userID='$userID' AND videoID='$videoId' ";
    
    //$updateVideoQuery= "UPDATE uservideo SET rating='$ratingVideo' WHERE userID='$userID' AND videoID='$videoId' ";
    
    
    
    //LIMIT 1
    $getUserVideoId=mysqli_prepare($con,"SELECT uservideoID FROM uservideo where userID=? AND videoID=?");

    //"ss" means datatype order. one s string 
    //@param s string
    mysqli_stmt_bind_param($getUserVideoId,"ii",$userID,$videoId);
    mysqli_stmt_execute($getUserVideoId);
    mysqli_stmt_store_result($getUserVideoId);

    //retrieve
    mysqli_stmt_bind_result($getUserVideoId,$uservideoID);

   


    if(mysqli_stmt_fetch($getUserVideoId)){

    //query to update works
    $updateVideoQuery= "UPDATE uservideo SET rating='$ratingVideo' WHERE uservideoID='$uservideoID' ";
    
       $sqlUpd=mysqli_query($con,$updateVideoQuery);
       
        $responseUserId[] = array(
         
           "videoId" => $videoId 
            // 
          
       );   
        
    }
       
       
    else{       
    
    //if($con->mysqli_affected_rows==0){
        //$rowCount=mysqli_num_rows($sqlUpd);
        
        //Query to insert rating 
       $insertVideoQuery= "INSERT INTO uservideo (userID,videoID, rating) VALUES ('$userID','$videoId','$ratingVideo'); ";

        mysqli_query($con,$insertVideoQuery);
        
         $responseUserId[] = array(
         
           "videoId" => $videoId 
            // 
          
       );   
                
        
    }
    
    
    
    
   
        
    //}

    //Query to update rating 
    //$insertVideoQuery= "INSERT INTO uservideo (userID,videoID, rating) VALUES ('$userID','$videoId','$ratingVideo'); ";

   
    
    
   // $response=array();
    
    
    

    //intent update
   // $rowCount==0;
   // if($res=mysqli_query($con,$updateVideoQuery)){
      //  $rowCount=mysqli_num_rows($res);
        
       // $responseUserId[] = array(
        //"informationUpdated" =>$infoUpdated, 
            
            
         // "videoId" => $videoId,    
            
         //"success" => true
        //); 
        
        //mysqli_free_result($res);
        
                  
         //}
    
    //intent insert
    
    
    //if($rowCount==0){
        
       // if(mysqli_query($con,$insertVideoQuery)){
       // $responseUserId[] = array(
                 
        //   "videoId" => $videoId,   
            //"success" => true
         
        // ); 
        
       // }
       //  }     
        
       
    
   // }
    
} //end getting userID valid
    
header('Content-Type: application/json');
   
echo json_encode(array("response"=>$responseUserId));

mysqli_close($con);

?>