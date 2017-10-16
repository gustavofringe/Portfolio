<?php
namespace App;
class Form
{
    public static function open(){
        $form = "<form method='post'  enctype='multipart/form-data'>";
        echo $form;
    }
    public static function input(array $field, $fields)
    {
        $form = "<div class=".$field['div'].">";
        $form .= "<label for=".$fields.">".$field['label']."</label>";
        $form .= "<input type=".$field['type']." class=".$field['class']." id=".$fields." placeholder=".$fields." name=".$fields.">";
        $form .= "</div>";
        echo $form;
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
