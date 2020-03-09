<?php


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
    $pman = new PostsManager();
    $allPosts = $pman->getAllPosts();
    require('views/extracts_view.php');
}

//POST/CHAPTER PAGE "le volume"
// Get one post data + comments datas from posts_manager.php and show only the post(chapter) asked by the user with the linked comments  
function showOnePost($chapterId)
{  
    $cm = new CommentsManager();
    $pman = new PostsManager();
    $onePost= $pman->getOnePost($chapterId);
    $comments= $cm->getComments($chapterId); 
    if ($onePost === false || $onePost['status_chapter'] === "draft")
    {
        showError();
        exit();
    } else {
        $listNumbChapter = []; 
        foreach ($pman->getNumberChapter() as $getNumberchapter){
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
//Comment form =>test request return + add comment to db
function addComment($chapterId)
{
    if (empty($_POST['comment_pseudo']) || empty($_POST['comment_subject']) || empty($_POST['comment_content'])){
        showError();
    } else {       
        $commentAuthor = htmlspecialchars($_POST['comment_pseudo']);
        $commentSubject = htmlspecialchars($_POST['comment_subject']);
        $commentContent = htmlspecialchars($_POST['comment_content']);
        $cm = new CommentsManager();
        $affectedLines = $cm->postComment($chapterId, $commentAuthor, $commentSubject, $commentContent);
    }
    //test request return    
    if ($affectedLines === false) {

        showError();
    } else {
        header('Location: index.php?action=showOnePost&id=' . $chapterId);
    }
}

//Report/signal comment
function toReportComment($commentId)
{
    $cm = new CommentsManager();
    $reportComment = $cm->reportComment($commentId);
    if($reportComment === false)
    {
        showError();
    }
    else{
        $chapterId = $cm->getCommentChapId($commentId);
        header('Location: index.php?action=showOnePost&id=' .$chapterId );
    }
}

//CONTACT PAGE
//Contact form => test req return + add message to bdd
function addMail() 
{ 
    if (!empty($_POST['contact_name']) && !empty($_POST['contact_mail']) && !empty($_POST['contact_subject']) && !empty($_POST['contact_content'])){
        $mn= new MailsManager();
        $nameContact =  htmlspecialchars($_POST['contact_name']);
        $mailContact = htmlspecialchars($_POST['contact_mail']);
        $subjectContact = htmlspecialchars($_POST['contact_subject']);
        $messageContact = htmlspecialchars($_POST['contact_content']);
        $affectedLines = $mn->postMail($nameContact, $mailContact, $subjectContact, $messageContact);
    } else {
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
function connectVerify()
{   
    $cman= new ConnectManager();
    $login = $_POST['login'];    
    $adminInfos = $cman->adminInfosConnect($login);
    if (!empty($_POST['login']) && !empty($_POST['password']))
    {   //compare password entry with db hashed password 
        $correctPassword = password_verify($_POST['password'], $adminInfos['password']);
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




