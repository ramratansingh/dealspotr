<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * Subsolar Widget Forms Init
 */

include_once( get_theme_file_path('/inc/includes/subsolar-widget-fields/subsolar-widget-fields.php'));


/**
*  Include SVG in Admin
*/

add_action('admin_footer', '_action_couponseek_include_admin_svg');

if( !function_exists('_action_couponseek_include_admin_svg') ) {

	function _action_couponseek_include_admin_svg() {
		include_once( get_theme_file_path('/assets/svg/icons.svg'));
	}

}
