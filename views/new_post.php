<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" href="styles/main.css" type="text/css" />
		<title>FluidLearn - Post Editor</title>
		<script>
			function checkPost(){
				var ref = document.getElementById('PrintError');
				var title = document.modulo.post_title.value;	
				var content = document.modulo.post_content.value;
				var link = document.modulo.post_link.value;
				var url = /^http:\/\/(www\.)?[a-zA-Z0-9-]{3,}\.[a-zA-Z]{2,}(\/)?$/;
				var unita = document.modulo.post_unita.value;
				var nodo = document.modulo.post_nod.value;
				nodo = nodo.replace("NULL","");
				var visib = document.modulo.post_visib.value;
				var ris = document.modulo.post_ris.value;
	
				if(title == null || title == "" || title <= 1){
					ref.innerHTML = "E' obbligatorio inserire i campi Titolo, Testo e Unita' di riferimento";
					return false;
				} else 
					if(content == null || content == "" || content <= 1){
						ref.innerHTML = "E' obbligatorio inserire i campi Titolo, Testo e Unita' di riferimento";
						return false;
					} else 
							if(unita == null || unita == "" || unita <= 1){
								ref.innerHTML = "E' obbligatorio inserire i campi Titolo, Testo e Unita' di riferimento";
								return false;
							} else 
								if(ris == null || ris == "" || ris <= 1) {
									ris = "";
									if(!(link == null || link == "" || link <= 1)){
										if (url.test(link) == false){
											ref.innerHTML = "L'Url specificato non e' corretto";
											return false;
										}
									}
								
								} else {
									if (!(link == null || link == "" || link <= 1)){
										ref.innerHTML = "E' possibile inserire solo una risorsa!";
										return false;
									}
									ris = ris.replace("C:\\fakepath\\","");
								}
								if(link == null || link == "" || link <= 1)
									var anteprima = 'Titolo: '+ title + '\nTesto: ' + content + '\nNodo associato: '+ nodo + '\nRisorsa associata: '+ ris +'\nUnita\' di riferimento: '+unita+'\nVisibilita\': '+visib;
								else
									var anteprima = 'Titolo: '+ title + '\nTesto: ' + content + '\nNodo associato: '+ nodo + '\nRisorsa associata: '+ link +'\nUnita\' di riferimento: '+unita+'\nVisibilita\': '+visib;
								if (document.modulo.post_draft.checked)
									return true;
								else 
								    if(window.confirm(anteprima)) return true;
							 	    else return false;
			}
			
		</script>
	</head>
	<body>
		
		<?php
			if(!isset($_POST['submit'])){
		?>
		<div id="container">
			<?php
				include "header.php";
				include "navigation.php";
			?>
			<div id="content">
				<ul class="post_list">
					<h1>Post Editor</h1>
					<hr/>
					<br/>
					<div id="PrintError" style="color:red;" ></div>

					<form enctype="multipart/form-data" action="index.php?rt=contr/creaPost" method="POST" name = "modulo" onSubmit="return checkPost()">
						<div>
							<label for="post_title">Titolo del post<span style="color:red;">*</span> :</label>
							<br/>
							<input class="add_post" id="post_title" name="post_title" type="text" placeholder="Titolo"></input>
						</div>
			
						<div>
							<label for="post_content">Testo<span style="color:red;">*</span> :</label>
							<br/>
							<textarea class="add_post" id="post_content" name="post_content" style="resize:none;" placeholder="Scrivi qua il post..."></textarea>
						</div>

						<div>
							<label for="post_ris">Aggiungi un file in allegato:</label>
							<br/>
							<input name="post_ris" type="file"></input>
						</div>
			
						<div>
							<label for="post_content">Aggiungi un link:</label>
							<br/>
							<input class="add_post" type="text" id="post_link" name="post_link" style="resize:none;" placeholder="Aggiungi qua il link..."></input>
						</div>
			
						<div>
							<label for="post_nodo">Associa un nodo:</label>
							<br/>
							<select id="post_nodo" name="post_nod" placeholder="Nodo" >
								<option value="NULL" selected="selected"></option>
								<?php 
									for($i = 0; $i < count($nodo); $i++){
										print("<option value=\"".$nodo[$i]["id"]."\">".$nodo[$i]["nome"]."</option>");

									}
								?>
					
							</select>
						</div>
						<div>
							<label for="post_unita">Scegli l'unita' didattica di riferimento<span style="color:red;">*</span> :</label>
							<br/>
							<select id="post_unita" name="post_unita" placeholder="Unita" >
								<option value="" selected="selected"></option>
								<?php 
									for($i = 0; $i < count($unita); $i++){
										print("<option value=\"".$unita[$i]["nome"]."\">".$unita[$i]["nome"]."</option>");
									}
								?>
					
							</select>
						</div>
						<div>
							<label for="post_visib">Seleziona la visibilita':</label>
							<br/>
							<select id="post_visib" name="post_visib" placeholder="Visibilita" >
								<option value="classe" selected="selected">Classe</option>
								<option value="docente" >Docente</option>
								<option value="privato" >Privato</option>
							</select>
						</div>
						<div>
							<label for="post_draft">Salva come draft :</label>
							<br/>
							<input class="addpost" id="post_draft" name="post_draft" type="checkbox" placeholder="Draft" value="1"></input>
						</div>
						<br/>
						<input class="float:right;" type="submit" name="submit" value="Inserisci Post + " ></input>
					</form>
				</ul>
				<br/>
				<hr/>
				<h6 style="color:red">I campi marcati da un '*' sono obbligatori</h6>
				<br/>
			</div>
			<?php
				include "footer.php";
			?>
		</div>
		<?php
			}
		?>

	</body>
</html>
