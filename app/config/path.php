<?php


/**
 * PATH CONFIG
 */
defined('ROOT') OR define('ROOT', "http://" . $_SERVER['SERVER_NAME'] . "/" . SITE_NAME);

define('RESOURCES', ROOT . '/resources');
define('ASSETS', ROOT . '/assets');
define('UPLOADS', ROOT . '/resources/uploads');
define('TEMPLATES', ROOT . '/resources/templates');
define('RESOURCES_DIR', __DIR__ . '/../../resources');