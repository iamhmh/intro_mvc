<?php

class MainController extends Controller
{
    public function view($id)
    {
        
        $this->loadModel('Post');
        $Post = $this->Post->findFirst(array(
            'conditions' => 'id = 2'
            )
        );
        //print_r($Post);

        $this->set('Post', $Post);
    }
}