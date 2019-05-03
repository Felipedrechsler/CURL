<?php
//
// A very simple PHP example that sends a HTTP POST to a remote site
//

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://balneabilidade.ima.sc.gov.br/relatorio/historico");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"municipioID=23&localID=39&ano=2018&redirect=true");

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$html = curl_exec($ch);

//echo $html

$doc = new DOMDocument();

$dados = $doc->loadHtml($html);

$tables = $doc->getElementsByTagName('table');


$pontos = [];

foreach ($tables as $table) {
    $labels = $table->getElementsByTagName('label');
    $ponto = [];	
    foreach ($labels as $label){
 		echo $label->nodeValue . ' | ';         // Município: ITAJAÍ
 											//					0			1
 		$pedacos = explode(': ', $label->nodeValue);    // $pedacos = array(0 => 'Município', 1 => 'ITAJAÍ')   

 																	// $ponto = array('Municipio' => 'ITAJAI')
 		$ponto[$pedacos[0]] = $pedacos[1];							// $ponto['Municipio'] = 'Itajai'

 		$pontos[] = $ponto; // armazeno o arry ponto dentro de pontos


    	// $tbody = $lable->getElementByTagName('tbody');

    	// 	foreach ($tbodys as $tbody) {
    	// 		$tr = $tbody->getElementByName('tr');

    	// 			foreach ($trs as $tr){
    	// 				$td = $tr->getElementByName('tr');

    	// 					foreach ($tds as $td) {
    	// 						$label = $td->getElementByName('lable');
    	// 					}
    	// 			}


    	// 	}

    	// }
    }
}

echo '<pre>';
var_dump($pontos);


//echo $html

//curl_close ($ch);

// Further processing ...
//if ($server_output == "OK") { ... } else { ... }
?>
