<?php
session_start();
//Ask the right controllers
require ('controllers/controllers.php');

if (isset($_GET['action'])) {    
    $id = isset($_GET['id']) ? $_GET['id'] : 0;

    //action admin(control on "admin" word) + connected 
    if(strpos($_GET['action'],'admin') !==false && adminConnected()) {
        if(function_exists($_GET['action'])){
            $_GET['action']($id);
        } else {
            adminShowError();
        }
        //action admin but NOT connected => goes to login page   
    } elseif (strpos($_GET['action'],'admin') !==false  && !adminConnected()){
        showConnect();          
    //action front
    } else {
        if(function_exists($_GET['action'])){
            $_GET['action']($id);
        } else { 
            showError();
        }
    }
} else {
    showError();
}
