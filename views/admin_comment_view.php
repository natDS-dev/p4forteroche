<!--ADMIN COMMENT VIEW------
------------------->

<?= $title = "Administration commentaires"; ?>

<!--?php ob_start(); ? -->

        <!----COM PERSO : PENSER RESTRICTION => Accès seulement si id et mp corrects sinon => id et mp incorrects-->
    <main class="admin_main_container">
        <?php include_once("includes/subtitles_admin.php") ;?>
     
        <section class="admin_main_block">
            <?php include_once("includes/menu_admin.php") ;?>

            <section class="admin_action_block" id="admin_comments_view">                
                <table class="table" id="comments_table">
                    <caption>Commentaires</caption>
                    <thead>
                    <tr>
                        <th scope="col">Auteur </th>
                        <th scope="col">Sujet</th>
                        <th scope="col">Message</th>
                        <th scope="col">Signalé</th>
                        <th scope="col">Action ?</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Auteur">$réccup auteur</td>
                            <td data-label="Sujet">$récup sujet</td>
                            <td data-label="Message">$recup message</td>
                            <td data-label="Signalé">$recup siganlement</td>
                            <td data-label="Action ?">
                                <p><a href="">Suppr.</a></p> <!--COM PERSO : Compléter lien--></td>
                            </tr>
                    </tbody>
                </table>
            </section> 
        </section>
    </main>   
    



<!--?php $content = ob_get_clean(); ?-->



