<?php

require(dirname(__FILE__).'/configuration/config.php');

$tch = new TreeCategoryHelper();
$tch->setList(json_decode(FileHelper::getContentFile('list.json')));
$tch->setTree(json_decode(FileHelper::getContentFile('tree.json')));
$tch->processCategory();

FileHelper::saveContentToFile('result.json', json_encode($tch->getTree()));
echo "OK";