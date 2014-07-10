<!-- This is the draft page -->
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
				<h2>Elenco draft</h2>
				
				<!-- Elenco dei post -->
				<ul class="post_list">
					<?php
						/* Per ogni post contenuto in $posts mostra: */
						for($i = 0; $i < count($posts); $i++){
							print("<li>");
							/* il titolo */
							print("<b>".$posts[$i]["titolo"]."</b>");
							/* la descrizione */
							print(" - \"".$posts[$i]["contenuto"]."\"");
							/* la data e l'autore */
							print(" (scritto il: ".$posts[$i]["dataPubb"]." da: <i>".$posts[$i]["part"]."</i>)");
							/* link per la lettura del post */
			/****fallo zio fa************/	print(" - <a href=\"index.php?rt=contr/edit_draft&id=".$posts[$i]["id"]."\">Modifica</a>");
							if($posts[$i]['percorso'] == NULL){
								if($posts[$i]['link'] != NULL)
									print('</br>Link allegato: <a href="'.$posts[$i]['link'].'">'.$posts[$i]['link'].'</a>');
							}else{
								$file = substr($posts[$i]['percorso'], 10);
								print('</br>File allegato: <a href="views/download.php?file='.$posts[$i]['percorso'].'">'.$file.'</a>');
						
							}
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
