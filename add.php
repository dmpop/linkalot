<?php
error_reporting(E_ERROR);
include('config.php');
?>

<!DOCTYPE html>
<html lang="en" data-theme="<?php echo $theme; ?>">

<!-- Author: Dmitri Popov, dmpop@linux.com
	 License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt -->

<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/classless.css" />
    <link rel="stylesheet" href="css/themes.css" />
    <!-- Suppress form re-submit prompt on refresh -->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>
    <div class="card text-center">
        <div style="margin-top: 1em; margin-bottom: 1em;">
            <img style="display: inline; height: 2.5em; vertical-align: middle;" src="favicon.svg" alt="logo" />
            <h1 style="display: inline; margin-top: 0em; vertical-align: middle; letter-spacing: 3px;"><?php echo $title; ?></h1>
        </div>
        <hr style="margin-bottom: 2em;">
        <div class="text-left">
            <form style="display: inline;" action="index.php" method="GET">
                <label for="url">URL:</label>
                <input name='url' id='url' value="<?php echo $_GET['url']; ?>">
                <label for="txt">Title:</label>
                <input name='txt' id='txt' value="<?php echo $_GET['txt']; ?>">
                <label for="tags">Tags (comma-separated):</label>
                <input name='tags' id='tags' value="<?php echo $_GET['tags']; ?>">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
        </div>
        <button title="Save the link" type="submit" name="add"><img style='vertical-align: middle;' src='svg/save.svg' /></button>
        </form>
        <button title="Back" style="margin-top: 1em;" onclick="location.href='index.php'"><img style='vertical-align: middle;' src='svg/back.svg' /></button>
        <div style="margin-bottom: 1em; margin-top: 1em;">
            <?php echo $footer; ?>
        </div>
    </div>
</body>

</html>