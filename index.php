<?php

session_start();
//Ask the right controllers
require ('controllers/front_controller.php');
//require ('controllers/back_controller.php');

//Test param "action" and ask the right controller's function
try {
    if (isset($_GET['action'])) {
        
        switch ($_GET['action']) {
            
            //Home page (whale symbol)
            case 'showHome':
                showHome();
            break;
            //Author page (L'auteur)
            case 'showAuthor':
                showAuthor();
            break;
            //Contact page (Le lien)
            case  'showContact':    
                showContact(); 
            break;
            //Connect page (heart symbol)
            case 'showConnect':
                showConnect();
            break;
            case 'adminVerify':
                adminVerify();
            break;
            case 'adminDisconnect':
                adminDisconnect();
            //All posts/extracts  (Les segments)
            case 'showListPosts':
                showListPosts();
            break;
            //One post/chapter (Le volume)
            case 'showOnePost':
                $chapterId = $_GET['id']; 
                if (isset($_GET['id']) && $_GET['id'] > 0 ) {                          
                    showOnepost($chapterId); 
                } 
            break;
            //Comment form
            case 'showComment':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    addComment($_GET['id']);
                }   
            break;
            //Reported comment  
            case 'toReportComment': 
                if(isset($_GET['id']) && $_GET['id'] > 0 ) {
                    if(isset($_GET['chapter_id']) && $_GET['chapter_id'] > 0) {
                        toReportComment($_GET['id'], $_GET['chapter_id']);
                    }
                }
            break;
            //Contact form
            case 'postMail':
                addMail();
            break;
            //BACK
            //List mails contact       
            case 'adminHome':
                showListMails();            
            break;
            default:
                showError();//!!!!REVOIR rajouter un if pour gestion erreur pour différencier les vues erreurs si connecté ou pas 
            break;
        }   
    } else {//Show extracts page
        showListPosts();
    }
}
catch(Exception $e) { 
    echo 'Erreur : ' . $e->getMessage();
    //!!!!rajouter un if pour gestion erreur pour différencier les vues erreurs si connecté ou pas 
    require('view/errorView.php');
}