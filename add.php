<?php
error_reporting(E_ERROR);
include('config.php');
require_once('protect.php');
?>

<html lang="en">
<!-- Author: Dmitri Popov, dmpop@linux.com
         License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt -->

<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/css/uikit.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit-icons.min.js"></script>
</head>

<body>
    <div class="uk-container uk-margin-small-top uk-container-xsmall">
        <div class="uk-card uk-card-primary uk-card-body">
            <h1 class="uk-heading-line uk-text-center"><span><?php echo $title ?></span></h1>
            <form action="index.php" method="GET">
                <label for="url">URL:</label>
                <input class="uk-input" type='text' name='url' value="<?php echo $_GET['url']; ?>">
                <label for="txt">Title:</label>
                <input class="uk-input" type='text' name='txt' value="<?php echo $_GET['txt']; ?>">
                <label for="tags">Tags:</label>
                <input class="uk-input" type='text' name='tags' value="<?php echo $_GET['tags']; ?>">
                <input class="uk-button uk-button-primary uk-margin-top" type="submit" name="add" value="Add">
                <a class="uk-button uk-button-default uk-margin-top" href="index.php">Back</a>
            </form>
        </div>
    </div>
</body>

</html>