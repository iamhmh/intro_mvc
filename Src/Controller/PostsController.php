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
    function view($id, $slug)
    {
        //SELECT * FROM posts WHERE id = 5 AND online = 1 AND slug = 'premier-article';
        // je charge le model post
        $this->loadModel('Post');
        // je vais créer ma requete SQL pour mon article
        $conditions = ['id' => $id, 'online' => 1, 'type' => 'post'];
        $d['post'] = $this->Post->findFirst(array(
            'fields' => 'id, slug, content, name',
            'conditions' => $conditions
        ));
        // J'envoie une erreur 404 en cas d'article introuvable
        if(empty($d['post'])) 
        {
            $this->e404('Error');
        }
        // Si mes 2 slugs sont différents, je fais une redirection 301
        if($slug != $d['post']->slug)
        {
            $this->redirect("posts/view/id:$id/slug:" . $d['post']->slug, 301);
        }
        $this->set($d);
    }
}