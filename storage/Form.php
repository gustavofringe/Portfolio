<?php
namespace App;
use function debug;

class Form
{
    static $controller;
    static $errors= [];

    public function __construct($controller){
        self::$controller = $controller;
    }
    public static function open(){
        $form = "<form method='post'  enctype='multipart/form-data'>";
        echo $form;
    }
    public static function input($name,$label,$options = array()){
        $error = false;
        if(isset(self::$errors[$name])){
            $error = self::$errors[$name];
        }
        if(!isset(self::$controller->request->data->$name)){
            $value = '';
        }else{
            $value = self::$controller->request->data->$name;
        }
        $html = '<div class="'.$options['classDiv'].'"><label for="'.$name.'">'.$label.'</label>';
        if(!isset($options['type']) && !isset($options['options'])){
            $html .= '<input type="text" class='.$options['class'].' id="'.$name.'" name="'.$name.'" value="'.$value.'">';
        }elseif(isset($options['options'])){
            $html .= '<select id="'.$name.'" name="'.$name.'">';
            foreach($options['options'] as $k=>$v){
                $html .= '<option value="'.$k.'" '.($k==$value?'selected':'').'>'.$v.'</option>';
            }
            $html .= '</select>';
        }elseif($options['type'] == 'textarea'){
            $html .= '<textarea id="input'.$name.'" name="'.$name.'">'.$value.'</textarea>';
        }elseif($options['type'] == 'checkbox'){
            $html .= '<input type="hidden" class='.$options['class'].' name="'.$name.'" value="0"><input type="checkbox" name="'.$name.'" value="1" '.(empty($value)?'':'checked').'>';
        }elseif($options['type'] == 'file'){
            $html .= '<input type="file" class='.$options['class'].' class="input-file" id="'.$name.'" name="'.$name.'">';
        }elseif($options['type'] == 'password'){
            $html .= '<input type="password" class='.$options['class'].' id="'.$name.'" name="'.$name.'" value="'.$value.'">';
        }

        if($error){
            $html .= '<div class="alert alert-danger">'.$error.'</div>';
        }
        $html .= '</div>';
        echo $html;
    }
    public static function button(array $field){
        $form = "<button type=".$field['type']." class=".$field['class'].">".$field['name']."</button>";
        echo $form;
    }
    public static function close(){
        $form = "</form>";
        echo $form;
    }


    public static function csrfInput(){
        echo '<input type="hidden" value="' . $_SESSION['csrf']. '" name="csrf">';
    }
}
