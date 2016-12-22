--TEST--
Decimal128: [decq635] fold-down full sequence (Clamped)
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('180000001364000000C16FF2862300000000000000FE5F00');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toJSON($bson)), "\n";

$json = '{"d" : {"$numberDecimal" : "1E+6127"}}';

// extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($json))), "\n";

$canonicalJson = '{"d" : {"$numberDecimal" : "1.0000000000000000E+6127"}}';

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
180000001364000000c16ff2862300000000000000fe5f00
{"d":{"$numberDecimal":"1.0000000000000000E+6127"}}
{"d":{"$numberDecimal":"1.0000000000000000E+6127"}}
{"d":{"$numberDecimal":"1.0000000000000000E+6127"}}
180000001364000000c16ff2862300000000000000fe5f00
180000001364000000c16ff2862300000000000000fe5f00
===DONE===