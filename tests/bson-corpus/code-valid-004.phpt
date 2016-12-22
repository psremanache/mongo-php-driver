--TEST--
Javascript Code: two-byte UTF-8 (é)
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('190000000261000D000000C3A9C3A9C3A9C3A9C3A9C3A90000');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toJSON($bson)), "\n";

$json = '{"a" : "\\u00e9\\u00e9\\u00e9\\u00e9\\u00e9\\u00e9"}';

// extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($json))), "\n";

// extJSON to Canonical BSON
echo bin2hex(fromJSON($json)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
190000000261000d000000c3a9c3a9c3a9c3a9c3a9c3a90000
{"a":"\u00e9\u00e9\u00e9\u00e9\u00e9\u00e9"}
{"a":"\u00e9\u00e9\u00e9\u00e9\u00e9\u00e9"}
190000000261000d000000c3a9c3a9c3a9c3a9c3a9c3a90000
===DONE===