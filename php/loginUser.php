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
$emailLogin=$_POST["emailLogin"];

$usernameLogin=$_POST["usernameLogin"];
$passwordLogin=$_POST["passwordLogin"];

//echo $emailLogin;
//echo $usernameLogin;
//echo $passwordLogin;


//to go back and local path
//$url = "https://infs3202-c562e525.uqcloud.net/game-clips-wis/myClips.php"; 

//$url = "../index.php"; 

$url = "../myClips.php"; 

//LIMIT 1
$sqlloginUser=mysqli_prepare($con,"SELECT FName,username,email FROM users where username=? and password=?");


//"ss" means datatype order. one s string 
//@param s string
mysqli_stmt_bind_param($sqlloginUser,"ss",$usernameLogin,$passwordLogin);
mysqli_stmt_execute($sqlloginUser);
mysqli_stmt_store_result($sqlloginUser);

//retrieve
mysqli_stmt_bind_result($sqlloginUser,$fname,$username,$email);

$response=array();


if(mysqli_stmt_fetch($sqlloginUser)){
    
    
    $response[] = array(
      
          "success" => true
         );     
              
              session_start();//Set session
              $_SESSION['email'] = "$email";
    
              $_SESSION['fname'] = "$fname";
    
              $_SESSION['username'] = "$username";    
                 
             
            echo ("<SCRIPT LANGUAGE='JavaScript'>
               window.alert('Information login sucessfully ')
               window.location.href='$url';
               </SCRIPT>
               <NOSCRIPT>
                   <a href='$url'>Successfully login . Click here if you are not redirected.</a>
               </NOSCRIPT>");    
    
        }
    
 
            echo ("<SCRIPT LANGUAGE='JavaScript'>
               window.alert('log in no successfully')
               window.location.href='$url';
               
               console.log('$emailLogin'+'$usernameLogin'+'$passwordLogin');
               
               </SCRIPT>
               <NOSCRIPT>
                   <a href='$url'>successfully. Click here if you are not redirected.</a>
               </NOSCRIPT>");        

        //end login
          

mysqli_close($con);


?>


