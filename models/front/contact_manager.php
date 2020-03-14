<?php
//REQUIRE manager.php TO CONNECT TO DATABASE (db)
require_once ("models/front/manager.php");

//ADMIN CONTACT/MAIL PAGE
class MailsManager extends Manager
{
    //req to db(select) - gets mail's list in order to have it in admin view
    public function getMails()
    {
        $req = $this->db->query('SELECT id, user_name_contact, user_mail_contact, subject_contact, message_contact, status_mail_contact, DATE_FORMAT(date_contact, \'%d/%m/%Y à %Hh%imin%ss\') AS date_contact_fr FROM contact ORDER BY  id  DESC');
        $contactMails = $req->fetchAll();
        $req->closeCursor();
        return $contactMails;
    }    
        

    //to db (insert), save entries contact form
    public function postMail($nameContact, $mailContact, $subjectContact, $messageContact)
    {
        $mails = $this->db->prepare('INSERT INTO contact( user_name_contact, user_mail_contact, subject_contact, message_contact, date_contact ) VALUES (?, ?, ?, ?, NOW())');
        $affectedLines = $mails->execute(array($nameContact, $mailContact, $subjectContact, $messageContact));
        return $affectedLines; 
    }

    //Admin update db status mail, unread=>read
    public function adminUpdateMail($mailId)
    {       
        $updateMail = $this->db->prepare('UPDATE contact SET status_mail_contact = "read" WHERE id=? ' );
        return $updateMail->execute(array($mailId));
    }

    //Delete à mail
    public function deleteMail($mailId)
    {
        $deleteMail = $this->db->prepare('DELETE FROM contact WHERE id=? ');
        return $deleteMail->execute(array($mailId)); 
    }
    


}


