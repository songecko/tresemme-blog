currentPage = "home";
id = "";


function postToFeed(pic,name,desc) {

  // calling the API ...
  var obj = {
    method: 'feed',
    redirect_uri: 'https://webappcloud.net/apps/clear/women',
    link: 'https://www.facebook.com/pages/Clear-Hair-PR/272720309524227?sk=app_531741163513225',
    picture: pic,
    name: name,
    caption: 'Clear Hair PR',
    description: desc
  };

  function callback(response) {
    document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
  }

  FB.ui(obj, callback);
}

$(function(){

 // Caroussel

 $(".left").click(function(){

	$("#"+currentPage).fadeOut("slow");

 	switch(currentPage)
 	{
	 	case "home":
		 currentPage = "products2";
		 break;
	 	case "products2":
		 currentPage = "products1";
		 break;
	 	case "products1":
		 currentPage = "home";
		 break;
 	}

	$("#"+currentPage).fadeIn("slow");

 });
 $(".right").click(function(){

	$("#"+currentPage).fadeOut("slow");

 	switch(currentPage)
 	{
	 	case "home":
		 currentPage = "products1";
		 break;
	 	case "products1":
		 currentPage = "products2";
		 break;
	 	case "products2":
		 currentPage = "home";
		 break;
 	}

	$("#"+currentPage).fadeIn("slow");

 });
 
 // Detail
 
 $(".item").click(function(){
	 id = $(this).attr("rel");
	 $(".left").fadeOut("slow");
	 $(".right").fadeOut("slow");
	 $(".items").fadeOut("slow");
	 $("#"+id).fadeIn("slow");
 });
 
 $(".x").click(function(){
	 $("#"+id).fadeOut("slow");
	 $(".left").fadeIn("slow");
	 $(".right").fadeIn("slow");
	 $(".items").fadeIn("slow");
 });
 
 // FB Share
 $(".fb_share").click(function(){
 		pic = $(this).attr("data-picture");
 		name = $(this).attr("data-caption");
 		desc = $(this).attr("data-description");
	 postToFeed(pic,name,desc);
	 return false;
 });
 
});