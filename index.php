<?php
	// CORS policy to allow the submitted page to read the response
	header('Access-Control-Allow-Origin: *');
	include('config.php');
?>

<html lang="en">
    
    <!-- Author: Dmitri Popov, dmpop@linux.com
         License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt -->
    
    <head>
	<meta charset="utf-8">
	<title>Linkalot</title>
	<link rel="shortcut icon" href="favicon.png" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/light.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
	<div style="margin-top: 1em; font-size: 1.1em;">
	    <h1><?php echo $title ?></h1>
	    <form method='GET' action='edit.php'>
		<p><button>Edit</button></p>
	    </form>
	    <?php
	    if(isset($_GET["url"]) && isset($_GET['key']) == $key)
	    {
		$href = '<p><a href="'.$_GET['url'].'" title="'.$_GET['txt'].'">'.$_GET['url'].'</a></p>'."\n";
		$href .= file_get_contents('links.txt');
		file_put_contents('links.txt', $href);
		echo "<h2>Link added</h2>";
	    }
	    $f = fopen("links.txt", "r");
	    if ($f) {
		while (($line = fgets($f)) !== false) {
		    echo $line;
		}
		fclose($f);
	    } else {
		echo "<h2>Error</h2>";
	    }
	    ?>
		<p style="padding: 1em 0 0 0; border-top: 2px solid;">&copy; <?php echo date("Y "); echo $footer; ?></p>
	</div>
    </body>
</html>
