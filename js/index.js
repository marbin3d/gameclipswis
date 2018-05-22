//Public URL access on UQ Zone cloud: https://infs3202-c562e525.uqcloud.net 

/*  Project:  Game Clips WIS 2018
  Sofia Elena Grijalva & Marbin Sarria
  University of Queensland
  2018 
*/

/*ger active user credentials*/
//var fnameUser  = "visitor";
//var emailUser  = "no email defined";

//var fnameUser  = <?php echo json_encode($_SESSION['fname']) ?>;
//var emailUser  = <?php echo json_encode($_SESSION['email']) ?>;


//SOFIA CODE
document.getElementById("myBtn").addEventListener("click", toggleNav);

function toggleNav() {
    navSize = document.getElementById("mySidenav").style.width;
    if (navSize == "250px") {
        return closeNav();
    }
    return openNav();
}

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("slidemenu").style.opacity = "100";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0px";
    document.getElementById("slidemenu").style.opacity = "0";
}


$("#menuYoutube").hide();
$(".searchGameClips").click(function () {
    $("#menuGameClips").show();
    $("#menuYoutube").hide();

});
$(".searchYoutube").click(function () {
    $("#menuYoutube").show();
    $("#menuGameClips").hide();

});

$(function () {
    // Since there's no list-group/tab integration in Bootstrap
    $('.list-group-item').on('click', function (e) {
        var previous = $(this).closest(".list-group").children(".active");
        previous.removeClass('active'); // previous list-item
        $(e.target).addClass('active'); // activated list-item
    });
});
//END SOFIA CODE



//retrieve user active from View
var fnameUser = document.getElementById('creatorFullName').text;
var emailUser = document.getElementById('activeEmail').text;
console.log("This is the email user");
console.log(emailUser);




//console.log(emailUser);
//console.log(fnameUser);

//remove white spaces
var emailU = emailUser.replace(/\s/g, '');
emailU = emailU.replace("\n", " ");



//playing active video 
var currentVideoId = "";

