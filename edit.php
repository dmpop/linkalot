<?php
error_reporting(E_ERROR);
include('config.php');

if (isset($_POST["save"])) {
	if ($_POST['password'] != $password) {
		echo "<script>";
		echo "alert('Wrong password');";
		echo "</script>";
		exit();
	}
	Write();
	header('Location:index.php');
}
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
	<div class="c">
		<div style="text-align: center;">
			<img style="display: inline; height: 2.5em; vertical-align: middle;" src="favicon.svg" alt="logo" />
			<h1 class="text-center" style="display: inline; margin-left: 0.19em; vertical-align: middle; letter-spacing: 3px; margin-top: 0em; color: #ce6a85ff;"><?php echo $title; ?></h1>
		</div>
		<hr style="margin-bottom: 2em;">
		<button class="btn" title="Back" style="margin-top: 1em;" onclick="location.href='index.php'">Back</button>
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
		?>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<textarea class="uk-textarea" name="text"><?php Read(); ?></textarea><br /><br />
			<label>Password:
				<input class="card w-100" type="password" name="password">
			</label>
			<button class="btn primary" title="Save changes" type="submit" name="save">Save</button>
		</form>
		<div class="card w-100" style="text-align: center; margin-top: 2em;">
			<?php echo $footer; ?>
		</div>
	</div>
</body>

</html>