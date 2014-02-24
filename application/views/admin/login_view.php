<!DOCTYPE html>
<html>
	<head>
		<title>Admin / <?php echo SITE_NAME; ?></title>
    
	    <?php
				echo link_tag('public/plugins/bootstrap/css/bootstrap.min.css');
				echo link_tag('public/css/admin.css');
	
	    	echo script_tag('public/js/jquery-1.9.0.min.js');
	    	echo script_tag('public/plugins/bootstrap/js/bootstrap.min.js');
	    ?>

	</head>
	<body>
			    <div id="login" class="well">
				    	<div style="text-align:center;">
			          		<h1><?php echo SITE_NAME; ?></h1>
				    	</div>
			        <hr>
			        <?php echo form_open('admin/access/login'); 
			            echo form_input("Username", "username",NULL,"class='span4'");
			            echo form_password("Password", "password",NULL,"class='span4'");
			            echo $message;
			        ?>
			        <hr>
			        <input type='submit' value='Login' class="btn btn-primary" />
			        </form>
			        <small>&copy; <?php echo date("Y"); ?> - <?php echo SITE_NAME;?><br>
			        Powered by <a href='http://www.planetabinario.com' target="_blank">planetabinario.com</a></small>
			    </div>
</body>
</html>