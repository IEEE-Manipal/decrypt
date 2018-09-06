<?php
    function has_presence($value){
    return isset($value) && $value!=""; 
    }
    
    
    function is_more_min($value,$min){
    return strlen($value)>$min;	
    }
    
    function is_less_max($value,$max){
    return strlen($value)<=$max;	
    }
    
    function in_set($set, $value){
    return in_array($value, $set);
    }
    
    function error_report($erors=array()){
    $output="";
    if(!empty($erors)){
    	$output.= "Please fix the errors";
    	$output.= "<ul>";
        foreach ($erors as $key => $error) {
        	# code...
            $output.= "<li>";
            $output.= $error;
        }
        $output.= "</ul>";
    }
    	return $output;
    }