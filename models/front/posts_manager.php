<?php

//REQUIRE manager.php TO CONNECT TO DATABASE (db)
require_once ("models/front/manager.php");
    
//req to db(select) - gets chapter's/post's list in order to produce the extracts/list posts (limited string in the controller)
// requête à la db -obtenir la liste des chapitres avec contenu pour construire les extraits (limite de mots dans le controller) 
function getAllPosts()
{
    $db = dbConnect();
    $req = $db->query('SELECT id,number_chapter,title_chapter,content_chapter,picture_chapter,status_chapter,DATE_FORMAT(date_chapter, \'%d/%m/%Y à %Hh%imin%ss\') AS date_chapter_fr FROM chapters WHERE status_chapter = "published" ORDER BY number_chapter ');
    $allPosts = $req->fetchAll();
    $req->closeCursor();
    return $allPosts;
}

//req to db(select) - gets the corresponding post/chapter by clicking on an extract
//requête à la db - obtenir le bon chapitre en cliquant sur un extrait  
function getOnePost($chapterId)
{
    $db=dbConnect();
    $req = $db->prepare('SELECT id,number_chapter,title_chapter,content_chapter,picture_chapter,status_chapter,DATE_FORMAT(date_chapter, \'%d/%m/%Y à %Hh%imin%ss\')
    AS date_chapter_fr  FROM chapters WHERE id = ? AND status_chapter = "published"');
    $req->execute(array($chapterId));
    $onePost = $req->fetch();
    $req->closeCursor();
    return $onePost;
}

//req to db(select) - gets chapter's number
function getNumberChapter()  
{
    $db = dbConnect();
    $req = $db->query('SELECT id FROM chapters WHERE status_chapter = "published" ORDER BY number_chapter ');
    $listNumbChapter = $req->fetchAll();
    $req->closeCursor();
    return $listNumbChapter;
}  
//POO : class PostManager

//***BACK***

function getAdminPosts($statusPost)
{
    $db = dbConnect();
    $req = $db->query('SELECT id,number_chapter,title_chapter,content_chapter,status_chapter,DATE_FORMAT(date_chapter, \'%d/%m/%Y à %Hh%imin%ss\')
    AS date_chapter_fr  FROM chapters WHERE status_chapter = "' . $statusPost . '" ORDER BY date_chapter_fr DESC');
    return $req->fetchAll();
}

function adminErasePost($chapterId)
{
    $db=dbConnect();
    $deletePost = $db->prepare('DELETE FROM chapters WHERE id=? ' );
    return $deletePost->execute(array($chapterId));
}

   
    




   
        