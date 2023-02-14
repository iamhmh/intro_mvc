<?php

class MediasController extends Controller
{
    function admin_index($id)
    {
        $this->loadModel('Media');
        //debug($this->request);
        if($this->request->data && !empty($_FILES['file']['name']))
        {
            if(strpos($_FILES['file']['type'], 'image') !== false)
            {
                $dir = __WEBROOT__ . __DS__ . 'img' . __DS__ . date('Y-m');
                if(!file_exists($dir))
                {
                    mkdir($dir, 0777);
                }
            }
        }
        $this->layout = 'modal';
    }
}