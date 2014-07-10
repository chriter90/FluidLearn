<!-- This is the default home page -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" href="styles/main.css" type="text/css" />
		<title>FluidLearn</title>
	</head>
	<body>
		<h1><?php echo $title; ?></h1>
		<h2>Elenco post</h2>
		<!-- Barra contenente link vari -->
		<div class="navbar">
			<ul class="nav">
				<li><a href="index.php?rt=contr/new_post">Nuovo Post <span>+</span></a></li>
				<li><a href="index.php?rt=contr/draft">Visualizza draft</a></li>
			</ul>
		</div>
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
 					print(" - <a href=\"index.php?rt=contr&id=".$posts[$i]["id"]."\">Leggi...</a>");
					if($posts[$i]['percorso'] == NULL){
						if($posts[$i]['link'] != NULL)
							print('</br>Link allegato: <a href="'.$posts[$i]['link'].'">'.$posts[$i]['link'].'</a>');
					}else{
						$file = substr($posts[$i]['percorso'], 10);
						print('</br>File allegato: <a href="views/download.php?file='.$posts[$i]['percorso'].'"><img src="resources/allegati.png"> '.$file.'</a>');
						
					}
					print("</li>");
				}
			?>
		</ul>
	</body>
</html>
