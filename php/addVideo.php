
<?php

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


//email unique
/*$email=$_POST["email"];
$sourceVideo= $_POST["sourceVideo"];
$title=$_POST["title"];
$category=$_POST["category"];
$language=$_POST["language"];
$description=$_POST["description"];
$ageRange=$_POST["ageRange"];*/


/*user email receive user*/
$email=$_POST["email"];


/*Source video selection*/
/*$sourceVideoURL= $_POST["sourceVideoURL"];*/
/*$sourceVideoLocal= $_POST["sourceVideo"];*/
 

/*if($sourceVideoLocal != "" ){  
     
  $sourceVideo=$sourceVideoLocal;
}
 
else{    
$sourceVideo=$sourceVideoURL;
}*/

/*$sourceVideo=$sourceVideoLocal;*/

/*$sourceVideo="videosource1";*/

$title=$_POST["title"];
$category=$_POST["category"];
$language=$_POST["language"];
$description=$_POST["description"];
$ageRange=$_POST["ageRange"];


  /*retrieve source video content and pass to local storage on server side*/
if(isset($_POST) && !empty($_FILES['sourceVideo']['name'])){  
    
 $name = $_FILES['sourceVideo']['name'];
    
 list($txt, $ext) = explode(".", $name);
// $video_name = time().".".$ext;
    // $video_timeUpload = time();
    
 $video_name = $txt.".".$ext; 

//store file input in temp
 $tmp = $_FILES['sourceVideo']['tmp_name']; 
    
 $localPathTosave='../videoClips/'.$video_name;  
}

//to go back and local path
//$url = "https://infs3202-c562e525.uqcloud.net/game-clips-wis/myClips.php";

//to clean
/*relative path one level up*/
//$relativePathOneLevelUp=dirname($_SERVER['PHP_SELF']);
//echo $relativePathOneLevelUp;
//$url =$relativePathOneLevelUp . "../myClips.php"; 

$url ="../myClips.php";


//Query to update profile info
/*$updateVideoQuery= "UPDATE videos SET source='$sourceVideo', title='$title', category='$category',language='$language',description='$description' WHERE email='$email' ";*/



//first field is incremented automatically //works
/*$sql="INSERT INTO videos (source,title,category,language,ageRange,description,views,email) 
VALUES ('eesssrrr','thrones','action','en','57','descrp eeee','221','d333@httt.com');";*/

$sqlAddVideo="INSERT INTO videos (title,category,language,ageRange,description,views,email) 
VALUES ('$title','$category','$language','$ageRange','$description',0,'$email');";



$response=array();

if(mysqli_query($con,$sqlAddVideo)){
    $response[] = array(
        //"informationUpdated" =>$infoUpdated,     
          "success" => true
         ); 
    
    
            //video upload
        if(isset($_POST) && !empty($_FILES['sourceVideo']['name'])){          
            
           if(move_uploaded_file($tmp, $localPathTosave)){

            
               
              session_start();//Set session
              $_SESSION['email'] = "$email";
             
               echo ("<SCRIPT LANGUAGE='JavaScript'>
               window.alert('Information Updated sucessfully')
               window.location.href='$url';
               </SCRIPT>
               <NOSCRIPT>
                   <a href='$url'>Successfully Updated. Click here if you are not redirected.</a>
               </NOSCRIPT>");               
               
                 //update path video if there is a selected video 
               $localPathTosave2DB=str_replace("../","",$localPathTosave);
               
               $updateVideoPath= "UPDATE videos SET source='$localPathTosave2DB' WHERE email='$email' ";
               mysqli_query($con,$updateVideoPath); 
                           
           }else{
             // echo "video uploading failed";
               
               echo ("<SCRIPT LANGUAGE='JavaScript'>
               window.alert('video uploading failed, please verify the size less than 50 MB')
               window.location.href='$url';
               </SCRIPT>
               <NOSCRIPT>
                   <a href='$url'>video uploading failed, please verify the size less than 50 MB. Click here if you are not redirected.</a>
               </NOSCRIPT>"); 
           }
            
        }else{
           //echo "Please select video";
            echo ("<SCRIPT LANGUAGE='JavaScript'>
               window.alert('information updated successfully')
               window.location.href='$url';
               </SCRIPT>
               <NOSCRIPT>
                   <a href='$url'>information updated successfully. Click here if you are not redirected.</a>
               </NOSCRIPT>");
        }

        //end upload video
          
 }

mysqli_close($con);

?>