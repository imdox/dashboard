<?php

function setSessionExpiry()
{

    //Start our session.
    session_start();

    //Assign the current timestamp as the user's
    //latest activity
    $_SESSION['i_last_action'] = time();
}

function isLoginSessionExpired()
{
    $login_session_duration = 1800;
    if (isset($_SESSION['i_last_action']) and isset($_SESSION["i_user_logged_in"])) {
        if (((time() - $_SESSION['i_last_action']) > $login_session_duration)) {
            $_SESSION['i_user_logged_in'] = FALSE;
            $_SESSION['i_user_id'] = NULL;
            return true;
        }
    }
    return false;
}

function isSetIsLoginSession(){
    $session_key = 'i_user_logged_in';
    if (isset($_SESSION[$session_key ])) {
        return TRUE;
    }else{
        return FALSE;
    }
}

