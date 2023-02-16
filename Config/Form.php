<?php

class Form 
{
    public $controller;
    public $errors;

    public function __construct($controller)
    {
        $this->controller = $controller;
        
    }
    public function input($name, $label, $options = [])
    {
        $error = false;
        $classError = '';
        if(isset($this->errors[$name]))
        {
            $error = $this->errors[$name];
            $classError = ' error ';
        }
        if(!isset($this->controller->request->data->$name))
        {
            $value = '';
        }else 
        {
            $value = $this->controller->request->data->$name;
        }
        if($label == 'hidden')
        {
            return '<input type="hidden" name="'.$name.'" value="'.$value.'">';
        }

        $html = '<div class="clearfix '.$classError.' " >
                <label for="input'.$name.'">'.$label.'</label>
                    <div class="input"> ';

        $attr = ' ';

        // Pour parcourir le tableaux des options
        foreach($options as $k => $v)
        {
            if($k != 'type')
            {
              $attr .= "$k=\"$v\"";  
            }
        }

        // input simple
        if(!isset($options['type'])) 
        {
            $html .= ' <input type="text" name="'.$name.'" value="'.$value.'" id="input'.$name.'" '.$attr.'>';
        }      
        // text area
        elseif($options['type'] == 'textarea')
        {
            $html .= ' <textarea name="'.$name.'" id="input'.$name.'" '.$attr.'>'.$value.'</textarea>';
        } 
        elseif($options['type'] == 'checkbox')
        {
            $html .= '<input type="hidden" name="'.$name.'" value="0"> 
                          <input type="checkbox" name="'.$name.'" value="1" '.(empty($value)? '' : 'checked').'>';
        }   
        elseif($options['type'] == 'file')
        {
            $html .= ' <input type="file" name="'.$name.'" value="'.$value.'" id="input'.$name.'" '.$attr.'>';
        }
        elseif($options['type'] == 'password')
        {
            $html .= ' <input type="password" name="'.$name.'" value="'.$value.'" id="input'.$name.'" '.$attr.'>';
        }
        if($error)
        {
            $html .= ' <span class="help-inline"> ' .$error. ' </span>';
        }  
        $html .= '  </div>
                    </div>';
        return $html;
    }
}
//Tout le form.php peut se retrouver dans le fichier Model Contact du projet de grp (sauf s'il y a d'autres forms sur le site)