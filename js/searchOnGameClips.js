//Public URL access on UQ Zone cloud: https://infs3202-c562e525.uqcloud.net
/*  Project:  Game Clips WIS 2018
  Sofia Elena Grijalva & Marbin Sarria
  University of Queensland
  2018 
*/



//load all videos if this input is empty 
$('#searchKeyWordGameClips').on('input',function () { 

 searchOnGameClipsByWord();

});



//Load all videos available in the platform for general user or active user videos
function searchOnGameClipsByWord() {
    
    
   //  document.getElementById('mainpanecontentSearch').value="";
    $('#mainpanecontentSearch').empty();

    //retrieve keyword
    var keywordGc = document.getElementById('searchKeyWordGameClips').value;
    console.log(keywordGc);    
    var rpReqUrl = "../php/searchVideosByWordGameClips.php";

    
    $.post(rpReqUrl,

        //data
        {
            //keyWord
            keyWordGameInClipsDB: keywordGc

        },

        function (dataClipsServerDBReply, status) {

            //loop OVER JSON OBJECT
            $.each(dataClipsServerDBReply, function (index, value) {

                console.log(value.length);

                //retrieve each video info
                for (m in value) {

                    // var usrId = value[m].userID;
                    var videoTitle = value[m].title;
                    var sourceVideo = value[m].sourceLinkVideo + "";
                    var viewsVideo = value[m].views;

                    var videoUploadByAuthor = value[m].videoUploadBy;
                    var dateUploadVideo = value[m].videoDateUpload;
                    var categoryVideo = value[m].category;

                    var videoId = value[m].videoID;
                    var itemListID = videoId + "";

                    // console.log(value[m].userID);
                    console.log(videoTitle);
                    console.log(sourceVideo);
                    console.log(viewsVideo);

                    //slice details
                    //var subject=contDetails.slice(0,100)+"...";

                    var FirstNameUser = fnameUser;

                    //var language=value[m].language;
                    //by default
                    var language = "english";

                    var pictDefault = "";

                    //var category=value[m].category;
                    var category = categoryVideo;

                    //var FirstName=value[m].fnameCreator;
                    var fNameVideoUploadedBy = videoUploadByAuthor;
                    var FirstNameUploader = "Uploaded by  " + fNameVideoUploadedBy;


                    /*to define*/
                    var videoFrame = "video frame here";
                    var additionalDetails = "video additional details";

                    var dateVideo = dateUploadVideo;

                    /*container definition*/
                    var videoFrame = ' <div class="col-xs-10" class="embed-responsive embed-responsive-16by9">                                <video class="embed-responsive-item" src= ' + sourceVideo + ' width="100%" height="100%"   frameborder="0" preload="metadata" controls ></video> </div>';

                    //if it is a url resource, then use a iframe tag
                    //if the substring is different to -1, it exists as substring of source url
                    if (sourceVideo.search("https://") != -1) {

                        videoFrame = ' <div class="col-xs-10" class="embed-responsive embed-responsive-16by9">                                <iframe class="embed-responsive-item" src= ' + sourceVideo + ' width="100%" height="100%"   frameborder="0" ></iframe> </div>';

                    }

                    /*Thumbnail by default*/
                    var pictDefault = '<img src="images/defaultScreenVideo.png" class="screenDefault" class="img-responsive img-thumbnail" width="150" height="100">';

                    /*Thumbnail by item if saved on DB as png or gif*/
                    //var  pictDefault='<img src='+thumbnailImg+' class="screenDefault" class="img-responsive img-thumbnail" width="150" height="150">';

                    var btnPlayVideo = '<button style="margin-right: 5px;" type="button" class="btn btn-info btn-sm glyphicon glyphicon-play-circle" data-toggle="modal" data-target="#' + itemListID + '" title="Game Clips Player" onclick="saveActiveVideo(' + videoId + ')" > ' + pictDefault + '</button>';

                    var btnAddVideoToMyClips = '<button style="margin-right: 5px;" type="button" class="btn btn-danger btn-sm glyphicon " data-toggle="modal" data-target=' + inviteNoMemberAddVideoToMyClipsF() + '    onclick="resetFormAddVideoModal()" >Add to My Clips </button>';

                    var btnAddMyRatingVideo = '<button style="margin-right: 5px;" type="button" class="btn btn-danger btn-sm glyphicon glyphicon-star-empty" data-toggle="modal" data-target=' + inviteNoMemberRating() + '    onclick="resetRatingsModal()" >Rate Video </button>';

                    //FORMAT video Item
                    var itemVideo = '<li href="#" class="list-group-item text-left"> ' + btnPlayVideo + '<label class="name">' + FirstNameUploader + ' <br>Date video: ' + dateVideo + '<h6>Category: ' + category + '</h6><br></label><label class="pull-right">    <!-- Modal Play video--><div class="modal fade" id="' + itemListID + '" role="dialog"><div class="modal-dialog">    <!-- Modal content--><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 font-color="grey"class="modal-title"><strong>' + FirstNameUploader + '</strong> <span style="color:rgb(0, 160, 70)">Views.</span></h4></div>    <div class="modal-body"><h6>category</h6><blockquote>' + category + '</blockquote><h3>Clip</h3><blockquote>' + videoFrame + '</blockquote><h6>Language</h6><blockquote>' + language + '</blockquote><h6>' + additionalDetails + '</h6></div>     <div class="modal-footer">    <!-- new Btn --> ' + btnAddMyRatingVideo + btnAddVideoToMyClips + '<button type="button" class="btn btn-default" data-dismiss="modal">Closing player</button>   </div></div></div></div><a  class="btn btn-danger  btn-sm glyphicon glyphicon-trash" href="#" id="' + videoId + '" onclick="inviteSubscribe(' + videoId + ')" title="Remove Video"></a> </label>    <div class="break"></div></li>';

                    $('#mainpanecontentSearch').prepend(itemVideo);

                }

                //horizontal separator
                $('#mainpanecontentSearch').prepend("<br>");

            });


        },
        'json');

} //end 






