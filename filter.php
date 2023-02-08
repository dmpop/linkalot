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
	<style>
		a.tag {
			text-decoration: none;
			text-decoration: none;
			padding: 0.2em;
			border-radius: 4px;
			border: 1px solid;
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
	<div class="c">
		<div style="text-align: center;">
			<img style="display: inline; height: 2.5em; vertical-align: middle;" src="favicon.svg" alt="logo" />
			<h1 class="text-center" style="display: inline; margin-left: 0.19em; vertical-align: middle; letter-spacing: 3px; margin-top: 0em; color: #ce6a85ff;"><?php echo $title; ?></h1>
		</div>
		<hr style="margin-bottom: 1em;">
		<button class="btn" title="Back" onclick="location.href='index.php'">Back</button>
		<div class="text-left">
			<?php
			if (isset($_GET['filter'])) {
				$lines = file($link_file);
				foreach ($lines as $line) {
					if (strpos($line, $_GET['filter']) !== false) {
						echo $line;
					}
				}
			}
			?>
		</div>
		<div class="card w-100" style="text-align: center; margin-top: 2em;">
			<?php echo $footer; ?>
		</div>
	</div>
</body>

</html>