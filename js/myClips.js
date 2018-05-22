/*ger active user credentials*/
//var fnameUser  = "visitor";
//var emailUser  = "no email defined";


//var fnameUser  = <?php echo json_encode($_SESSION['fname']) ?>;
//var emailUser  = <?php echo json_encode($_SESSION['email']) ?>;


//retrieve user active from View

var fnameUser  = document.getElementById('creatorFullName').text ;


var emailUser  = document.getElementById('activeEmail').text;

console.log(emailUser);
console.log(fnameUser);


//load videos available in the platform for general user or active user videos
function retrieveVideosMyClips(emailUsrActive) {   
    
    var rpReqUrl = "../php/loadVideosMyClips.php";
    
    
    console.log("send data: " + emailUsrActive.replace("\n",""));
    
    console.log(emailUsrActive+"");

    $.post(rpReqUrl,

        //data
        {
            //activeUser and remove white spaces around the email
           userEmail: JSON.stringify(emailUsrActive)
        },


        function (dataClipsServerDBReply, status) {

            //loop OVER JSON OBJECT
            $.each(dataClipsServerDBReply, function (index, value) {               
             console.log(value.length);
                
                //retrive each video info
                for (m in value) {

                   // var usrId = value[m].userID;
                    var videoTitle = value[m].title;                   
                    var sourceVideo = value[m].sourceLinkVideo+""; 
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
                    
                    /*container definition*/                    
                      var videoFrame = ' <div class="col-xs-10" class="embed-responsive embed-responsive-16by9">                                <video class="embed-responsive-item" src= '+sourceVideo +' width="100%" height="100%"   frameborder="0" preload="metadata" controls ></video> </div>';
                    
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


 //var emailUser1  = document.getElementById("activeEmail").innerHTML;
//var emailUser1  =  document.getElementById("activeEmail").innerHTML ;

 //var emailUser1=$('#activeEmail').val();


$(document).ready(function () {    
   // console.log(typeof emailUser);    
   //emailUser="marbin3d@hotmail.com";
  // emailUser  = document.getElementById('activeEmail').innerHTML;

   //retrieveVideosMyClips(JSON.stringify(emailUser));
   retrieveVideosMyClips(emailUser); 
    
    
    
   // var emailUser1  = $('#activeEmail').val()+"";
     /*load Videos in myClips */
     //retrieveVideos( emailUser1);
    
    
    
    //option photo    
    //requestPhoto(stgUserID)
    //Load preview Profile image before submision  with validation
    //works
    $('#videoSelected').change(function () {
                
       // alert('This file size is: ' + this.files[0].size/1024/1024 + " MB");
        //validate if file less than 850 MB
        
         if (this.files[0].size/1024/1024 <850) {
                       
             
            //read Object local file    
            var objFileReader = new FileReader();
            objFileReader.readAsDataURL(document.getElementById("videoSelected").files[0]);
            objFileReader.onload = function (ObjectFileReaderEvent) {
                document.getElementById("photo").src = ObjectFileReaderEvent.target.result;

            };

            var pathPhoto = $('#videoSelected').val();
            console.log("local path video:  " + pathPhoto + '');

        } else {

            $('#videoSelected').val('');
            alert('Please, verify video. It must be less than 850 MB');

        }

    });

    //works
      
        
        
    
    
    });