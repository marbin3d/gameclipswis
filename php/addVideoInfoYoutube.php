
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


//email unique




/*user email receive user*/
//$email=$_POST["email"];

$email="marbin3d@hotmail.com";


/*Source video selection*/
$sourceVideoURL=  $_POST["urlYouTubeVideo"] ;



/*$sourceVideoLocal= $_POST["sourceVideo"];*/
    

$title=$_POST["title"];
$category=$_POST["category"];
$language=$_POST["language"];
$description=$_POST["description"];
$ageRange=$_POST["ageRange"];
 

/*if($sourceVideoLocal != "" ){  
     
  $sourceVideo=$sourceVideoLocal;
}
 
else{    
$sourceVideo=$sourceVideoURL;
}*/

/*$sourceVideo=$sourceVideoLocal;*/

/*$sourceVideo="videosource1";*/
    
    
    
/*
$title=$_POST["title"];
$category=$_POST["category"];
$language=$_POST["language"];
$description=$_POST["description"];
$ageRange=$_POST["ageRange"];*/





$url ="../index.php";




$sqlAddVideo="INSERT INTO videos (source,title,category,language,ageRange,description,views,email) 
VALUES ('$sourceVideoURL','$title','$category','$language','$ageRange','$description',0,'$email');";

 //$updateVideoPath= "UPDATE videos SET source='$sourceVideoURL' WHERE email='$email' ";
 //mysqli_query($con,$updateVideoPath); 

$response=array();

if(mysqli_query($con,$sqlAddVideo)){
    
    $response[] = array(
        //"informationUpdated" =>$infoUpdated,     
          "success" => true
         ); 
        
            //video info upload
               
               
             session_start();//Set session
              $_SESSION['email'] = "$email";
              $_SESSION['fname'] = "$fname";
    
               echo ("<SCRIPT LANGUAGE='JavaScript'>
               window.alert('Information registered sucessfully')
               window.location.href='$url';
               </SCRIPT>
               <NOSCRIPT>
                   <a href='$url'>Successfully register. Click here if you are not redirected.</a>
               </NOSCRIPT>");   
    
    
         // $updateVideoPath= "UPDATE videos SET source='$sourceVideoURL' WHERE email='$email' ";
              // mysqli_query($con,$updateVideoPath); 
                               
         
        }
else{
          
            echo ("<SCRIPT LANGUAGE='JavaScript'>
               window.alert('information sent successfully')
               window.location.href='$url';
               </SCRIPT>
               <NOSCRIPT>
                   <a href='$url'>information sent successfully. Click here if you are not redirected.</a>
               </NOSCRIPT>");
        }
                
               
             
                           
          
            
        

        //end upload video info
          


mysqli_close($con);

?>