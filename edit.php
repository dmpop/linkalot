<?php
require_once('protect.php');
?>

<html lang="en">
    <!-- Author: Dmitri Popov, dmpop@linux.com
         License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt -->
    
    <head>
	<meta charset="utf-8">
	<title>Linkalot</title>
	<link rel="shortcut icon" href="favicon.png" />
	<link rel="stylesheet" href="https://unpkg.com/terminal.css@0.7.1/dist/terminal.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	 #content {
             margin: 0px 1em auto;
             text-align: left;
	 }
	 textarea {
	     font-size: 15px;
	     width: 75%;
	     height: 55%;
	     line-height: 1.9;
	 }
	</style>
    </head>
    <body>
	<div id="content">
	    <h1>Linkalot</h1>
	    <form method="GET" action="index.php">
		<p><button class="btn btn-default btn-ghost" type="submit" role="button" name="submit">Back</button></p>
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
            if ($_POST["submit_check"]){
		Write();
            };
            ?>      
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<textarea name="text"><?php Read(); ?></textarea><br /><br />
		<button class="btn btn-primary" type="submit" role="button" name="submit">Save</button>
		<input type="hidden" name="submit_check" value="1">
            </form>
	</div>
    </body>
</html>
