<?php

class MainController extends Controller
{
    public function view($nom)
    {
        $this->render('index');
    }
}