function init()
{
	$(".canastaFresa").transition({
		  left: '0%',
		  duration: 1500
	});
	$(".canastaMango").transition({
		  right: '0%',
		  duration: 1500,
		  complete: function(){
			  $('.vasoFresa').transition({
				  left: '4%',
				  duration: 1000 
			  });
			  $('.vasoMango').transition({
				  right: '0%',
				  duration: 1000,
				  complete: function(){
					  $('.text').transition({
						  opacity: 1,
						  duration: 1200
					  });
					  $('.title').transition({
						  opacity: 1,
						  delay: 1000,
						  duration: 1200
					  });
					  $('.newFlag').transition({
						  opacity: 1,
						  delay: 1800,
						  duration: 1200
					  });
				  }
			  });
		  }
	});
}

$(document).ready(function()
{
	init();
});