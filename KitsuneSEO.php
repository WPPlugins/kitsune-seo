<?php 
/* Plugin Name: Automated SEO by Kitsune
 * Plugin URI: http://www.getkitsune.com
 * Description: Add premium SEO tags using kitsune
 * Version: 0.1
 * Author: Kitsune
 */

require_once '/inc/Kitsune_Add_Robots.php';
require_once '/inc/Kitsune_Call_API.php';
require_once '/inc/Kitsune_Post_Published.php';
require_once '/inc/Kitsune_Sitemap_Style.php';
require_once '/inc/Kitsune_Sitemap_Index.php';

register_activation_hook( __FILE__, 'Kitsune_init' );

function Kitsune_init(){
	Kitsune_Add_Robots();
	Kitsune_Sitemap_Style();
	Kitsune_Create_Sitemap('publish');
}

add_action('publish_post', 'Kitsune_Post_Published');
add_action( 'admin_notices', 'Kitsune_tag_admin_notice');
?>