<?php 
function Kitsune_Post_Published(){
	$kitsune_key = 'abcd0000';	//free key for identifying services.
    $post_id = get_the_ID();
    $content = get_post_field('post_content', $post_id);
    $current_user = wp_get_current_user();	
    $user_email = $current_user->user_email;	// required for calculating number of tags requested by the user
    $request = [$user_email,$kitsune_key,$content];	// form the request for service
    //send request to tagging service and retrieve tags for the user
	$tags = Kitsune_Call_API("POST","http://plugin.getkitsune.com",json_encode($request)); 
	$tags = implode(", ",$tags);
	wp_set_post_tags($post_id,$tags,true);
	add_filter( 'redirect_post_location', 'Kitsune_notice_query_var', 99 ); // After redirect, add message from server
}
function Kitsune_notice_query_var( $location ) {
   remove_filter( 'redirect_post_location', 'Kitsune_notice_query_var', 99 );
   return add_query_arg( array( 'error' => '1' ), $location );
  }

function Kitsune_tag_admin_notice() {
	if ( ! isset( $_GET['error'] ) ) {
     return;
     //check if the page is the post page
   }else if((strpos($_SERVER['REQUEST_URI'],'post.php') > 0)){ 
   		$post_id = $_GET['post'];
   		$tags = get_the_tags($post_id);
   		$updated_tags = array();
   		if(empty($tags))
   			$error = array();
   		else
   			$error = $tags[0]->name;
   		//display corresponding error notice
   		if($error == '!Timed Out!' || $error == '!Content Limit Exceeded!' || $error == '!Tag Limit Exceeded!'){
	?>
		<div class="notice notice-error is-dismissible">
		    <p><?php 
		    	switch($error){
	    			case '!Timed Out!':
	    				_e( 'Tagging Server is Down for Maintenance! No tags were added. Please try again later. ' ); 
	    				break;
	    			case '!Content Limit Exceeded!':
	    				_e( 'Your post is too large! Please reduce the number of words in your post.' );
	    				break;
	    			case '!Tag Limit Exceeded!':
	    				_e( 'You have exceeded your daily tag limit (100 tags).' ); 
	    				break;
					}
			?></p>
		</div>
	<?php
		foreach($tags as $tag){
			if($tag->name != $error){
				array_push($updated_tags,$tag->name);
			}
		}
		wp_delete_term($tags[0]->term_id,'post_tag');	// delete the error tag
		wp_set_post_tags($post_id,$updated_tags,false);
		} else if ($error == '!Tag Limit 75!'){
			?>
			<div class="notice notice-warning is-dismissible">
			    <p><?php _e( 'You have reached 75% of your daily tag limit' ); ?></p>
			</div>
		<?php
			foreach($tags as $tag){
				if($tag->name != $error){
					array_push($updated_tags,$tag->name);
				}
			}
			wp_delete_term($tags[0]->term_id,'post_tag');
			wp_set_post_tags($post_id,$updated_tags,false);
		} else {
			?>
			<div class="notice notice-success is-dismissible">
			    <p><?php _e( 'Your post has been optimized by Kitsune!' ); ?></p>
			</div>
		<?php
		} 
	}
flush_rewrite_rules(); //required to update permalinks for newly added tag slugs
}
 ?>