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
            <?php
            if (isset($_GET['url'])) {
                $url = $_GET['url'];
            } else {
                $url = "";
            }
            if (isset($_GET['txt'])) {
                $title = $_GET['txt'];
            } else {
                $title = "";
            }
            ?>
            <form style="display: inline;" action="" method="POST">
                <label>URL:
                    <input name='url' value="<?php echo $url; ?>" required>
                </label>
                <label>Title:
                    <input name='txt' value="<?php echo $title; ?>" required>
                </label>
                <label>Tags (comma-separated):
                    <input name='tags' id='tags' value=" ">
                </label>
                <label>Password:
                    <input type="password" name="password">
                </label>
        </div>
        <?php
        if (isset($_POST['password']) && ($_POST['password'] == $password)) {
            $tags = explode(", ", $_POST['tags']);
            foreach ($tags as $tag) {
                $all_tags = $all_tags . "<a class='tag' href='filter.php?filter=" . $tag . "'><kbd>$tag</kbd></a> ";
            }
            $href = '<p><a href="' . $_POST['url'] . '">' . $_POST['txt'] . '</a> ' . $all_tags . '</p>' . PHP_EOL;
            $href .= file_get_contents('links.txt');
            file_put_contents('links.txt', $href);
            echo '<meta http-equiv="refresh" content="0; url=' . $_POST['url'] . '">';
        }
        if (isset($_POST['password']) && ($_POST['password'] != $password)) {
            echo "<script>";
            echo "alert('Wrong password!');";
            echo "</script>";
        }
        ?>
        <button title="Save the link" type="submit" name="add"><img style='vertical-align: middle;' src='svg/save.svg' /></button>
        </form>
        <button title="Back" style="margin-top: 1em;" onclick="location.href='index.php'"><img style='vertical-align: middle;' src='svg/back.svg' /></button>
        <div style="margin-bottom: 1em; margin-top: 1em;">
            <?php echo $footer; ?>
        </div>
    </div>
</body>

</html>