<!DOCTYPE html>

<html lang="en">

<head>

    <title>Project GAME CLIPS</title>



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


    <!-- Custom Fonts 
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->




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
                <a class="navbar-brand">Creator Page</a>


            </div>

            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav ">

                <li>
                    <a href="index.php"><i class="fa fa-fw fa-dashboard"></i>Home</a>
                </li>

                <li>
                    <a href="dashboardCreator.php"><i class="fa fa-fw fa-dashboard"></i>My Clips</a>
                </li>

                <li>
                    <a href="dashboardAbout.php"><i class="fa fa-fw fa-dashboard"></i>About</a>
                </li>

                <li>
                    <a href="dashboardAbout.php"><i class="fa fa-fw fa-dashboard"></i>Help </a>
                </li>


                <!-- drop down Recent Clips added by members-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Sean Gamer</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> added at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> added at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="message-footer">
                            <a href="#">Read All latest Clips</a>
                        </li>
                    </ul>
                </li>
                <!-- End Top Menu Items -->



                <!-- drop down Active User-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="creatorFullName"><i class="fa fa-user"></i> Jack creator <b class="caret"></b></a>
                    <ul class="dropdown-menu">


                        <li class="divider"></li>
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>


            </ul>





            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a id="filterByTitle"><i class="fa fa-fw fa-dashboard"></i>Filter by Title</a>
                    </li>
                    <li>
                        <a id="filterByCategory"><i class="fa fa-fw fa-dashboard"></i>Filter by category</a>
                    </li>


                    <li>
                        <a id="filterByAgeRange"><i class="fa fa-fw fa-dashboard"></i>Filter by Age</a>
                    </li>


                    <li>
                        <a href="analyticsView.php"><i class="fa fa-fw fa-power-off"></i> Analytics</a>
                    </li>


                </ul>



            </div>
            <!-- /.navbar-collapse -->
        </nav>


        <!-- features-->
        <div class="container-fluid">

            <div class="col-md-12">
                <div class="row">
                    <div class="panel panel-success backgroundcolor">
                        <div class="panel-heading">Actions</div>


                        <div class="col-md-2">
                            <div class="text-left">

                                <div class="button-wrapper">
                                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#AddClip">Add new Clip</button>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-2">

                            <div class="button-wrapper">
                                <button type="button" class="btn btn-success btn-lg" id="showFavourites">Show Favourites</button>

                            </div>
                            <div class="clearfix"></div>

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
                    <h3 class="text-muted prj-name">
						<span class="fa fa-users fa-2x principal-title"></span>
							My Clips
					</h3>
                </div>


                <div class="jumbotron  list-content">
                    <!-- List of Clips added by Active user-->
                    <ul class="list-group">

                        <!-- AddedClipsList from DB-->
                        <span id="mainpanecontent">	
                        </span>
                        <!-- Clips to be added from DB-->

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
    <div>
        <!-- End page wrapper-->

        SM project 2018
    </div>
    <!-- end wrapper or main container -->
    <!-- -->
    <!--End Footer-->

    <!-- Start MODALS definitions-->

    <!-- AddClipDialog -->
     <!-- AddClipDialog -->
	<div class="modal fade addClipDialog" id="AddClip" >
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="panel panel-default">
					<div class="panel-heading">
						<button data-dismiss="modal" class="close class pull-right"><span ata-dismiss="modal" class="glyphicon glyphicon-remove class pull-right"></span></button>
						<h3 class="panel-title">Add video information</h3>
					</div>
					
					<!--What is hidden-->
					<div class="panel-body">
						<form accept-charset="UTF-8" role="form">
						<fieldset>
						
						
						<!-- Clip upload Button-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="file">Select Clip </label>
                                    <div class="col-md-4">
                                        <div class="col-md-6 ">
                                            <img src="img/default.jpg" id="photo" class="img-responsive img-thumbnail">
                                        </div>

                                        <div class="input-group">
                                            <!-- Photo file to upload-->
                                            <input type="file" name="file" id="clipInput">
                                            <p class="help-block">Only mp4,avi file max size:20 MB</p>
                                        </div>                                       
                                    </div>
                                </div>
						
						   <div class="form-group">
								<input class="form-control"  id="sourceVideo" placeholder="source video" name="sourceVideo" type="text">
							</div>
							<div class="form-group">
								<input class="form-control"  id="title" placeholder="Title" name="title" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" id="category" placeholder="category" name="category" type="text" value="">
							</div>
							<div class="form-group">
								<input class="form-control" id="language" placeholder="language" name="language" type="text" value="">
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
                            <label for="name">Password</label>
                            <input id="password-inputDecisionMaker"  type="password" name="password" placeholder="Password" maxlength="60" required class="form-control" />
                            <span id="password-error"></span>
                            </div>
							
							<!--
							<input id="addClipBtn" class="btn btn-lg btn-success btn-block" type="submit" value="Upload">-->
							
							  <button class="btn btn-lg btn-success btn-block" type="submit" id="submit-addClipBtn" onclick="">Submit</button>
							  
							  
						</fieldset>
						</form>
					</div>
				</div>
        </div>
    </div>
	</div> <!-- end AddClipDialog -->
    <!-- end AddClipDialog -->





   

    <!-- end MODALS definitions-->




    <!--     
<script src="js/videos-User-Creator.js"></script>-->

</body>

</html>