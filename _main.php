<?php

/** Funcionality
 ** Defaults variable (you can set them before requiring this script)
 *-------------------------
 * $login = true/false/['role']
 * $admin = true/false;
 * $css = 'assets/css/file.css';
 * $js = 'assets/js/file.js';
 *-------------------------
 ** Variables Ready to use
 *? $database
 *  is_login    ->  check if user is logged-in
 *  is_role     ->  check if user has the role specified
 *------------------------
 ** MODELS (CRUD)
 *? Model class
 *? model = new Model('tablename', 'primarykey')
 *? model->crud();
 * $login = (new Model('Users','id'))->find('email', 'stranger@mymail.com');
 * $login_roles = (new Model('Roles'))->get($login->id);
*/


// APP ROOT EDIT YOUR URL
if ($_SERVER['SERVER_NAME'] == 'localhost'):

    define('ROOT', 'http://localhost/webproject');  //? edit this if needed

else:
    define('ROOT', $_SERVER['SERVER_NAME']);
endif;

// load configs
require_once __DIR__ . '/app/config.php';
require_once __DIR__ . '/app/database.php';
require_once __DIR__ . '/app/utils.php';

//autoload classes
require_once __DIR__ . '/app/autoload.php';

// Page Access Control
session_start();
require_once __DIR__ . '/app/page_access_control.php';

// header and footer include function
function INCLUDE_HEADER()
{
    include_once (__DIR__ . '/app/includes/header.php');
}
function INCLUDE_FOOTER()
{
    include_once (__DIR__ . '/app/includes/footer.php');
}


// start page : head.html
require_once __DIR__ . '/app/includes/head.php';