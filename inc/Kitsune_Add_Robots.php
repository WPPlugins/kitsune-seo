<?php 
function Kitsune_Add_Robots(){

	$path = ABSPATH."robots.txt";
	$robots = fopen($path, "w");
	$txt = "User-agent: *\n
Disallow:\n
Sitemap: ".site_url()."/sitemap.xml";
	fwrite($robots,$txt);
	fclose($robots);

}

 ?>