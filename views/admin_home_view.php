<!--ADMIN HOME VUE RAPIDE-->
<?php $title = "Administration vue rapide"; ?>

<?php ob_start(); ?>
<main class="admin_main_container">
<?php require_once("includes/subtitles_admin.php"); ?>     
    <section class="admin_main_block">
        <?php require_once("includes/menu_admin.php"); ?>
        <section class="admin_action_block" id="admin_plublished_posts_view">
            <table class="table" id="resume_table">
                <caption>Vue rapide - Accès en 1 click </caption>                
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
                    <td data-label="Total publications">
                        <a href="index.php?action=adminPostsList"><?=$data['nbPost'] ?><a>
                    </td>
                    <td data-label="Total brouillon">
                        <a href="index.php?action=adminPostsList"><?=$data['nbDraft'] ?></a>
                    </td>
                    <td data-label="Mails non lus">
                        <a href="index.php?action=adminMail "><?=$data['nbUnreadMails'] ?></a>
                    </td>
                    <td data-label="Commentaires à valider">
                        <a href="index.php?action=adminCommentsList"><?=$data['nbValidCom'] ?></a>
                    </td>
                    <td data-label="Commentaires signalés">
                        <a href="index.php?action=adminCommentsList"><?=$data['nbReportedCom'] ?></a>
                    </td>
                </tr>
                </tbody>
            </table>           
        </section> 
    </section>
</main> 
<?php $content = ob_get_clean(); ?>
<?php require_once("template_admin.php"); ?>