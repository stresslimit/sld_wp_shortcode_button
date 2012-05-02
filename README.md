sld_wp_shortcode_button
=======================

Quickly create a shortcode + buttons on visual &amp; html editors

Check functions-example.php for usage. You will need the following:

This code in functions.php:

	include_once( 'path/to/sld_shortcode_button.php' );
	new sld_shortcode_button( $namespace, $shortcode );

The following files:

{yr_theme}/sld_shortcode_button/{yr_namespace}/{yr_namespace}.js	// the tinyMCE plugin javascript
{yr_theme}/sld_shortcode_button/{yr_namespace}/button.png			// a simple button image
