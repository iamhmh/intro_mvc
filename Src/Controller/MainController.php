<?php

class MainController extends Controller
{
    public function view($nom)
    {
        echo "La page demandée est : " . $nom;
    }
}