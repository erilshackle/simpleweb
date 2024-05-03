<?php

function link_to($link)
{
    return ROOT . '/' . $link;
}

function redirect($page, $param = [])
{
    $page = $page == null ? $_SERVER['PHP_SELF'] : $page;
    header("location: $page" . http_build_query($param));
    exit;
}
function post_redirect_get($old_values = null)
{
    $_SESSION['old_values'] = $old_values ?? $_POST;
    header('Location: ' . $_SERVER['PHP_SELF'], true, 303);
    unset($_SESSION['old_values']);
    exit;
}

// USE A SESSION Variable an then unset it
function flashMessage($session_var)
{
    $msg = $_SESSION[$session_var] ?? '';
    if (isset($_SESSION[$session_var]))
        unset($_SESSION[$session_var]);
    return $msg;
}

function resources($file_path)
{
    return RESOURCES . '/' . $file_path;
}
function asset($file_path)
{
    return ASSETS . '/' . $file_path;
}

