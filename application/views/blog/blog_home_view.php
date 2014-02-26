<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo SITE_NAME ?></title>
		<meta charset="utf-8" />
		<?php
		echo link_tag('public/plugins/bootstrap/css/bootstrap.min.css');
		echo link_tag('public/css/blog.css');

		echo script_tag('public/js/jquery-1.8.3.min.js');
		echo script_tag('public/js/blog.js');
		?>
		<script src="https://connect.facebook.net/en_US/all.js#xfbml=1"></script>
		<script type=”text/javascript”>
			FB.init(
							{
								appId: '446655105415466',
								Status: true,
								Cookie: true,
								Xfbml: true
							});
			window.fbAsyncInit = function()
			{
				fb.canvas.setautoresize();
				FB.Canvas.setAutoGrow();
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
					height: 596
				})">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id))
					return;
				js = d.createElement(s);
				js.id = id;
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=446655105415466";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
		<div class="container" id="home">
			<div id="menu">
				<?= anchor('blog/moda', img(array('src' => 'public/img/blog/m1.png', 'alt' => '')) . '<br>OBTÉN EL LOOK', '') ?>
				<?= anchor('blog/belleza', img(array('src' => 'public/img/blog/m2.png', 'alt' => '')) . '<br>ÚLTIMAS TENDENCIAS', '') ?>
				<?= anchor('blog/findesemana', img(array('src' => 'public/img/blog/m3.png', 'alt' => '')) . '<br>TREND SPOTTER', '') ?>
			</div>
			<div id="invita">
				INVITA A<br> TUS AMIGAS<br>
				<?= anchor('#', img(array('src' => 'public/img/blog/facebook.png', 'alt' => 'Facebook',)), 'class="fb_share" data-picture="/socialpromos3/public/img/blog/fb-blog.jpg" data-caption="¡Conoce las últimas tendencias en Clear Style Trends! " data-description="Ponte al día con nuevas maneras de vestir, maquillarte y disfrutar tu fin de semana. Sigue a nuestra bloguera invitada todos los lunes, miércoles y viernes en Clear Style Trends."') ?>
				<?php /*= anchor('https://twitter.com/intent/tweet?text=' . $twitter, img(array('src' => 'public/img/blog/twitter.png', 'alt' => 'Twitter')), 'target="_blank"') */?>
			</div>
		</div>	
	</div>
</body>
</html>