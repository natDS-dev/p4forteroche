<?php

//**CONNECT DATABASE**
//Ask manager.php to connect to database (db)
require_once ("models/front/manager.php");

class CommentsManager extends Manager
{
        //****FRONT****
    //**POST/CHAPTER PAGE "volume"**     
    //ALL COMMENTS => req from db (select) : require all posts with the associated comments from db by id  

    public function getComments($chapterId)
    {
        
        $comments = $this->db->prepare('SELECT id,title_comment,author_comment,content_comment,statut_user_comment,chapters_id,DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\')
        AS date_comment_fr FROM comments  WHERE chapters_id = ? ORDER BY id DESC');
        $comments->execute(array($chapterId));
        return $comments->fetchAll();
    }

    //COMMENT FORM => to db (insert) : insert all comments(individually) added by the form into db 
    public function postComment($chapterId,$commentAuthor,$commentSubject,$commentContent)
    {   
        $comments = $this->db->prepare('INSERT INTO comments(chapters_id, author_comment,title_comment, content_comment, date_comment) VALUES(?, ?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($chapterId,$commentAuthor,$commentSubject,$commentContent));
        return $affectedLines;
    }

    //REPORT/SIGNAL COMMENT => to db (update) : update comment's statut
    public function reportComment($commentId)
    {
        $reportComment = $this->db->prepare('UPDATE comments SET statut_user_comment = "reported" WHERE id=? ' );
        return $reportComment->execute(array($commentId));
    }

    public function getCommentChapId($commentId)
    {
        $chapterId = $this->db->prepare('SELECT chapters_id FROM comments WHERE id=?');
        $chapterId->execute(array($commentId));
        return $chapterId->fetch()['chapters_id'];
    }

    //***BACK***
    //to db (select) - Get all reported comments in order to have it in admin view
    public function getAdminComments($statutComment)
    {
        $req = $this->db->prepare('
            SELECT comments.id,title_comment,author_comment,content_comment,statut_user_comment,number_chapter,
                DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr
            FROM comments
            INNER JOIN chapters ON chapters.id=comments.chapters_id
            WHERE statut_user_comment =:statutComment  
            ORDER BY date_comment_fr DESC'
        );
        $req->execute(['statutComment'=>$statutComment]); 
       
        return $req->fetchAll();
    }

    public function adminEraseComment($commentId)
    {
        $deleteComment = $this->db->prepare('DELETE FROM comments WHERE id=? ' );
        return $deleteComment->execute(array($commentId));
    }

    public function adminValidComment($commentId)
    {
        $confirmComment = $this->db->prepare('UPDATE comments SET statut_user_comment = "validated" WHERE id=? ' );
        return $confirmComment->execute(array($commentId));
    }

}