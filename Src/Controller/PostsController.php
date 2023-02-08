<?php

class PostsController extends Controller
{
    function index()
    {
        $perPage = 1;
        $this->loadModel('Post');
        $conditions = ['online' => 1, 'type' => 'post'];
        $d['posts'] = $this->Post->find(array(
            'conditions' => $conditions,
            'limit' => ($perPage * ($this->request->page - 1)) . ',' . $perPage,
        ));
        $d['total'] = $this->Post->findCount($conditions);
        $d['page'] = ceil($d['total'] / $perPage);
        $this->set($d);
    }

}