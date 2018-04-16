
//Public URL access on UQ Zone cloud: https://infs3202-c562e525.uqcloud.net 

/*ger active user credentials*/
//var fnameUser  = "visitor";
//var emailUser  = "no email defined";


//var fnameUser  = <?php echo json_encode($_SESSION['fname']) ?>;
//var emailUser  = <?php echo json_encode($_SESSION['email']) ?>;


//retrieve user active from View

var fnameUser  = document.getElementById('creatorFullName').text ;
var emailUser  = document.getElementById('activeEmail').text;

//console.log(emailUser);
console.log(fnameUser);


//load videos available in the platform for general user or active user videos 

function retrieveVideos(emailUsrActive) {    
  

    var rpReqUrl = "php/loadVideos.php";

    $.post(rpReqUrl,

        //data
        {
            //activeUser
            userEmail: emailUsrActive

        },


        function (dataClipsServerDBReply, status) {

            //loop OVER JSON OBJECT
            $.each(dataClipsServerDBReply, function (index, value) {               

                console.log(value.length);
                
                //retrive each video info
                for (m in value) {

                   // var usrId = value[m].userID;
                    var videoTitle = value[m].title;                   
                    var sourceVideo = value[m].sourceLinkVideo; 
                    var viewsVideo =  value[m].views;
                    
                    var videoUploadByAuthor =  value[m].videoUploadBy;
                     var dateUploadVideo =  value[m].videoDateUpload;
                     var categoryVideo =  value[m].category;
                    
                 
                    
                    var videoId = value[m].videoID;
                    var itemListID = videoId  + "";
                    
                    
                    
                 // console.log(value[m].userID);
                    console.log(videoTitle);
                    console.log(sourceVideo);
                    console.log(viewsVideo);
                                     
                    //slice details
                    //var subject=contDetails.slice(0,100)+"...";
                    
                     var FirstNameUser=fnameUser;
               

                    //var language=value[m].language;
                    //by default
                    var language = "english";
                    
                    var  pictDefault=""; 
                    
                    //var category=value[m].category;
                     var category=categoryVideo;
                    //var FirstName=value[m].fnameCreator;
                    var fNameVideoUploadedBy = videoUploadByAuthor;
                    var FirstNameUploader = "Uploaded by  " + fNameVideoUploadedBy;
                    
                    
                    /*to define*/
                     var videoFrame = "video frame here";                    
                     var additionalDetails = "video additional details";                    
                    
                      var dateVideo = dateUploadVideo;
                    
                      var videoFrame = ' <div class="col-xs-10" class="embed-responsive embed-responsive-16by9">                                <iframe class="embed-responsive-item" src= '+sourceVideo +' width="100%" height="100%"   frameborder="0" ></iframe> </div>';
                    
                    /*Thumbnail by default*/
                   var  pictDefault='<img src="images/defaultScreenVideo.png" class="screenDefault" class="img-responsive img-thumbnail" width="150" height="100">';
                    
                    /*Thumbnail by item if saved on DB as png or gif*/
                   //var  pictDefault='<img src='+thumbnailImg+' class="screenDefault" class="img-responsive img-thumbnail" width="150" height="150">';
                                        
                    var btnPlayVideo='<button style="margin-right: 5px;" type="button" class="btn btn-info btn-sm glyphicon glyphicon-play-circle" data-toggle="modal" data-target="#' + itemListID + '" title="Game Clips Player"> '+pictDefault+'</button>';   
                    
                    var btnAddVideoToMyClips='<button type="button" class="btn btn-primary" data-dismiss="modal"   onclick="inviteSubscribe(' + videoId + ')">Add to My Clips</button>  ';    

                    //FORMAT video Item
                    var itemVideo = '<li href="#" class="list-group-item text-left"> ' + btnPlayVideo+    '<label class="name">' +  FirstNameUploader  + ' <br>Date video: ' + dateVideo  + '<h6>Category: ' + category + '</h6><br></label><label class="pull-right">    <!-- Modal Play video--><div class="modal fade" id="' + itemListID + '" role="dialog"><div class="modal-dialog">    <!-- Modal content--><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 font-color="gery"class="modal-title"><strong>' + FirstNameUploader+ '</strong> <span style="color:rgb(0, 160, 70)">Views.</span></h4></div>    <div class="modal-body"><h6>category</h6><blockquote>' + category + '</blockquote><h3>Clip</h3><blockquote>' +videoFrame + '</blockquote><h6>Language</h6><blockquote>' + language + '</blockquote><h6>' + additionalDetails + '</h6></div>     <div class="modal-footer">    <!-- new Btn --> '+btnAddVideoToMyClips+'<button type="button" class="btn btn-default" data-dismiss="modal">Closing player</button>   </div></div></div></div><a  class="btn btn-danger  btn-sm glyphicon glyphicon-trash" href="#" id="' +videoId + '" onclick="inviteSubscribe(' + videoId + ')" title="Remove Video"></a> </label>    <div class="break"></div></li>' ;
                                        

                    $('#mainpanecontentSearch').prepend(itemVideo);

                }

                //horizontal separator
                $('#mainpanecontentSearch').prepend("<br>");

            });


        },
        'json');

} //end 


