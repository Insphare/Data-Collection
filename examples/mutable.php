<?php

include_once '../bootstrap.php';

/**
 * Mutable example
 */

$arrConfigFromDataBase = array(
	'username'	=> 'phpuser',
	'password'	=> 'phpfish',
	'port'		=> '9',
);

/**
 * Now we fill this data in our immutable object.
 */

$mutable = new Collection_Mutable($arrConfigFromDataBase);

// get by key
var_dump($mutable->get('username'));

// get not available key with fallback
var_dump($mutable->get('not', 'not available'));

// check has key
var_dump($mutable->has('username'));

// add new item
$mutable->set('host', 'yourhost.de');

// delete item
$mutable->delete('port');

// get complete data
var_dump($mutable->getData());
