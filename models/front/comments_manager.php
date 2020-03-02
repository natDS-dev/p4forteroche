<?php

//**CONNECT DATABASE**
//Ask manager.php to connect to database (db)
require_once ("models/front/manager.php");

//**POST/CHAPTER PAGE "volume"** 
    
//ALL COMMENTS => req from db (select) : require all posts with the associated comments from db by id  
function getComments($chapterId)
{
    $db=dbConnect();
    $comments = $db->prepare('SELECT id,title_comment,author_comment,content_comment,statut_user_comment,chapters_id,DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\')
    AS date_comment_fr FROM comments  WHERE chapters_id = ? ORDER BY date_comment_fr DESC');
    $comments->execute(array($chapterId));
    return $comments->fetchAll();
}

//COMMENT FORM => to db (insert) : insert all comments(individually) added by the form into db 
function postComment($chapterId,$commentAuthor,$commentSubject,$commentContent)
{   
    $db=dbConnect();
    $comments = $db->prepare('INSERT INTO comments(chapters_id, author_comment,title_comment, content_comment, date_comment) VALUES(?, ?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($chapterId,$commentAuthor,$commentSubject,$commentContent));
    return $affectedLines;
}

//REPORT/SIGNAL COMMENT => to db (update) : update comment's statut
function reportComment($commentId)
{
    $db=dbConnect();
    $reportComment = $db->prepare('UPDATE comments SET statut_user_comment = "reported" WHERE id=? ' );
    return $reportComment->execute(array($commentId));
}

//to db (select) - Get the
//function postIdComment()








//POO CLASS ComManager