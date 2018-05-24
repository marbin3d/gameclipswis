
//YouTube API integration

//video API for statisticts views
//var videoapikey="AIzaSyCsjESmlY5yHGXI5sy8pdIGMhRqQ12CxOc"; //my MSVapikey  

/*MSV youtube Key*/
var videoapikey="AIzaSyB7OIivHxyHW6-VFXvtOsMCJiwHpqZsic8"; //my MSVapikey    


var videoID="676ZCxkMoII"; //id of video           
var url="https://www.googleapis.com/youtube/v3/videos?part=statistics&id="+videoID+"&key="+videoapikey;  
           
          
var resultVideos=[];

function searchVideoByKeyWord() {    
    
    
              var keyword= 'pink floyd';
              //  var q = $('#query').val();
    
                var requestX = gapi.client.youtube.channels.list({
                        part: 'statistics',
                        forUsername : 'GameSprout'
                                                        
                });
    
    
                var request = gapi.client.youtube.search.list({
                        q: keyword,
                        part: 'snippet'
                      });

    
        
                request.execute(function(response) {
                       var str = JSON.stringify(response.result);
                    
                  //  var str = response.result;
                     //   alert(str);
                   console.log(str);
                    
                    
                   // $.each(str.items, function (index, value){
                        
                        //  var videoID = value.snippet.resourceId.videoId; 
                        
                      //  console.log(videoID );
                    console.log(str.items.videoId);
                        
                    // $('#mainpanecontentSearch').html('<pre>' + str.items.id+ '</pre>');
                    
                    //});
                    //save JSON
                    //resultVideos.push(str);                   
                                         
                    //console.log(response.items);
                });
        }
    




function renderVideosRequested(dataClipsServerDBReply){

            //loop OVER JSON OBJECT
            $.each(dataClipsServerDBReply.items, function (index, value) {               

                console.log(value);
                
                //retrive each video info
               // for (m in value) {
                                                
                    
                   // var videoID = value[m].id; 
                    var videoID = value.snippet.resourceId.videoId; 
                
                    var urlBase="https://www.googleapis.com/youtube/v3/videos?id=";  
                
                
                    var sourceVideo =urlBase+videoID; 
                                        
                   // var viewsVideo =  value[m].viewsCount;                
                  //var viewsVideo =value.snippet.resource.viewsCounts;
              //  var viewsVideo =value.snippet.resourceId.viewsCounts;
                 var viewsVideo ='000';
                    
                                      
                    
                    /*
                    
                    var videoTitle = value[m].title;                     
                    var videoUploadByAuthor =  value[m].videoUploadBy;
                     var dateUploadVideo =  value[m].videoDateUpload;
                     var categoryVideo =  value[m].category;                    
                 */
                    
                  //  var videoId = value[m].videoID;
                   // var itemListID = videoId  + "";
                
                //id in YouTube
                 var itemListID = videoID  + "";
                    
                    
                    
                 // console.log(value[m].userID);
                   // console.log(videoTitle);
                    console.log(sourceVideo);
                    console.log(viewsVideo);
                                     
                    //slice details
                    //var descriptiont=contDetails.slice(0,100)+"...";
                    
                     var FirstNameUser=fnameUser;
               

                    //var language=value[m].language;
                    //by default
                    var language = "english";
                    
                    var  pictDefault=""; 
                    
                    //var category=value[m].category;
                     var category='categoryVideo';
                    
                    //var FirstName=value[m].fnameCreator;
                    var fNameVideoUploadedBy = 'videoUploadByAuthor';
                    var FirstNameUploader = "Uploaded by  " + fNameVideoUploadedBy;
                    
                    
                    /*to define*/
                     var videoFrame = "video frame here";                    
                     var additionalDetails = "video additional details";                    
                    
                      var dateVideo = 'dateUploadVideo';
                    
                      var videoFrame = ' <div class="col-xs-10" class="embed-responsive embed-responsive-16by9">                                <iframe class="embed-responsive-item" src= '+sourceVideo +' width="100%" height="100%"   frameborder="0" ></iframe> </div>';
                    
                    /*Thumbnail by default*/
                   var  pictDefault='<img src="images/defaultScreenVideo.png" class="screenDefault" class="img-responsive img-thumbnail" width="150" height="100">';
                    
                    /*Thumbnail by item if saved on DB as png or gif*/
                   //var  pictDefault='<img src='+thumbnailImg+' class="screenDefault" class="img-responsive img-thumbnail" width="150" height="150">';
                    
                    
                    
                    var btnPlayVideo='<button style="margin-right: 5px;" type="button" class="btn btn-info btn-sm glyphicon glyphicon-play-circle" data-toggle="modal" data-target="#' + itemListID + '" title="Game Clips Player"> '+pictDefault+'</button>';
                    
                     //var btnAddVideoToMyClips='<button type="button" class="btn btn-primary" data-dismiss="modal"   onclick="sendAddToMyClipsDB(' + videoId + ')">Add to My Clips</button>  ';
                     
                      var btnAddVideoToMyClips = '<button style="margin-right: 5px;" type="button" class="btn btn-info btn-sm glyphicon " data-toggle="modal" data-target=' + inviteNoMemberAddVideoToMyClips() + '     onclick="autoFillInfoYouTube(' +sourceVideo + ')" >Add to My Clips </button>';
    
                  
                    
                    //FORMAT video Item
                    var itemVideo = '<li href="#" class="list-group-item text-left"> ' + btnPlayVideo+    '<label class="name">' +  'FirstNameUploader'  + ' <br>Date video: ' + 'dateVideo'  + '<h6>Category: ' + 'category' + '</h6><br></label><label class="pull-right">    <!-- Modal Play video--><div class="modal fade" id="' + 'itemListID' + '" role="dialog"><div class="modal-dialog">    <!-- Modal content--><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 font-color="gery"class="modal-title"><strong>' + 'FirstNameUploader'+ '</strong> <span style="color:rgb(0, 160, 70)">Views.</span></h4></div>    <div class="modal-body"><h6>category</h6><blockquote>' + 'category' + '</blockquote><h3>Clip</h3><blockquote>' +videoFrame + '</blockquote><h6>Language</h6><blockquote>' +'language' + '</blockquote><h6>' + 'additionalDetails' + '</h6></div>     <div class="modal-footer"> <button type="button" class="btn btn-primary" data-dismiss="modal"   onclick="sendNewVideoView(' + videoId + ')">Remove Clip</button> <!-- new Btn --> '+btnAddVideoToMyClips +' <button type="button" class="btn btn-default" data-dismiss="modal">Closing player</button>   </div></div></div></div><a  class="btn btn-danger  btn-sm glyphicon glyphicon-trash" href="#" id="' +videoId + '" onclick="removeVideo(' + videoId + ')" title="Remove Video"></a> </label>    <div class="break"></div></li>' ;
                    
                                    
                                        
                    //Results from youtube
                    $('#mainpanecontentSearch').prepend(itemVideo);

              //  }

               

            });
    
     //horizontal separator
                $('#mainpanecontentSearch').prepend("<br>");

}


