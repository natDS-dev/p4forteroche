<?php
//ADMIN HOME - QUICK VIEW
//Quick values : number of published & draft posts  , unread mails, reported comments 
function adminHome()
{   $pman = new PostsManager();
    $data= $pman->adminHomeValues();
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
/*function adminSavePublish()
{

}*/




//Posts by status
function adminPostsList()
{
    $pman = new PostsManager();
    $publishedPosts = $pman->getAdminPosts("published");
    $draftPosts = $pman->getAdminPosts("draft");
    require('views/admin_post_view.php');
}
//Delete a post
function adminDeletePost($id)
{
    $pman = new PostsManager();
    $pman->adminErasePost($id);
    header('Location: index.php?action=adminPostsList');
}
//Valid & publish a draft post
function adminValidPost($id)
{
    $pman = new PostsManager();
    $pman->adminPublishPost($id);
    header('Location: index.php?action=adminPostsList');
}
//Change status of a published post , published to draft
function adminDraftPost($id)
{
    $pman = new PostsManager();
    $pman->adminToDraftPost($id);
    header('Location: index.php?action=adminPostsList');
}

//ADMIN COMMENTS
//comment list by status
function adminCommentsList()
{  
   $cm = new CommentsManager(); 
   $postedComments = $cm->getAdminComments("posted");
   $reportedComments = $cm->getAdminComments("reported");
   $validatedComments = $cm->getAdminComments("validated");
   require('views/admin_comment_view.php');
}

//Delete comment
function adminDeleteComment($id)
{
    $cm = new CommentsManager();
    $cm->adminEraseComment($id);
    header('Location: index.php?action=adminCommentsList');
}

//Validate & publish comment
function adminConfirmComment($id) 
{
    $cm = new CommentsManager();
    $cm->adminValidComment($id);
    header('Location: index.php?action=adminCommentsList');
}

//ADMIN CONTACT 
//Mail list 
function adminMail()
{
   $mn= new MailsManager(); 
   $contactMails=$mn->getMails();
   require ('views/admin_mail_view.php');
}
/* $contactMails=(new MailsManager())->getMails();*/

//Change status mail (unread to read)
function adminReadMail($id)
{
    $mn= new MailsManager();
    $mn->adminUpdateMail($id);
    header('Location: index.php?action=adminMail');
}

function adminDeleteMail($id)
{
    $mn= new MailsManager();
    $mn->deleteMail($id);
    header('Location: index.php?action=adminMail');
}


//ADMIN CREATE POST
//Create a post with right number chapter value
function adminCreatePost()
{
    $numbChapter = adminAllNumbChapter();
    $unavailableNumChap=[];
    foreach($numbChapter as $key=>$value){
        $unavailableNumChap[]=(int)$value['number_chapter'];
    }
    $maxChapter = end($unavailableNumChap)+20;
    require('views/admin_createpost_view.php');
}

//ERROR ADMIN PAGE
function adminShowError()
{
    require_once('views/admin_error_view.php');
}



