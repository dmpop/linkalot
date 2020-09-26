<?php
// CORS policy to allow the submitted page to read the response
header('Access-Control-Allow-Origin: *');
error_reporting(E_ERROR);
include('config.php');
if ($protect) {
	require_once('protect.php');
}
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
	<div class="uk-container uk-margin-small-top">
		<div class="uk-card uk-card-default uk-card-body">
			<h1 class="uk-heading-line uk-text-center"><span><?php echo $title ?></span></h1>
			<?php
			$f = fopen("links.txt", "r");
			$i = 0;
			while (($line = fgets($f)) !== false) {
				$i++;
			}
			$f = file("links.txt");
			$rnd_link = $f[array_rand($f)];
			echo '<div class="uk-card uk-card-body uk-text-center">';
			echo '<p>Total links: <strong>'.$i.'</strong></p>Random link:' . $rnd_link;
			echo "</div>";
			?>
			<form method='GET' action='filtered.php'>
				<input class="uk-input" type='text' name='filter'>
				<button class="uk-button uk-button-primary uk-margin-top">Filter list</button>
				<a class="uk-button uk-button-default uk-margin-top" href="edit.php">Edit list</a>
				<a class="uk-button uk-button-default uk-margin-top" href="add.php">Add link</a>
			</form>
			<?php
			if (isset($_GET["url"]) && $_GET['key'] == $key) {
				$href = '<p><a href="' . $_GET['url'] . '">' . $_GET['txt'] . '</a> <em>' . $_GET['tags'] . '</em></p>' . "\n";
				$href .= file_get_contents('links.txt');
				file_put_contents('links.txt', $href);
				echo "<script>";
				echo "UIkit.notification({message: 'Link has been saved', status: 'success'});";
				echo "</script>";
			}
			$f = fopen("links.txt", "r");
			if ($f) {
				while (($line = fgets($f)) !== false) {
					echo $line;
				}
				fclose($f);
			} else {
				echo "<script>";
				echo "UIkit.notification({message: 'No links found', status: 'warning'});";
				echo "</script>";
			}
			?>
			<hr />
			<p><?php echo $footer; ?></p>
		</div>
	</div>
</body>

</html>