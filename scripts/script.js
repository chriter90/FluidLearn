function checkPost(){
	var ref = document.getElementById('PrintError');
	var post_title = document.forms[0]["post_title"].value;	
	var post_content = document.forms[0]["post_content"].value;
	var post_unita = document.forms[0]["post_unita"].value;
	
	if(post_title == null || post_title == "" || post_title <= 1){
		ref.innerHTML = "E' obbligatorio inserire i campi Titolo, Testo e Unita' di riferimento");
		return false;
	} else if(post_content == null || post_content == "" || post_content <= 1){
		ref.innerHTML = "E' obbligatorio inserire i campi Titolo, Testo e Unita' di riferimento");
		return false;
	} else if(post_unita == null || post_unita == "" || post_unita <= 1){
		ref.innerHTML = "E' obbligatorio inserire i campi Titolo, Testo e Unita' di riferimento");
		return false;
	} else
		return true;
}
