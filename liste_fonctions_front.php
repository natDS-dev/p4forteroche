<?php
// manager.php  dans MODELS :  Connexion à la BDD
try
{ 
	$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
}
//Gestion des erreurs
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
  require ('views/error_view.php');
}

// sans fermerture normalement ?> 


<!------------------------------------------------------------------------>

<?php
//extract_manager.php  dans MODELS :  récupération de TOUS les chapitres en entier => pour gérer les extraits.En fait extract_manager doit être "=" à chapters_manager - limitation de mots
function getChapters(){
    

$req = $db->query("SELECT * FROM chapters ORDER BY number_chapter");

return $req;

}
// sans fermerture normalement  ?>

            <?php
            $chapters=getChapters();
        while ($data = $chapters->fetch())
        {
        ?>
            <div class="content_text">
            <div class="content_extracts_chapters">
                <article>
                    <!--***DYNAMIC TITLE PICTURE AND INFO***-->
                                         <!---COM PERSO : penser "for each"--->
                    <img/>    
                    <h3><?= $data["title_chapter"] ?></h3>
                    <p>**BDD Variable contenu chapitre,**BDD Variable contenu chapitre,**BDD Variable contenu chapitre,
                    **BDD Variable contenu chapitre,**BDD Variable contenu chapitre,**BDD Variable contenu chapitre,
                    </p>                    
                </article>
                <p>
                    <a href="">Retour</a> <!--COM PERSO : LIEN VERS PAGE LISTE EXTRAITS -->
                </p>
            </div>
        <?php
        }
        $chapters->closeCursor();
        ?>