<?php

function dd($data)
{
    print_r(debug_backtrace());
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}