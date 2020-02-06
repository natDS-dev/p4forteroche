<!-------------------------------------------INDEX-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Blog du livre de Jean Forteroche Billet simple pour l'Alaska">
        <link rel="stylesheet" href="public/styles/style.css" />
        <!--open graph-->




        <script src="public/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
        tinymce.init({
            selector: '#mytextarea',
            language: "fr_FR"
        });
        </script>

        <title> <?= $title ?> </title>
    </head>
    
    <body>
        <?php include_once("includes/header_admin.php") ;?>
        <?= $content ?>
        
    </body>
    
</html>