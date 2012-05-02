<?php
/**
 * @title TinyMCE V3 Button Integration
 * @author Stresslimit via Alex Rabe
 */

class sld_shortcode_button {
	
	public $namespace;
	public $shortcode;
	
	function __construct( $namespace, $shortcode, $html_editor=true )  {
		$this->namespace = $namespace;
		$this->shortcode = $shortcode;

		// Modify the version when tinyMCE plugins are changed.
		add_filter( 'tiny_mce_version', array (&$this, 'change_tinymce_version') );
		
		// init process for button control
		if ( is_admin() ) {
			add_action( 'init', array (&$this, 'add_button') );
			if ( $html_editor )
				add_action( 'admin_print_footer_scripts',  array(&$this, 'add_html_button') );
		}
	}

	function add_button() {
		if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) return;
		if ( get_user_option('rich_editing') == 'true') {
			add_filter( 'mce_external_plugins', array (&$this, 'add_tinymce_plugin' ), 5);
			add_filter( 'mce_buttons', array (&$this, 'register_button' ), 5);
		}
	}

	function register_button($buttons) {
		array_push( $buttons, 'separator', $this->namespace );
		return $buttons;
	}

	function add_tinymce_plugin($plugin_array) {    
		$plugin_array[$this->namespace] =  get_bloginfo( 'template_url' ) . '/sld_shortcode_button/'.$this->namespace.'/'.$this->namespace.'.js';
		return $plugin_array;
	}

	function add_html_button() {
		?>
		<script type="text/javascript">
		QTags.addButton( '<?php echo $this->namespace ?>', '<?php echo $this->shortcode ?>', '[<?php echo $this->shortcode ?>]', '[/<?php echo $this->shortcode ?>]' );
		</script>
		<?php
	}

	function change_tinymce_version($version) {
		return ++$version;
	}

}
