<?php
require index.php;



$dom = new DOMDocument();
$dom->loadHTMLFile('teste.html');

// Consultando os links
$links = $dom->getElementsByTagName('a');
foreach ($links as $link) {
    echo $link->getAttribute('href').PHP_EOL;
}

// Consultando as imagens
$imgs = $dom->getElementsByTagName('img');
foreach ($imgs as $img) {
    echo $img->getAttribute('src').PHP_EOL;
}

?>
