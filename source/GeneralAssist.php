<?php

class GeneralAssist {
    
    function IsPrime($n){
        for($x=2; $x<$n; $x++){
             if($n%$x==0){
                   return false;
             }
        }
      return true;
    }
    
}
