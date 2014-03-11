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
								appId: '608554245890583',
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
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=608554245890583";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
		<div class="container" id="home">
			<a class="newsfeedButton" href="https://www.facebook.com/TRESemmePR">&nbsp;</a>
			<div id="menu">
				<?= anchor('blog/moda', img(array('src' => 'public/img/blog/m1.png', 'alt' => '')) . '<br>OBTÉN EL LOOK', '') ?>
				<?= anchor('blog/belleza', img(array('src' => 'public/img/blog/m2.png', 'alt' => '')) . '<br>ÚLTIMAS TENDENCIAS', '') ?>
				<?= anchor('blog/findesemana', img(array('src' => 'public/img/blog/m3.png', 'alt' => '')) . '<br>TREND SPOTTER', '') ?>
			</div>
			<div id="invita">
				INVITA A<br> TUS AMIGAS<br>
				<?= anchor('#', img(array('src' => 'public/img/blog/facebook.png', 'alt' => 'Facebook',)), 'class="fb_share" data-picture="http://dsocialcrowd.com/socialpromos4/tresemme-blog/public/img/blog/fb-blog.jpg" data-caption="TRESemmé vuelve a ponerte al día con lo último para que tú y tu cabello se luzcan en el fin de semana." data-description="Los peinados que te ponen a la moda tienen su secreto a voces. Descúbrelo, mira todo lo que pasa, chequea las fotos. ¡Tenemos los mejores looks y los consejos para obtenerlos!"') ?>
				<?php /*= anchor('https://twitter.com/intent/tweet?text=' . $twitter, img(array('src' => 'public/img/blog/twitter.png', 'alt' => 'Twitter')), 'target="_blank"') */?>
			</div>
			<a class="policyPrivacy" href="http://www.unileverprivacypolicy.com/spanish/policy.aspx" target="_blank">Política de Privacidad</a>
		</div>	
	</div>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-48634288-1', 'tresemmepr.com');
	  ga('send', 'pageview');
	</script>
</body>
</html>