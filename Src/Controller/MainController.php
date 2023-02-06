<?php

class MainController extends Controller
{
    public function view($nom)
    {
        $text = 'Hello from the otherside';
        
        $this->render('index');
    }
}