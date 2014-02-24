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

		<div class="container" id="product">
			<div class="row-fluid">
				<div class="span6" style="padding: 0px 20px;"><?= anchor('women/m', img(array('src' => 'public/img/clear.jpg', 'alt' => '')), '') ?></div>
				<div class="span6" style="text-align: right; padding: 20px;"><?= anchor('women/products/' . $ret, img(array('src' => 'public/img/x.jpg', 'alt' => '')), '') ?></div>
			</div>
			<div class="row-fluid" style="margin-top: 70px;">
				<div class="span6">
					<?= str_replace("style", "stile", $r->summary); ?>
				</div>
				<div class="span6 product" style="padding-right: 5px;">
					<?= str_replace("style", "stile", $r->description) ?>
					<?php urlencode(get_tag($r->description, "h2")) ?>
					<div style="text-align: right;">
						<?= anchor('https://www.facebook.com/dialog/feed?app_id=330269997085296&amp;link=https://dsocialcrowd.com/socialpromos3/&amp;picture=https://webappcloud.net/' . get_image($r->summary) . '&amp;name=Nuevo%20Clear%20Scalp%20%26%20Hair%20Beauty%20Therapy&amp;caption=Clear%20Hair%20PR&amp;description=Un%20cabello%20fuerte%20y%20hermoso%20comienza%20en%20el%20cuero%20cabelludo.%20Conoce%20nuestra%20nueva%20colección%20de%20shampoos%20y%20acondicionadores%20específicamente%20diseñados%20para%20nutrir%20a%20la%20perfección%20el%20cuero%20cabelludo.&amp;redirect_uri=https://dsocialcrowd.com/socialpromos3/women/m', img(array('src' => 'public/uploads/images/fb.jpg', 'alt' => '')), 'target="_blank" class="fb_share" 
					data-picture="https://webappcloud.net/' . get_image($r->summary) . '"
					data-caption="Nuevo Clear Scalp & Hair Beauty Therapy"
					data-description="' . strip_tags($r->facebook) . '"
					') ?>

						<?= anchor('https://twitter.com/intent/tweet?text=' . $twitter, img(array('src' => 'public/uploads/images/tw.jpg', 'alt' => '', 'style' => 'width: 25px;
margin-top: 1px;')), 'target="_blank"') ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>