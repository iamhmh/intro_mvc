<?php

class Form
{
    public $controller;
    public function __construct($controller)
    {
        $this->controller = $controller;
    }
    public function input($name, $label)
    {
        echo '<div class="clearfix">
                <label for="input'.$name.'">'.$label.'</label>
                <div class="input">
                    <input type="text" name="'.$name.'" value="" id="input'.$name.'">
                </div>
            </div>';
    }
}