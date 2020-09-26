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
	<style>
		textarea {
			font-size: 15px;
			width: 100%;
			height: 55%;
			line-height: 1.9;
			margin-top: 2em;
		}
	</style>
</head>

<body>
	<div class="uk-container uk-margin-small-top">
		<div class="uk-card uk-card-default uk-card-body">
			<h1 class="uk-heading-line uk-text-center"><span><?php echo $title ?></span></h1>
			<a class="uk-button uk-button-default uk-margin-bottom" href="index.php">Back</a>
			<?php
			function Read()
			{
				$f = "links.txt";
				echo file_get_contents($f);
			}
			function Write()
			{
				$f = "links.txt";
				$fp = fopen($f, "w");
				$data = $_POST["text"];
				fwrite($fp, $data);
				fclose($fp);
			}
			if ($_POST["save"]) {
				Write();
				echo "<script>";
				echo "UIkit.notification({message: 'Changes saved', status: 'success'});";
				echo "</script>";
			};
			?>
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<textarea class="uk-textarea" name="text"><?php Read(); ?></textarea><br /><br />
				<input class="uk-button uk-button-primary" type="submit" name="save" value="Save">
			</form>
		</div>
	</div>
</body>

</html>