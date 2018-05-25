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
           $sourceVid=$_SESSION['source'];
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
                            <a href="index.php" style="background:rgb(38,121,196);"><span class="glyphicon glyphicon-home menuicon"></span>Home</a>
                        </li>
                        <li>
                            <a href="about.php"><span class="glyphicon glyphicon-comment menuicon"></span>About</a>
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
                        <a id="filterByCategory"><i class="fa fa-fw fa-dashboard"></i>MORE FROM GAME CLIPS</a>
                        <li style="margin-top:10px;"><a href="#"> <span class="glyphicon glyphicon-circle-arrow-down menuicon"></span>Analytics</a></li>
                    </ul>


                    <!-- Search by key word from Game Clips DB, etc -->


                </div>
                <!-- /.navbar-collapse -->


            </nav>


            <!-- content - body -->
            <div id="page-wrapper">
                <div class="container bootstrap snippet">


                    <div class="header" style="margin-top:50px;">
                        <h3 class="text-muted prj-name" style="font-family:'Bangers';color:white;">
                            <span class="fa fa-users fa-2x principal-title"></span> Game Clips Gallery
                        </h3>
                        <div class="jumbotron  list-content">


                            <ul class="list-group">



                                <!-- clips from DB-->


                                <?php  /*load=1 means true by title*/ 
                                     if($loadedCheck){ ?>

                                <!-- 
                                        <div class="btn btn-success"> Play Clip found</div>-->

                                <div class="row">
                                    <div class="col-xs-4" class="embed-responsive embed-responsive-16by9">
                                        <video class="embed-responsive-item" src="  <?php echo $sourceVid; ?> " width="100%" height="100%" frameborder="0" preload="metadata" controls></video>
                                    </div>
                                </div>

                                <?php } ?>


                                <div id="mainpanecontentSearch"> </div>




                                <div id="comments"> </div>
                                <div id="snippets"> </div>
                                <div id="views"> </div>


                                <!-- from DB-->
                                <li href="#" class="list-group-item text-left">
                                    <a class="btn btn-block btn-primary">
                                                    <i class="glyphicon glyphicon-refresh"></i> Load more Clips...
                                                </a>
                                </li>
                            </ul>

                        </div>

                        <div class="header" style="margin-top:50px;">
                            <h3 class="text-muted prj-name" style="font-family:'Bangers'; color:white">
                                <span class="fa fa-users fa-2x principal-title"></span> YouTube Results
                            </h3>
                            <div class="jumbotron  list-content">
                                <!-- from YouTube Search by keyWord-->
                                <ul class="list-group">




                                    <div id="mainpanecontentSearchByKeyWord"> </div>

                                    <!-- from DB-->
                                    <li href="#" class="list-group-item text-left">
                                        <a class="btn btn-block btn-primary">
                                                    <i class="glyphicon glyphicon-refresh"></i> Load more Clips...
                                                </a>
                                    </li>
                                </ul>



                            </div>
                        </div>






                        <div class="header">
                            <h3 class="text-muted prj-name" style="font-family:'Bangers'; color:white;">
                                <span class="fa fa-users fa-2x principal-title"></span> Recommended Clips

                            </h3>
                            <div class="jumbotron  list-content">
                                <ul class="list-group">
                                    <!-- clips from DB-->
                                    <span id="mainpanecontentRecommend"></span>

                                    <!-- recommender feature in progress-->
                                    <div class="row" align="center">
                                        <div class="col-md-3 col-lg-3" align="center" style="width:100%; margin-top:5%;">

                                            <form method="POST" id="formRecommend" action="#">
                                                <!-- this input need a temporal value to start-->
                                                <label>Number of Recomendations</label>
                                                <input style="width:50px;" id="fieldQ1Rec" name="question1Rec" type="text" placeholder="#" />
                                                <button type="button" id="recommendBtn" class="searchGameClips" style="background:rgb(38,121,196) ;">Show Recommended Videos</button>

                                            </form>
                                        </div>

                                        <div align="center">
                                            <div align="center">
                                            </div>

                                            <div align="center">
                                                <div id="responsePrediction">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end recommender feature in progress-->
                                    <!-- from DB
                                <li href="#" class="list-group-item text-left">
                                    <a class="btn btn-block btn-primary">                                            
                                            <i class="glyphicon glyphicon-refresh"></i> Load more Clips...
                                        </a>
                                </li>
                                -->
                                </ul>
                            </div>
                        </div>


                        <div class="header">
                            <h3 class="text-muted prj-name" style="font-family:'Bangers'; color:white;">
                                <span class="fa fa-users fa-2x principal-title"></span> Trendding Clips
                            </h3>
                            <div class="jumbotron  list-content">
                                <ul class="list-group">
                                    <!-- clips from DB-->
                                    <span id="mainpanecontentTrend">	
                            </span>
                                    <!-- from DB-->
                                    <li href="#" class="list-group-item text-left">
                                        <a class="btn btn-block btn-primary">
                                            <i class="glyphicon glyphicon-refresh"></i> Load more Clips...
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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



                <!-- AddRating Modal -->
                <div class="modal fade addRatingModal" id="ratingUserVideo">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <button data-dismiss="modal" class="close class pull-right"><span ata-dismiss="modal" class="glyphicon glyphicon-remove class pull-right"></span></button>
                                    <h3 class="panel-title">Rating</h3>
                                </div>

                                <!--What is hidden-->
                                <div class="panel-body">

                                    <!--to sent via AJAX-->
                                    <form accept-charset="UTF-8" id="formAddRating" role="form" action="#" method="post" enctype="multipart/form-data">

                                        <h4>Rating Video</h4>
                                        <p>Please, rate this video.</p>




                                        <div class="radio" id="ratingStars">

                                            <label class="radio-inline">
                                                  <input type="radio" id="opt1" name="optradio" value="1"> 1 star
                                        </label>
                                            <label class="radio-inline">
                                                  <input type="radio" id="opt2" name="optradio" value="2">2 stars
                                                </label>
                                            <label class="radio-inline">
                                                  <input type="radio" id="opt3" name="optradio" value="3">3 stars
                                                </label>
                                            <label class="radio-inline">
                                                  <input type="radio" id="opt4" name="optradio" value="4">4 stars
                                                </label>
                                            <label class="radio-inline">
                                                  <input type="radio" id="opt5" name="optradio" value="5">5 stars
                                            </label>

                                        </div>

                                        <div class="stateBarMsg">
                                            <label id="stateBar"> state </label>
                                        </div>
                                        <!-- Submit form Button to update info
                                    <input type="submit" class="btn btn-md btn-primary" class="glyphicon glyphicon-ok" value="Rate video" id="submit-addRatingVideoBtn">-->

                                        <input type="text" class="btn btn-md btn-primary" class="glyphicon glyphicon-ok" value="Rate video" id="submit-addRatingVideoBtn">

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end AddRatingVideor -->



                <!-- Modal request subscription-->
                <div class="modal fade addRatingModal" id="ratingUserVideoNoDefined">

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <button data-dismiss="modal" class="close class pull-right"><span data-dismiss="modal" class="glyphicon glyphicon-remove class pull-right"></span></button>
                                    <h3 class="panel-title">Subscribe message</h3>
                                </div>

                                <div class="panel-body">
                                    <div>
                                        <h3>Welcome to GameClips</h3>
                                        <p>Please, Subscribe to enjoy Game Clips</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- END Modal request subscription -->


                <!-- AddClipDialog -- info YouTube video metadata-->
                <div class="modal fade addClipDialog" id="AddClipFromYouTube">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <button data-dismiss="modal" class="close class pull-right"><span ata-dismiss="modal" class="glyphicon glyphicon-remove class pull-right"></span></button>
                                    <h3 class="panel-title">Add information from YouTube</h3>
                                </div>

                                <!--What is hidden-->
                                <div class="panel-body">

                                    <form accept-charset="UTF-8" role="form" action="#" method="post" enctype="multipart/form-data">

                                        <fieldset>
                                            <!-- User Active Now defined on the top
                                    <div class="form-group">
                                        <label for="name">e-mail:</label>
                                        <input class="form-control" id="email" placeholder="email" name="email" value="<?php echo $emailUserActive; ?>" type="label" readonly>
                                    </div>
                                    -->
                                            <!-- Clip file to upload from URL-->
                                            <div class="form-group">
                                                <label for="name">Url Source from YouTube:</label>
                                                <input class="form-control" id="sourceVideoURLYouTube" placeholder="Please, paste video URL here" name="sourceVideoURLYouTube" type="text">
                                            </div>


                                            <div class="form-group">
                                                <label for="name">Title</label>
                                                <input class="form-control" id="titleYouTube" placeholder="Title of video" name="titleYouTube" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Choose category</label>
                                                <input class="form-control" id="categoryYouTube" placeholder="category" name="categoryYouTube" type="text" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Select language</label>
                                                <input class="form-control" id="languageYouTube" placeholder="language of video" name="languageYouTube" type="text" value="">
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Age range between:</label>
                                                <input class="form-control" id="ageRangeYouTube" placeholder="age range" name="ageRangeYouTube" type="text" value="">
                                            </div>



                                            <div class="form-group">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <h3>Description<small></small></h3>

                                                    <textarea class="form-control" rows="5" name="descriptionYouTube" id="descriptionYouTube" placeholder="Describe your video"></textarea>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                            <!-- Submit form Button to update info
                                    <input type="submit" class="btn btn-md btn-primary" value="Upload Video Info" id="submit-addClipBtnYouTube">-->
                                            <div class="col-md-6 col-lg-6" align="center">
                                                <button type="button" id="submit-addClipBtnYouTube" class="btn btn-success">Upload video Info</button>
                                            </div>

                                        </fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end AddClipDialog info YouTube video metadata -->

                <!-- Modal Welcome by Sofia -->
                <div class="modal fade" id="welcomeModal" role="dialog">
                    <button type="button" class="close closeWelcome" data-dismiss="modal">&times;</button>
                    <div class='panel-body'>
                        <h3 class='welcometext'>Welcome to GameClips</h3>
                        <p style="margin-left:10%; color:white">A website dedicated to Video Games fans.</p>
                        <p style="margin-left:8%; text-align:center; color:white">Add your own videos, follow other gamers and like and save your favourite videos!</p>
                        <a type="text" class="btn btn-alert btn-md" data-toggle="modal" data-target="#registerUser" style="margin-left:35%; background-color:white;">Subscribe</a>
                    </div>
                    <!-- END Modal Welcome by Sofia -->
                </div>

        </div>
               
                <!-- Scripts js -->              
                
                <script src="js/index.js"></script> 
                
                <!-- search  on GameClips --> 
                 <script src="js/searchOnGameClips.js"></script> 
                 
                <!-- search  on YouTube -->                           
                <script src="js/searchVideoByKeyWord.js"></script>
                <script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>
    
     
     
     </body>

</html>
