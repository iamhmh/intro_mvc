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
        $attr = ' ';
        foreach($options as $k => $v)
        {
            if($k != 'type')
            {
                $attr .= "$k=\"$v\"";
            }
        }
        if(!isset($options['type']))
        {
            $html .=    '   <input type="text" name="'.$name.'" value="'.$this->controller->request->data->$name.'" id="input'.$name.'" '.$attr.'>';
        }
        elseif($options['type'] = 'textarea')
        {
            $html .=    '   <textarea type="" name="'.$name.'" id="input'.$name.'" '.$attr.'>'.$this->controller->request->data->$name.'</textarea>';
        }
        $html .=    '</div>
                    </div>';
        return $html;
    }
}