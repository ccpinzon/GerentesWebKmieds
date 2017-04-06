<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GeneralAssist
 *
 * @author Sergio
 */
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
