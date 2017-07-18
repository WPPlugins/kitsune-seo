<?php 

add_action( "transition_post_status", "Kitsune_Create_Sitemap" );
function Kitsune_Create_Sitemap($new_status) {
    if($new_status == 'publish'){
        $number_of_posts = 0;
        if ( str_replace( '-', '', get_option( 'gmt_offset' ) ) < 10 ) { 
            $tempo = '-0' . str_replace( '-', '', get_option( 'gmt_offset' ) ); 
        } else { 
            $tempo = get_option( 'gmt_offset' ); 
        }
        if( strlen( $tempo ) == 3 ) { $tempo = $tempo . ':00'; }
        $postsForSitemap = get_posts( array(
            'numberposts' => -1,
            'orderby'     => 'modified',
            'post_type'   => get_post_types(),
            'order'       => 'DESC'
        ) );
        $sitemap='';
        $sitemap .= '<?xml version="1.0" encoding="UTF-8"?>' . '<?xml-stylesheet type="text/xsl" href="' . esc_url( home_url( '/' ) ) . 'sitemap.xsl"?>';
        $sitemap .= "\n" . '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        $sitemap .= "\t" . '<url>' . "\n" .
            "\t\t" . '<loc>' . esc_url( home_url( '/' ) ) . '</loc>' .
            "\n\t\t" . '<lastmod>' . date( "Y-m-d\TH:i:s", current_time( 'timestamp', 0 ) ) . $tempo . '</lastmod>' .
            "\n\t\t" . '<changefreq>daily</changefreq>' .
            "\n\t\t" . '<priority>1.0</priority>' .
            "\n\t" . '</url>' . "\n";
        foreach( $postsForSitemap as $post ) {
            if($number_of_posts <= 10000){
                setup_postdata( $post);
                $postdate = explode( " ", $post->post_modified );
                $sitemap .= "\t" . '<url>' . "\n" .
                "\t\t" . '<loc>' . get_permalink( $post->ID ) . '</loc>' .
                "\n\t\t" . '<lastmod>' . $postdate[0] . 'T' . $postdate[1] . $tempo . '</lastmod>' .
                "\n\t\t" . '<changefreq>Weekly</changefreq>' .
                "\n\t\t" . '<priority>0.5</priority>' .
                "\n\t" . '</url>' . "\n";
            } else {
                break;
            }
        }
        $sitemap .= '</urlset>';
        $fp = fopen( ABSPATH . "sitemap.xml", 'w' );
        fwrite( $fp, $sitemap );
        fclose( $fp );
    }
}
 ?>