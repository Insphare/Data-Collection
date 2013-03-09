<?php

include_once '../bootstrap.php';

/**
 * Read-Only example.
 */

$arrConfigFromDataBase = array(
	0 => 'hello dear, my name is earl.',
	1 => 'how are you today?',
	2 => 'are you looking for a new job as php engineer?'
);


$arrConfigFromDataBase = array(
	'username'	=> 'phpuser',
	'password'	=> 'phpfish',
	'port'		=> '9',
);

/**
 * Now we fill this data in our immutable object.
 */

$immutable = new Collection_Immutable($arrConfigFromDataBase);

// get by key
var_dump($immutable->get('username'));

// get not available key with fallback
var_dump($immutable->get('not', 'not available'));

// check has key
var_dump($immutable->has('username'));

// get complete data
var_dump($immutable->getData());