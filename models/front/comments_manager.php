<?php

   //Front

    //REQUIRE manager.php TO CONNECT TO DATABASE (db)
    require_once ("models/front/manager.php");

    //********POST/CHAPTER PAGE "volume" => GET THE RIGHT POST/CHAPTER WITH HIS ATTACHED COMMENTS*****/
    
    //req from db (select) : require all post's associated comments from db by id  
    function getComments($chapterId)
    {
        $db=dbConnect();
        $comments = $db->prepare('SELECT id,title_comment,author_comment,content_comment,chapters_id,DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\')
        AS date_comment_fr FROM comments  WHERE chapters_id = ? ORDER BY date_comment_fr DESC');
        $comments->execute(array($chapterId));

        return $comments;
    }

    //Comment form
    //to db (insert) : insert all comments(individually) added by the form into db 
    function postComment($chapterId,$commentAuthor,$commentSubject,$commentContent)
{   
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(chapters_id, author_comment,title_comment, content_comment, date_comment) VALUES(?, ?, ?, ?, NOW())');
    var_dump($comments);
    $commentLines = $comments->execute(array($chapterId,$commentAuthor,$commentSubject,$commentContent));

    return $commentLines;
}

    //to db (insert)
    function reportComments()
    {
        $db=dbConnect();

    }






//POO CLASS ComManager