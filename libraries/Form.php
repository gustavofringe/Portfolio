<?php
namespace App;
class Form
{
    public static function open(){

    }
    public static function input(array $field, $fields)
    {
        $form = "<div class=".$field['div'].">";
        $form .= "<label for=".$fields.">".$field['label']."</label>";
        $form .= "<input type=".$field['type']." class=".$fields." id=".$fields." placeholder=".$fields." name=".$fields."></div>";
        return $form;
    }
}
