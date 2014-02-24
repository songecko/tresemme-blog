var estilo = 0;
var score = 0;
var score2 = 0;
var coleccion = 0;

var mouseStillDown = false;
var inte = 0;

function login() {
    FB.login(function(response) {
        if (response.authResponse) {
            FB.api('/me', function(response) {
	            console.log('Good to see you, ' + response.name + '.');
	            //$.post('/apps/clear/quiz/fbsave', { Nombre: response.first_name, Apellido: response.last_name, Telefono: 'FB', Email: response.email }, function(data){
		            //document.location.href = "/apps/clear/quiz/premios";
	            //});
	            	$("#Nombre").val(response.first_name);
		            $("#Apellido").val(response.last_name);
		            $("#Email").val(response.email);
	          });
        } else {
            // cancelled
        }
    },{scope: 'email'});
}

function postToFeed(pic,name,desc,method) {

  // calling the API ...
  var obj = {
    method: method,
    redirect_uri: 'https://webappcloud.net/apps/clear/quiz',
    link: 'https://www.facebook.com/pages/Clear-Hair-PR/272720309524227?sk=app_221233984688247',
    picture: pic,
    name: name,
    caption: 'Clear Hair PR',
    description: desc
  };

  FB.ui(obj, callback);
}

function callback(response) {
	document.location.href='/apps/clear/quiz/gracias';
  //document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
}


function sendRequestViaMultiFriendSelector(caption) {
  FB.ui({method: 'apprequests',
    message: caption
  }, callback);
}

function calculate(q,v)
{
	switch (q)
	{
		case "p1":
			switch (v)
			{
				case "a":
					coleccion = 2;
					break;
				case "b":
					score = 1;
					break;
				case "c":
					score = 2;
					break;
				case "d":
					score = 4;
					break;
			}
			break;
		case "p2":
			switch (v)
			{
				case "a":
					score += 3;
					break;
				case "b":
					score += 1;
					break;
				case "c":
					score += 2;
					break;
				case "d":
					score += 12;
					break;
				case "e":
					score += 3;
					break;
			}
			break;
		case "p3":
			switch (v)
			{
				case "a":
					score += 4;
					break;
				case "b":
					score += 1;
					break;
				case "c":
					score += 4;
					break;
				case "d":
					score += 3;
					break;
				case "e":
					score += 3;
					break;
			}
			
			if (coleccion!=2)
			{
				if (score>=6 && score<=8) coleccion = 1;
				if (score>=3 && score<=5) coleccion = 3;
				if (score>=9 && score<=13) coleccion = 4;
				if (score>=14) coleccion = 5;
				
			}
			
			$(".coleccion"+coleccion).show();

			break;

		case "p4":
			switch (v)
			{
				case "a":
					score2 += 5;
					break;
				case "b":
					score2 += 4;
					break;
				case "c":
					score2 += 3;
					break;
				case "d":
					score2 += 2;
					break;
				case "e":
					score2 += 1;
					break;
			}
			break;			

		case "p5":
			switch (v)
			{
				case "a":
					score2 += 1;
					break;
				case "b":
					score2 += 2;
					break;
				case "c":
					score2 += 5;
					break;
				case "d":
					score2 += 4;
					break;
				case "e":
					score2 += 3;
					break;
			}
			break;			

		case "p6":
			switch (v)
			{
				case "a":
					score2 += 5;
					break;
				case "b":
					score2 += 3;
					break;
				case "c":
					score2 += 2;
					break;
				case "d":
					score2 += 4;
					break;
				case "e":
					score2 += 1;
					break;
			}
			break;			

		case "p7":
			switch (v)
			{
				case "a":
					score2 += 1;
					break;
				case "b":
					score2 += 3;
					break;
				case "c":
					score2 += 2;
					break;
				case "d":
					score2 += 4;
					break;
				case "e":
					score2 += 5;
					break;
			}
			
			if (score2>=17 && score2<=20) { estilo = 1; pic = 'Diva'; caption = 'DIVA GLAM'; }
			if (score2>=14 && score2<=16) { estilo = 2; pic = 'Bohemian'; caption = 'BELLEZA BOHEMIA'; }
			if (score2>=11 && score2<=13) { estilo = 3; pic = 'Classic'; caption = 'CHICA CLÁSICA'; }
			if (score2>=7 && score2<=10) { estilo = 4; pic = 'Boyfriend'; caption = 'BELLEZA DESPAMPANANTE'; }
			if (score2>=4 && score2<=6) { estilo = 5; pic = 'Indie'; caption = 'ENCANTADORA INDEPENDIENTE'; }
			
			show_results(estilo);
			$.post("/apps/clear/quiz/save",{ coleccion: coleccion,score: score,estilo: estilo, score2:score2 });
			
			// Share
			
			
			
			
			
			$(".fb_share").attr("data-picture","https://webappcloud.net/apps/clear/public/uploads/images/Quiz/start_"+pic+".png");
			$(".fb_share").attr("data-caption","SOY UNA "+caption);
			
			
			
			break;			

	}
	
	//console.log(score);
	//console.log(coleccion);
}