//fn invite to subscribe if a non-member wants to add a video clip to its list
function inviteNoMemberAddVideoToMyClips() {

    if (emailU == '"noemaildefined"' || emailU == "")

    {
        

      return "#AddClipFromYouTubeNoDefined";

    } else {
        //defined in index.js to reset the form beform completion
       
        
        return "#AddClipFromYouTube";
    }
}



///////////////////////////////////////////////

//auto completion and other info complete by user before upload from form with its post method
//reset  some fields and fill others in Form YouTube contained in videoInfo input variable in modal
//reset and auto completion
function autoFillInfoYouTube( videoInfo) {
       
   //reset ratings in ratings modal all optradio
    //$('input[name="optradio"]').prop('checked',false);
    //$('input[name="languageYouTubeClip"]').prop('checked',false);
    // $('input[name="sourceVideoURLYouTube"]').prop('checked',false);
    
    
     console.log("url of video to autofill");
    console.log(videoInfo);
    
    //url Youtube video
    document.getElementById('sourceVideoURLYouTube').value=videoInfo;
    
     //$('#sourceVideoURLYouTube').val(videoInfo);
    
    
    
    // $("#stateBarFormYouTubeAddVideo").html(" <div style='color:green'> State </div> ");

}



/////////////////////////////////////////////////////////////

/*Main function Search*/

