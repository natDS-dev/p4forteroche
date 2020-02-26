<?php
require ('models/front/posts_manager.php');
require ('models/front/comments_manager.php');

//STATIC PAGES

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


//DYNAMIC PAGES

//EXTRACT PAGE "segments"
// Get all posts datas from posts_manager.php and show all posts(chapters) in extract page (limited words) 
function showListPosts()
{
    $allPosts=getAllPosts();
    require ('views/extracts_view.php');
}

//********************************POST/CHAPTER PAGE "volume"*************************
// Get one post data + comments datas from posts_manager.php and show only the post(chapter) asked by the user with the linked comments  
function showOnePost()
{
    $onePost=getOnePost($_GET['id']);
    $comments=getComments($_GET['id']);
    if ($onePost === false)
    {
        require ('views/error_view.php');
    }
    else{

    }
    require ('views/chapters_view.php');
    
}

//Comment form =>test request return + add comment to bdd
function addComment($chapterId,$commentAuthor,$commentSubject,$commentContent)
{
    $commentLines = postComment($chapterId,$commentAuthor,$commentSubject,$commentContent);
    //test request return    
    if ($commentLines === false) {
        die('Oups, votre commentaire n\'a pas pu être ajouté');
    }
    else {
        header('Location: index.php?action=showOnePost&id=' . $chapterId);
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

