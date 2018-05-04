<?php
include_once "vendor/semsol/arc2/ARC2.php";

$config = array(
    'remote_store_endpoint' => 'http://fuseki:3030/dbpedia/sparql',
);
$store = ARC2::getRemoteStore($config);

$q = 'SELECT ?s ?p ?o WHERE {
        ?s ?p ?o
    }';
$r = '';
if ($rows = $store->query($q, 'rows')) {
    foreach ($rows as $row) {
        $r .= '<tr>' . '<td>' . $row['s'] . '</td>' . '<td>' . $row['p'] . '</td>' . '<td>' .  $row['o'] . '</td>' . '</tr>';
    }
}

echo $r ? '<table>' . $r . '<table>' : 'no named persons found';