//Load all videos available in the platform for general user or active user videos
function retrieveVideos(emailUsrActive) {

    var rpReqUrl = "../php/loadVideos.php";

    console.log("email user active: " + emailUsrActive);
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



//fn invite to subscribe if a non-member wants to add a video clip to its list
function inviteNoMemberAddVideoToMyClipsF() {

    if (emailU == '"noemaildefined"' || emailU == "")

    {
        return "#AddClipFromYouTubeNoDefined";

    } else {
        return "#AddClipFromYouTube";
    }
}


//fn invite to subscribe if it is no a member
function inviteSubscribe(videoid) {

    if (emailU == '"\"noemaildefined\"' || emailU != " ")

    {
        alert("Please subscribe to enable more options!" + emailU + "to allow you rate this video: " + videoid);

    }

}


//fn invite to subscribe if a none-member wants to rate a video
function inviteNoMemberRating() {

    if (emailU == '"noemaildefined"' || emailU == "")

    {
        return "#ratingUserVideoNoDefined";

    } else {
        return "#ratingUserVideo";
    }
}


//Save current active video Id 
function saveActiveVideo(currentVidActive) {

    //save current video Id
    currentVideoId = currentVidActive;
    console.log(currentVideoId);

}


//reset ratings in ratings modal
function resetRatingsModal() {

    //reset ratings in ratings modal all optradio
    $('input[name="optradio"]').prop('checked', false);

    $("#stateBar").html(" <div style='color:green'> State </div> ");

}


//reset Form AddVideo in modal
function resetFormAddVideoModal() {

    //$('input[name="optradio"]').prop('checked',false);
    $('input[name="languageClip"]').prop('checked', false);

    $("#stateBarFormAddVideo").html(" <div style='color:green'> State </div> ");

}



//start JQuery//////////////////////////////////////////////////////////////
$(document).ready(function () {


    //var emailUserAct  = document.getElementById('activeEmail').innerHTML;
    //var emailUserAct  =$("#activeEmail").text();    
    var emailUserAct = "no email defined";

    console.log(emailUserAct);


    /*load Videos in Home for public*/
    retrieveVideos(emailUserAct);
    
    


    //////////NEW RECOMMENDER CODE
    //with AJAX  WORKS ///////////////////////////////////////////////////
    //generate the item result as recommendation from the external service

    //Function - Recommend to Render by ID - source retrieval for Id info
    //videoIdRecommended to Render by ID
    function retrieveVideosRecommended(videoIdRecommended) {

        var rpReqUrl = "php/loadVideosRecommended.php";

        $.post(rpReqUrl,

            //data
            {
                videoId: videoIdRecommended

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

                        var videoFrame = ' <div class="col-xs-10" class="embed-responsive embed-responsive-16by9">                                <video class="embed-responsive-item" src= ' + sourceVideo + ' width="100%" height="100%" style="border:5px solid #EE82EE;"  frameborder="0" preload="metadata" controls ></video> </div>';

                        /*Thumbnail by default*/
                        var pictDefault = '<img src="images/defaultScreenVideo.png" class="screenDefault" class="img-responsive img-thumbnail" width="150" height="100">';

                        /*Thumbnail by item if saved on DB as png or gif*/
                        //var  pictDefault='<img src='+thumbnailImg+' class="screenDefault" class="img-responsive img-thumbnail" width="150" height="150">';

                        var btnPlayVideo = '<button style="margin-right: 5px;" type="button" class="btn btn-info btn-sm glyphicon glyphicon-play-circle" data-toggle="modal" data-target="#' + itemListID + '" title="Game Clips Player"   onclick="saveActiveVideo(' + videoId + ')" > ' + pictDefault + '</button>';



                        var btnAddVideoToMyClips = '<button type="button" class="btn btn-primary" data-dismiss="modal"   onclick="inviteSubscribe(' + videoId + ')">Add to My Clips</button>  ';


                        //FORMAT video Item
                        var itemVideo = '<li href="#" class="list-group-item text-left"> ' + btnPlayVideo + '<label class="name">' + FirstNameUploader + ' <br>Date video: ' + dateVideo + '<h6>Category: ' + category + '</h6><br></label><label class="pull-right">    <!-- Modal Play video--><div class="modal fade" id="' + itemListID + '" role="dialog"><div class="modal-dialog">    <!-- Modal content--><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 font-color="gery"class="modal-title"><strong>' + FirstNameUploader + '</strong> <span style="color:rgb(0, 160, 70)">Views.</span></h4></div>    <div class="modal-body"><h6>category</h6><blockquote>' + category + '</blockquote><h3>Clip</h3><blockquote>' + videoFrame + '</blockquote><h6>Language</h6><blockquote>' + language + '</blockquote><h6>' + additionalDetails + '</h6></div>     <div class="modal-footer">    <!-- new Btn --> ' + btnAddVideoToMyClips + '<button type="button" class="btn btn-default" data-dismiss="modal">Closing player</button>   </div></div></div></div><a  class="btn btn-danger  btn-sm glyphicon glyphicon-trash" href="#" id="' + videoId + '" onclick="inviteSubscribe(' + videoId + ')" title="Remove Video"></a> </label>    <div class="break"></div></li>';


                        $('#mainpanecontentRecommend').prepend(itemVideo);

                    }

                    //horizontal separator
                    $('#mainpanecontentRecommend').prepend("<br>");
                });


            },
            'json');

    } //end  video recommended function


    ////////////////////////
    //Get videoIds from external API recommender and render recommended videos    
    $('#recommendBtn').click(function (e) {

        e.preventDefault();

        var rpReqUrlRec = "../php/computeRecommend.php";

        //sent number of recommendations. Default: 5.
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

                var itemsVideo = "";
                var items = [];

                $.each(data, function (key, val) {

                    /*  $('#responsePrediction').append($('<div>', {                                        
                          text: element)
                      }));
                      */

                    //retrieve each video info
                    for (m in val) {

                        // var usrId = value[m].userID;
                        var fname = val[m].fname;
                        var videoId = val[m].recommendIdVideos;
                        var userId = val[m].userId;
                        // var predictedRating =  value[m].predictedRating;

                        //every record                 
                        items.push("<li id='" + key + "'>" + JSON.stringify(val) + "</li>");
                        // console.log(fname);

                        itemsVideo = itemsVideo + JSON.stringify(val + " . ");
                        //append to body or some div 

                        if (val == "false") {

                            $("#responsePrediction").html("Please, check all fields ");

                        } else {

                            $("#responsePrediction").html(" <div style='color:blue'>JSON Data from recommender: </div> " + val[m].recommendIdVideos);


                            //render video item recommended with info 
                            //renderItemRecommended(idVideo);
                            var idVideoItem = val[m].recommendIdVideos;
                            //.replace(/[/[/(/]/g," ")

                            //apply fn to render video by id
                            //test
                            var testId = '159';

                            var strId = idVideoItem.split(/['']/) + '';
                            //extract string between '' add add '' to change it into string
                            retrieveVideosRecommended((strId.split(",", 2) + '').replace("[(,", ""));
                            console.log((strId.split(",", 2) + '').replace("[(,", ""));

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

    /////END NEW RECOMMENDER CODE

    //////Function Recommend hover
    $("#recommendBtn").hover(function () {

        $(this).css({
            'background-color': 'purple',
            'font-size': '16px',
            'color': 'white',
            'cursor': 'pointer'
        });

    });
    ///////////    


    //// AJAX RATING    
    //with AJAX RATING WORKS //////////////////////////////////////////////
    $('#submit-addRatingVideoBtn').click(function (e) {


        e.preventDefault();

        var rpReqUrlRec = "../php/addRatingVideo.php";

        // var email = document.getElementById('email').value;
        var email = emailU;

        var ratingValue = document.querySelector('input[name=optradio]:checked').value;

        var videoIdRated = currentVideoId;

        console.log("" + emailU);
        console.log("" + videoIdRated);
        console.log("" + ratingValue);


        $.ajax({

            type: 'POST',
            url: rpReqUrlRec,
            data: {
                emailDB: email,
                videoIdDB: videoIdRated,
                ratingDB: ratingValue

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

                    //retrieve each video info
                    for (m in val) {

                        var videoId = val[m].videoId;


                        //every record                 
                        items.push("<li id='" + key + "'>" + JSON.stringify(val) + "</li>");
                        console.log(videoId);

                        itemsName = itemsName + JSON.stringify(val + " . ");
                        //append to body or some div 

                        if (val == "false") {
                            $("#stateBar").html("Please, check log in ");

                        } else {
                            $("#stateBar").html(" <div style='color:blue'>Rating has been updated: </div> ");
                            console.log("update rating successfully");
                        }

                    } //end for      

                });

                //once successfully rated return home
                //window.location.href='../index.php';

            },

            error: function (result) {
                alert("Error updating rating " + ratingValue);

            }
        });

    });
    //end  RATING AJAX  WORKS /

    //////
    //SOFIA
    $(window).on('load', function () {
        $('#welcomeModal').modal('show');
    });


});
