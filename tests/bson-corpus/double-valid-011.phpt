--TEST--
Double type: Inf
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('10000000016400000000000000F07F00');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
10000000016400000000000000f07f00
===DONE===