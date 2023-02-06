<?php

class MainController extends Controller
{
    public function view($nom)
    {
        $this->set(array(
            'phrase' => 'Yo yo yo, \'ssup',
            'nom' => 'John Doe'
        ));

        $this->render('index');
    }
}