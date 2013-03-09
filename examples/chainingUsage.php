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

$mutable = new Collection_Mutable();
$mutable->setData($arrConfigFromDataBase);

// chaining usage
var_dump($mutable->set('host', 'yourhost.de')->delete('port')->getData());
