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
   

    <!-- Custom Fonts 
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->

    
	 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    
</head>

<body>
    <div id="wrapper" >
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
                 <a class="navbar-brand">Visitor</a>
                 
                 
            </div>
            
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav ">
               
                   <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i>Home</a>
                    </li>
                    
                     <li>
                        <a href="myClips.php"><i class="fa fa-fw fa-dashboard"></i>My Clips</a>
                    </li>
                     
                      <li>
                        <a href="dashboardAbout.php"><i class="fa fa-fw fa-dashboard"></i>About</a>
                    </li>
                    
                     <li>
                        <a href="dashboardAbout.php"><i class="fa fa-fw fa-dashboard"></i>Help </a>
                    </li>
               
               
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
                                        <h5 class="media-heading"><strong>Jack Gamer2</strong>
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
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Jack Gamer</strong>
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
                
                               
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="creatorFullName"><i class="fa fa-user"></i> Jack <b class="caret"></b></a>
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
		
		
		<div id="page-wrapper">
			<div class="container bootstrap snippet">
				<div class="header">
					<h3 class="text-muted prj-name">
						<span class="fa fa-users fa-2x principal-title"></span>
							Recommended Clips
					</h3>
				</div>


		<div class="jumbotron  list-content">
			<ul class="list-group">
				 <!-- messages from DB-->        
				<span id="mainpanecontent">	
				</span>	 <!-- from DB-->
                
				<li href="#" class="list-group-item text-left">
					<a class="btn btn-block btn-primary">
					<i class="glyphicon glyphicon-refresh"></i>
					Load more Clips...
					</a>
				</li>
                      
                 		
				
			</ul>
		</div>
		
  </div>
  </div>
     
	
</div>
    <!-- /#wrapper -->
<script src="js/videos-User-Creator.js"></script>
</body>
</html>
