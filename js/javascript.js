var sideMenuToggle = 0;

//This function controls the animation for the side menu slide
function showSideMenu() {
    if (sideMenuToggle == 0) {
        $("#mainpane").animate({
            left: "300"
        }, 500);
        sideMenuToggle = 1;
    }
    else {$("#mainpane").animate({
            left: "0"
        }, 500);
         sideMenuToggle = 0;
         }
}

var live = 0;
var like = 0;
var story = 0;
var currentlive = $("#livetextedit").html();
var currentlike = $("#liketextedit").html();
var currentstory = $("#storytextedit").html();


function togglelive(){
    if (live == 0){
        live=1;
        currentlive = $("#livetextedit").html();
        $("#liveboxedit").val(currentlive);
        $("#livetext").hide();
        $("#livebox").show();
        
    } else {
        live=0;
        if ($("#liveboxedit").val() != ""){
        currentlive = $("#liveboxedit").val();
        $("#livetextedit").html(currentlive);
        $("#livetext").show();
        $("#livebox").hide();
        }
    }
}


//The following three "toggle" functions control the update fields on the update pages. They enable the textbox/text switch
function togglelike(){
    if (like == 0){
        like=1;
        currentlike = $("#liketextedit").html();
        $("#likeboxedit").val(currentlike);
        $("#liketext").hide();
        $("#likebox").show();
        $("#removablebreak").show();
        
    } else {
        like=0;
        if ($("#likeboxedit").val() != ""){
        currentlike = $("#likeboxedit").val();
        $("#liketextedit").html(currentlike);
        $("#liketext").show();
        $("#likebox").hide();
        $("#removablebreak").hide();
        }
    }
}

function togglestory(){
    if (story == 0){
        story=1;
        currentstory = $("#storytextedit").html();
        $("#storyboxedit").val(currentstory);
        $("#storytext").hide();
        $("#storybox").show();
        
    } else {
        story=0;
        if ($("#storyboxedit").val() != ""){
        currentstory = $("#storyboxedit").val();
        $("#storytextedit").html(currentstory);
        $("#storytext").show();
        $("#storybox").hide();
        }
    }
}

//This function ensures the correct panes are shown in the create user pages
$(document).ready(function() {
	$("#mainpanecontent2").hide();
	$("#mainpanecontent3").hide();
	
	$(".formnext").click(function() {
		$("#mainpanecontent").hide();
		$("#mainpanecontent2").show();
		$("#mainpanecontent3").hide();
	});	
	
	$(".formnext2").click(function() {
		$("#mainpanecontent").hide();
		$("#mainpanecontent2").hide();
		$("#mainpanecontent3").show();
	});
	
	$(".formback").click(function() {
		$("#mainpanecontent").show();
		$("#mainpanecontent2").hide();
		$("#mainpanecontent3").hide();
	});
	
	$(".formback2").click(function() {
		$("#mainpanecontent").hide();
		$("#mainpanecontent2").show();
		$("#mainpanecontent3").hide();
	});
	
});

