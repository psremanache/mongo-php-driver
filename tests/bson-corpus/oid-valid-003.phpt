--TEST--
ObjectId: Random
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('1400000007610056E1FC72E0C917E9C471416100');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toJSON($bson)), "\n";

$json = '{"a" : {"$oid" : "56e1fc72e0c917e9c4714161"}}';

// extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($json))), "\n";

// extJSON to Canonical BSON
echo bin2hex(fromJSON($json)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
1400000007610056e1fc72e0c917e9c471416100
{"a":{"$oid":"56e1fc72e0c917e9c4714161"}}
{"a":{"$oid":"56e1fc72e0c917e9c4714161"}}
1400000007610056e1fc72e0c917e9c471416100
===DONE===