<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo SITE_NAME ?></title>

		<meta name="apple-mobile-web-app-capable" content="yes" /> 
		<meta name="viewport" content="user-scalable=no, width=device-width" />

		<?php
		echo link_tag('public/plugins/bootstrap/css/bootstrap.min.css');
		echo link_tag('public/css/mobile_men.css');

		echo script_tag('public/js/jquery-1.8.3.min.js');
		echo script_tag('public/js/mobile.js');
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
	<body>
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

		<div class="container" id="product">
			<div class="row-fluid">
				<div class="span6" style="padding: 0px 20px;"><?= anchor('men/m', img(array('src' => 'public/img/clear.jpg', 'alt' => '')), '') ?></div>
				<div class="span6" style="text-align: right; padding: 20px;"><?= anchor('men/products/' . $ret, img(array('src' => 'public/img/x.jpg', 'alt' => '')), '') ?></div>
			</div>
			<div class="row-fluid" style="margin-top: 70px;">
				<div class="span6">
					<?= str_replace("style", "style='max-width: none;
margin-left: -60px;' stile", $r->summary); ?>
				</div>
				<div class="span6 product" style="padding-right: 5px;">
					<?= str_replace("style", "stile", $r->description) ?>
					<?php urlencode(get_tag($r->description, "h2")) ?>
					<div style="text-align: right;">
						<?= anchor('https://www.facebook.com/dialog/feed?app_id=531741163513225&amp;link=https://dsocialcrowd.com/socialpromos3/&amp;picture=https://dsocialcrowd.com/socialpromos3/' . get_image($r->summary) . '&amp;name=Entérate de la nueva evolución en el cuidado del cabello&amp;caption=Clear%20Hair%20PR&amp;description=Detén la caspa desde su origen con el Nuevo Men Scalp Therapy.&amp;redirect_uri=https://dsocialcrowd.com/socialpromos3/men/m', img(array('src' => 'public/uploads/images/facebook.png', 'alt' => '')), 'target="_blank" class="fb_share" 
					data-picture="https://webappcloud.net/' . get_image($r->summary) . '"
					data-caption="Nuevo Clear Scalp & Hair Beauty Therapy"
					data-description="' . strip_tags($r->facebook) . '"
					') ?>

						<?= anchor('https://twitter.com/intent/tweet?text=' . $twitter, img(array('src' => 'public/uploads/images/twitter.png', 'alt' => '', 'style' => 'width: 25px;
margin-top: 1px; ')), 'target="_blank"') ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>