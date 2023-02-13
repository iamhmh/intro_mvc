<?php

class Form
{
    public $controller;
    public function __construct($controller)
    {
        $this->controller = $controller;
    }
    public function input($name, $label, $options = [])
    {
        $html = '<div class="clearfix">
                    <label for="input'.$name.'">'.$label.'</label>
                    <div class="input">';
        if(!isset($options['type']))
        {
            $html .=    '   <input type="text" name="'.$name.'" value="'.$this->controller->request->data->$name.'" id="input'.$name.'">';
        }
        elseif($options['type'] = 'textarea')
        {
            $html .=    '   <textarea type="" name="'.$name.'" id="input'.$name.'">'.$this->controller->request->data->$name.'</textarea>';
        }
        $html .=    '</div>
                    </div>';
        return $html;
    }
}