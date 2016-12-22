--TEST--
Decimal128: [decq021] Normality
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('18000000136400F2AF967ED05C82DE3297FF6FDE3C40B000');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toJSON($bson)), "\n";

$json = '{"d" : {"$numberDecimal" : "-1234567890123456789012345678901234"}}';

// extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($json))), "\n";

// extJSON to Canonical BSON
echo bin2hex(fromJSON($json)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
18000000136400f2af967ed05c82de3297ff6fde3c40b000
{"d":{"$numberDecimal":"-1234567890123456789012345678901234"}}
{"d":{"$numberDecimal":"-1234567890123456789012345678901234"}}
18000000136400f2af967ed05c82de3297ff6fde3c40b000
===DONE===