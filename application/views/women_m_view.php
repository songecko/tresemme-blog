<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo SITE_NAME ?></title>

		<meta name="apple-mobile-web-app-capable" content="yes" /> 
		<meta name="viewport" content="user-scalable=no, width=device-width" />

		<?php
		echo link_tag('public/plugins/bootstrap/css/bootstrap.min.css');
		echo link_tag('public/css/mobile.css');

		echo script_tag('public/js/jquery-1.8.3.min.js');
		echo script_tag('public/js/mobile.js');
		?>
		<script src="https://connect.facebook.net/en_US/all.js#xfbml=1"></script>
		<script type=”text/javascript”>
			FB.init(
							{
								appId: 330269997085296,
								Status: true,
								Cookie: true,
								Xfbml: true
							});
			window.fbAsyncInit = function()
			{
				fb.canvas.setautoresize();
			}
		</script>  

		<script type="text/javascript">

			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-271657-19']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script');
				ga.type = 'text/javascript';
				ga.async = true;
				ga.src = ('https:'
								== document.location.protocol ? 'https://ssl' : 'http://www')
								+ '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();

		</script>  
	</head>
	<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id))
					return;
				js = d.createElement(s);
				js.id = id;
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=330269997085296";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>

		<div class="container">
			<div id="splash"><div id="share"><?= $compartelo ?></div></div>
			<div id="stage">
				<div id="home">
					<a class="left" href="/socialpromos3/women/products/3"></a>
					<a class="right" href="/socialpromos3/women/products/1"></a>
					<?= $intro ?>
				</div>
			</div>
		</div>
	</body>
</html>