<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title><?php echo SITE_NAME;?></title>
    <?php
    
	    echo link_tag('public/plugins/bootstrap/css/bootstrap.min.css');
		echo link_tag('public/css/admin.css');
		
    	echo script_tag('public/js/jquery-1.8.3.min.js');
    	echo script_tag('public/plugins/bootstrap/js/bootstrap.min.js');
    	echo script_tag('public/js/admin.js');

	    echo script_tag('public/plugins/ckeditor/ckeditor.js');
	    echo script_tag('public/plugins/ckfinder/ckfinder.js');
    ?>
</head>

<body>

<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand" href="<?php echo site_url(); ?>" target='_blank'>
  		<?php echo SITE_NAME;?>
  	  </a>
  	  <ul class="nav">
  	  	<?php echo $nav; ?>
	  </ul>
	  <ul class="nav pull-right">
	  	<li><?php  echo anchor("admin/access/logout","<i class='icon-off '></i> Logout"); ?></li>
	  </ul>
  </div>
  </div>
</div>


	<?php echo vspace(60); ?>
    <div class="container">
    	<div class='page-header'>
    	<h1><?php echo $title;?><span style='float: right;'> <?php echo $toolbar; ?></span></h1></div>
		<?php echo $content; ?>
	</div>
</body>
</html>