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
    <link rel="stylesheet" href="css/lit.css" />
    <!-- Suppress form re-submit prompt on refresh -->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>
    <div class="c">
        <div style="text-align: center;">
            <img style="display: inline; height: 2.5em; vertical-align: middle;" src="favicon.svg" alt="logo" />
            <h1 class="text-center" style="display: inline; margin-left: 0.19em; vertical-align: middle; letter-spacing: 3px; margin-top: 0em; color: #ce6a85ff;"><?php echo $title; ?></h1>
        </div>
        <hr>
        <button class="btn" title="Back" style="margin-top: 1em;" onclick="location.href='index.php'">Back</button>
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
            <form class="card w-100" action="" method="POST">
                <label>URL:
                    <input class="card w-100" name='url' value="<?php echo $url; ?>" required>
                </label>
                <label>Title:
                    <input class="card w-100" name='txt' value="<?php echo $title; ?>" required>
                </label>
                <label>Tags (comma-separated):
                    <input class="card w-100" name='tags' id='tags' value=" ">
                </label>
                <label>Password:
                    <input class="card w-100" type="password" name="password">
                </label>
                <?php
                if (isset($_POST['password']) && ($_POST['password'] == $password)) {
                    $tags = explode(", ", $_POST['tags']);
                    foreach ($tags as $tag) {
                        $all_tags = $all_tags . "<a class='tag' href='filter.php?filter=" . $tag . "'>$tag</a> ";
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
                <button class="btn primary" style="margin-top: 1.5em;" title="Save the link" type="submit" name="add">Add</button>
            </form>
        </div>
        <div class="card w-100" style="text-align: center; margin-top: 2em;">
            <?php echo $footer; ?>
        </div>
    </div>
</body>

</html>