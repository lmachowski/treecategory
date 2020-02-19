<?php

$currentDir = dirname(__FILE__);
/* Directories */
if (!defined('_ROOT_DIR_')) {
    define('_ROOT_DIR_', realpath($currentDir.'/..'));
}
require_once (_ROOT_DIR_.'/vendor/autoload.php');