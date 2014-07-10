<!-- This is the default home page -->
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
				<h1>Elenco post</h1>
				
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
							print('</br>Unita\' DA di riferimento: '.$posts[$i]['unidida']);
							if($posts[$i]['nodo'] != NULL)
									print('</br>Nodo allegato: '.$posts[$i]['nodo'].'</br>');
							
							?>
							<!-- Elenco dei commenti -->
							<ul class="comment_list">
								<?php
									/* Per ogni commento contenuto in $comments mostra: */
									for($i = 0; $i < count($comments); $i++){
										print("<li>");
										/* il titolo */
										print("<b>".$comments[$i]["titolo"]."</b>");
										/* la descrizione */
										print(" - \"".$comments[$i]["contenuto"]."\"");
										/* la data e l'autore */
										print(" (scritto il: ".$comments[$i]["dataPubb"]." da: <i>".$comments[$i]["part"]."</i>)");
										/* link per la lettura del post */
										print(" - <a href=\"index.php?rt=contr&id=".$comments[$i]["id"]."\">Leggi...</a>");
										if($comments[$i]['percorso'] == NULL){
											if($comments[$i]['link'] != NULL)
												print('</br>Link allegato: <a href="'.$comments[$i]['link'].'">'.$comments[$i]['link'].'</a>');
										}else{
											$file = substr($comments[$i]['percorso'], 10);
											print('</br>File allegato: <a href="views/download.php?file='.$comments[$i]['percorso'].'"><img src="resources/allegati.png"> '.$file.'</a>');
									
										}
										print('</br>Unita\' DA di riferimento: '.$comments[$i]['unidida']);
										if($comments[$i]['nodo'] != NULL)
												print('</br>Nodo allegato: '.$comments[$i]['nodo'].'</br>');
										
										?>
										
										
										<?php
										print("</li>");
									}
								?>
							</ul>
										
							<?php
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
