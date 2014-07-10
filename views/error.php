<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>FluidLearn - Errore</title>
		<link rel="stylesheet" href="styles/main.css" type="text/css" />
	</head>
	<body>
		<div id="container">
			<?php
				include "header.php";
				include "navigation.php";
			?>
			<div id="content">
				<div id="printError" style="color:red;">
					<?php
						echo $error;				
					?>
				</div></br>
				<a href="index.php?rt=index/index">Torna alla home</a>
			</div>
			<?php
				include "footer.php";
			?>
		</div>
		
	</body>
</html>