function show_results(r)
{
	$("#results").animate({ top: '0px'},1000 );
	$("#result"+r).fadeIn("slow");
}

function goDown()
{

	if (!mouseStillDown) { return; }

 	var p = $("#reglas_content");
 	var position = p.position();
 	
  if (position.top>=-3380) {
 	 $('#reglas_content').animate({
	    top: '-=100'
	 }, 0);
	}
  if (position.top<-3380) {
	 	$('#reglas_content').animate({
	    top:'-3380px'
	  }, 0);
	}
	
}

function goUp()
{

	if (!mouseStillDown) { return; }
 
 	var p = $("#reglas_content");
 	var position = p.position();

 	if (position.top<=0) {
 	 $('#reglas_content').animate({
	    top: '+=100'
	 }, 0);
	}
 	if (position.top>0) {
	 	$('#reglas_content').animate({
	    top:'0px'
	  }, 0);
	}
 
}

$(function(){
	$(".circle").click(function(){
		$(this).find("img").addClass("selected");
		$(this).find(".badge").addClass("selected_badge");
						
		$("#questions").delay(250).animate({ left: '-=810'},500);
		
		if ($(this).attr("data-question")=="p7")
		{
			
		}
		
		calculate($(this).attr("data-question"),$(this).attr("data-value"));
		
	});
	
	$(".question_mark").mouseover(function(){
		$(".popup").fadeIn();
	});
	$(".question_mark").mouseout(function(){
		$(".popup").fadeOut();
	});
	
	if ($('.fancybox').length>0)
		$('.fancybox').fancybox( { height: 500, autoHeight: false });



	if ($('#forma').length>0)
	{
		$("#Telefono").mask("(999) 999-9999");

		jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
		    phone_number = phone_number.replace(/\s+/g, ""); 
			return this.optional(element) || phone_number.length > 9 &&
				phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
		}, "Escriba un teléfono válido");
		
		$("#forma").validate({ errorClass: 'tt', errorElement: 'span' });
	}

// FB Share
 $(".fb_share").click(function(){
 		pic = $(this).attr("data-picture");
 		name = $(this).attr("data-caption");
 		desc = $(this).attr("data-description");
	 postToFeed(pic,name,desc,'feed');
	 return false;
 });

 $(".fb_invite").click(function(){
 		pic = $(this).attr("data-picture");
 		name = $(this).attr("data-caption");
 		desc = $(this).attr("data-description");
	 postToFeed(pic,name,desc,'send');
//	 sendRequestViaMultiFriendSelector(desc);
	 return false;
 });
 
 $('.dn').mouseup(function(){
	 mouseStillDown = false;
	 clearInterval(inte);
 });
 
 $(".dn").mousedown(function(){
 
 	mouseStillDown = true;
 	goDown();
 	inte = setInterval("goDown()",100);
	return false;
 });

 $(".up").mousedown(function(){
 
 	mouseStillDown = true;
 	goUp();
 	inte = setInterval("goUp()",100);
	return false;
 });
 
 $('.up').mouseup(function(){
	 mouseStillDown = false;
	 clearInterval(inte);
 });
 
 $('.facebook_btn').click(function(){
 	login();
 	return false;
 });

});