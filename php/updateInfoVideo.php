
<?php

/*Feature: SEARCH VIDEO*/
/*  Project:  Game Clips
   Sofia Elena & Marbin
  University of Queensland
  2018
  NB. php on server side. increase php.ini memory limit to 1024M and max post upload 50M, upload 50M
*/

//include("credentialsAdminDB.inc.php");
include("dbConnect.php");

//email unique
$email=$_POST["email"];
$sourceVideo= $_POST['sourceVideo'];
$title=$_POST["title"];
$category=$_POST["category"];
$language=$_POST["language"];


$description=$_POST["description"];


// Create connection
//$conn = new mysqli($host, $username, $password,$database);
//$conn=mysqli_connect($host,$usernameC,$passwordC,$database);

// Check connection
if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);  
}

//to go back and local path
//$url = "https://infs3202-c562e525.uqcloud.net/game-clips-wis/myClips.php"; 

$url = "/game-clips-wis/myClips.php"; 

  
if(isset($_POST) && !empty($_FILES['file']['name'])){     
 $name = $_FILES['file']['name'];
 list($txt, $ext) = explode(".", $name);
 $video_name = time().".".$ext;
 $tmp = $_FILES['file']['tmp_name'];   
 $localPathTosave='../videoClips/'.$video_name;  
}


//Query to update profile info
$updateVideoQuery= "UPDATE videos SET source='$sourceVideo', title='$title', category='$category',primaryLanguage='$languages',description='$description' WHERE email='$email' ";


$response=array();
if(mysqli_query($con,$updateVideoQuery)){
    $response[] = array(
        //"informationUpdated" =>$infoUpdated,     
          "success" => true
         );     
    
            //video
        if(isset($_POST) && !empty($_FILES['file']['name'])){          
            
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
               $updateSourceVideoPath= "UPDATE Videos SET source='$localPathTosave' WHERE email='$email' ";
               mysqli_query($con,$updateSourceVideoPath); 
                           
           }else{
             /*echo "videouploading failed" */
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
