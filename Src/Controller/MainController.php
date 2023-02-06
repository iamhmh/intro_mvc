<?php

class MainController extends Controller
{
    public function view($nom)
    {
        $this->set('nom', $nom); // 'nom' is the key, $nom is the value

        $this->render('index');
    }
}