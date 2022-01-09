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
	<style>
		textarea {
			font-size: 15px;
			width: 100%;
			height: 25em;
			line-height: 1.9;
			margin-top: 2em;
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
		<button title="Back" style="margin-top: 1em;" onclick="location.href='index.php'"><img style='vertical-align: middle;' src='svg/back.svg' /></button>
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
		if (isset($_POST["save"])) {
			if ($_POST['password'] != $password) {
				echo "<script>";
				echo "alert('Wrong password');";
				echo "</script>";
				exit();
			}
			Write();
			header('Location:index.php');
		};
		?>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<textarea class="uk-textarea" name="text"><?php Read(); ?></textarea><br /><br />
			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<button title="Save changes" type="submit" name="save"><img style='vertical-align: middle;' src='svg/save.svg' /></button>
		</form>
		<div style="margin-bottom: 1em; margin-top: 1em;">
			<?php echo $footer; ?>
		</div>
	</div>
</body>

</html>