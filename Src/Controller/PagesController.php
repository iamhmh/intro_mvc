<?php

class PagesController extends Controller
{
    function getMenu()
    {
        $this->loadModel('Post');
        return $this->Post->find(array(
            'conditions' => ['online' => 1, 
                            'type' => 'page']
        ));
    }
}