<div id="header">
	<div id="logo">
		<a href="<?php echo 'index.php?rt=index/index'?>"> <img src="resources/logo.png" alt="<?php echo $title; ?>"></a>
	</div>	
	<div id="userbox">
		<?php
			session_start();
			if(isset($_SESSION['login'])){
				echo 'Benvenuto, '.$_SESSION['login'].'<span style="float: right;"><a href="logout.php">Esci</a></span><hr style="background-color: #8ebdfe;height: 1px;border: 0px"><a href="profilo.php">Il mio profilo</a><br/>';
			}else
				echo 'Benvenuto, Ospite<br/><a href="index.php?rt=login/index">Accedi</a><br/>Non sei ancora iscritto? <a href="registrati.php"> Registrati</a>';
		?>
	
	</div>
</div>
	

