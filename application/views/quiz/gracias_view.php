<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo SITE_NAME ?></title>
		<?php
		echo link_tag('public/plugins/bootstrap/css/bootstrap.min.css');
		echo link_tag('public/plugins/fancybox/jquery.fancybox.css');
		echo link_tag('public/css/quiz.css');

		echo script_tag('public/js/jquery-1.8.3.min.js');
		echo script_tag('public/plugins/fancybox/jquery.fancybox.pack.js');
		echo script_tag('public/js/quiz.js');
		?>
		<script src="https://connect.facebook.net/en_US/all.js#xfbml=1"></script>
		<script type=”text/javascript”>
			FB.init(
							{
								appId: 221233984688247,
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
	<body onload="FB.Canvas.setSize({
			width: 810,
			height: 490
		})">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id))
					return;
				js = d.createElement(s);
				js.id = id;
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=221233984688247";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>

		<div id="terminosBox" class="hide">
			<?= $reglas ?>
		</div>
		<div class="container" id="gracias">
			<div id="copy">
				<a href='#terminosBox' class='fancybox terminos'>Términos y Condiciones</a> &copy; 2013 Derechos Reservados
			</div>
			<?= anchor('https://www.facebook.com/pages/Clear-Hair-PR/272720309524227', img(array('src' => 'public/img/quiz/salir_btn.png', 'alt' => '')), 'target="_top" class="salir"') ?>
		</div>
	</body>
</html>