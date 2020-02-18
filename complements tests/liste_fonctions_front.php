<?php
// manager.php (doit se trouver dans MODELS) :  Connexion à la BDD
try
{ 
	$dbConnect = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
}
//Gestion des erreurs
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}

// sans fermerture normalement ?> 


<!------------------------------------------------------------------------>

<?php
//chapters_manager.php  (doit se trouver dans MODELS) :  récupération des chapitres 
function getChapters(){
    

$req = $dbConnect->query("SELECT * FROM chapters ORDER BY number_chapter");

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