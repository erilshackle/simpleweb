<?php

/**
 **PAGE CONTROL
 * Page acess control
 */


/**
 * SESSION CONTANTS
 */
define('LOGIN_USER', 'login_user');                     //  A variável session que vai ter controle sobre o login do usuario
define('LOGIN_ROLE', 'login_role');                     //  A variável session que vai ter controle sobre o tipo de usuario
define('LOGIN_CHECK', isset($_SESSION[LOGIN_USER]));    //  A variável session que vai ter controle sobre o status de login