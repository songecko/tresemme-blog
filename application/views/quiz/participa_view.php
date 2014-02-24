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
					height: 491
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
			<div id="nav"><div>
				</div>
			</div>
			<div id="participa">
				<div class="row-fluid">
					<div class="offset8 span4" id="comenzar">
						<?= anchor('/quiz/participa', 'Comenzar Otra Vez', '') ?>
					</div>
				</div>

				<div id="questions">

					<div id="p1" class="question">

						<div class="row-fluid">
							<div class="span12">
								<h2><span class="number">1.</span> OK, CHICA ¿CUÁL DESCRIBE MEJOR A TU CABELLO?</h2>
							</div>
						</div>

						<div class="row-fluid">

							<div class="span2 circle" data-question="p1" data-value="a">
								<?= img(array('src' => 'public/img/quiz/p1_a.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">A</span> "Frizzy" e<br>incontrolable</div>
							</div>

							<div class="span2 circle" data-question="p1" data-value="b">
								<?= img(array('src' => 'public/img/quiz/p1_b.png', 'alt' => '')) ?>
								<div><span class="badge">B</span> Grueso y Rebelde</div>
							</div>

							<div class="span2 circle" data-question="p1" data-value="c">
								<?= img(array('src' => 'public/img/quiz/p1_c.png', 'alt' => '')) ?>
								<div><span class="badge">C</span> Fino y Lacio</div>
							</div>

							<div class="span2 circle"  data-question="p1" data-value="d">
								<?= img(array('src' => 'public/img/quiz/p1_d.png', 'alt' => '')) ?>
								<div><span class="badge">D</span> Teñido y Maltratado</div>
							</div>

						</div>	

						<div class="row-fluid">
							<div class="span12 preguntas">
								Pregunta <span>1</span> de <span>7</span>
							</div>
						</div>

					</div>



					<div id="p2" class="question">

						<div class="row-fluid">
							<div class="span12">
								<h2><span class="number">2.</span> No queremos entrometernos, pero<br>&nbsp; &nbsp; &nbsp;¿Cómo describirías tu cuero cabelludo?</h2>
							</div>
						</div>

						<div class="row-fluid">

							<div class="span2 circle" data-question="p2" data-value="a">
								<?= img(array('src' => 'public/img/quiz/p2_a.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">A</span> Bastante grasoso</div>
							</div>

							<div class="span2 circle" data-question="p2" data-value="b">
								<?= img(array('src' => 'public/img/quiz/p2_b.png', 'alt' => '')) ?>
								<div><span class="badge">B</span> Bastante reseco</div>
							</div>

							<div class="span2 circle" data-question="p2" data-value="c">
								<?= img(array('src' => 'public/img/quiz/p2_c.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">C</span> Extremadamente<BR>Sensitivo</div>
							</div>

							<div class="span2 circle"  data-question="p2" data-value="d">
								<?= img(array('src' => 'public/img/quiz/p2_d.png', 'alt' => '')) ?>
								<div><span class="badge">D</span> Picor constante</div>
							</div>

							<div class="span2 circle"  data-question="p2" data-value="e">
								<?= img(array('src' => 'public/img/quiz/p2_e.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">E</span> Prácticamente<BR>perfecto</div>
							</div>

						</div>	

						<div class="row-fluid">
							<div class="span12 preguntas">
								Pregunta <span>2</span> de <span>7</span>
							</div>
						</div>

					</div>



					<div id="p3" class="question">

						<div class="row-fluid">
							<div class="span12">
								<h2><span class="number">3.</span> Hablando claro: ¿Cuán a menudo<br>&nbsp; &nbsp; &nbsp;sometes tu cabello a tratamientos químicos?</h2>
							</div>
						</div>

						<div class="row-fluid">

							<div class="span2 circle" data-question="p3" data-value="a">
								<?= img(array('src' => 'public/img/quiz/p3_a.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">A</span> ¡Obsesivamente!<br>Vivo para teñirme<br>el pelo</div>
							</div>

							<div class="span2 circle" data-question="p3" data-value="b">
								<?= img(array('src' => 'public/img/quiz/p3_b.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">B</span> Me lo estiro<br>religiosamente</div>
							</div>

							<div class="span2 circle" data-question="p3" data-value="c">
								<?= img(array('src' => 'public/img/quiz/p3_c.png', 'alt' => '')) ?>
								<div><span class="badge"style="margin-left: -20px;">C</span> Lo admito.<br>Soy una adicta<br>a los permanentes</div>
							</div>

							<div class="span2 circle"  data-question="p3" data-value="d">
								<?= img(array('src' => 'public/img/quiz/p3_d.png', 'alt' => '')) ?>
								<div><span class="badge"style="margin-left: -20px;">D</span> Poco. Algunas<br>veces al año</div>
							</div>

							<div class="span2 circle"  data-question="p3" data-value="e">
								<?= img(array('src' => 'public/img/quiz/p3_e.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">E</span> Querida, mi pelo<BR>es tan puro<br>como el de un bebé</div>
							</div>

						</div>	

						<div class="row-fluid">
							<div class="span12 preguntas">
								Pregunta <span>3</span> de <span>7</span>
							</div>
						</div>

					</div>



					<div id="p4" class="question">

						<div class="row-fluid">
							<div class="span12">
								<h2><span class="number">4.</span> ¿Si te vas a encontrar con tu grupo de amigas, ¿a dónde irían?</h2>
							</div>
						</div>

						<div class="row-fluid">

							<div class="span2 circle" data-question="p4" data-value="a">
								<?= img(array('src' => 'public/img/quiz/p4_a.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">A</span> Al restaurante<br>más a la moda<br>del momento</div>
							</div>

							<div class="span2 circle" data-question="p4" data-value="b">
								<?= img(array('src' => 'public/img/quiz/p4_b.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">B</span> A bailar<br>toda la noche<br>en una disco "in"</div>
							</div>

							<div class="span2 circle" data-question="p4" data-value="c">
								<?= img(array('src' => 'public/img/quiz/p4_c.png', 'alt' => '')) ?>
								<div><span class="badge"style="margin-left: -20px;">C</span> A la apertura de<br>una galería de arte<br>moderno</div>
							</div>

							<div class="span2 circle"  data-question="p4" data-value="d">
								<?= img(array('src' => 'public/img/quiz/p4_d.png', 'alt' => '')) ?>
								<div><span class="badge"style="margin-left: -20px;">D</span> A un spot pequeño<br>a escuchar tu<BR>banda favorita</div>
							</div>

							<div class="span2 circle"  data-question="p4" data-value="e">
								<?= img(array('src' => 'public/img/quiz/p4_e.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">E</span> A darte<BR>unos tragos en<br>un bar clandestino</div>
							</div>

						</div>	

						<div class="row-fluid">
							<div class="span12 preguntas">
								Pregunta <span>4</span> de <span>7</span>
							</div>
						</div>

					</div>



					<div id="p5" class="question">

						<div class="row-fluid">
							<div class="span12">
								<h2><span class="number">5.</span> No consideras que tu look está completo sin:</h2>
							</div>
						</div>

						<div class="row-fluid">

							<div class="span2 circle" data-question="p5" data-value="a">
								<?= img(array('src' => 'public/img/quiz/p5_a.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">A</span> Un impactante<br>lapiz labial rojo</div>
							</div>

							<div class="span2 circle" data-question="p5" data-value="b">
								<?= img(array('src' => 'public/img/quiz/p5_b.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">B</span> Un poco de <br>bronzer brilloso</div>
							</div>

							<div class="span2 circle" data-question="p5" data-value="c">
								<?= img(array('src' => 'public/img/quiz/p5_c.png', 'alt' => '')) ?>
								<div><span class="badge"style="margin-left: -20px;">C</span> Pestañas llamativas<br>y eyeliner dramático</div>
							</div>

							<div class="span2 circle"  data-question="p5" data-value="d">
								<?= img(array('src' => 'public/img/quiz/p5_d.png', 'alt' => '')) ?>
								<div><span class="badge"style="margin-left: -20px;">D</span> Brillo para los<br>labios con<br>algo de color</div>
							</div>

							<div class="span2 circle"  data-question="p5" data-value="e">
								<?= img(array('src' => 'public/img/quiz/p5_e.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">E</span> Un splash de tu<BR>perfume favorito</div>
							</div>

						</div>	

						<div class="row-fluid">
							<div class="span12 preguntas">
								Pregunta <span>5</span> de <span>7</span>
							</div>
						</div>

					</div>



					<div id="p6" class="question">

						<div class="row-fluid">
							<div class="span12">
								<h2><span class="number">6.</span> Tu cabello se ve fabuloso. ¿Cómo lo celebrarías?</h2>
							</div>
						</div>

						<div class="row-fluid">

							<div class="span2 circle" data-question="p6" data-value="a">
								<?= img(array('src' => 'public/img/quiz/p6_a.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">A</span> Con una copa<br>de espumoso</div>
							</div>

							<div class="span2 circle" data-question="p6" data-value="b">
								<?= img(array('src' => 'public/img/quiz/p6_b.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">B</span> Con un delicioso<br>vino tinto</div>
							</div>

							<div class="span2 circle" data-question="p6" data-value="c">
								<?= img(array('src' => 'public/img/quiz/p6_c.png', 'alt' => '')) ?>
								<div><span class="badge"style="margin-left: -20px;">C</span> Con una cerveza<br>bien fría</div>
							</div>

							<div class="span2 circle"  data-question="p6" data-value="d">
								<?= img(array('src' => 'public/img/quiz/p6_d.png', 'alt' => '')) ?>
								<div><span class="badge"style="margin-left: -20px;">D</span> Con agua mineral<br>con gas y extra limón</div>
							</div>

							<div class="span2 circle"  data-question="p6" data-value="e">
								<?= img(array('src' => 'public/img/quiz/p6_e.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">E</span> Con un rico<BR>Martini de granada</div>
							</div>

						</div>	

						<div class="row-fluid">
							<div class="span12 preguntas">
								Pregunta <span>6</span> de <span>7</span>
							</div>
						</div>

					</div>



					<div id="p7" class="question">

						<div class="row-fluid">
							<div class="span12">
								<h2><span class="number">7.</span> Ya tienes el cabello de tus sueños.<br>&nbsp; &nbsp; &nbsp;¿Cuáles son los zapatos de tus sueños?</h2>
							</div>
						</div>

						<div class="row-fluid">

							<div class="span2 circle" data-question="p7" data-value="a">
								<?= img(array('src' => 'public/img/quiz/p7_a.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">A</span> Unos clásicos<br>tacos rojos</div>
							</div>

							<div class="span2 circle" data-question="p7" data-value="b">
								<?= img(array('src' => 'public/img/quiz/p7_b.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">B</span> Unos tacos negros<br>bien chic</div>
							</div>

							<div class="span2 circle" data-question="p7" data-value="c">
								<?= img(array('src' => 'public/img/quiz/p7_c.png', 'alt' => '')) ?>
								<div><span class="badge"style="margin-left: -20px;">C</span> Unas botitas<br>sexy</div>
							</div>

							<div class="span2 circle"  data-question="p7" data-value="d">
								<?= img(array('src' => 'public/img/quiz/p7_d.png', 'alt' => '')) ?>
								<div><span class="badge"style="margin-left: -20px;">D</span> Unos tacos de print<br>de leopardo</div>
							</div>

							<div class="span2 circle"  data-question="p7" data-value="e">
								<?= img(array('src' => 'public/img/quiz/p7_e.png', 'alt' => '')) ?>
								<div><span class="badge" style="margin-left: -20px;">E</span> Unos tacos con<BR>la punta abierta</div>
							</div>

						</div>	

						<div class="row-fluid">
							<div class="span12 preguntas">
								Pregunta <span>7</span> de <span>7</span>
							</div>
						</div>

					</div>


				</div>

				<div id="copy">
					<a href='#terminosBox' class='fancybox terminos'>Términos y Condiciones</a> &copy; 2013 Derechos Reservados
				</div>


				<div id="results">
					<div class="result" id="result1">
						<?= str_replace("{coleccion}", $colecciones, $resultado1) ?>
					</div>
					<div class="result" id="result2">
						<?= str_replace("{coleccion}", $colecciones, $resultado2) ?>
					</div>
					<div class="result" id="result3">
						<?= str_replace("{coleccion}", $colecciones, $resultado3) ?>
					</div>
					<div class="result" id="result4">
						<?= str_replace("{coleccion}", $colecciones, $resultado4) ?>
					</div>
					<div class="result" id="result5">
						<?= str_replace("{coleccion}", $colecciones, $resultado5) ?>
					</div>

					<div style="padding: 0px 20px 0px 380px; margin-top: -20px;">
						<p align="right">
							<?= anchor('https://www.facebook.com/pages/Clear-Hair-PR/272720309524227?id=272720309524227&sk=app_330269997085296', img(array('src' => 'public/img/quiz/conocer.png', 'alt' => 'Conocer')), 'target="_blank"') ?>
						</p>
						<div class="row" style="margin-left: -18px;">
							<div class="row" style="margin-left: -18px;"><div class="span2">Comparte en tu muro</div> <div class="span3" style="margin-left:-20px;"><?= anchor('#', img(array('src' => 'public/img/quiz/compartir.png', 'alt' => 'Compartir')), 'class="fb_share" data-picture="http://dsocialcrowd.com/socialpromos3/public/uploads/images/Quiz/start_Diva.png" data-caption="SOY UNA DIVA GLAM" data-description="Completa el Clear Scalp & Hair Beauty Theraphy™ Quiz. Podrías ganar una Vanilla Gift Card de $100. ¡Participa ya!"') ?></div> </div>
						</div>


					</div>
				</div>
				</body>
				</html>