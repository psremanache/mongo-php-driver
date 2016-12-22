--TEST--
Decimal128: [decq621] fold-down full sequence (Clamped)
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('18000000136400000080F64AE1C7022D1500000000FE5F00');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toJSON($bson)), "\n";

$json = '{"d" : {"$numberDecimal" : "1E+6134"}}';

// extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($json))), "\n";

$canonicalJson = '{"d" : {"$numberDecimal" : "1.00000000000000000000000E+6134"}}';

// Canonical extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($canonicalJson))), "\n";

// extJSON to Canonical BSON
echo bin2hex(fromJSON($json)), "\n";

// Canonical extJSON to Canonical BSON
echo bin2hex(fromJSON($canonicalJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
18000000136400000080f64ae1c7022d1500000000fe5f00
{"d":{"$numberDecimal":"1.00000000000000000000000E+6134"}}
{"d":{"$numberDecimal":"1.00000000000000000000000E+6134"}}
{"d":{"$numberDecimal":"1.00000000000000000000000E+6134"}}
18000000136400000080f64ae1c7022d1500000000fe5f00
18000000136400000080f64ae1c7022d1500000000fe5f00
===DONE===