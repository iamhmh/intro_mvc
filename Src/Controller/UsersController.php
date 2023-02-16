<?php

class UsersController extends Controller
{
    //fonction pour se logger
    function login()
    {
        if($this->request->data)
        {
            $data = $this->request->data;
            $data->password = sha1($data->password);
            $this->loadModel('User');
            $user = $this->User->findFirst(array(
                'conditions' => [
                    'login' => $data->login,
                    'password' => $data->password
                ]
            ));
            if(!empty($user))
            {
                //debug($user);
                $_SESSION['User'] = $user;
            }
        }
    }
    //fonction delogger
    function logout()
    {

    }
}