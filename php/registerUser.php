
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



/*user email receive user*/
$email=$_POST["email"];

$fname=$_POST["fname"];
$lname=$_POST["lname"];
$username=$_POST["username"];
$password=$_POST["password"];
$language=$_POST["language"];



//to go back and local path
//$url = "https://infs3202-c562e525.uqcloud.net/game-clips-wis/myClips.php"; 

$url = "../index.php"; 


$sqlAddUser="INSERT INTO users(FName,LName,email,username,password,language) 
VALUES ('$fname','$lname','$email','$username','$password','$language');";



$response=array();

if(mysqli_query($con,$sqlAddUser)){
    $response[] = array(
        //"informationUpdated" =>$infoUpdated,     
          "success" => true
         ); 
    
              
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
                                 
         
        }else{
          
            echo ("<SCRIPT LANGUAGE='JavaScript'>
               window.alert('information sent successfully')
               window.location.href='$url';
               </SCRIPT>
               <NOSCRIPT>
                   <a href='$url'>information sent successfully. Click here if you are not redirected.</a>
               </NOSCRIPT>");
        }

        //end register user info
          

mysqli_close($con);


?>