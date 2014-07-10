+-<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" href="styles/main.css" type="text/css" />
		<title>FluidLearn - Login</title>
		<script>
			function checkForm(){
				var ref = document.getElementById('PrintError');
				var user = document.module.login.value;
				var pwd = document.module.password.value;
				var type = document.module.permessi; 
	
				if(user == null || user == "" || user <= 1){
					ref.innerHTML = "E' obbligatorio inserire il campo Login";
					return false;
				} else 
					if(pwd == null || pwd == "" || pwd <= 1){
						ref.innerHTML = "E' obbligatorio inserire il campo Password";
						return false;
					} else  {
							scelte = new Array();
							for(var i = 0; i < type.length; i++){
								if(type[i].checked)
								scelte[scelte.length] = type[i].value;
							}
							if(scelte.length < 1) { 
								ref.innerHTML = "E' obbligatorio selezionare la tipologia di utente";
								return false; 
							} else return true;
					}
								
				
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
				<h3 class="regblock">Inserisci i tuoi dati di accesso</h3>
				<div id="PrintError" style="color:red;" ></div>
				<form enctype="multipart/form-data" action="index.php?rt=login/login" method="POST" name = "module" onSubmit="return checkForm()">
					<div>
						<label for="login">Login<span style="color:red;">*</span></label>
						<br/>
						<input id="login" name="login" type="text" placeholder="Login"></input>
					</div><hr>
		
					<div>
						<label for="password">Password<span style="color:red;">*</span></label>
						<br/>
						<input type="text" id="password" name="password" placeholder="Password"></input>
					</div><hr>

					<div>	<span style="color:red;">*</span>
						Studente <input type="radio" id="permessi" name="permessi" value="studente"/>
						Docente  <input type="radio" id="permessi" name="permessi" value="docente"/>
					</div><hr>
					<input class="float:right;" type="submit" name="submit" value="Sign In" ></input>
				</form>
				<h6 style="color:red">I campi marcati da un '*' sono obbligatori</h6>
				
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
