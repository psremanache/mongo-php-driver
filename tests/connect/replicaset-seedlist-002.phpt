--TEST--
MongoDB\Driver\Manager: Connecting to Replica Set with only arbiter in seedlist
--SKIPIF--
<?php require __DIR__ . "/../utils/basic-skipif.inc"; ?>
<?php skip_if_not_replica_set(); ?>
<?php skip_if_no_arbiter(); ?>
<?php skip_if_not_clean(); ?>
--FILE--
<?php
require_once __DIR__ . "/../utils/basic.inc";

$primary = get_primary_server(URI);
$info = $primary->getInfo();

// As we're building our own URL here, we do need to extract username and password
// We already checked whether there is an arbiter through `skip_if_no_arbiter`
$url = parse_url(URI);
if (array_key_exists('user', $url) && array_key_exists('pass', $url)) {
    $dsn = sprintf('mongodb://%s:%s@%s', $url['user'], $url['pass'], $info['arbiters'][0]);
} else {
    $dsn = 'mongodb://' . $info['arbiters'][0];
}

$manager = new MongoDB\Driver\Manager($dsn, ['replicaSet' => $info['setName']]);

// load fixtures for test
$bulk = new \MongoDB\Driver\BulkWrite();
$bulk->insert(array("_id" => 1, "x" => 2, "y" => 3));
$bulk->insert(array("_id" => 2, "x" => 3, "y" => 4));
$bulk->insert(array("_id" => 3, "x" => 4, "y" => 5));
$manager->executeBulkWrite(NS, $bulk);
?>
===DONE===
<?php exit(0); ?>
--EXPECT--
===DONE===
