<?php

//REQUIRE manager.php TO CONNECT TO DATABASE (db)
require_once ("models/front/manager.php");

class PostsManager extends Manager
{
    //EXTRACTS(segments)
    //req to db(select) - gets chapter's/post's list in order to produce the extracts/list posts (limited string in the controller)
    public function getAllPosts()
    {
        $req = $this->db->query('SELECT id,number_chapter,title_chapter,content_chapter,picture_chapter,status_chapter,DATE_FORMAT(date_chapter, \'%d/%m/%Y à %Hh%imin%ss\') AS date_chapter_fr FROM chapters WHERE status_chapter = "published" ORDER BY number_chapter ');
        $allPosts = $req->fetchAll();
        $req->closeCursor();
        return $allPosts;
    }

    //POST (volume)
    //req to db(select) - gets the corresponding post/chapter by clicking on an extract
    public function getOnePost($chapterId)
    {
        $req = $this->db->prepare('SELECT id,number_chapter,title_chapter,content_chapter,picture_chapter,status_chapter,DATE_FORMAT(date_chapter, \'%d/%m/%Y à %Hh%imin%ss\')
        AS date_chapter_fr  FROM chapters WHERE id = ? AND status_chapter = "published"');
        $req->execute(array($chapterId));
        $onePost = $req->fetch();
        $req->closeCursor();
        return $onePost;
    }


    //req to db(select) - gets chapter's/post number
    public function getNumberChapter()  
    {
        $req = $this->db->query('SELECT id FROM chapters WHERE status_chapter = "published" ORDER BY number_chapter ');
        $listNumbChapter = $req->fetchAll();
        $req->closeCursor();
        return $listNumbChapter;
    }  
    //POO : class PostManager

    //***BACK***

    //ADMIN HOME QUICK VIEW
    // To db select & count - Get & count values of  posts/reported comments/unread mails  
    public function adminHomeValues()
    {
        $data=[];
        $req =$this->db->query ('SELECT COUNT(*) as nbPost FROM chapters WHERE status_chapter = "published"');
        $data['nbPost'] = $req->fetch()['nbPost'];
        $req =$this->db->query ('SELECT COUNT(*) as nbDraftPost FROM chapters WHERE status_chapter = "draft"');
        $data['nbDraft'] = $req->fetch()['nbDraftPost'];
        $req =$this->db->query ('SELECT COUNT(*) as nbUnreadMails FROM contact WHERE status_mail_contact = "unread"');
        $data['nbUnreadMails'] = $req->fetch()['nbUnreadMails'];
        $req =$this->db->query ('SELECT COUNT(*) as nbValidCom FROM comments WHERE statut_user_comment = "posted"');
        $data['nbValidCom'] = $req->fetch()['nbValidCom'];
        $req =$this->db->query ('SELECT COUNT(*) as nbReportedCom FROM comments WHERE statut_user_comment = "reported"');
        $data['nbReportedCom'] = $req->fetch()['nbReportedCom'];
        return $data;
    }


    //ADMIN POST
    //select from db - get post by status (posted/reported/validated)
    /*function adminToSavePublish()
    {
        $db=dbConnect();
        $createPost = $db->prepare('INSERT INTO chapters(author_comment,title_comment, content_comment, date_comment) VALUES(?, ?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($chapterId,$commentAuthor,$commentSubject,$commentContent));
        return $affectedLines;
    }*/

    public function getAdminPosts($statusPost)
    {
        $req = $this->db->query('SELECT id,number_chapter,title_chapter,content_chapter,status_chapter,DATE_FORMAT(date_chapter, \'%d/%m/%Y à %Hh%imin%ss\')
        AS date_chapter_fr  FROM chapters WHERE status_chapter = "' . $statusPost . '" ORDER BY date_chapter_fr DESC');
        return $req->fetchAll();
    }

    //Erase from db - erase a post and associated comments
    public function adminErasePost($postId)
    {
        $deletePost = $this->db->prepare('DELETE FROM chapters WHERE id=? ' );
        $deletePost->execute(array($postId));
        $deleteComment = $this->db->prepare('DELETE FROM comments WHERE chapters_id=? ' );
        $deleteComment->execute(array($postId));
        return ($deletePost && $deleteComment);
    }

    //Update db - draft post => published/validated post
    public function adminPublishPost($postId)
    {
        $publishPost = $this->db->prepare('UPDATE chapters SET status_chapter = "published" WHERE id=? ' );
        return $publishPost->execute(array($postId));
    }
    
    //Update db - published/validated post => draft post
    public function adminToDraftPost($postId)
    {
        $draftPost = $this->db->prepare('UPDATE chapters SET status_chapter = "draft" WHERE id=? ' );
        return $draftPost->execute(array($postId));
    }

    public function adminAllNumbChapter()
    {
        $req = $this->db->query('SELECT number_chapter FROM chapters ORDER BY number_chapter ');
        $numbChapter = $req->fetchAll();
        $req->closeCursor();
        return $numbChapter;
    }
 
}
