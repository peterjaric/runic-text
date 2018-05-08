<?php
#include_once "vendor/autoload.php";
include_once "vendor/easyrdf/easyrdf/EasyRdf.php";
?>

<html>
<head>
<title>GraphStore example</title>
</head>
<body>
<?php
// Use a local SPARQL 1.1 Graph Store (eg RedStore)
$gs = new EasyRdf_GraphStore('http://fuseki:3030/runic-text');
// Add the current time in a graph
$graph1 = $gs->getDefault();
$graph1->add('http://example.com/test', 'rdfs:label', 'Test');
$graph1->add('http://example.com/test', 'dc:date', time());
$gs->insertIntoDefault($graph1);
// Get the graph back out of the graph store and display it
$graph1 = $gs->getDefault();
print $graph1->dump();
?>

</body>
</html>