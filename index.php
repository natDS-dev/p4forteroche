<?php

//Ask the right controllers
require ('controllers/front_controller.php');
//require ('controllers/back_controller.php');


//Test param "action" and ask the right controller
if (isset($_GET['action'])) {

    if ($_GET['action'] == 'showHome'){
         showHome();
        }
    if ($_GET['action'] == 'showAuthor')  {
        showAuthor();
    }  

    if ($_GET['action'] == 'showListPosts') {
        showListPosts();
    } elseif ($_GET['action'] == 'showOnePost') {
        $chapterId = $_GET['id'];
        if (isset($_GET['id']) && $_GET['id'] > 0) {            
            showOnepost($chapterId);
        }
        //Show error page
        else {
            showError();
        }
    }
    else{
        showError();
    }
}
//Show extracts page
else{
    showListPosts();
}



