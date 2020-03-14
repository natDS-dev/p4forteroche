<!--ADMIN POST VIEW-->
<?php $title = "Administration"; ?>

<?php ob_start(); ?>
    <main class="admin_main_container">
        <?php require_once("includes/subtitles_admin.php"); ?>     
        <section class="admin_main_block">
            <?php require_once("includes/menu_admin.php"); ?>
            <!--Published posts-->
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
                                <td data-label="N° chapitre"><?= htmlspecialchars_decode($publishedPost['number_chapter']) ?></td>
                                <td data-label="Titre"><?= htmlspecialchars_decode($publishedPost['title_chapter']) ?></td>
                                <td data-label="Action ?">
                                    <p><a href="index.php?action=adminEditPost&id=<?= htmlspecialchars_decode($publishedPost['id']) ?>">Editer</a></p> 
                                    <p><a href="index.php?action=adminDraftPost&id=<?= htmlspecialchars_decode($publishedPost['id']) ?>">Mettre dans brouillon</a></p>
                                    <p><a href="index.php?action=adminDeletePost&id=<?= htmlspecialchars_decode($publishedPost['id']) ?>" onclick="return confirm('Ce chapitre sera définitivement supprimé. Etes-vous sûr(e) de vouloir supprimer ce chapitre ?');">Suppr.</a></p>
                                </td>
                            </tr>
                        <?php endforeach; ?> 
                    </tbody>
                </table>
            </section>  
            <!--Draft posts-->
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
                                <td data-label="N° chapitre"><?= htmlspecialchars_decode($draftPost['number_chapter']) ?></td>
                                <td data-label="Titre"><?= htmlspecialchars_decode($draftPost['title_chapter']) ?></td>
                                <td data-label="Action ?">
                                    <p><a href="index.php?action=adminEditPost&id=<?= htmlspecialchars_decode($draftPost['id']) ?>">Editer</a></p> 
                                    <p><a href="index.php?action=adminValidPost&id=<?= htmlspecialchars_decode($draftPost['id']) ?>">Publier</a></p>
                                    <p><a href="index.php?action=adminDeletePost&id=<?= htmlspecialchars_decode($draftPost['id']) ?>"onclick="return confirm('Ce chapitre sera définitivement supprimé. Etes-vous sûr(e) de vouloir supprimer ce chapitre ?');">Suppr.</a></p>
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



