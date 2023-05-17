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
	<link rel="stylesheet" href="css/lit.css" />
	<link rel="stylesheet" href="css/styles.css" />
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
		echo '<div class="card w-100">';
		echo '<p>Total links: <strong>' . count($lines) . '</strong></p>';
		echo '<p>Random link:</p>';
		echo '<p>' . $rnd_link . '</p>';
		echo '</div>';
		?>
		<form style="margin-top: 2em; margin-bottom: 2em; display: inline;" method='GET' action='filter.php'>
			<label for="filter">Filter:</label>
			<input class="card w-100" type='text' name='filter' id='filter'>
			<button class="btn primary" title="Filter links">Filter</button>
		</form>
		<button class="btn primary" title="Edit link list" onclick='window.location.href = "edit.php"'>Edit</button>
		<button class="btn primary" title="Add new link" onclick='window.location.href = "add.php"'>Add link</button>
		<hr style="margin-top: 2em; margin-bottom: 2em;">
		<div class="text-left">
			<?php

			foreach ($lines as $line) {
				echo $line;
			}
			?>
		</div>
		<div class="card w-100" style="text-align: center; margin-top: 2em;">
			<?php echo $footer; ?>
		</div>
	</div>
</body>

</html>