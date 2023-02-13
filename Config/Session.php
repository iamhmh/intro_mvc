<?php

class Session
{
    public function __construct()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
    }

    public function setFlash($message, $type = 'success')
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public function flash()
    {
        if(isset($_SESSION['flash']['message']))
        {
            $html = '<div class="alert-message ' . $_SESSION['flash']['type'] . '"><p>'.$_SESSION['flash']['message'].'</p></div>';
            $_SESSION['flash'] = [];
            return $html;
        }
    }
}