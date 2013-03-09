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
$mutable->setDataByRef($arrConfigFromDataBase);

// add new item
$mutable->set('host', 'yourhost.de');

// delete item
$mutable->delete('port');

// get manipulated data by reference.
var_dump($arrConfigFromDataBase);
