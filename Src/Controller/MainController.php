<?php

class MainController extends Controller
{
    public function view($id)
    {
        $this->loadModel('Post');
        $d['page'] = $this->Post->findFirst(array(
            'conditions' => ['id' => $id, 'type' => 'page']
            )
        );

        if(empty($d['page'])) 
        {
            $this->e404('Error');
        }
        $d['pages'] = $this->Post->find(array(
            'conditions' => ['type' => 'page']
            )
        );
        $this->set($d);
    }
}