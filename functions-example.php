<?php
/**
 * This example shows a simple shortcode [without arguments] to wrap content in [private]this content is private[/private]
 * The package deals with adding shortcode buttons to the editor, and we then do a simple check to see if a user is logged
 * in, if not we send generic content to login/signup.
 * 
 */

$shortcode = 'private';			// this is the shortcode, eg. 'private', the shortcode will be [private][/private]
$namespace = 'yr_namespace';	// this is the namespaced title of the shortcode + tinymce plugin

include_once( 'sld_shortcode_button.php' );
new sld_shortcode_button( $namespace, $shortcode );



function yrtheme_private( $atts, $content = null ) {
	if ( is_user_logged_in() ) {
		return '<section class="private">'."\r\n\r\n" . $content . '</section>';
	} else {
		return get_template_part( 'content', 'private' );	// generic content telling visitors they should sign up or log in
	}
}
add_shortcode( $shortcode, 'yrtheme_private' );	// this registers treating the shortcode with the above function
