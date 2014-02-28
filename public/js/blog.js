var isIE = /*@cc_on!@*/false;

function postToFeed(pic,name,desc,method) {

  // calling the API ...
	if (!isIE) { 
	  var obj = {
	    method: method,
	    redirect_uri: 'http://dsocialcrowd.com/socialpromos4/tresemme-blog/blog',
	    link: 'https://www.facebook.com/TRESemmePR/app_608554245890583',
	    picture: pic,
	    name: name,
	    caption: 'Tresemmé Blog',
	    description: desc
	  };
	} else {
	  var obj = {
	    method: method,
	    display: 'popup',
	    redirect_uri: 'http://dsocialcrowd.com/socialpromos4/tresemme-blog/blog',
	    link: 'https://www.facebook.com/TRESemmePR/app_608554245890583',
	    picture: pic,
	    name: name,
	    caption: 'Tresemmé Blog',
	    description: desc
	  };
	} 
  FB.ui(obj, callback);
}

function callback(response) {
  //document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
}


$(function(){
	$(".fb_share").live("click",function(){
 		pic = $(this).attr("data-picture");
 		name = $(this).attr("data-caption");
 		desc = $(this).attr("data-description");
	 postToFeed(pic,name,desc,'feed');
	 return false;
 });

	if (!isIE) { 
	 $(".link").live("click",function(data){
	 	$("#blog").load($(this).attr("href")+"/link", function(){
		 	//FB.canvas.setautoresize();
		 	FB.Canvas.setAutoGrow();

	 	});
		 return false;
	 });
	} 
});