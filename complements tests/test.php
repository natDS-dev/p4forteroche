<!DOCTYPE html>
<html lang="fr">
    <?php require  ("views/includes/head.php"); ?>

<?php
///////////EXEMPLE SUR DEROULEMENT POUR RECUPERER CHAPITRES ET LES AFFICHER .FRONT SEULEMENT//////

//A PART
/*les variables dont j'aurais besoin pour tout le blog :*/
 
   ///Front///
 /*-liste des chapitres(posts ou billets) = $chapters (au singulier pour le foreach donc chapter)
    qui comprend : variables $chaptersId (=id que donne la bdd),$chaptersNumber, $chaptersTitles , $chaptersPicture, $chaptersContent, $chaptersDate
    issue de chapitres => liste des extraits = $extracts  (au singulier pour le foreach donc extract)
        qui comprend : variables $extractId (=id que donne la bdd),$chaptersNumber, $chaptersTitles , $chaptersPicture, $chaptersContent,$chaptersDate

 -liste des commentaires = $comments (au singulier pour le foreach donc comment)
    qui comprend : variables $commentsId (=id que donne la bdd),$commentsPseudo,$commentsTitles, $commentsSubjects , $commentsContent,$commentsDate
 
    ///back///
 -liste des messages via contact = $messages (au singulier pour le foreach donc message)
        qui comprend : variables $messagesId (=id que donne la bdd),$messagesTitles, $messagesSubjects , $messagesName, $messagesSurname,$messagesMail,$messagesDate
 
 -liste des commentaires = $comments (au singulier pour le foreach donc comment)
           qui comprend : variables $commentsId (=id que donne la bdd)  $commentsPseudo,$commentsTitles, $commentsSubjects , $commentsContent,$commentsDate, + $commentsSignal
 
 -liste des chapitres(posts ou billets) = $chapters (au singulier pour le foreach donc chapter)
            qui comprend : variables $chaptersId (=id que donne la bdd),$chaptersNumber, $chaptersTitles , $chaptersPicture, $chaptersContent, $chaptersDate
*/

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Déroulement
//1//- Connexion à la BDD :
                                    // =>CORRESPOND A manager.php situé dans MODELS 
try
{
	$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
}
//Gestion des erreurs
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
  require once('views/error_view.php');
}

//2//Récupération des données

                                //=>CORRESPOND A chapter_manager.php situé dans MODELS

/*a) je fais une requête à la base données et demande tous les champs de la table chapitre avec ordre par rapport au numéro de chapitre (pas l'id) */
$req = $db->query("SELECT * FROM chapters ORDER BY number_chapter");
while ($data = $req->fetch())
{
?>

                                <!--=>CORRESPOND A MES VIEWS : INCLUSION DES DONNEES DANS MES VIEWS--->
<!--b) dispatching des données-->

    <div class="content_text">
            <div class="content_extracts_chapters">
                <article>
                    <img src=" <?= ($data['picture_chapter']) ?> "/>   <!--là pfff je ne sais pas vu que mes images ne sont pas dans ma table -->
                    
                    <h3>
                    <?= htmlspecialchars($data['number_chapter']) ?>. <?= htmlspecialchars($data['title_chapter']) ; ?>
                    </h3>

                    <p>
                        <?=  nl2br(htmlspecialchars($data['content_chapter'])) ?> - <?=  nl2br(htmlspecialchars($data['date_chapter'])); ?> <!--comment gérer la date auto ??-->
                    </p>                    
                </article>
                <p>
                    <a href="">Retour</a> <!--COM PERSO : LIEN VERS PAGE LISTE EXTRAITS -->
                </p>             
            </div>
  
<?php
}
$req->closeCursor();
?>

