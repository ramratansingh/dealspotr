<?php
/**
 * Created by PhpStorm.
 * User: Villatheme-Thanh
 * Date: 08-06-19
 * Time: 2:35 PM
 */

namespace WACV\Inc\Settings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class FB_Messenger_Settings extends Admin_Settings {

	protected static $instance = null;

	public function __construct() {

	}

	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	public function setting_page() {
		?>
        <div class="vi-ui bottom attached tab segment tab-admin" data-tab="third">
            <table class="wacv-table">
				<?php
				$this->get_pro_version( __( 'App ID', 'woo-abandoned-cart-recovery' ) );
				$this->get_pro_version( __( 'App secret', 'woo-abandoned-cart-recovery' ) );
				$this->get_pro_version( __( 'Language', 'woo-abandoned-cart-recovery' ) );
				$this->get_pro_version( __( 'Valid OAuth redirected URls:', 'woo-abandoned-cart-recovery' ) );
				$this->get_pro_version( __( 'Callback Webhooks URL', 'woo-abandoned-cart-recovery' ) );
				$this->get_pro_version( __( 'Verify Token', 'woo-abandoned-cart-recovery' ) );
				?>
            </table>

        </div>
		<?php
	}

}
