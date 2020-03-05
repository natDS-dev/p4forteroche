<?php
require('models/front/posts_manager.php');
require('models/front/comments_manager.php');
require('models/front/contact_manager.php');
require('models/front/connect_manager.php');

//**STATIC PAGES**

//HOME PAGE whale picture (static)
function showHome()
{
    require('views/home_view.php');
}

//AUTHOR PAGE "l'auteur" (static)
function showAuthor()
{
    require('views/author_view.php');
}

//CONTACT PAGE "le lien" (static)
function showContact()
{
    require('views/contact_view.php');
}

//CONNECT PAGE heart picture
function showConnect()
{
    require('views/connect_view.php');
}

//**DYNAMIC PAGES**

//EXTRACT PAGE "les segments"
// Get all posts datas from posts_manager.php and show all posts(chapters) in extract page (limited words) 
function showListPosts()
{
    $allPosts = getAllPosts();
    require('views/extracts_view.php');
}

//POST/CHAPTER PAGE "le volume"
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
//Comments
//Comment form =>test request return + add comment to bdd
function addComment($chapterId)
{
    if (empty($_POST['comment_pseudo']) || empty($_POST['comment_subject']) || empty($_POST['comment_content'])){
        showError();
    } else {       
        $commentAuthor = htmlspecialchars($_POST['comment_pseudo']);
        $commentSubject = htmlspecialchars($_POST['comment_subject']);
        $commentContent = htmlspecialchars($_POST['comment_content']);
        $affectedLines = postComment($chapterId, $commentAuthor, $commentSubject, $commentContent);
    }
    //test request return    
    if ($affectedLines === false) {
        showError();
    } else {
        header('Location: index.php?action=showOnePost&id=' . $chapterId);
    }
}

//Report/signal comment
function toReportComment($commentId, $chapterId)
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

//CONTACT PAGE
//Contact form => test req return + add message to bdd
function addMail()
{ 
    if (!empty($_POST['contact_name']) && !empty($_POST['contact_mail']) && !empty($_POST['contact_subject']) && !empty($_POST['contact_content'])){
        $nameContact = htmlspecialchars($_POST['contact_name']);
        $mailContact = htmlspecialchars($_POST['contact_mail']);
        $subjectContact = htmlspecialchars($_POST['contact_subject']);
        $messageContact = htmlspecialchars($_POST['contact_content']);
        $affectedLines = postMail($nameContact, $mailContact, $subjectContact, $messageContact);
    } else {
        var_dump($affectedLines);
        showError();
    }
    //test request return    
    if ($affectedLines === false) {
        showError();
    } else {
        require('views/contact_view.php');
    }
}

//CONNECT PAGE 
//Check entry login & password
function adminVerify()
{ 
    $login = $_POST['login'];    
    $adminInfos = adminConnect($login);
    if (!empty($_POST['login']) && !empty($_POST['password']))
    {   //compare password entry with db hashed password 
        $correctPassword=password_verify($_POST['password'], $adminInfos['password']);
        if(!$adminInfos || !$correctPassword){
            //echo "mauvais identifiants";
        } else {            
            $_SESSION['id'] = $adminInfos['id'];
            $_SESSION['login'] = $login;
            header('Location: index.php?action=adminHome');
        }
    } else {
        //echo "Veuillez remplir les champs";
    }
}

function adminConnected()
{
    return  isset( $_SESSION['id'] );
}

/*function sessionLog()
{   
    if (isset($_SESSION['id']) && isset($_SESSION['login']))
    {
       echo 'Bonjour '.$_SESSION['login'];
    }
}*/

//ERROR PAGE
function showError()
{ 
    require_once('views/error_view.php');
}

//DEFAULT PAGE

function defaultPage()
{
    require_once('views/home_view.php');
}

//***********BACK********
//ADMIN HOME - QUICK VIEW
//Quick values : number of published & draft posts  , unread mails, reported comments 
function showAdminHome()
{   
    $data=adminHomeValues();
    require_once('views/admin_home_view.php');
}
//Disconnect from admin page
function adminDisconnect()
{
    unset($_SESSION['id']);
    unset($_SESSION['login']);
    header('Location: index.php?action=showConnect');
}


//ADMIN POST
//Post by status
function adminLPostsList()
{
    $publishedPosts = getAdminPosts("published");
    $draftPosts = getAdminPosts("draft");
    require('views/admin_post_view.php');
}
//Delete a post
function adminDeletePost($id)
{
    adminErasePost($id);
    header('Location: index.php?action=adminPostsList');
}
//Valid & publish a draft post
function adminValidPost($id)
{
    adminPublishPost($id);
    header('Location: index.php?action=adminPostsList');
}
//Change status of a published post , published to draft
function adminToDraftPost($id)
{
    adminDraftPost($id);
    header('Location: index.php?action=adminPostsList');
}


//ADMIN COMMENTS
//comment list by status
function adminCommentsList()
{   
   $postedComments = getAdminComments("posted");
   $reportedComments = getAdminComments("reported");
   $validatedComments = getAdminComments("validated");
   require('views/admin_comment_view.php');
}

function adminDeleteComment($id)
{
    adminEraseComment($id);
    header('Location: index.php?action=adminCommentsList');
    
}

function adminValidComment($id)
{
    adminConfirmComment($id);
    header('Location: index.php?action=adminCommentsList');
}



//ADMIN CONTACT 
//Mail list 
function showListMails()
{
   $contactMails=getMails();
   require ('views/admin_mail_view.php');
}

function adminStatusMail($id)
{
    adminUpdateMail($mailId);
    header('Location: index.php?action=adminMail');
}


//ADMIN CREATE POST
//

function adminCreatePost()
{
    require('views/admin_createpost_view.php');
}



//ERROR ADMIN PAGE
function showErrorAdmin()
{
    require_once('views/admin_error_view.php');
}



