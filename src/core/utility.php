<?php
//------------------------------------------------------------------------------
function call_date(){
    $date = date("Y-m-d");
    return $date;
}
//------------------------------------------------------------------------------
function call_time(){    
    $time = date("H:i:s");
    return $time;
}
//------------------------------------------------------------------------------
function call_datetime(){    
    $time = date("Y-m-d H:i:s");
    return $time;
}
//------------------------------------------------------------------------------
function call_dateYear(){
    $date = date("Y");
    return $date;
}
//------------------------------------------------------------------------------
function return_date($datetime){
    $datetime = new DateTime($datetime);
    $date = $datetime->format('Y-m-d');
    return $date;
}
//------------------------------------------------------------------------------
function get_date($datetime){
    $datetime = new DateTime($datetime);
    $date = $datetime->format('d-m-Y');
    return $date;
}
//------------------------------------------------------------------------------
function return_datetime($datetime){
    $datetime = new DateTime($datetime);
    $date = $datetime->format('d-m-Y H:i:s');
    return $date;
}
//------------------------------------------------------------------------------
function returnformat_date($datetime){
    $datetime = new DateTime($datetime);
    $date = $datetime->format('d-M-Y');
    return $date;
}
//------------------------------------------------------------------------------
function return_time($datetime){
    $datetime = new DateTime($datetime);
    $time = $datetime->format('H:i:s');
    return $time;
}
//------------------------------------------------------------------------------
function formate_time($time){
    $time = date("g:i a", strtotime("$time"));
    return $time;
}
//------------------------------------------------------------------------------
function setSession($session_name,$session_value){
    $_SESSION["$session_name"] = $session_value;
}
//------------------------------------------------------------------------------
function getSession($session_name){
    if(isset($_SESSION["$session_name"]))
        return $_SESSION["$session_name"];
    else
        return '';
}
//------------------------------------------------------------------------------
function unsetSession($session_name){
    unset($_SESSION["$session_name"]);
}
