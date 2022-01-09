<?php
// CORS policy to allow the submitted page to read the response
header('Access-Control-Allow-Origin: *');
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
	<style>
		a.tag {
			text-decoration: none;
			color: #d400aa;
		}
	</style>
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
		<?php
		if (file_exists($link_file)) {
			$lines = file($link_file);
		} else {
			echo "<script>";
			echo "alert('No links found');";
			echo "</script>";
		}
		$rnd_link = $lines[array_rand($lines)];
		echo '<p>Total links: <strong>' . count($lines) . '</strong></p>';
		echo '<p>Random link:</p>';
		echo '<p>' . $rnd_link . '</p>';
		?>
		<form style="margin-top: 2em; margin-bottom: 2em; display: inline;" method='GET' action='filter.php'>
			<label for="filter">Filter:</label>
			<input type='text' name='filter' id='filter'>
			<button title="Filter links"><img style=' vertical-align: middle;' src='svg/filter.svg' /></button>
		</form>
		<button title="Edit link list" onclick='window.location.href = "edit.php"'><img style='vertical-align: middle;' src='svg/edit.svg' /></button>
		<button title="Add new link" onclick='window.location.href = "add.php"'><img style='vertical-align: middle;' src='svg/add.svg' /></button>
		<hr style="margin-top: 2em; margin-bottom: 2em;">
		<div class="text-left">
			<?php

			foreach ($lines as $line) {
				echo $line;
			}

			if ($_GET['password'] == $password) {
				$tags = explode(", ", $_GET['tags']);
				foreach ($tags as $tag) {
					$all_tags = $all_tags . "<a class='tag' href='filter.php?filter=" . $tag . "'><kbd>$tag</kbd></a> ";
				}
				$href = '<p><a href="' . $_GET['url'] . '">' . $_GET['txt'] . '</a> ' . $all_tags . '</p>' . PHP_EOL;
				$href .= file_get_contents('links.txt');
				file_put_contents('links.txt', $href);
				echo "<script>";
				echo "alert('Link has been added.');";
				echo "</script>";
			}
			if (isset($_GET['password']) && ($_GET['password'] != $password)) {
				echo "<script>";
				echo "alert('Wrong password!');";
				echo "</script>";
			}
			?>
		</div>
		<div style="margin-bottom: 1em;">
			<?php echo $footer; ?>
		</div>
	</div>
</body>

</html>