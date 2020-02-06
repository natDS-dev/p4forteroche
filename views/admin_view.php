<!--ADMIN VIEW------
------------------->

<?= $title = "Administration"; ?>
<?= $picturePage = "" ; ?>

<?= ob_start(); ?>

        <!----COM PERSO : PENSER RESTRICTION => Accès seulement si id et mp corrects sinon => id et mp incorrects-->
    <main class="admin_main_container">
        <hgroup class="admin_subtitles">
            <h2>Vous êtes connecté à l'espace administrateur<h2>
            <img class="goldpaint_separator" id="goldpaint_separator2" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
            <h3>Ici, vous pourrez gérer le contenu de vos pages</h3>
        </hgroup>

        <section class="admin_main_block">
            <h4>Liste des posts</h4>
            <table>
                <thead>
                    <tr>
                        <th colspan="1">N° chapitre</th>
                        <th colspan="1">Titre</th>
                        <th colspan="1">Posté/Brouillon</th>
                        <th colspan="1">Supprimer ?</th>

                    </tr>
                </thead>
                <tbody> <!--COM PERSO : VARIABLES POUR ELEMENTS CHAPITRE-->
                    <tr>
                        <td>$récup numéro chap</td>                        
                        <td>$récup titre chap</td>
                        <td>$récup statut online or not</td>                        
                        <td>$action supression</td>

                    </tr>
                    <tr>
                        
                    </tr>
                </tbody>
            </table>

            







            <form method="post" class="tinymce_block">
                <textarea id="mytextarea"></textarea>
                <div class="button_form">
                    <button type="submit">Publier</button>
                </div>
            </form>

        </section>
       
    </main> 



<?=$content = ob_get_clean(); ?>



