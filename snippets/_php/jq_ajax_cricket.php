<?php

echo file_get_contents('http://en.wikipedia.org/w/api.php?format=json&action=query&titles=Cricket&prop=revisions&rvprop=content');
// echo file_get_contents("http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml");

?>