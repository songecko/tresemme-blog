<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-Frame-Options" content="allow">
		<title><?php echo SITE_NAME ?></title>
		<?php
		echo link_tag('public/plugins/bootstrap/css/bootstrap.min.css');

		echo link_tag('public/plugins/fancybox/jquery.fancybox.css');

		echo link_tag('public/css/quiz.css');

		echo script_tag('public/js/jquery-1.8.3.min.js');
		echo script_tag('public/plugins/fancybox/jquery.fancybox.pack.js');
		echo script_tag('public/js/jquery.maskedinput-1.3.min.js');
		echo script_tag('public/js/jquery.validate.min.js');
		echo script_tag('public/js/messages_es.js');
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
					height: 488
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
		<div class="container">
			<div id="register">
				<form method="post" action="/socialpromos3/quiz/participa" id="forma">
					<div class="row-fluid">
						<div class="span12" style="text-align:center;">Conéctate a través de <?= anchor('#facebook', img(array('src' => 'public/img/quiz/facebook.png', 'alt' => 'Facebook', 'style' => 'margin-top:-3px;')), 'class="facebook_btn"') ?></div>
					</div>

					<div class="row-fluid">
						<div class="span6">
							<label>Nombre</label>
							<input type="text" name="Nombre" id="Nombre" class="span12 required">
						</div>
						<div class="span6">
							<label>Apellido</label>
							<input type="text" name="Apellido" id="Apellido" class="span12 required">
						</div>
					</div>

					<div class="row-fluid">
						<div class="span6" style="position:relative;">
							<label>Número Telefónico o de Celular</label>
							<input type="text" name="Telefono" id="Telefono" class="span12 required phoneUS">
							<?= img(array('src' => 'public/img/quiz/question.png', 'alt' => '', 'class' => 'question_mark')) ?>
							<div class="popup hide"></div>
						</div>
						<div class="span6">
							<label>Correo Electrónico</label>
							<input type="text" name="Email" id="Email" class="span12 required email">
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<label><input type="checkbox" id="terminos" name="terminos" style="margin-top: 3px;
														float: left;
														margin-right: 5px;" class="required"> He leído y acepto los <a href="#terminosBox" class='fancybox terminos'>términos y condiciones</a>.</label>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12" style="text-align: center; padding-top: 20px;">
							<input type="image" name="submit" id="submit" src="/socialpromos3/public/img/quiz/registro_btn.png">
						</div>
					</div>	
				</form>
				<div id="copy">
					<a href='#terminosBox' class='fancybox terminos'>Términos y Condiciones</a> &copy; 2013 Derechos Reservados
				</div>
			</div>
		</div>
	</body>
</html>