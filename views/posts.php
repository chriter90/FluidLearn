<!-- This is the default home page -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" href="styles/main.css" type="text/css" />
		<title>myBlog - Post Viewer</title>
	</head>
	<body>
		<h1><?php print($post["titolo"]); ?></h1>
		<h4>(Scritto da: <?php print($post["part"]); ?>, il giorno: <?php print($post["dataPubb"]); ?>) </h4>
		<br/><hr/>
		<p>
		<?php print($post["corpo"]); ?>
		</p>
	</body>
</html>
