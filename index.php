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
	</style>
    </head>
    <body>
	<div id="content">
	    <div style="margin-top: 1em; font-size: 1.1em;">
		<h1>Linkalot</h1>
		<form method='GET' action='edit.php'>
		    <p><button class="btn btn-primary" type="submit" role="button" name="submit">Edit</button></p>
		</form>
		<?php
		if( $_GET["url"] && $_GET['secret'] == 'secret' )
		{
		    $f = file_put_contents('links.txt', $_GET['url'].PHP_EOL , FILE_APPEND | LOCK_EX);
		    echo "<h2>Link added</h2>";
		}
		$f = fopen("links.txt", "r");
		if ($f) {
		    while (($line = fgets($f)) !== false) {
			echo "<p><a href='".$line."'>".$line."</a></p>";
		    }
		    
		    fclose($f);
		} else {
		    echo "Error";
		}
		?>
	    </div>
	</div>
    </body>
</html>
