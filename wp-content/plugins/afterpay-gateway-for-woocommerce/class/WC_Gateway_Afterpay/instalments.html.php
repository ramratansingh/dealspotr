<?php
/**
 * Afterpay Checkout Instalments Display
 * @var WC_Gateway_Afterpay $this
 */

if ($this->settings['testmode'] != 'production') {
    ?><p class="afterpay-test-mode-warning-text"><?php _e( 'TEST MODE ENABLED', 'woo_afterpay' ); ?></p><?php
}

?>
<div id="afterpay-widget-container"></div>
<script>
new AfterPay.Widgets.PaymentSchedule({
    target: '#afterpay-widget-container',
    locale: '<?php echo $locale; ?>',
    amount: {
        amount: "<?php echo $order_total; ?>",
        currency: "<?php echo $currency; ?>"
    },
});
</script>