function search(){
                //clear field
           $('#mainpanecontentSearchByKeyWord').html('');
    
            $('#query').html('');
    
    //Get From Input
    var keyword=$('#query').val();
    var urlGoogleAPI="https://www.googleapis.com/youtube/v3/search";
    
    //Get Request from API
    $.get(
          urlGoogleAPI,
         {
         //parts from API metadata to request
          part:'snippet,id',
          //search word
          q:keyword,
          type:'video', //type of media resource
          key:videoapikey},

          function(data){
                      
            var nextPageToken=data.nextPageToken;
            var prevPageToken=data.prevPageToken;
            console.log(data);
              
              //loop through the items
              
              $.each(data.items,function(i,videoItem){
                      
                     //return the result function
                     var outputItemVideo=getOutput(videoItem);                  
                   
                  // $('#mainpanecontentSearch').html('<pre>' + outputItem+ '</pre>');
                  
                  $('#mainpanecontentSearchByKeyWord').append(outputItemVideo);
                 
                  // var outputItemVideoStats= getStatisticsVideo(videoItem.id.videoId);              
                  //add view counts
                  //  $('#count'+videoItem.id.videoId).append(outputItemVideoStats);
                  
                                                
              });
                                            
          }
    
     ) //end  get
            
}
 





     
//Get Output function
function getOutput(item){
         

    var videoId=item.id.videoId;
    var title=item.snippet.title;
     var description=item.snippet.description;
    var thumb=item.snippet.thumbnails.high.url;
    var channelTitle=item.snippet.channelTitle;
    var videoDate=item.snippet.publishedAt;
    
    
    //Part: statistics from YouTube by a local fn
   
   //var viewCount=getStatisticsVideo(videoId);    
   // getStatisticsVideo(videoId);
    
    //var viewCount = '<a href= "#" id='+'count'+videoId+'>view count</a>';    
     //getStatisticsVideo(videoId);
    
      var viewCount=""+JSON.stringify(getStatisticsVideo(videoId));
    
    
     //var viewCount="";
    
    //var ret= stats.videoId;
    
    //console.log("test print counts "+ getStatisticsVideo(videoId+''));
    
  
   // var viewCount=item.id.rating;
    
    //console.log(viewCount);
    
    
    /*source video*/
    var baseUrlVideo='https://www.youtube.com/embed/';
    var sourceVideo=baseUrlVideo + videoId ;
    
    var category='general' ;
     var language='english' ;
    
    
    var output='<li>'+
        '<div class="list-left" >'+
        '<img  src="'+thumb+'">'+
            '<div class="list-right">'+
            '<h3>'+title+'</h3>'
        '<small>By <span class="cTitle">'+channelTitle+'</span> on'+
            videoDate+'<small>'+
            '<p>'+description+'</p>'+
            '</div>'+
            '</li>'+
            '<div class="clearfix"></div>'+
            '';
    
    
    
                  var itemListID=videoId;
    
                  var FirstNameUploader=channelTitle;
    
                 var videoFrame = ' <div class="col-xs-10" class="embed-responsive embed-responsive-16by9">                                <iframe class="embed-responsive-item" src= '+sourceVideo +' width="100%" height="100%"   frameborder="0" ></iframe> </div>';

                   //var videoFrame = '<div align="center" class="col-xs-12" class="embed-responsive embed-responsive-16by9"> <video class="embed-responsive-item" src= "'+sourceVideo +'"   frameborder="0"  width="100%" height="100%"   preload="metadata" controls ></video> </div>';    
                   // var videoFrame = '<a href= '+sourceVideo +'>'+sourceVideo+'</a>';
    
    
                    console.log(sourceVideo);
                    
                    /*Thumbnail by default*/
                   var  pictDefault='<img src='+thumb+' class="screenDefault" class="img-responsive img-thumbnail" width="150" height="100">';
                    
                    /*Thumbnail by item if saved on DB as png or gif*/
                   //var  pictDefault='<img src='+thumbnailImg+' class="screenDefault" class="img-responsive img-thumbnail" width="150" height="150">';
                    
                    
                    
                    var btnPlayVideo='<button style="margin-right: 5px;" type="button" class="btn btn-info btn-sm glyphicon glyphicon-play-circle" data-toggle="modal" data-target="#' + itemListID + '" title="Game Clips Player"> '+pictDefault+'</button>'
                    
                    
                   // var btnAddVideoToMyClips='<button type="button" class="btn btn-primary" data-dismiss="modal"   onclick="inviteSubscribe(' + videoId + ')">Add to My Clips</button>  ';
    
                   var btnAddVideoToMyClips = '<button style="margin-right: 5px;" type="button" class="btn btn-info btn-sm glyphicon " data-toggle="modal" data-target=' + inviteNoMemberAddVideoToMyClips() + '  onclick=autoFillInfoYouTube("' + sourceVideo + '")>Add to My Clips </button>';
    
                    
                    
                    var modalContent='<!-- Modal content--><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 font-color="grey"class="modal-title"><strong>' + FirstNameUploader+ '</strong> <span style="color:rgb(0, 160, 70)">Views: '+viewCount+' </span> </h4> </hr>        <div class=row> <div class="col-xs-2"> <h6>category</h6> ' + category + '</div> <div class="col-xs-2">  <h6>Language</h6>' +language+ '</div> <h6>' + '<div class="col-xs-2"> <h6> additionalDetails</h6>' + '</div></hr>    <div class="modal-body">  ' +videoFrame + '</div></div>' ; 
    
    
                     //integration video Item  
                     var itemVideoYouTube = '<li href="#" class="list-group-item text-left"> ' + btnPlayVideo+ viewCount+  '<label class="name">' +  FirstNameUploader  +' <br>Video published on: ' + videoDate  + '<h6>Category: ' + 'category' + '</h6><br></label><label class="pull-right">    <!-- Modal Play video--><div class="modal fade" id="' + itemListID + '" role="dialog"><div class="modal-dialog">    '+modalContent+'   <div class="modal-footer"> <button type="button" class="btn btn-primary" data-dismiss="modal"   onclick="sendNewVideoView(' + videoId + ')">Remove Clip</button> <!-- new Btn --> '+btnAddVideoToMyClips +' <button type="button" class="btn btn-default" data-dismiss="modal">Closing player</button>   </div></div></div></div><a  class="btn btn-danger  btn-sm glyphicon glyphicon-trash" href="#" id="' +videoId + '" onclick="removeVideo(' + videoId + ')" title="Remove Video"></a> </label>    <div class="break"></div></li>' ;

    return itemVideoYouTube;
    
}



