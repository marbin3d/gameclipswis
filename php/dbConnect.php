<?php

/*Feature: SEARCH VIDEO*/
/*  Project:  Game Clips
   Sofia Elena & Marbin
  University of Queensland
  2018
  NB. php on server side. increase php.ini memory limit to 1024M and max post upload 50M, upload 50M
*/

/*database connection*/

$db="gameclipsdatabase";
/*connect host, username, passwd,db */
//$con=mysqli_connect("localhost","root","",$db);

$con=mysqli_connect("localhost","gameclipsadmin","gameclipsadmin",$db);

?>