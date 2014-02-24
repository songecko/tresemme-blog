<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo SITE_NAME ?></title>
    <?php
    	echo link_tag('public/plugins/bootstrap/css/bootstrap.min.css');
    	echo link_tag('public/css/quiz.css');
    	
    	echo script_tag('public/js/jquery-1.8.3.min.js');
    	echo script_tag('public/js/quiz.js');
    ?>
</head>
<body>
<div class="container">
	<p>&nbsp;</p>
	<div class="hero-unit">
		<h1><?php echo SITE_NAME ?></h1>
		<p>Bienvenidos a nuestro futuro website. Estamos en construcción. Regrese pronto.</p>
	</div>	
</div>
</body>
</html>