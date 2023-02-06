<?php

class MainController extends Controller
{
    public function view($nom)
    {
        $this->set(array(
            'phrase' => 'Yo yo yo, c\'est moi le MainController',
            'nom' => 'John Doe'
        ));

        $this->render('index');
    }
}