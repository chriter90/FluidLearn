<script>
// Inizializzo la variabile identificativa dell'indirizzo della pagina corrente
var QUESTA_PAGINA = document.URL;

document.write('<div id="navigation">');
document.write('<div class="navbar">');
document.write('<ul class="nav">');
document.write('<li><a href="index.php?rt=contr/new_post">Nuovo Post <span>+</span></a></li>');

if (QUESTA_PAGINA.indexOf("index.php?rt=index/index") == (-1))
    document.write('<li><a href="index.php?rt=index/index">Visualizza Post</a></li>');
else
    document.write('<li><a href="index.php?rt=contr/draft">Visualizza draft</a></li>');

document.write('</ul></div></div>');

</script>
