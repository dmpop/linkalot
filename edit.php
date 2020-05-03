<?php
error_reporting(E_ERROR);
require_once('protect.php');
?>

<html lang="en">
    <!-- Author: Dmitri Popov, dmpop@linux.com
         License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt -->
    
    <head>
	<meta charset="utf-8">
	<title>Linkalot</title>
	<link rel="shortcut icon" href="favicon.png" />
	<link rel="stylesheet" href="lit.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
	<div class="c">
	    <h1>Linkalot</h1>
	    <form method="GET" action="index.php">
		<p><button class="btn">Back</button></p>
            </form>
            <?php
            function Read() {
		$f = "links.txt";
		echo file_get_contents($f);
            }
            function Write() {
		$f = "links.txt";
		$fp = fopen($f, "w");
		$data = $_POST["text"];
		fwrite($fp, $data);
		fclose($fp);
            }
            if ($_POST["save"]){
		Write();
            };
            ?>      
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<textarea class="w-100" name="text"><?php Read(); ?></textarea><br /><br />
		<input class="btn primary" type="submit" name="save" value="Save">
            </form>
	</div>
    </body>
</html>
