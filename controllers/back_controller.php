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
//Get avalailable number chapter value => to create a list of availables numbers chapter + margin(+20)
function adminCreatePost()
{
    $pman = new PostsManager();
    $numbChapter = $pman->adminAllNumbChapter();
    $unavailableNumChap=[];
    foreach($numbChapter as $key=>$value){
        $unavailableNumChap[]=(int)$value['number_chapter'];
    }
    $maxChapter = end($unavailableNumChap)+20;
    require('views/admin_createpost_view.php');
}

//TinyMCE - test request return and add new post to db
function adminAddNewPost(){
    
    if (empty($_POST['input_tinymce_number']) || empty($_POST['input_tinymce_title']) || empty($_POST['mytextarea']) || empty($_POST['status'])){
       adminShowError();
       exit();
    } else {     
        $idPost = htmlspecialchars($_POST['idPost']);
        $numChap = htmlspecialchars($_POST['input_tinymce_number']);
        $titleChap = htmlspecialchars($_POST['input_tinymce_title']);
        $contChap = htmlspecialchars($_POST['mytextarea']);
        $pictChap = adminUploadPic($idPost);
        $statusChap = htmlspecialchars($_POST['status']);
        $pman = new PostsManager();
        if(empty($idPost)){
          
            if($pictChap === false){
                $pictChap="admin/undefined.jpg";
            } else {
                $pictChap = $idPost."_".$pictChap;
            }
           $affectLines = $pman->adminPostNewPost($_SESSION['id'], $numChap, $titleChap, $contChap, $pictChap, $statusChap);
        } else {
            
            $affectLines = $pman->adminUpdatePost($idPost, $numChap, $titleChap, $contChap, $pictChap, $statusChap);
            
        }
    }
    //test request return    
    if ($affectLines === false) {
       adminShowError();
    } else {
       header('Location: index.php?action=adminPostsList');
    }
}

function adminUploadPic($idPost)
{

    if (isset($_FILES['input_tinymce_url']) && $_FILES['input_tinymce_url']['error'] == 0){
      
        if ($_FILES['input_tinymce_url']['size'] <= 3000000)
        {
            $infosfile = pathinfo($_FILES['input_tinymce_url']['name']);
            $uploadExtension = $infosfile['extension'];
            $validExtension = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($uploadExtension, $validExtension))
            {   //confirm & save file 
                $fileName = $idPost."_". basename($_FILES['input_tinymce_url']['name']);
                move_uploaded_file($_FILES['input_tinymce_url']['tmp_name'], 'public/uploads/'. $fileName);
                return $fileName;
            }
        }
    } else {
        return false;
    }
}

function adminEditPost($id)
{
    $pman = new PostsManager();
    $editChapter = $pman->getOnePost($id);
    if($editChapter === false){
        adminShowError();
        exit();
    }
    $numbChapter = $pman->adminAllNumbChapter();
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



