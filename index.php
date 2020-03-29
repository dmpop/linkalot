<?php
	// CORS policy to allow the submitted page to read the response
	header('Access-Control-Allow-Origin: *');
	error_reporting(E_ERROR);
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
	<style>
		.heart {
			fill: red;
			position: relative;
			top: 5px;
			width: 21px;
			}
	</style>
    </head>
    <body>
	<div style="margin-top: 1em; font-size: 1.1em;">
	    <h1><?php echo $title ?></h1>
	    <form method='GET' action='edit.php'>
		<p><button>Edit</button></p>
	    </form>
	    <?php
	    if($_GET["url"] && $_GET['key'] == $key)
	    {
		$href = '<p><a href="'.$_GET['url'].'" title="'.$_GET['txt'].'">'.$_GET['url'].'</a></p>'."\n";
		$href .= file_get_contents('links.txt');
		file_put_contents('links.txt', $href);
		echo "<h2>Link added</h2>";
	    }
		$f = file("links.txt");
	    $rnd_link = $f[array_rand($f)];
	    echo "Random link &#8628;".$rnd_link;
	    echo "<hr />";
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
		<hr />
		<p><?php echo $footer; ?>. I <svg class="heart" viewBox="0 0 32 29.6">
  <path d="M23.6,0c-3.4,0-6.3,2.7-7.6,5.6C14.7,2.7,11.8,0,8.4,0C3.8,0,0,3.8,0,8.4c0,9.4,9.5,11.9,16,21.2
	c6.1-9.3,16-12.1,16-21.2C32,3.8,28.2,0,23.6,0z"/>
</svg> PHP</p>
	</div>
    </body>
</html>
