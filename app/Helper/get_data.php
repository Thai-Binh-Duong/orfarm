<?php

    function percent($a,$b){
        return round( abs((($b - $a)/$a)*100) );
    }

    function show_array($data){
        if( is_array($data) ){
            echo "<pre>";
            print_r($data);
            echo "<pre>";
        }else{
            return "Not Array";
        }
    }