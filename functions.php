<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */


 add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
 
$to = 'renzramos10111@gmail.com';
$subject = 'The subject';
$body = 'The email body content';
 
//wp_mail( $to, $subject, $body );
 
// Reset content-type to avoid conflicts -- https://core.trac.wordpress.org/ticket/23578
remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
 
 
 /*
function wpdocs_set_html_mail_content_type() {
    return 'text/html';
}

//add_post_meta(57, "status", "check");

function my_project_updated_send_email( $post_id ) {

	// If this is just a revision, don't send the email.
	if ( wp_is_post_revision( $post_id ) )
		return;

	$post_title = get_the_title( $post_id );
	$post_url = get_permalink( $post_id );
	$school = get_post_meta($post_id, "school", true);
	
	
	if ($school == true){
			$subject = 'A post has been updated';
			$message = "A post has been updated on your website:\n\n";
			$message .= $post_title . ": " . $post_url . ": " . $school ;
			// Send email to admin.
			
			if (wp_mail( 'renzramos10111@gmail.com', $subject, $message )){
				update_post_meta($post_id, 'school', 'sent');
			}
	}

}
add_action( 'save_post', 'my_project_updated_send_email' );
*/


/*

function on_post_publish( $ID, $post ) {
	
	$subject = 'A post has been updated';
	
	//echo "<pre>";
	//print_r($post );
	//echo "</pre>";
	//die();
	//Get message from Mail Template
	
	require get_template_directory() . '/mail-template/complaint.php';
	
	
	$mailer =  new CustomMailSetup();
	$mailer->complaint_email('renzramos10111@gmail.com', 'Complaint Name',$ID);
	
	//wp_mail( 'renzramos10111@gmail.com', $subject, $message );
}
add_action(  'publish_post',  'on_post_publish', 10, 2 );
*/

/*
function on_post_draft( $ID, $post ) {
	
	$subject = 'A post has been updated';
	$message = "A post has been draft on your website:\n\n";
	// Send email to admin.
	
	if (wp_mail( 'renzramos10111@gmail.com', $subject, $message )){
		
	}
}
add_action(  'draft_post',  'on_post_draft', 10, 2 );
*/



function on_publish_pending_post( $post ) {
    
	
	require get_template_directory() . '/mail-template/complaint.php';
	
	
	$mailer =  new CustomMailSetup();
	$mailer->complaint_email('renzramos10111@gmail.com', 'Complaint Name',$ID);
	
	//wp_mail( 'renzramos10111@gmail.com', $subject, $message );
	
	
}
add_action(  'draft_to_publish',  'on_publish_pending_post', 10, 1 );

