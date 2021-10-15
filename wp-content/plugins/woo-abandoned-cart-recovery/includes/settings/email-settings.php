<?php
/**
 * Created by PhpStorm.
 * User: Villatheme-Thanh
 * Date: 08-06-19
 * Time: 12:01 PM
 */

namespace WACV\Inc\Settings;

use WACV\Inc\Functions;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Email_Settings extends Admin_Settings {

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
        <div id="" class="vi-ui bottom attached tab segment tab-admin" data-tab="second">
            <h4><?php esc_html_e( 'Email for Abandoned Cart', 'woo-abandoned-cart-recovery' ) ?></h4>
            <table class="wacv-table">
				<?php
				$this->checkbox_option( 'send_email_to_member', __( "Send mail reminder to members", 'woo-abandoned-cart-recovery' ) );
				$this->checkbox_option( 'send_email_to_guest', __( "Send mail reminder to guest", 'woo-abandoned-cart-recovery' ) );
				$this->text_option( 'email_reply_address', __( "Reply Emails to", 'woo-abandoned-cart-recovery' ) );
				$this->send_email_rules_settings( 'email_rules' );
				$this->checkbox_option( 'email_to_admin_when_cart_recover', __( "Notification to Admin", 'woo-abandoned-cart-recovery' ), __( 'Send a notification email to admin whenever a cart is recovered', 'woo-abandoned-cart-recovery' ) );
				?>
            </table>
            <hr>

            <h4><?php esc_html_e( 'Email for Abandoned Order', 'woo-abandoned-cart-recovery' ) ?></h4>
            <table class="wacv-table">
				<?php
				$this->get_pro_version( __( 'Enable', 'woo-abandoned-cart-recovery' ) );
				$this->get_pro_version( __( 'Order status', 'woo-abandoned-cart-recovery' ) );
				$this->get_pro_version( __( 'Send mail rules', 'woo-abandoned-cart-recovery' ) );
				?>
            </table>
        </div>
		<?php
	}

	//Email Rules

	public function send_email_rules_settings( $slug ) {
		$data          = self::get_field( $slug );
		$list_template = Functions::get_email_template();

		wp_localize_script( WACV_SLUG . 'admin', 'list_cp', $list_template );
		//class="vlt-row vlt-margin-top"
		?>
        <tr>
            <td class="col-1">
                <label><?php esc_html_e( 'Send mail rules', 'woo-abandoned-cart-recovery' ) ?></label>
            </td>

            <td class="col-2">
                <table class="vi-ui celled table wacv-email-rules-table">
                    <thead>
                    <tr>
                        <th><?php esc_html_e( 'Send after', 'woo-abandoned-cart-recovery' ); ?></th>
                        <th><?php esc_html_e( 'Unit', 'woo-abandoned-cart-recovery' ); ?></th>
                        <th><?php esc_html_e( 'Email template', 'woo-abandoned-cart-recovery' ); ?></th>
                        <th><?php esc_html_e( 'Action', 'woo-abandoned-cart-recovery' ); ?></th>
                    </tr>
                    </thead>
                    <tbody class="wacv-<?php echo esc_attr( $slug ) ?>-row-target">
					<?php
					if ( isset( $data['time_to_send'] ) ) {
						$loop = count( $data['time_to_send'] );

						for ( $i = 0; $i < $loop; $i ++ ) { ?>
                            <tr class="wacv-<?php echo esc_attr( $slug ) ?>-row-target" data-index="<?php echo esc_attr( $i ) ?>">
                                <td class="vlt-padding-small cols-1">
                                    <input type="number" name="wacv_params[<?php echo esc_attr( $slug ) ?>][time_to_send][]"
                                           class="vlt-input vlt-border vlt-none-shadow vlt-round"
                                           value="<?php echo esc_attr( $data['time_to_send'][ $i ] ) ?>" min="1">
                                </td>
                                <td class="vlt-padding-small cols-2">
                                    <select name="wacv_params[<?php echo esc_attr( $slug ) ?>][unit][]"
                                            class="vlt-input vlt-border vlt-none-shadow vlt-round">
                                        <option value="minutes" <?php selected( $data['unit'][ $i ], 'minutes' ); ?>>
											<?php esc_html_e( 'minutes', 'woo-abandoned-cart-recovery' ); ?>
                                        </option>
                                        <option value="hours" <?php selected( $data['unit'][ $i ], 'hours' ); ?>>
											<?php esc_html_e( 'hours', 'woo-abandoned-cart-recovery' ); ?>
                                        </option>
                                    </select>
                                </td>
                                <td class="vlt-padding-small cols-3">
                                    <select name="wacv_params[<?php echo esc_attr( $slug ) ?>][template][]"
                                            class="wacv-select-email-template vlt-input vlt-border vlt-none-shadow vlt-round">
										<?php
										foreach ( $list_template as $template ) {
											$selected = '';
											if ( isset( $data['template'][ $i ] ) ) {
												$selected = $template['id'] == $data['template'][ $i ] ? 'selected' : '';
											}
											printf( '<option value="%s" %s>%s</option>', esc_attr( $template['id'] ), esc_attr( $selected ), esc_html( $template['value'] ) );
										}
										?>
                                    </select>
                                </td>
                                <td align="center" class="vlt-padding-small cols-4">
                                    <button class="wacv-delete-<?php echo esc_attr( $slug ) ?> vi-ui small icon red button"
                                            type="button">
                                        <i class="trash icon"> </i>
                                    </button>
                                </td>
                            </tr>
						<?php }
					} ?>
                    </tbody>
                </table>
                <button type="button" class="wacv-add-<?php echo esc_attr( $slug ) ?> vi-ui small icon green button">
					<?php esc_html_e( 'Add rule', 'woo-abandoned-cart-recovery' ); ?>
                </button>
                <a style="display: none" class="wacv-get-pro-version" target="_blank"
                   href="<?php echo esc_url( WACV_PRO_URL ) ?>">
					<?php esc_html_e( 'Unlock limit', 'woo-abandoned-cart-recovery' ) ?></a>
            </td>
            <td class="col-3"></td>
        </tr>
		<?php
	}
}
