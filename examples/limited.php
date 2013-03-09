<?php

include_once '../bootstrap.php';

/**
 * Read-Only example.
 */

$id = 0;
$arrMessagesFromDataBase = array(
	$id++ => 'hello dear, my name is earl.',
	$id++ => 'how are you today?',
	$id++ => 'are you looking for a new job as php engineer?'
);

/**
 * Now we fill this data in our immutable object.
 */

$limitItemsPerUser = 5;
$limited = new Collection_Limited($limitItemsPerUser);
$limited->setDataByRef($arrMessagesFromDataBase);

/**
 * You can do the same like in mutable and the now following methods.
 */
$limited->set($id++, 'good. we have a new job for you.');
$limited->set($id++, 'what would you like earn in our company?');
$limited->set($id++, 'you will earn what you are valuable...');

// get complete data by method
var_dump($limited->getData());

// you can pick a message by id
var_dump($limited->get(3));

// and you can delete an item by id
$limited->delete(3);

// and remember, we sets the data by reference..
var_dump($arrMessagesFromDataBase);
