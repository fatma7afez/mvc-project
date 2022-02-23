<?php 


function redirect($path , $dta = []){
    extract($dta);
    header("location: {$path}");
}

?>