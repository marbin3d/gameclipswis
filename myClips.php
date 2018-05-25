<?php
session_start();

//$_SESSION['fname'] = "john";
//to log out session_destroy();
//if(isset($_SESSION['id']))
//unset($_SESSION['id']);  

if(isset($_SESSION['email'] )){
    
$fnameUserActive=$_SESSION['fname'];
$emailUserActive=$_SESSION['email'];

}
else{

$emailUserActive="no email defined";
$fnameUserActive="General User";
    
};  

?>


    <!DOCTYPE html>

    <html lang="en">

    <head>

        <title>GAME CLIPS WIS</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>


        <!-- Bootstrap added -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">

    </head>

    <body>


        <div id="wrapper">
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
                    <span id="myBtn" class ='navbar-brand' style="font-size:30px;cursor:pointer;width:40px; padding-top: 28px; padding-left:17px;padding-right:17px;">&#9776 </span>
                    
                    <a class="navbar-brand" href="index.php"><img src='images/logo.png' height="75" width="200"></a>
                    <a class="navbar-brand" id="activeUser">Creator Page</a>


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


                <!-- Top Menu Items -->
                <ul class="nav navbar-nav navbar-right ">


                    <li>
                        <a href="myClips.php" class="btn btn-alert btn-md" style="background:rgb(38,121,196);">My Clips</a>
                    </li>
                    
                    <li>
                        <a href="php/logout.php" class="btn btn-alert btn-md"> Log Out</a>
                    </li>


                    <!-- End Top Menu Items -->
                  
                    <!-- drop down Active User -->
                    <li class="dropdown" style="display:none;">
                            <a href="#"  class="dropdown-toggle btn btn-alert btn-md" data-toggle="dropdown"  id="creatorFullName"><i class="fa fa-user"></i> <?php echo $fnameUserActive; ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">

                                <!--active user email-->
                                <li>
                                                                       
                                    <a href="#" id="activeEmail"><?php echo strval($emailUserActive); ?></a>
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
                            <a href="about.php" ><span class="glyphicon glyphicon-comment menuicon"></span>About</a>
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
                        <li style="margin-top:10px;"><a href="#"> <span id="analyticsBtn" class="glyphicon glyphicon-circle-arrow-down menuicon"></span>Analytics</a></li>
                    </ul>


                    <!-- Search by key word from Game Clips DB, etc -->


                </div>

            </nav>


            <!-- features-->
            <div class="container-fluid">

                <div class="col-md-12">
                    <div class="row">
                        <div style="background-color:transparent ;">
                        <div class="panel-heading" style="margin-top:50px; background-image:url(images/myclipsbackground.jpg);">
                        <div class="panel-body">
                        <div class="col-md-2" >
                            <div class="text-left" >

                                <h1 style="margin-left:35%; width:100%; color:white;"><?php echo $fnameUserActive; ?><b> Clips </b></h1>

                            </div>

                        </div>
                        

                    </div>
                    </div>
                </div>

                    </div>
                </div>

            </div>


            <!--end features-->
            <hr>


            <!--start page-wraper for added videosby active user-->

            <div id="page-wrapper">
                <div class="container bootstrap snippet">

                    <div class="header">
                        <h3 class="text-muted prj-name" style="font-family:'Bangers'; color:white;">
                            My Game Clips
                            <span class="fa fa-users fa-2x principal-title"></span>

                        </h3>
                    </div>


                    <div class="jumbotron  list-content">
                        <div class="text-left">

                                <div class="button-wrapper" >
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#AddClip" id="addClip"><strong>Add Clip</strong></button>
                                </div>

                            </div>

                        <!-- List of Clips added by Active user-->
                        <ul class="list-group">
                            
                             <div>
                               <!-- Analytics-->
                                <hr>
                                <span id="mainpaneAnalytics"> </span>
                            </div>

                            <!-- My clips AddedClipsList from DB-->
                            
                            <div>
                                
                                <hr>
                                <span id="mainpanecontent"> </span>
                            </div>
                            
                            


                            <!-- Clips to be added from DB-->
                            <div> 
                                <span id="mainpanecontentSearch">	
                            </span>
                            </div>


                            <li href="#" class="list-group-item text-left">
                                <a class="btn btn-block btn-primary">
                                <i class="glyphicon glyphicon-refresh"></i> Load more Game Clips...
                            </a>
                            </li>

                        </ul>

                    </div>



                </div>
                <!-- End container bootstrap snippet-->


            </div>
            <!-- End page wrapper-->


        </div>
        <!-- end wrapper or main container -->
        <!-- -->



        <!--Start Footer-->
        
        <!-- end wrapper or main container -->
        <!-- -->
        <!--End Footer-->

        <!-- Start MODALS definitions-->


        <!-- AddClipDialog -- Add information and local video-->
        <div class="modal fade addClipDialog" id="AddClip">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button data-dismiss="modal" class="close class pull-right"><span ata-dismiss="modal" class="glyphicon glyphicon-remove class pull-right"></span></button>
                            <h3 class="panel-title">Add information and local video</h3>
                        </div>

                        <!--What is hidden-->
                        <div class="panel-body">

                            <form accept-charset="UTF-8" role="form" action="php/addVideo.php" method="post" enctype="multipart/form-data">

                                <fieldset>

                                    <!-- User Active Now defined on the top-->

                                    <div class="form-group">
                                        <label for="name">e-mail:</label>
                                        <input class="form-control" id="email" placeholder="email" name="email" value="<?php echo $emailUserActive; ?>" type="label" readonly>

                                    </div>

                                    <!-- Clip upload Button-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="file">Select Video: </label>
                                        <div class="col-md-12">
                                            <div class="col-md-3 ">
                                                <img src="images/defaultGamePlay.png" id="photo" class="img-responsive img-thumbnail">
                                            </div>
                                            local source:
                                            <div class="input-group" col-md-9>
                                                <!-- Clip file to upload-->
                                                <input type="file" name="sourceVideo" id="videoSelected">
                                                <p class="help-block">Only mpeg, mp4,avi file max size:50 MB</p>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Clip file to upload from URL-->
                                    <div class="form-group">
                                        <label for="name">Url Source:</label>
                                        <input class="form-control" id="sourceVideoURL" placeholder="Please, paste video URL here" name="sourceVideoURL" type="text">
                                    </div>



                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input class="form-control" id="title" placeholder="Title of video" name="title" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Choose category</label>
                                        <input class="form-control" id="category" placeholder="category" name="category" type="text" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Select language</label>
                                        <input class="form-control" id="language" placeholder="language of video" name="language" type="text" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Age range between:</label>
                                        <input class="form-control" id="ageRange" placeholder="age range" name="ageRange" type="text" value="">
                                    </div>

                                    <!--
                                <div class="checkbox">
                                    <label>
                                        <input name="range57" type="checkbox" value="5-7"> Range age:
                                    </label>								
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="range8-10" type="checkbox" value="8-10"> Range age:
                                    </label>								
                                </div>
                                -->
                                    <div class="form-group">
                                        
                                            <label for="name">Description</label>

                                            <textarea class="form-control" rows="5" name="description" id="description" placeholder="Describe your video"></textarea>
                                        
                                        <div class="col-md-2"></div>
                                    </div>


                                    <!-- Submit form Button to update info-->
                                    <input type="submit" class="btn btn-md btn-primary" value="Upload Video" id="submit-addClipBtn">


                                    <!--
                             <button class="btn btn-lg btn-success btn-block" type="submit" id="submit-addClipBtn" onclick="">Submit</button>-->


                                </fieldset>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end AddClipDialog -->
       


        <!-- end MODALS definitions-->


        <!--<script src="js/index.js"></script>-->
        <script src="js/navegationSide.js"></script>
        <script src="js/myClips.js"></script>

    </body>

    </html>
