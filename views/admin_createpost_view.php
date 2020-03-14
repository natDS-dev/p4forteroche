<!--ADMIN CREATE POST VIEW-->
<?php $title = "Administration"; ?>

<?php ob_start(); ?>
    <main class="admin_main_container">
        <?php require_once("includes/subtitles_admin.php"); ?>     
        <section class="admin_main_block">
            <?php include_once("includes/menu_admin.php"); ?>
            <!--Create post form-->
            <form class="tinymce_block" method="post" action="index.php?action=adminAddNewPost" enctype="multipart/form-data"> 
                <div class="place_form" id="tinymce_number_chap">
                    <label for="input_tinymce_number">Sélectionner un numéro de chapitre*(obligatoire) :</label> 
                    <select name="input_tinymce_number" required>
                        <!--Get the right number chapter values in the list-->
                        <?php for($i=1;$i<=$maxChapter;$i++) : ?>          
                            <?php if(!in_array($i, $unavailableNumChap, true) || (isset($editChapter) && $i == $editChapter['number_chapter'])) :?>                          
                                <option value="<?= $i ?>"<?= (isset($editChapter) && $i == $editChapter['number_chapter']) ? " selected" : "" ?>><?= $i ?></option>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="place_form" id="tinymce_title">
                    <label for="input_tinymce_title">Entrer un titre* (obligatoire) :</label>
                    <input type="text" id="input_tinymce_title" name="input_tinymce_title"  value="<?= isset($editChapter["title_chapter"]) ? $editChapter["title_chapter"] : "" ?>" required>
                    <input type="hidden" id="idPost" name="idPost" value="<?= isset($editChapter['id']) ? $editChapter['id'] : "" ?>">
                </div>
                <div class="place_form" id="tinymce_url_img">
                    <label for="input_tinymce_url">Télécharger une image au format .jpg, .jpeg, .png ou.gif :</label> 
                    <input type="file" id="input_tinymce_url" name="input_tinymce_url" value="<?= isset($editChapter["picture_chapter"]) ? $editChapter["picture_chapter"] : "" ?>">
                </div>
                <label for="mytextarea">Entrer un texte :</label>
                <textarea id="mytextarea" name="mytextarea" ><?= isset($editChapter["content_chapter"]) ? $editChapter["content_chapter"] : "" ?></textarea>
                <div class="button_form">
                    <label for="draft">Mettre au brouillon ?</label>
                    <input type="radio" id="draft" name="status" value="draft" <?= (isset($editChapter["status_chapter"]) && $editChapter["status_chapter"] === "draft") ? "checked" : "" ?> >
                    <label for="published">Publier ?</label>
                    <input type="radio" id="published" name="status" value="published" <?= (isset($editChapter["status_chapter"]) && $editChapter["status_chapter"] === "published") ? "checked" : "" ?> >
                </div>
                <div class="button_form">
                    <button id="publish_chapter" name="publish_chapter" type="submit">Valider</button>
                </div>
            </form>
        </section>
    </main>
<?php $content = ob_get_clean(); ?>
<?php require_once("template_admin.php"); ?>