var stats={};

//Return Views for a video Item given the  Id
/*fn Get Statistics from YouTube*//////////////////////////////////////////////////////////////////////////////////////////////////
function getStatisticsVideo(videoId){
                //clear field
    //Get From Input
    var id=videoId;
    //var urlGoogleAPIStatistics="https://www.googleapis.com/youtube/v3/videos";
    
     var url="https://www.googleapis.com/youtube/v3/videos?part=statistics&id="+videoId+"&key="+videoapikey; 
    
    
    //Get Request from API
    $.get(
          url,
       
          function(data){
                      
            var count=data.items[ 0 ].statistics.viewCount;
           // var count=data.items[0].viewCount;
          
              //loop through the items
           
             var viewCount=JSON.stringify(count);
              
               stats['\"'+id+'\"']=viewCount;
              console.log(stats);
              console.log(viewCount);              
                     
             
            var viewCountTxt = '<a href= "#">'+viewCount+'</a>';
          
                        
             //add view counts
            $('#count'+videoId).append(data.items[ 0 ].statistics.viewCount);
             return   data.items[ 0 ].statistics.viewCount ;
                                                
             // });
                                            
          }
        
        
    
     ) //end  get
            
}
    

//JQUERY
//////////
$(document).ready(function () {    
    
     //prevent the form to be submitted
    $('#searchYoutubeDB').submit(function(e){
       e.preventDefault();
    
    });
 
 
    
    
    ////////////////////
    
    //AJAX Submit information from Youtube form auto and user completion-addClipBtnYouTube
    
     $('#submit-addClipBtnYouTube').click(function (e) {


        e.preventDefault();

        // var rpReqUrl1 = "https://www.linkservicesonline.com/recommend";        

        var rpReqUrlRec = "../php/addVideoInfoYoutube.php";
        var urlYouTube = document.getElementById('sourceVideoURLYouTube').value;
         
         var title = document.getElementById('titleYouTube').value;
         var category = document.getElementById('categoryYouTube').value;
         var language = document.getElementById('languageYouTube').value;
         var description = document.getElementById('descriptionYouTube').value;
         var ageRange = document.getElementById('ageRangeYouTube').value;
         
         

        $.ajax({

            type: 'POST',
            url: rpReqUrlRec,
            data: {
               //email user active and white space free
                email: emailU,
                urlYouTubeVideo: urlYouTube+"",
                
                title:title,
                category:category,
                language:language,
                description: description,
                ageRange:ageRange
            },
            dataType: 'json',
            success: function (data) {
                // alert("Data: " + JSON.stringify(data)+ "\nStatus: " + status);

                var itemsName = "";
                var items = [];

             
                    
                     alert("successful info url upload");

     
                
            },


            error: function (result) {
                alert("Error");
            }
        });

    });

    //end  AJAX  WORKS ////
    /////////////// END NEW RECOMMENDER CODE

    
    
    
    
    
    
    ///////////////////
    
    
    
    
    });