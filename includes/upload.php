<?php 	
	function check_ext($tipo) {
		switch($tipo) {
			case "image/png": 
				return true;
				break;
			case "image/jpg":
				return true;
				break;
			case "image/jpeg":
				return true;
				break;
			case "image/gif":
				return true;
				break;
			case "application/pdf":
				return true;
				break;
			case "application/doc":
				return true;
				break;
			case "application/excel":
				return true;
				break;
			case "application/zip":
				return true;
				break;
			default:
				return false;
				break;
		}
	}
 
	function get_ext($tipo) {
		switch($tipo) {
			case "image/png": 
				return ".png";
				break;
			case "image/jpg":
				return ".jpg";
				break;
			case "image/jpeg":
				return ".jpg";
				break;
			case "image/gif":
				return ".gif";
				break;
			case "application/pdf":
				return ".pdf";
				break;
			case "application/doc":
				return ".doc";
				break;
			case "application/excel":
				return ".xls";
				break;
			case "application/zip":
				return ".zip";
				break;
			default:
				return false;
				break;
		}
	}
 
function get_error($tmp, $type, $size, $max_size) {
	if(!is_uploaded_file($tmp)){
       		echo 'File caricato in modo non corretto<br /><a href="#" onclick="window.history.back();return false;">Torna al post</a>';
		//header("Location: 2; ".$_SERVER['HTTP_REFERER']);
	}
   	if(!check_ext($type)){
    		echo 'Estensione del file non ammesso<br /><a href="#" onclick="window.history.back();return false;">Torna al post</a>';
		//header("Location: 2; ".$_SERVER['HTTP_REFERER']);
	}
   	if($size > $max_size){
    	    	echo 'Dimensione del file troppo grande<br /><a href="#" onclick="window.history.back();return false;">Torna al post</a>';
		//header("Location: 2; ".$_SERVER['HTTP_REFERER']);
	}
     
}
 
$tmp = $_FILES['post_ris']['tmp_name']; 
$type = $_FILES['post_ris']['type'];
$size = $_FILES['post_ris']['size'];
$max_size = 5242880; //dimensione massima in byte consentita
$folder = "resources/"; //cartella di destinazione dell'immagine
$name = "";
if(is_uploaded_file($tmp) && check_ext($type) && $size <= $max_size) {
 
    $ext = get_ext($type); //estensione dell'immagine
    $name = $_FILES['post_ris']['name'];; //aggiungo al nome appena creato l'estensione
    $name = $folder.$name; //aggiungo il folder di destinazione
    $dimensioni = getimagesize($tmp);
    $larghezza = $dimensioni[0];
    $altezza = $dimensioni[1];
    if(move_uploaded_file($tmp,$name)) {
	
    } else {
        echo "Errore: Non è stato possibile caricare il file allegato";

    }
} else {
 
    get_error($tmp, $type, $size, $max_size);
 
}
	
?>
