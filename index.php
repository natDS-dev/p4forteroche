<?php

//Ask the right controllers
require ('controllers/front_controller.php');
//require ('controllers/back_controller.php');


//Test param "action" and ask the right controller's function
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
                if (!empty($_POST['comment_pseudo']) && !empty($_POST['comment_subject']) && !empty($_POST['comment_content'])){
                    addComment($_GET['id'], htmlspecialchars($_POST['comment_pseudo']), htmlspecialchars($_POST['comment_subject']),htmlspecialchars($_POST['comment_content']));
                }
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
            if (!empty($_POST['contact_name']) && !empty($_POST['contact_mail']) && !empty($_POST['contact_subject']) && !empty($_POST['contact_content'])){
                addMail(htmlspecialchars($_POST['contact_name']) ,htmlspecialchars($_POST['contact_mail']),htmlspecialchars($_POST['contact_subject']), htmlspecialchars($_POST['contact_content']));
            }
        break;
        //BACK
        //List mails contact       
        case 'adminHome':
            showListMails();            
        break;
        default:
            showError();
        break;
    
    }   
} else {//Show extracts page
    showListPosts();
}



