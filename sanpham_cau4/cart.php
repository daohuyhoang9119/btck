<?php
session_start();

if(!isset($_SESSION["cart"])){
    $_SESSION["cart"]= array();
}
if(isset($get['action'])){
    switch($_GET['action']){
            case"add":
               var_dump($_POST);exit; 
               foreach($_POST['num'] as $id=$num){
                   $_SESSION["cart"][$id]=$num;
               }
                break;
    }
    // if()
    
}

?>