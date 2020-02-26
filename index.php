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

    if ($_GET['action'] == 'showContact')  {
        showContact(); 
    }  
    



    if ($_GET['action'] == 'showListPosts') {
        showListPosts();

    }

    
    elseif ($_GET['action'] == 'showOnePost') {
        $chapterId = $_GET['id']; 
        if (isset($_GET['id']) && $_GET['id'] > 0 ) {
              
                           
            showOnepost($chapterId);
            
        } 

        //Show error page
        else {
            showError();
        }
    }

    elseif ($_GET['action'] == 'showComment') {
        
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['comment_pseudo']) && !empty($_POST['comment_subject']) && !empty($_POST['comment_content']) ) {
                addComment($_GET['id'], $_POST['comment_pseudo'], $_POST['comment_subject'],$_POST['comment_content']);
            }
            else {
                echo 'Erreur : les champs ne sont pas tous complétés'; //gérer vue
            }
        }
        else {
            echo 'Erreur : indentifiant post inconnu ';
        }
    }

    else {
        showError();
    }



    
}
//Show extracts page
else{
    showListPosts();
}