function inviteSubscribe(){

alert("Please subscribe to enable more options!");

}


//start JQuery
$(document).ready(function () {    
        
    /*load Videos in Home*/
     retrieveVideos(emailUser);
    
    
    
    
        
    //////Function Recommend//////////////////////////////////////
    $("#recommendBtnxxx").click(function (e) {

         e.preventDefault();
        
        var rpReqUrlRec = "php/computeRecommend.php";

              
       var x2 = document.getElementById('fieldQ1Rec').value;
     
        
       console.log(x2);
        
        //func extract parameter/var///////////////

        //ASSIGN THE RESPONSE TO A VARIABLE
        var content = $.getJSON(rpReqUrlRec,
            //data
            {
                 x2: x2            
            },
                             
            function (dataResp, status) {
               //alert("Data: " + dataResp.name+ "\nStatus: " + status);
               //$("#responsePrediction").html(dataResp);
            
             itemsName="";
            var items = [];            
              //iterate over items response            
              $.each( dataResp, function( key, val ) {
                                    
                  
                 //retrieve results
                for (m in val) {

                   // var usrId = value[m].userID;
                    var fname = val[m].name;                   
                    var videoId = val[m].videoId; 
                    var userId=  val[m].userId;
                   // var predictedRating =  value[m].predictedRating;                  
                  
                     //every record                 
                     items.push( "<li id='" + key+ "'>" + JSON.stringify(val) + "</li>" );
                  
                     // console.log(fname);                                    
                  
                      itemsName=itemsName + JSON.stringify(val+" . ");
                  
                     //append to body or some div 

                     if(val=="false"){

                        $("#responsePrediction").html("Please, check all fields " );             

                     }else{      
                         
                           //recommend True
                           $("#responsePrediction").html("  Data JSON from recommender: <br><li>  " + val[m].name +"</li>");

                           console.log(val[m].name);
                         
                         //////////////////
                        //funtion retrive video src link via AJAX
                        var sourceVideo='retrieve(srcVideoDB)';
                         
                         //request video and render   [0 first video recommended][0 idvideo]
                         var ob = val[m].name;
                         console.log(ob);
                         
                         var test="86";
                         
                         retrieveVideosRecommended(test);
                         
                       
                      
                         
                         //////////////////////
                         
                     }
                    
                    
                } //end for
                 
                                       
             });     //end each
                        
            }); //end main fn        
  
         //render content
       $("#responsePrediction").html(content);       
       
  
    });
    ///////////////////////end POST recommend
        
    
    //////////NEW RECOMMENDER CODE
    
    
    
     //with AJAX  WORKS ////////////////////////////////////////////////////////////////////

    $('#recommendBtn').click(function (e) {


        e.preventDefault();

        // var rpReqUrl1 = "https://www.linkservicesonline.com/recommend";        

        var rpReqUrlRec = "../php/computeRecommend.php";
        var x2user = document.getElementById('fieldQ1Rec').value;

        //var x2user = "test value 5"; 

        $.ajax({

            type: 'POST',
            url: rpReqUrlRec,
            data: {
                x2: x2user
            },
            dataType: 'json',
            success: function (data) {
                // alert("Data: " + JSON.stringify(data)+ "\nStatus: " + status);

                var itemsName = "";
                var items = [];

                $.each(data, function (key, val) {


                    /*  $('#responsePrediction').append($('<div>', {                                        
                          text: element)
                      }));
                      */


                    //retrive each video info
                    for (m in val) {

                        // var usrId = value[m].userID;
                        var fname = val[m].name;
                        var videoId = val[m].videoId;
                        var userId = val[m].userId;
                        // var predictedRating =  value[m].predictedRating;

                        //every record                 
                        items.push("<li id='" + key + "'>" + JSON.stringify(val) + "</li>");
                        // console.log(fname);

                        itemsName = itemsName + JSON.stringify(val + " . ");
                        //append to body or some div 

                        if (val == "false") {
                            $("#responsePrediction").html("Please, check all fields ");

                        } else {
                            $("#responsePrediction").html(" <div style='color:blue'>JSON Data from recommender: </div> " + val[m].name);
                            console.log(val[m].name);
                        }

                    } //end for      



                });
            },


            error: function (result) {
                alert("Error");
            }
        });

    });


    //end  AJAX  WORKS ////

    
    
    
    
    
    
    /////////////// END NEW RECOMMENDER CODE
    
    
    
    
    
    
    
    
    
    
    
    
     //////Function Recommend
   $("#recommendBtn").hover(function () {
        
     $(this).css({'background-color':'purple','font-size':'16px', 'color':'white','cursor':'pointer'});    
    
   });
    ///////////////////////////
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //Function Recommended source retrieval
    //videoIdRecommended
    
 function retrieveVideosRecommended(videoIdRecommended) {    
    var rpReqUrl = "php/loadVideosRecommended.php";

    $.post(rpReqUrl,

        //data
        {
            //activeUser
            videoIdRecommended: videoIdRecommended

        },


        function (dataClipsServerDBReply, status) {

            //loop OVER JSON OBJECT
            $.each(dataClipsServerDBReply, function (index, value) {               

                console.log(value.length);
                
                //retrive each video info
                for (m in value) {

                   // var usrId = value[m].userID;
                    var videoTitle = value[m].title;                   
                    var sourceVideo = value[m].sourceLinkVideo; 
                    var viewsVideo =  value[m].views;
                    
                    var videoUploadByAuthor =  value[m].videoUploadBy;
                     var dateUploadVideo =  value[m].videoDateUpload;
                     var categoryVideo =  value[m].category;
                                        
                    var videoId = value[m].videoID;
                    
                     
                    
                    
                    var itemListID = videoId  + "";
                    
                 // console.log(value[m].userID);
                    console.log(videoTitle);
                    console.log(sourceVideo);
                    console.log(viewsVideo);
                                     
                    //slice details
                    //var subject=contDetails.slice(0,100)+"...";
                    
                     var FirstNameUser=fnameUser;
               

                    //var language=value[m].language;
                    //by default
                    var language = "english";
                    
                    var  pictDefault=""; 
                    
                    //var category=value[m].category;
                     var category=categoryVideo;
                    //var FirstName=value[m].fnameCreator;
                    var fNameVideoUploadedBy = videoUploadByAuthor;
                    var FirstNameUploader = "Uploaded by  " + fNameVideoUploadedBy;
                    
                    
                    /*to define*/
                     var videoFrame = "video frame here";                    
                     var additionalDetails = "video additional details";                    
                    
                      var dateVideo = dateUploadVideo;
                    
                      var videoFrame = ' <div class="col-xs-10" class="embed-responsive embed-responsive-16by9">                                <iframe class="embed-responsive-item" src= '+sourceVideo +' width="100%" height="100%"   frameborder="0" ></iframe> </div>';
                    
                    /*Thumbnail by default*/
                   var  pictDefault='<img src="images/defaultScreenVideo.png" class="screenDefault" class="img-responsive img-thumbnail" width="150" height="100">';
                    
                    /*Thumbnail by item if saved on DB as png or gif*/
                   //var  pictDefault='<img src='+thumbnailImg+' class="screenDefault" class="img-responsive img-thumbnail" width="150" height="150">';
                                        
                    var btnPlayVideo='<button style="margin-right: 5px;" type="button" class="btn btn-info btn-sm glyphicon glyphicon-play-circle" data-toggle="modal" data-target="#' + itemListID + '" title="Game Clips Player"> '+pictDefault+'</button>';   
                    
                    var btnAddVideoToMyClips='<button type="button" class="btn btn-primary" data-dismiss="modal"   onclick="inviteSubscribe(' + videoId + ')">Add to My Clips</button>  ';    

                    //FORMAT video Item
                    var itemVideo = '<li href="#" class="list-group-item text-left"> ' + btnPlayVideo+    '<label class="name">' +  FirstNameUploader  + ' <br>Date video: ' + dateVideo  + '<h6>Category: ' + category + '</h6><br></label><label class="pull-right">    <!-- Modal Play video--><div class="modal fade" id="' + itemListID + '" role="dialog"><div class="modal-dialog">    <!-- Modal content--><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 font-color="gery"class="modal-title"><strong>' + FirstNameUploader+ '</strong> <span style="color:rgb(0, 160, 70)">Views.</span></h4></div>    <div class="modal-body"><h6>category</h6><blockquote>' + category + '</blockquote><h3>Clip</h3><blockquote>' +videoFrame + '</blockquote><h6>Language</h6><blockquote>' + language + '</blockquote><h6>' + additionalDetails + '</h6></div>     <div class="modal-footer">    <!-- new Btn --> '+btnAddVideoToMyClips+'<button type="button" class="btn btn-default" data-dismiss="modal">Closing player</button>   </div></div></div></div><a  class="btn btn-danger  btn-sm glyphicon glyphicon-trash" href="#" id="' +videoId + '" onclick="inviteSubscribe(' + videoId + ')" title="Remove Video"></a> </label>    <div class="break"></div></li>' ;
                                        

                    $('#mainpanecontentRecommend').prepend(itemVideo);

                }

                //horizontal separator
                $('#mainpanecontentRecommend').prepend("<br>");

            });


        },
        'json');

} //end  video recommended function

    
    
    ///////////
    
    });