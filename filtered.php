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
	<div class="uk-container uk-margin-small-top">
		<div class="uk-card uk-card-default uk-card-body">
			<h1 class="uk-heading-line uk-text-center"><span><?php echo $title ?>: filtered by <em><?php echo $_GET['tag'] ?></em></span></h1>
			<p class="uk-margin-bottom"><a class="uk-button uk-button-primary uk-margin-top" href="index.php">Back</a></p>
			<?php
			if (isset($_GET['tag'])) {
				$f = fopen("links.txt", "r");
				while (($line = fgets($f)) !== false) {
					if (strpos($line, $_GET['tag']) !== false) {
						echo $line;
					}
				}
				fclose($f);
			}
			?>
			<hr />
			<p><?php echo $footer; ?></p>
		</div>
	</div>
</body>

</html>