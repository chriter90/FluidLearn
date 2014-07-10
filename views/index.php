<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" href="styles/main.css" type="text/css" />
		<title>FluidLearn</title>
	</head>
	<body>
		<div id="container">
			<?php
				include "header.php";
				include "navigation.php";
			?>
			<div id="content">
				<h1>Elenco corsi</h1>
				
				<!-- Elenco dei corsi -->
				<ul class="post_list">
					<?php
						/* Per ogni corso contenuto in $corsi mostra: */
						for($i = 0; $i < count($corsi); $i++){
							print("<li>");
							/* il nome e l'anno accademico*/
							print('<b><a href="index.php?rt=corso/index&nome='.$corsi[$i]["nome"].'&anno='.$corsi[$i]["anno"].'">'.$corsi[$i]["nome"].' '.$corsi[$i]["anno"].'</a></b>');
							print("</li>");
						}
					?>
				</ul>
			</div>
			<?php
				include "footer.php";
			?>
		</div>
	</body>
</html>