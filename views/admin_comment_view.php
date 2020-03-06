<!--ADMIN COMMENT VIEW-->

<?php $title = "Administration commentaires"; ?>

<?php ob_start(); ?>
    <!--COM PERSO : PENSER RESTRICTION => Accès seulement si id et mp corrects sinon => id et mp incorrects-->
    <main class="admin_main_container">
        <?php require_once("includes/subtitles_admin.php"); ?>
        <section class="admin_main_block">
            <?php require_once("includes/menu_admin.php"); ?>
            <section class="admin_action_block" id="admin_comments_view"> 
                <table class="table" id="validated_comments_table">
                    <caption>Commentaires validés</caption>
                    <thead>
                    <tr>
                        <th scope="col">Auteur </th>
                        <th scope="col">Sujet</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action ?</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($validatedComments as $validatedComment): ?>
                            <tr>
                                <td data-label="Auteur"><?= htmlspecialchars($validatedComment['author_comment']) ?></td>
                                <td data-label="Sujet"><?= htmlspecialchars($validatedComment['title_comment']) ?></td>
                                <td data-label="Message"><?= htmlspecialchars($validatedComment['content_comment']) ?></td>                            
                                <td data-label="Action ?">
                                    <p><a href="index.php?action=adminDeleteComment&id=<?= htmlspecialchars($validatedComment['id']) ?>">Suppr.</a></p>                          
                                </td>
                            </tr>
                        <?php endforeach; ?>                         
                    </tbody>
                </table>
            </section>  
            <section class="admin_action_block" id="admin_posted_comments_view">               
                <table class="table" id="posted_comments_table">
                    <caption>Commentaires en ligne non signalés</caption>
                    <thead>
                    <tr>
                        <th scope="col">Auteur </th>
                        <th scope="col">Sujet</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action ?</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($postedComments as $postedComment): ?>
                            <tr>
                                <td data-label="Auteur"><?= htmlspecialchars($postedComment['author_comment']) ?></td>
                                <td data-label="Sujet"><?= htmlspecialchars($postedComment['title_comment']) ?></td>
                                <td data-label="Message"><?= htmlspecialchars($postedComment['content_comment']) ?></td>                            
                                <td data-label="Action ?">
                                    <p><a href="index.php?action=adminConfirmComment&id=<?= htmlspecialchars($postedComment['id']) ?>">Valider et publier</a></p> <!--COM PERSO : Compléter lien-->
                                    <p><a href="index.php?action=adminDeleteComment&id=<?= htmlspecialchars($postedComment['id']) ?>"onclick="return confirm('Ce commentaire sera définitivement supprimé. Etes-vous sûr(e) de vouloir supprimer ce commentaire ?');">Suppr.</a></p> <!--COM PERSO : Compléter lien-->                           
                                </td>
                            </tr>
                        <?php endforeach; ?>                         
                    </tbody>
                </table>
            </section> 
            <section class="admin_action_block" id="admin_reported_comments_view">
                <table class="table" id="signaled_comments_table">                    
                    <caption>Commentaires en ligne signalés</caption>
                    <thead>
                        <tr>
                            <th scope="col">Auteur </th>
                            <th scope="col">Sujet</th>
                            <th scope="col">Message</th>                        
                            <th scope="col">Action ?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reportedComments as $reportedComment): ?>
                            <tr>
                                <td data-label="Auteur"><?= htmlspecialchars($reportedComment['author_comment']) ?></td>
                                <td data-label="Sujet"><?= htmlspecialchars($reportedComment['title_comment']) ?></td>
                                <td data-label="Message"><?= htmlspecialchars($reportedComment['content_comment']) ?></td>                            
                                <td data-label="Action ?">
                                    <p><a href="index.php?action=adminConfirmComment&id=<?= htmlspecialchars($reportedComment['id']) ?>">Valider et publier</a></p> <!--COM PERSO : Compléter lien-->
                                    <p><a href="index.php?action=adminDeleteComment&id=<?= htmlspecialchars($reportedComment['id']) ?>"onclick="return confirm('Ce commentaire sera définitivement supprimé. Etes-vous sûr(e) de vouloir supprimer ce commentaire ?');">Suppr.</a></p>  
                                </td>
                            </tr>
                        <?php endforeach; ?> 
                    </tbody>
                </table>
            </section>
        </section>
    </main>   

<?php $content = ob_get_clean(); ?>
<?php require_once("template_admin.php"); ?>



