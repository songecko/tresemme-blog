<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo SITE_NAME ?></title>
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
			width: 810
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
		<div class="container" id="blog">
			<div id="nav">
				<?= anchor('blog/moda/0', '&nbsp;', 'class="' . $moda_class . ' link"') ?>
				<?= anchor('blog/belleza/0', '&nbsp;', 'class="' . $belleza_class . ' link"') ?>
				<?= anchor('blog/findesemana/0', '&nbsp;', 'class="' . $findesemana_class . ' link"') ?>
			</div>
			<div id="content">
				<div id="inicio"><?= anchor('blog', 'Inicio', '') ?></div>
				<h1><?= $header ?></h1>
				<div class="post">
					<h2><?= $content->post_title ?></h2>
					<small><?
						$mes = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

						$d = date("d", strtotime($content->post_dt));
						$m = $mes[date("n", strtotime($content->post_dt))];
						$Y = date("Y", strtotime($content->post_dt));

						echo "$d $m $Y";
						?></small>
					<div style="margin-top: 10px;">
<?= $content->post_content ?>
					</div>
					<div id="share">
						comparte esta entrada<br>
						<?= anchor('#', img(array('src' => 'public/img/blog/facebook2.png', 'alt' => '')), 'class="fb_share" data-picture="https://webappcloud.net' . get_image($content->post_content) . '" data-caption="' . $content->post_title . '" data-description="' . substr(strip_tags($content->post_content), 0, 200) . '..."') ?>
<?= anchor('https://twitter.com/intent/tweet?text=' . $twitter, img(array('src' => 'public/img/blog/twitter2.png', 'alt' => '')), 'target="_blank"') ?>
					</div>
				</div>
				<div class="archivo">
					<h3>Archivo</h3>
					<?php foreach ($archivo as $a) { ?>
						<?= anchor('/blog/' . $link . '/' . $a->id, $a->post_title, 'class="link"') ?><br><br>
<?php } ?>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>