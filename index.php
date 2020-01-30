<!-------------------------------------------INDEX-->
<!DOCTYPE html>
<html lang="fr">

<?php require  ("views/includes/head.php"); ?>
<body>
    <!--HEADER-->
    <?php require  ("views/includes/header.php"); ?>

    <!--MAIN CONTAINER -->
    <div class="main_container" id="home_author_main_container">
        <!--PAGE MAIN BLOCK-->
        <div class="mainblock">
            <!--PAGE TITLE-->
            <hgroup class="website_main_titles">
                <h1>JEAN FORTEROCHE</h1>
                <h3>Ecrivain et acteur</h3>
            </hgroup>

            <!--PAGE SUBBLOCK 1-->
            <div class="subblock_1">
                <!--***DYNAMIC PICTURE***-->
                <img class="subblock_picture" id="dynamic_subblock_picture" src="assets/images/typewriter_whitecircle.png" alt="machine à écrire" />
            </div>

            <!--PAGE SUBBLOCK 2-->
            <div class="subblock_2">
                <!--PAGE SUBTITLES GROUP-->
                <hgroup class="subblock2_subtitles">
                    <h2 class="book_title" id="alaska_book">"Billet simple pour l'Alaska"</h2>
                    <img src="assets/images/goldpaint_separator" alt="trace peinture or" />
                    <h3 class="action_title">Un volume à suivre en ligne</h3>
                </hgroup>
            </div>

            <!--PAGE SUBBLOCK 3 CONTENT (AUTHOR/EXTRACTS/CHAPTERS)-->
            <div class="subblock_3">
                <!--***DYNAMIC TITLE AND INFO***-->
                <h2 class="page_title"></h2>
                <h3 class="page_info"></h3> 

            </div>
            <!--FOOTER-->
            <?php require  ("views/includes/footer.php"); ?>

        </div>
      

    </div> 





</body>

</html>