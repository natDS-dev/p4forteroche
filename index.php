<?php

//Ask the right controllers
require ('controllers/front_controller.php');
//require ('controllers/back_controller.php');


//Test param "action" and ask the right controller's function
if (isset($_GET['action'])) {

    //Home page (whale symbol)
    if ($_GET['action'] == 'showHome') {
         showHome();
    }

    //Author page (L'auteur)
    if ($_GET['action'] == 'showAuthor') {
        showAuthor();
    }  

    //Contact page (Le lien)
    if ($_GET['action'] == 'showContact') {
        showContact(); 
    } 

    //All posts/extracts  (Les segments) 
    if ($_GET['action'] == 'showListPosts') {
        showListPosts();
    }

    //One post/chapter (Le volume)
    if ($_GET['action'] == 'showOnePost') {
        $chapterId = $_GET['id']; 
        if (isset($_GET['id']) && $_GET['id'] > 0 ) {                          
            showOnepost($chapterId);            
        } else { // Show error page
            showError();
        }    
    }

    //Comment form
    if ($_GET['action'] == 'showComment') {
        
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['comment_pseudo']) && !empty($_POST['comment_subject']) && !empty($_POST['comment_content'])){
                addComment($_GET['id'], $_POST['comment_pseudo'], $_POST['comment_subject'], $_POST['comment_content']);
            } else {
                showError(); 
            }           
        }        
    }


    //Reported comment
    elseif($_GET['action'] == 'toReportComment') {

        if(isset($_GET['id']) && $_GET['id'] > 0 ) {
            if(isset($_GET['chapter_id']) && $_GET['chapter_id'] > 0) {
            toReportComment($_GET['id'], $_GET['chapter_id']);
            }
        }
    } else {
        showError();
    }
//EXTRAIRE LIST ESPISODE ID PUIS TABLEAU ET  IF VUES


    
}
//Show extracts page
else{
    showListPosts();
}



