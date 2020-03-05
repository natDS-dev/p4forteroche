<?php
session_start();
//Ask the right controllers
require ('controllers/controllers.php');

if (isset($_GET['action'])) {
    $id=$_GET['id'];
   
    //action admin & connected ok
    if(strpos($_GET['action'],'admin') >=0 && adminConnected()) {
      
        if(function_exists($_GET['action'])){
            $_GET['action']($id);
           
        } else {
            adminShowError();
        }
        //action admin & connected not ok    
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
//Test param "action" and ask the right controller's function
/*try {
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
                showAdminHome();                
            break;      
            case 'adminMail':
                showListMails();   //revoir adresse page pour adresse page unique      
            break;
            case 'adminReadMail':
                if(isset($_GET['id']) && $_GET['id'] > 0 ) {
                   adminStatusMail ($_GET['id']);
                }   
            break;
            case 'adminPostsList':
                adminPostsList();
            break;
            case 'adminValidPost':
                if(isset($_GET['id']) && $_GET['id'] > 0 ) {
                    adminValidPost($_GET['id']);
                }
            break;
            case 'adminDraftPost':
                if(isset($_GET['id']) && $_GET['id'] > 0 ) {
                    adminToDraftPost($_GET['id']);
                }
            break;
            case 'adminDeletePost':
                if(isset($_GET['id']) && $_GET['id'] > 0 ) {
                    adminDeletePost($_GET['id']);
                }
            break;
            case 'adminCommentsList':
                adminCommentsList();
            break;
            case 'adminDeleteComment': 
                if(isset($_GET['id']) && $_GET['id'] > 0 ) {
                    adminDeleteComment($_GET['id']);
                }
            break;
            case 'adminConfirmComment': 
                if(isset($_GET['id']) && $_GET['id'] > 0 ) {
                    adminValidComment($_GET['id']);
                }
            break;
            case 'adminCreatePost':
                adminCreatePost();
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
}*/