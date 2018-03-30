
<?php
/*Feature: SEARCH VIDEO*/
/*  Project:  Game Clips
   Sofia Elena & Marbin
  University of Queensland
  2018
  NB. php on server side. increase php.ini memory limit to 1024M and max post upload 50M, upload 50M
*/
session_start();

//to go back and local path
//$url = "https://infs3202-c562e525.uqcloud.net/game-clips-wis/myClips.php"; 

$url = "../index.php"; 


if(isset($_SESSION['email'])){
    
unset ($_SESSION['fname']);
unset ($_SESSION['email']);
 
//end session    
session_destroy();
    
     echo ("<SCRIPT LANGUAGE='JavaScript'>
               window.alert('log out successfully')
               window.location.href='$url';
                              
               </SCRIPT>
               <NOSCRIPT>
                   <a href='$url'>successfully logout. Click here if you are not redirected.</a>
               </NOSCRIPT>");
}
 

?>


