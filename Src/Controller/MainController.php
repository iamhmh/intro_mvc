<?php

class MainController extends Controller
{
    public function view()
    {
        $this->loadModel('Post');
    }
}