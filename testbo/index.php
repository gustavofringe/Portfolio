<?php
function palindrom($string){
    $string = str_replace(' ','',$string);
    $string = preg_replace('/[^0-9a-zA-Z\-]/','',$string);
    $string = strtolower($string);
    $reverse = strrev($string);
    if($string == $reverse){
        echo 'c un palindrome';
    }else{
        echo 'ce n\est pas un palindrome';
    }
}
if(isset($_POST['palin'])){
    palindrom($_POST['palin']);
}

function sort($person){
    shuffle($person);
    echo $person;
}

sort(['cindy','guillaume','donald','mickey','franck']);
?>
<form action="" method="post">
<input type="text" name="palin">
<button type="submit">palindrome</button>
</form>


<form action="" method="post">
<button type="submit">Tirage</button>
</form>