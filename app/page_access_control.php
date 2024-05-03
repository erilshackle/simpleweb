<?php require_once __DIR__ . '/config.php';


//! Edit carefully

if ($login ?? false):

    /**
     ** VERIFY IF USER IS NOT LOGGED IN, THEN REDIRECT TO LOGIN PAGE
     */
    if (!isset($_SESSION[LOGIN_USER])) {      /** edit to suite your case*/
        redirect(link_to('login'));
        die;
    }
    //? user is logged in
    $islogin = true;



    if (is_array($login) || is_array($roles)):

        /**
         ** VERIFY IF LOGGED USER HAS NOT ROLE TO ACCESS THE PAGE
         */
        if ($_SESSION[LOGIN_ROLE] ?? true) {       /** edit to suite your case*/
            die('<h1>Access Denied!</h1>');
        } elseif (!in_array($login, $_SESSION[LOGIN_ROLE] ?? $role ?? [])) { // if we have login_role is in requested $login role
            redirect(link_to('login'));
            die;
        }
        //? user has role to acess the page
        $isadmin = true;

    endif;

endif;


define('is_login', $islogin ?? isset($_SERVER[LOGIN_USER]));        // use this constant to check if user is logged-in
define('is_role', $isadmin ?? false);                               // use this constant to check if user has role specified