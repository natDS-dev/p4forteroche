<?php
require ('models/front/posts_manager.php');
require ('models/front/comments_manager.php');
require ('models/front/contact_manager.php');

//**STATIC PAGES

//HOME PAGE whale picture (static)
function showHome()
{
    require ('views/home_view.php');
}

//AUTHOR PAGE "l'auteur" (static)
function showAuthor()
{
    require ('views/author_view.php');
}

//CONTACT PAGE "le lien" (static)
function showContact()
{
    require('views/contact_view.php');
}



//**DYNAMIC PAGES

//EXTRACT PAGE "segments"
// Get all posts datas from posts_manager.php and show all posts(chapters) in extract page (limited words) 
function showListPosts()
{
    $allPosts=getAllPosts();
    require ('views/extracts_view.php');
}

//POST/CHAPTER PAGE "volume"
// Get one post data + comments datas from posts_manager.php and show only the post(chapter) asked by the user with the linked comments  
function showOnePost($chapterId)
{
    $onePost=getOnePost($chapterId);
    $comments=getComments($chapterId); 
    if ($onePost === false)
    {
        showError();
    } else {
        $listNumbChapter = []; 
        foreach (getNumberChapter() as $getNumberchapter){
            $listNumbChapter[] = $getNumberchapter['id'];
        };
        $tempId= (string)$onePost['id'];
        $actualIndexChapter = array_search( $tempId, $listNumbChapter , true);
        $idPrev = null;
        if ($actualIndexChapter > 0 && count($listNumbChapter) > 1) { 
            $idPrev = $listNumbChapter[$actualIndexChapter - 1];
        }
        $idNext = null;
        if ($actualIndexChapter < count($listNumbChapter) - 1  && count($listNumbChapter) > 1) { 
            $idNext = $listNumbChapter[$actualIndexChapter + 1];
        }
        require ('views/chapters_view.php');
    }
}



//**COMMENTS**

//Comment form =>test request return + add comment to bdd
function addComment($chapterId,$commentAuthor,$commentSubject,$commentContent)
{
    $affectedLines = postComment($chapterId,$commentAuthor,$commentSubject,$commentContent);
    //test request return    
    if ($affectedLines === false) {
        showError();
    }
    else {
        header('Location: index.php?action=showOnePost&id=' . $chapterId);
    }
}


function toReportComment($commentId,$chapterId)
{
    $reportComment = reportComment($commentId);
    if($reportComment === false)
    {
        showError();
    }
    else{
       
        header('Location: index.php?action=showOnePost&id=' .$chapterId );

    }
}


//**CONTACT
//Mail list BACK
function showListMails()
   {
       $contactMails=getMails();
       require ('views/admin_view.php');
   }

//Contact form => test req return + add message to bdd
function addMail($nameContact, $mailContact, $subjectContact, $messageContact)
{ 
    $affectedLines = postMail($nameContact, $mailContact, $subjectContact, $messageContact);
    //test request return    
    if ($affectedLines === false) {
      
       showError();
    }
    else {
        require('views/contact_view.php');
    }
}


//ERROR PAGE
function showError()
{ 

    require_once ('views/error_view.php');
    
}

//DEFAULT PAGE

function defaultPage()
{
    require_once ('views/home_view.php');
}



//BACKKKKKKKKKKKKKKK
function showErrorAdmin()//METTRE DANS LE BACKKKKKK
{
    require_once('views/admin_error_view.php');
}