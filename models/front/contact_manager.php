<?php

    //REQUIRE manager.php TO CONNECT TO DATABASE (db)
    require_once ("models/front/manager.php");

    //req to db(select) - gets mail's list in order to have it in admin view
    function getMails()
    {
        $db = dbConnect();
        $req = $db->query('SELECT id, user_name_contact, user_mail_contact, subject_contact, message_contact, DATE_FORMAT(date_contact, \'%d/%m/%Y à %Hh%imin%ss\') AS date_contact_fr FROM contact ORDER BY date_contact DESC');
        $contactMails = $req->fetchAll();
        $req->closeCursor();
        return $contactMails;
    }    
     

   //to db (insert) contact form
   function postMail($nameContact, $mailContact, $subjectContact, $messageContact)
    {
       
        $db=dbConnect();
        $mails = $db->prepare('INSERT INTO contact( user_name_contact, user_mail_contact, subject_contact, message_contact, date_contact ) VALUES (?, ?, ?, ?, NOW())');
        $affectedLines = $mails->execute(array($nameContact, $mailContact, $subjectContact, $messageContact));
        return $affectedLines; 
    }

   
