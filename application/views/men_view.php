<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo SITE_NAME ?></title>
		<?php
		echo link_tag('public/plugins/bootstrap/css/bootstrap.min.css');
		echo link_tag('public/css/men.css');

		echo script_tag('public/js/jquery-1.8.3.min.js');
		echo script_tag('public/js/men.js');
		?>
		<script src="https://connect.facebook.net/en_US/all.js#xfbml=1"></script>
		<script type=”text/javascript”>
			FB.init(
							{
								appId: 531741163513225,
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
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id))
				return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=531741163513225";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

	<body onload="FB.Canvas.setSize({
			width: 810,
			height: 1233
		})">
		<div class="container">
			<div id="splash"><div id="share"><?= $compartelo ?></div></div><div id="stage">


				<?php foreach ($products as $p) { ?>
					<div class="detail hide" id="p<?= $p->id ?>">
						<div class="x"></div>
						<div class="span3">
							<?= str_replace("style", "stile", $p->summary) ?>
						</div>
						<div class="span6 box"><div class="tt"></div>
							<?= $p->description ?>
							<?php urlencode(get_tag($p->description, "h2")) ?>

							<?= anchor('#', img(array('src' => 'public/img/facebook.gif', 'alt' => '')), 'target="_blank" class="fb_share" 
					data-picture="https://webappcloud.net/' . get_image($p->summary) . '"
					data-caption="Entérate de la nueva evolución en el cuidado del cabello"
					data-description="' . strip_tags($p->facebook) . '"
					') ?>

							<?= anchor('https://twitter.com/intent/tweet?text=' . $twitter, img(array('src' => 'public/img/twitter.png', 'alt' => '', 'style' => 'width: 16px;
margin-top: -2px;')), 'target="_blank"') ?>

					<!--div class="fb-comments" data-href="https://webappcloud.net/apps/clear/home/products/<?= $p->id ?>" data-width="470" data-num-posts="10"></div-->
						</div>
					</div>
				<?php } ?>


				<div id="home">
					<div class="left"></div>
					<div class="right"></div>
					<?= $intro ?>
				</div>
				<div id="products1" class="hide products">
					<div class="left"></div>
					<div class="right"></div>
					<div class="items">
						<?php
						$i = 0;
						foreach ($products as $p) {
							$i++;
							if ($i <= 3) {
								?>
								<div class="item" rel="p<?= $p->id ?>"><?= str_replace("style", "style='height: 370px; width: 177px' stile", $p->summary) ?>
									<div class="plus"></div>
								</div>
		<?php
	}
}
?>
					</div>

				</div>
				<div id="products2" class="hide products">
					<div class="left"></div>
					<div class="right"></div>
					<div class="items">
						<div class="item" style='width:177px;'>&nbsp;</div>
<?php
$i = 0;
foreach ($products as $p) {
	$i++;
	if ($i > 3 && $i <= 6) {
		?>
								<div class="item" rel="p<?= $p->id ?>"><?= str_replace("style", "style='height: 370px; width: 177px' stile", $p->summary) ?>
									<div class="plus"></div>
								</div>
		<?php
	}
}
?>
					</div>
				</div>
				<div id="products3" class="hide products">
					<div class="left"></div>
					<div class="right"></div>
					<div class="items">
						<?php
						$i = 0;
						foreach ($products as $p) {
							$i++;
							if ($i > 6) {
								?>
								<div class="item" rel="p<?= $p->id ?>"><?= str_replace("style", "style='height: 370px; width: 177px' stile", $p->summary) ?>
									<div class="plus"></div>
								</div>
		<?php
	}
}
?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>