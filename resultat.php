<?php
var_dump($_POST);
$i = 0;
foreach($_POST as $cle => $val){
    echo "A la question $cle tu a repondu $val<br>"; 
    $i++;
}
?>