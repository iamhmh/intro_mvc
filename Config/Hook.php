<?php
//envoyer notre page admin vers un template html de notre layout

if($this->request->prefix == 'admin')
{
    $this->layout = 'admin';
    if(!$this->Session->isLogged())
    {
        $this->redirect('users/login');
    }
}