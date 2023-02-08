<?php

class PostsController extends Controller
{
    function index()
    {
        $this->loadModel('Post');
        $d['posts'] = $this->Post->find(array(
            'conditions' => ['online' => 1, 
                            'type' => 'post']
        ));
        $d['total'] = $this->Post->findCount($conditions);
        $d['page'] = '20';
        $this->set($d);
    }


}