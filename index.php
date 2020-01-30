<html lang="en">
    
    <!-- Author: Dmitri Popov, dmpop@linux.com
         License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt -->
    
    <head>
	<meta charset="utf-8">
	<title>Linkalot</title>
	<link rel="shortcut icon" href="favicon.png" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/light.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
    </head>
    <body>
	<div style="margin-top: 1em; font-size: 1.1em;">
	    <h1>Linkalot</h1>
	    <form method='GET' action='edit.php'>
		<p><button>Edit</button></p>
	    </form>
	    <?php
		$config = include('config.php');
	    if($_GET["url"] && $_GET['key'] == $config['key'])
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
    </body>
</html>
