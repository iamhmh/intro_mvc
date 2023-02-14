<?php

class MediasController extends Controller
{
    function admin_index()
    {
        $this->loadModel('Media');
        //debug($this->request);
        if($this->request->data && !empty($_FILES['file']['name']))
        {

        }
        $this->layout = 'modal';
    }
}