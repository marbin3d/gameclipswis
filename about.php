<?php
session_start();

//$_SESSION['fname'] = "john";

if(isset($_SESSION['email'])){
    
$fnameUserActive=$_SESSION['fname'];
$emailUserActive=$_SESSION['email'];

}
else{

$emailUserActive="no email defined";
$fnameUserActive="General User";
    
};  

$loadedCheck=0;
if(isset($_SESSION['source'])){
    $loadedCheck=1;
}

?>

    <?php  if($loadedCheck){ 
           $sourceVid=$_SESSION['source']. '?rel=0';
                 }
 ?>

        <!DOCTYPE html>

        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Project GAME CLIPS</title>

            <!-- Bootstrap Core CSS -->
            <link href="css/bootstrap.min.css" rel="stylesheet">

            <!-- Custom CSS -->
            <link href="css/sb-admin.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">

            <!-- Custom Fonts
            <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <!-- jQuery -->
            <script src="js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>
            
            <!-- Bootstrap Core JavaScript 
             <script src="https://apis.google.com/js/api.js"></script>-->
             

        </head>

        <body>

            <div id="wrapper" style="background-color:black;">
                <!-- Navigation -->
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    <span id="myBtn" class='navbar-brand' style="font-size:30px;cursor:pointer;width:40px; padding-top: 28px; padding-left:17px;padding-right:30px;">&#9776 </span>

                    <a class="navbar-brand" href="index.php"><img src='images/logo.png' height="75" width="200"></a>

                    <a class="navbar-brand" id="activeUser">
                        <?php echo $fnameUserActive; ?>
                    </a>

                    <!--Retrieve active user-->

                </div>

                <!-- Top Menu Items -->
                <div id='menuGameClips'>
                    <ul class="nav navbar-middle top-nav ">
                        <li>
                            <input id="searchKeyWordGameClips" type="text" placeholder="Search on Game Clips" />
                             <!--
                            <input type="submit" class="btn btn-md btn-primary" value="Search" id="submit-searchBtn">-->                            
                             <button class="btn btn-md btn-primary" id="searchByWordBtnGameClips" onclick="searchOnGameClipsByWord()">Search</button>
                            
                            
                            
                            <button id="GameClips" class="searchGameClips" style="background:rgb(38,121,196) ;">
                                <img src="images/diamond.png" height="20" width="10">
                                Game Clips
                            </button>
                            <button id="Youtube" class="searchYoutube">
                                <img src="images/youtubeicon.png" height="20" width="20">
                                Youtube
                            </button>
                        </li>


                    </ul>
                </div>
                <div id='menuYoutube'>
                    <ul class="nav navbar-middle top-nav ">
                        <li>
                            <input id="query" value='' type="text" placeholder="Search on Youtube" />
                            
                            <button class="btn btn-md btn-primary" id="searchByWordBtn" onclick="search()">Search</button>
                            
                            <button id="GameClips" class="searchGameClips">
                                <img src="images/diamond.png" height="20" width="10">
                                Game Clips
                            </button>
                            <button id="Youtube" class="searchYoutube"  style="background:rgb(38,121,196) ;">
                                <img src="images/youtubeicon.png" height="20" width="20">
                                Youtube
                            </button>
                        </li>

                    </ul>
                </div>

                <ul class="nav navbar-nav navbar-right ">

                    <li>
                        <a href="myClips.php" class="btn btn-alert btn-md">My Clips</a>
                    </li>

                    <li>
                        <a type="text" class="btn btn-alert btn-md" data-toggle="modal" data-target="#registerUser">Subscribe</a>
                    </li>


                    <!--Login -->
                    <li>
                        <a type="text" class="btn btn-alert btn-md " data-toggle="modal" data-target="#loginUser">Login</a>
                    </li>


                    <!--active user  style="display:none;"-->
                    <li class="dropdown" style="display:none;">
                        <a href="#" class="dropdown-toggle btn btn-alert btn-md" data-toggle="dropdown">
                           <i class="fa fa-user" id="creatorFullName"></i> <?php echo $fnameUserActive; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <!--active user email-->
                            <li>
                                <a href="#" id="activeEmail">
                                       "<?php echo $emailUserActive; ?>"
                                      
                                    </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="php/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>


                <!-- SLIDE MENU-->
                <div id="mySidenav" class="sidenav">


                    <ul id="slidemenu">
                        <li>
                            <a href="index.php"><span class="glyphicon glyphicon-home menuicon"></span>Home</a>
                        </li>
                        <li>
                            <a href="about.php" style="background:rgb(38,121,196);"><span class="glyphicon glyphicon-comment menuicon"></span>About</a>
                        </li>
                        <li>
                            <a href="help.php"><span class="glyphicon glyphicon-tasks menuicon"></span>Help </a>
                        </li>
                        <form accept-charset="UTF-8" role="form" action="php/searchVideo.php" method="post" enctype="multipart/form-data">
                            <fieldset>


                                <!-- Search by key word from Game Clips by Title -->

                                <a id="filterByCategory">POPULAR CATEGORIES</a>

                                <ul id="slidemenu">
                                    <li>
                                        <a href=""><span class="glyphicon glyphicon-star menuicon"></span>Reviews</a>
                                    </li>
                                    <li>
                                        <a href=""><span class="glyphicon glyphicon-play menuicon"></span>Game Plays</a>
                                    </li>
                                    <li>
                                        <a href="dashboardAbout.php"><span class="glyphicon glyphicon-book menuicon"></span>Games Guides </a>
                                    </li>
                                    <li>
                                        <a href="dashboardAbout.php"><span class="glyphicon glyphicon-flag menuicon"></span>Adventure </a>
                                    </li>
                                </ul>

                                <!-- Search by category
                                <div class="form-group">
                                    <label for="name"></label>
                                    <input class="form-control" id="searchCategory" placeholder="game category" name="searchCategory" type="text">
                                </div>
                                -->

                                <!-- Submit form Button to Search by title
                                <input type="submit" class="btn btn-md btn-primary" value="Search" id="submit-searchBtn">
                                -->

                                <!--
                               <button class="btn btn-lg btn-success btn-block" type="submit" id="submit-addClipBtn" onclick="">Submit</button>-->

                            </fieldset>

                        </form>

                        <!-- analyticsView.php -->
                        <a id="filterByCategory">MORE FROM GAME CLIPS</a>
                        <li style="margin-top:10px;"><a href="#"> <span class="glyphicon glyphicon-circle-arrow-down menuicon"></span>Analytics</a></li>
                    </ul>


                    <!-- Search by key word from Game Clips DB, etc -->


                </div>
                <!-- /.navbar-collapse -->


            </nav>


                <!-- content - body -->
                <!-- Header Video -->
                <video autoplay muted loop id="myVideo">
                  <source src="images/gameplay2.mp4" type="video/mp4">
                </video>
                

                <!-- Optional: some overlay text to describe the video -->
                <div class="content">
                  <h1>Don't just play and watch, Join in!</h1>
                    <img src='images/logo.png' height="352" width="602">
                    <p>Welcome to a community where millions of people and thousands of interests collide in a beautiful explosion of video games, pop culture, and conversation. From classic tv show marathons to sport tournaments, if you can imagine it, it’s probably on Game Clips right now.</p>
                  
                </div>
                <div class='content2'>
                    <h2>We believe that everyone deserves to have a voice, and that the world is a better place when we listen, share and build community through our stories.</h2>
                    
                    <h4 style="color:white; padding-top:50px;">Our values are based on four essential freedoms that define who we are.</h4>
                    <h2>Freedom of Expression</h2>
                    <p style="color:white; margin-top:20px;margin-bottom:50px;text-align:center; padding:20px 100px 20px 100px; background-color:rgb(38,121,196,0.5);">We believe people should be able to speak freely, share opinions, foster open dialogue, and that creative freedom leads to new voices, formats and possibilities.</p>
                    <h2>Freedom of Information</h2>
                    <p style="color:white; margin-top:20px;margin-bottom:50px;text-align:center; padding:20px 100px 20px 100px; background-color:rgb(38,121,196,0.5);">We believe everyone should have easy, open access to information and that video is a powerful force for education, building understanding, and documenting world events, big and small.</p>
                    <h2>Freedom of Opportunity</h2>
                    <p style="color:white; margin-top:20px;margin-bottom:50px;text-align:center; padding:20px 100px 20px 100px; background-color:rgb(38,121,196,0.5);">We believe everyone should have a chance to be discovered, build a business and succeed on their own terms, and that people—not gatekeepers—decide what’s popular.</p>
                    <h2>Freedom to Belong</h2>
                    <p style="color:white; margin-top:20px;margin-bottom:50px;text-align:center; padding:20px 100px 20px 100px; background-color:rgb(38,121,196,0.5);">We believe everyone should be able to find communities of support, break down barriers, transcend borders and come together around shared interests and passions.</p>
                    
                    <!--Social Media buttons-->
                    <h2 style="margin-top:50px;margin-bottom:30px; color:white; background-color:rgb(38,121,196);padding:10px; border-radius:10px;">Follow US!</h2>
                    
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter" style="margin-bottom:30px;"></a>
                    
                    
                   
                </div>
                

                <!-- Modals -->

                <!-- AddUser Modal -->
                <div class="modal fade addClipDialog" id="registerUser">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <button data-dismiss="modal" class="close class pull-right"><span ata-dismiss="modal" class="glyphicon glyphicon-remove class pull-right"></span></button>
                                    <h3 class="panel-title">User information</h3>
                                </div>

                                <!--What is hidden-->
                                <div class="panel-body">

                                    <form accept-charset="UTF-8" role="form" action="php/registerUser.php" method="post" enctype="multipart/form-data">

                                        <fieldset>

                                            <div class="form-group">
                                                <label for="name">First Name</label>
                                                <input class="form-control" id="fname" placeholder="First name" name="fname" type="text">
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Last Name</label>
                                                <input class="form-control" id="lname" placeholder="last name" name="lname" type="text">
                                            </div>

                                            <div class="form-group">
                                                <label for="name">username:</label>
                                                <input class="form-control" id="username" placeholder="username" name="username" value="userName" type="label">

                                            </div>

                                            <!-- User Active Now defined on the top-->
                                            <div class="form-group">
                                                <label for="name">e-mail:</label>
                                                <input class="form-control" id="email" placeholder="email" name="email" value="email" type="label">

                                            </div>

                                            <div class="form-group">
                                                <label for="name">language:</label>
                                                <input class="form-control" id="language" placeholder="your language" name="language" value="" type="label">

                                            </div>

                                            <div class="form-group">
                                                <label for="name">Password:</label>
                                                <input class="form-control" id="password" placeholder="choose a password" name="password" value="password" type="password">

                                            </div>

                                            <!-- Submit form Button to update info-->
                                            <input type="submit" class="btn btn-md btn-primary" value="Subscribe" id="submit-addUserBtn">


                                            <!--
                             <button class="btn btn-lg btn-success btn-block" type="submit" id="submit-addClipBtn" onclick="">Submit</button>-->


                                        </fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end AddUser -->


                <!-- LoginUser Modal -->

                <div class="modal fade addClipDialog" id="loginUser">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <button data-dismiss="modal" class="close class pull-right"><span ata-dismiss="modal" class="glyphicon glyphicon-remove class pull-right"></span></button>
                                    <h3 class="panel-title">Login</h3>
                                </div>

                                <!--What is hidden-->
                                <div class="panel-body">

                                    <form accept-charset="UTF-8" role="form" action="php/loginUser.php" method="post" enctype="multipart/form-data">

                                        <fieldset>
                                            <div class="form-group">
                                                <label for="name">username:</label>
                                                <input class="form-control" id="usernameLogin" placeholder="username" name="usernameLogin" value="" type="text">
                                            </div>

                                            <!-- User Active Now defined on the top-->
                                            <div class="form-group">
                                                <label for="name">e-mail:</label>
                                                <input class="form-control" id="emailLogin" placeholder="email" name="emailLogin" value="" type="text">
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Password:</label>
                                                <input class="form-control" id="passwordLogin" placeholder="password" name="passwordLogin" value="" type="password">
                                            </div>


                                            <!-- Submit form Button to update info-->
                                            <input type="submit" class="btn btn-md btn-primary" value="log in" id="submit-loginUserBtn">

                                            <!--
                             <button class="btn btn-lg btn-success btn-block" type="submit" id="submit-addClipBtn" onclick="">Submit</button>-->

                                        </fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end loginUser -->
                
  
      
    
  </div>
                
                
                
                


                <!-- /#wrapper -->
                <script src="js/index.js"></script>
                <script src="js/searchVideoByKeyWord.js"></script>
                <script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>
            
                
                
        </body>
        </html>