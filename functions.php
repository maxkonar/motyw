<?php
define('__ROOT__', dirname(__FILE__));
require(__ROOT__ . '/vendor/autoload.php');

$actions = new App\Actions;
$actions->init();

$filters = new App\Filters;
$filters->init();
