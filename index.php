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

            <!-- jQuery -->
            <script src="js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>
            
            <!-- Bootstrap Core JavaScript 
             <script src="https://apis.google.com/js/api.js"></script>-->
             

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
                        <a class="navbar-brand" href="index.php">Game Clips</a>
                        <a class="navbar-brand" id="activeUser" ><?php echo $fnameUserActive; ?></a>
                        
                         <!--Retrieve active user--> 
                      
                        


                    </div>

                    <!-- Top Menu Items -->
                    <ul class="nav navbar-right top-nav ">

                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i>Home</a>
                        </li>

                        

                        <li>
                            <a href="dashboardAbout.php"><i class="fa fa-fw fa-dashboard"></i>About</a>
                        </li>

                        <li>
                            <a href="dashboardAbout.php"><i class="fa fa-fw fa-dashboard"></i>Help </a>
                        </li>


                        <li class="button-wrapper">
                            <a type="text" class="btn btn-alert btn-md" data-toggle="modal" data-target="#registerUser">Subscribe</a>
                        </li>


                       
                        <!--Login -->
                        <li class="button-wrapper">
                            <a type="text" class="btn btn-alert btn-md " data-toggle="modal" data-target="#loginUser">Login</a>
                        </li>
                        
                        
                        
                        
                        <!--active user-->
                        <li class="dropdown">
                            <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" id="creatorFullName"></i> <?php echo $fnameUserActive; ?><b class="caret"></b></a>
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



                    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                       
                        
                        

                            <div class="col-md-10">
                             
                              <ul class="nav navbar-nav side-nav">
                            
                               
                               <!-- Btn search by keyword from YouTube-->
                                     
                                     <div id="buttons">                                     
                                      <label> 
                                         <h4>Search YouTube</h4> 
                                       <input id="query" value='cats' type="text"/>  
                                          <button id="searchByWordBtn"  onclick="search()">Search</button>
                                      </label>
                                    </div>     
                                      
                               
                                       <!-- Search by key word from Game Clips DB, etc -->
                                        <form action="searchWord()" id="searchYoutubeDB">
                                            <h4>Search Game Clips</h4>
                                            <input id="searchKeyWord" type="text" />

                                            <h4>Sort by</h4>
                                            <select id="sortBy">
                                                <option>relevance</option>
                                                <option>dateasc</option>
                                                <option>datedesc</option>
                                            </select>
                                            
                                            <button type="#" id="searchKeyWordBtnXXX">Search</button>
                                        </form>
                                        <hr />
                            
                                <form accept-charset="UTF-8" role="form" action="php/searchVideo.php" method="post" enctype="multipart/form-data">
                                    <fieldset>  

                                        
                                      <!-- Search by key word from Game Clips by Title -->
                                        <li>
                                            <a id="filterByTitle"><i class="fa fa-fw fa-dashboard"></i>Filter by Title</a>
                                        </li>

                                        <div class="form-group">
                                            <label for="name">Title</label>
                                            <input class="form-control" id="searchTitle" placeholder="game title" name="searchTitle" type="text">
                                        </div>

                                        <li>
                                            <a id="filterByCategory"><i class="fa fa-fw fa-dashboard"></i>Filter by category</a>
                                        </li>
                                        <div class="form-group">
                                            <label for="name">Category</label>
                                            <input class="form-control" id="searchCategory" placeholder="game category" name="searchCategory" type="text">
                                        </div>

                                        <li>
                                            <a id="filterByAgeRange"><i class="fa fa-fw fa-dashboard"></i>Filter by Age</a>
                                        </li>

                                        <div class="form-group">
                                            <label for="name">Age</label>
                                            <input class="form-control" id="searchAgeRange" placeholder="game Age range recommended" name="searchAgeRange" type="text">
                                        </div>


                                        <!-- Submit form Button to update info-->
                                        <input type="submit" class="btn btn-md btn-primary" value="Search" id="submit-searchBtn">

                                        <!--
                             <button class="btn btn-lg btn-success btn-block" type="submit" id="submit-addClipBtn" onclick="">Submit</button>-->

                                    </fieldset>

                                </form>
                                
                                
                                   <li>
                                 <!-- analyticsView.php -->
                                <a href="#"><i class="fa fa-fw fa-power-off"></i> Analytics</a>
                            </li>
                                
                               
                              </ul>
                              
                            </div>

                         

                       
                         
                    </div>
                    <!-- /.navbar-collapse -->
                    

                </nav>


    <!-- content - body -->
                <div id="page-wrapper">
                    <div class="container bootstrap snippet">

                         
                             <div class="header">
                            <div class="jumbotron  list-content">
                               
                                
                                <ul class="list-group">
                                    
                                     <h3 class="text-muted prj-name">
					       	<span class="fa fa-users fa-2x principal-title"></span>
							Game Clips Gallery
					      </h3>

                                    <!-- clips from DB-->
                                   

                                    <?php  /*load=1 means true by title*/ 
                                     if($loadedCheck){ ?>
                                       
                                       <!-- 
                                        <div class="btn btn-success"> Play Clip found</div>-->

                                        <div class="row">
                                            <div class="col-xs-4" class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="  <?php echo $sourceVid; ?> " width="100%" height="100%" frameborder="0"></iframe>
                                            </div>
                                        </div>

                                        <?php } ?>                                       
                                        
                                                                                
                                         <div id="mainpanecontentSearch"> </div>
                                         
                                         </hr>
                                          
                                            
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
                                
                                
                                <!-- from YouTube Search by keyWord-->
                                 <ul class="list-group">  
                                           
                                           <h3 class="text-muted prj-name">
					       	<span class="fa fa-users fa-2x principal-title"></span>
							YouTube Results
					      </h3>
                               
                                   
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
                            <h3 class="text-muted prj-name">
						<span class="fa fa-users fa-2x principal-title"></span>
							Recommended Clips
					</h3>
                            <div class="jumbotron  list-content">
                                <ul class="list-group">
                                    <!-- clips from DB-->
                                    <span id="mainpanecontentRecommend">	
                            </span>

                                    <div class="row">
                                        <div class="col-xs-4" class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src='videoClips/videoGame2.mp4' width="100%" height="100%" autoplay=false frameborder="0"></iframe>
                                        </div>

                                    </div>
                                    
                                    
                                    
                                     <!-- recommender feature in progress-->
                                    <div class="row" align="center">
                                        <div class="col-md-3 col-lg-3" align="center">

                                            <form method="POST" id="formRecommend" action="#">
                                                <!-- this input need a temporal value to start-->
                                                <input id="fieldQ1Rec" name="question1Rec" type="text" placeholder="Number of recommendations" />

                                            </form>


                                        </div>
                                        
                                        <hr>

                                        <div class="col-md-10 col-lg-10" align="center">
                                            <div class="col-md-6 col-lg-6" align="center">
                                                <button type="button" id="recommendBtn" class="btn btn-success">Update Recommender</button>
                                            </div>
                                            
                                            <div class="col-md-6 col-lg-6" align="center">
                                                <div id="responsePrediction">clips recommended                          
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        </div>

                                    </div>  <!-- end recommender feature in progress-->
        


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
                            <h3 class="text-muted prj-name">
						<span class="fa fa-users fa-2x principal-title"></span>
							Trendding Clips
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
                
            <!-- Modal Welcome by Sofia -->
            <div class="modal fade" id="welcomeModal" role="dialog">
              <button type="button" class="close closeWelcome" data-dismiss="modal">&times;</button>
              <div class='welcomecontent'>
                  <h3 class='welcometext'>Welcome to GameClips</h3>
                  <p>A website dedicated to Video Games fans.</p>
                  <p>Add your own videos, follow other gamers and like and save your favourite videos!</p>
            </div>
            <!-- END Modal Welcome by Sofia -->
      
    
  </div>
                
                
                
                


                <!-- /#wrapper -->
                <script src="js/index.js"></script>
                <script src="js/searchVideoByKeyWord.js"></script>
                <script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>
                
                
        </body>
        </html>