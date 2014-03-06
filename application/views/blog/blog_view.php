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
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-48634288-1', 'tresemmepr.com');
		  ga('send', 'pageview');
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
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=608554245890583";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
		<div class="container" id="blog">
			<a class="inicioButton" href="<?php echo site_url('blog') ?>">Inicio</a>
			<div id="menu">				
				<?= anchor('blog/moda', img(array('src' => 'public/img/blog/m1.png', 'alt' => '')) . '<br>OBTÉN EL LOOK', 'class="'.$moda_class.'"') ?>
				<?= anchor('blog/belleza', img(array('src' => 'public/img/blog/m2.png', 'alt' => '')) . '<br>ÚLTIMAS TENDENCIAS', 'class="'.$belleza_class.'"') ?>
				<?= anchor('blog/findesemana', img(array('src' => 'public/img/blog/m3.png', 'alt' => '')) . '<br>TREND SPOTTER', 'class="'.$findesemana_class.'"') ?>
			</div>
			<div id="content">
				<?php /*<div id="inicio"><?= anchor('blog', 'Inicio', '') ?></div>*/?>
				<h1><?= $header ?></h1>
				<div class="post">
					<h2><?= $content->post_title ?></h2>
					<small><?php
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
						COMPARTE<br>
						<?= anchor('#', img(array('src' => 'public/img/blog/facebook.png', 'alt' => '')), 'class="fb_share" data-picture="'.base_url('public/img/blog/fb-blog.jpg').'" data-caption="' . $content->post_title . '" data-description="' . substr(strip_tags($content->post_content), 0, 200) . '..."') ?>
					</div>
				</div>
				<div class="archivo">
					<h3>ARCHIVO</h3>
					<?php foreach ($archivo as $a) { ?>
						<?= anchor('/blog/' . $link . '/' . $a->id, $a->post_title, 'class="link"') ?><br><br>
<?php } ?>
				</div>
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