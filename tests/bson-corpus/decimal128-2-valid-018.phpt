--TEST--
Decimal128: [decq131] fold-downs (more below)
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('18000000136400000000807F1BCF85B27059C8A43CFEDF00');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toJSON($bson)), "\n";

$json = '{"d" : {"$numberDecimal" : "-1.230000000000000000000000000000000E+6144"}}';

// extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($json))), "\n";

// extJSON to Canonical BSON
echo bin2hex(fromJSON($json)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
18000000136400000000807f1bcf85b27059c8a43cfedf00
{"d":{"$numberDecimal":"-1.230000000000000000000000000000000E+6144"}}
{"d":{"$numberDecimal":"-1.230000000000000000000000000000000E+6144"}}
18000000136400000000807f1bcf85b27059c8a43cfedf00
===DONE===