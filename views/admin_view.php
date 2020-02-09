<!--ADMIN GENERAL VIEW = POST LIST ------
------------------->

<?= $title = "Administration"; ?>

<!--?php ob_start(); ? -->

        <!----COM PERSO : PENSER RESTRICTION => Accès seulement si id et mp corrects sinon => id et mp incorrects-->
    <main class="admin_main_container">
        <?php include_once("includes/subtitles_admin.php") ;?>
     
        <section class="admin_main_block">
            <?php include_once("includes/menu_admin.php") ;?>

            <section class="admin_action_block" id="admin_posts_view">
                <table class="table" id="chapter_table">
                    <caption>Publications</caption>
                    <thead>
                    <tr>
                        <th scope="col">N° chapitre </th>
                        <th scope="col">Titre</th>
                        <th scope="col">En ligne ?</th>
                        <th scope="col">Action ?</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td data-label="N° chapitre">$réccup num</td>
                        <td data-label="Titre">$récup titre</td>
                        <td data-label="En ligne ?">$recup statut</td>
                        <td data-label="Action ?">
                            <p><a href="">Editer</a></p> <!--COM PERSO : Compléter lien-->
                            <p><a href="">Suppr.</a></p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </section>            
        </section>
    </main>   
    



<!--?php $content = ob_get_clean(); ?-->



