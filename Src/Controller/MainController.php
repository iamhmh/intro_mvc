<?php

class MainController extends Controller
{
    public function view($nom)
    {
        $this->vars['string'] = 'Hello from the otherside';

        $this->render('index');
    }
}