<!--ADMIN GENERAL VIEW = POST LIST-->
<?php $title = "Administration mails"; ?>

<?php ob_start(); ?>
<main class="admin_main_container">
<?php require_once("includes/subtitles_admin.php"); ?>     
    <section class="admin_main_block">
        <?php require_once("includes/menu_admin.php"); ?>
        <section class="admin_action_block" id="admin_mails_view">
            <table class="table" id="mails_table">
                <caption>Mail(s)</caption>
                <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Adresse mail</th>
                    <th scope="col">Objet</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Action ?</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($contactMails)) : ?>
                        <?php foreach ($contactMails as $contactMail): ?>
                            <tr  <?php if ($contactMail['status_mail_contact'] !== 'read') echo  ('class="unread_mail"') ?>>
                                <td data-label="Date"><?= htmlspecialchars($contactMail['date_contact_fr']) ?></td>
                                <td data-label="Auteur"><?= htmlspecialchars($contactMail['user_name_contact']) ?></td>
                                <td data-label="Adresse mail"><?= htmlspecialchars($contactMail['user_mail_contact']) ?></td>
                                <td data-label="Objet"><?= htmlspecialchars($contactMail['subject_contact']) ?></td>
                                <td data-label="Contenu">
                                    <?= htmlspecialchars($contactMail['message_contact']) ?>
                                </td>
                                <td data-label="Action ?">
                                    <?php if($contactMail['status_mail_contact'] !== 'read'): ?> 
                                        <p><a href="index.php?action=adminReadMail&id=<?= $contactMail['id'] ?>">Marquer comme "lu"</a></p> <!--COM PERSO : Compléter lien-->
                                    <?php else : ?>
                                        <p>Lu</p> <!--COM PERSO : Compléter lien-->
                                    <?php endif; ?>
                                    <p><a href="index.php?action=adminDeleteMail&id=<?= $contactMail['id'] ?>" onclick="return confirm('Ce mail sera définitivement supprimé. Etes-vous sûr(e) de vouloir supprimer ce mail ?');">Suppr.</a></p>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <td colspan="4">Aucun mail à afficher</td>                            
                    <?php endif; ?>

                </tbody>
            </table> 
        </section>                 
    </section>
</main>  
<?php $content = ob_get_clean(); ?>
<?php require_once("template_admin.php"); ?>
       