<!--ADMIN HOME VUE RAPIDE-->
<?php $title = "Administration vue rapide"; ?>

<?php ob_start(); ?>
<main class="admin_main_container">
<?php require_once("includes/subtitles_admin.php"); ?>     
    <section class="admin_main_block">
        <?php require_once("includes/menu_admin.php"); ?>
        <section class="admin_action_block" id="admin_plublished_posts_view">
            <table class="table" id="resume_table">
                <caption>Vue rapide</caption>
                <thead>
                    <tr>
                        <th scope="col">Total publications </th>
                        <th scope="col">Total brouillons</th>
                        <th scope="col">Mails non lus</th>
                        <th scope="col">Commentaires à valider</th>
                        <th scope="col">Commentaires signalés</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td data-label="Total publications"><?=$data['nbPost'] ?></t"d>
                    <td data-label="Total brouillon"><?=$data['nbDraft'] ?></td>
                    <td data-label="Mails non lus"><?=$data['nbUnreadMails'] ?></td>
                    <td data-label="Commentaires à valider"><?=$data['nbValidCom'] ?></td>
                    <td data-label="Commentaires signalés"><?=$data['nbReportedCom'] ?></td>
                </tr>
                </tbody>
            </table>
        </section> 
    </section>
</main> 
<?php $content = ob_get_clean(); ?>
<?php require_once("template_admin.php"); ?>