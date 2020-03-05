<!--ADMIN VIEW POST LIST-->
<?php $title = "Administration"; ?>

<?php ob_start(); ?>
    <main class="admin_main_container">
        <?php require_once("includes/subtitles_admin.php"); ?>     
        <section class="admin_main_block">
            <?php require_once("includes/menu_admin.php"); ?>
            <section class="admin_action_block" id="admin_plublished_posts_view">
                <table class="table" id="chapter_table">
                    <caption>Publié(s)</caption>
                    <thead>
                    <tr>
                        <th scope="col">N° chapitre </th>
                        <th scope="col">Titre</th>
                        <th scope="col">Action ?</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($publishedPosts as $publishedPost): ?>
                            <tr>
                                <td data-label="N° chapitre"><?= htmlspecialchars($publishedPost['number_chapter']) ?></td>
                                <td data-label="Titre"><?= htmlspecialchars($publishedPost['title_chapter']) ?></td>
                                <td data-label="Action ?">
                                    <p><a href="">Editer</a></p> <!--COM PERSO : Compléter lien-->
                                    <p><a href="index.php?action=adminDraftPost&id=<?= htmlspecialchars($publishedPost['id']) ?>">Mettre dans brouillon</a></p>
                                    <p><a href="index.php?action=adminDeletePost&id=<?= htmlspecialchars($publishedPost['id']) ?>" onclick="return confirm('Ce chapitre sera définitivement supprimé. Etes-vous sûr(e) de vouloir supprimer ce chapitre ?');">Suppr.</a></p>
                                </td>
                            </tr>
                        <?php endforeach; ?> 
                    </tbody>
                </table>
            </section>  
            <section class="admin_action_block" id="admin_draft_posts_view">
                <table class="table" id="draft_chapter_table">
                    <caption>Brouillon(s) en attente</caption>
                    <thead>
                    <tr>
                        <th scope="col">N° chapitre </th>
                        <th scope="col">Titre</th>
                        <th scope="col">Action ?</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($draftPosts as $draftPost): ?>
                            <tr>
                                <td data-label="N° chapitre"><?= htmlspecialchars($draftPost['number_chapter']) ?></td>
                                <td data-label="Titre"><?= htmlspecialchars($draftPost['title_chapter']) ?></td>
                                <td data-label="Action ?">
                                    <p><a href="">Editer</a></p> <!--COM PERSO : Compléter lien-->
                                    <p><a href="index.php?action=adminValidPost&id=<?= htmlspecialchars($draftPost['id']) ?>">Publier</a></p>
                                    <p><a href="index.php?action=adminDeletePost&id=<?= htmlspecialchars($draftPost['id']) ?>"onclick="return confirm('Ce chapitre sera définitivement supprimé. Etes-vous sûr(e) de vouloir supprimer ce chapitre ?');">Suppr.</a></p>
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


