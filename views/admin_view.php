<!--ADMIN GENERAL VIEW = POST LIST-->
<?php $title = "Administration"; ?>

<?php ob_start(); ?>
        <!--COM PERSO : PENSER RESTRICTION => Accès seulement si id et mp corrects sinon => id et mp incorrects-->
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
                    <tr>
                        <td data-label="N° chapitre">$réccup num</td>
                        <td data-label="Titre">$récup titre</td>
                        <td data-label="Action ?">
                            <p><a href="">Editer</a></p> <!--COM PERSO : Compléter lien-->
                            <p><a href="">Mettre dans brouillon</a></p>
                            <p><a href="">Suppr.</a></p>
                        </td>
                    </tr>
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
                    <tr>
                        <td data-label="N° chapitre">$réccup num</td>
                        <td data-label="Titre">$récup titre</td>
                        <td data-label="Action ?">
                            <p><a href="">Editer</a></p> <!--COM PERSO : Compléter lien-->
                            <p><a href="">Publier</a></p>
                            <p><a href="">Suppr.</a></p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </section>
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
                        <?php foreach ($contactMails as $contactMail): ?>
                            <tr>
                                <td data-label="Date"><?= htmlspecialchars($contactMail['date_contact_fr']) ?></td>
                                <td data-label="Auteur"><?= htmlspecialchars($contactMail['user_name_contact']) ?></td>
                                <td data-label="Adresse mail"><?= htmlspecialchars($contactMail['user_mail_contact']) ?></td>
                                <td data-label="Objet"><?= htmlspecialchars($contactMail['subject_contact']) ?></td>
                                <td data-label="Contenu">
                                    <?php if(strlen($contactMail['message_contact']) > 30) {$contactMail['message_contact'] = substr($contactMail['message_contact'], 0, 70); } ?>
                                    <?= htmlspecialchars($contactMail['message_contact']) ?>...
                                </td>
                                <td data-label="Action ?">
                                    <p><a href="">Lire</a></p> <!--COM PERSO : Compléter lien-->
                                    <p><a href="">Suppr.</a></p>
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



