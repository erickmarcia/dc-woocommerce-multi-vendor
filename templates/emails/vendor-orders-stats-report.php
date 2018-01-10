<?php
/**
 * The template for displaying vendor stats report.
 *
 * Override this template by copying it to yourtheme/dc-product-vendor/emails/vendor-orders-stats-report.php
 *
 * @author 	WC Marketplace
 * @package 	dc-product-vendor/Templates
 * @version   3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $WCMp;
$text_align = is_rtl() ? 'right' : 'left';
$t_sale = isset($report_data['stats']['total_sales']) ? $report_data['stats']['total_sales'] : 0;
$t_earning = isset($report_data['stats']['total_earning']) ? $report_data['stats']['total_earning'] : 0;
$t_balance = isset($report_data['stats']['total_balance']) ? $report_data['stats']['total_balance'] : 0;
$t_transaction = isset($report_data['stats']['total_transaction']) ? $report_data['stats']['total_transaction'] : 0;
do_action( 'woocommerce_email_header', $email_heading ); ?>
<p><?php printf(__( 'Hello %s,<br>Your %s store orders report stats are as follows:', 'dc-woocommerce-multi-vendor' ),  $vendor->user_data->display_name, $report_data['period']); ?></p>
<div style="margin-bottom: 40px;">
    <table class="td" cellspacing="0" cellpadding="6" style="width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" border="1">
        <thead>
            <tr>
                <th class="td" scope="col" style="text-align:<?php echo $text_align; ?>;"><?php printf(__( '%s sale:', 'dc-woocommerce-multi-vendor' ), ucfirst($report_data['period'])); ?></th>
                <th class="td" scope="col" style="text-align:<?php echo $text_align; ?>;"><?php printf(__( '%s earning:', 'dc-woocommerce-multi-vendor' ), ucfirst($report_data['period'])); ?></th>
                <th class="td" scope="col" style="text-align:<?php echo $text_align; ?>;"><?php printf(__( '%s balance:', 'dc-woocommerce-multi-vendor' ), ucfirst($report_data['period'])); ?></th>
            </tr>
        </thead>
        <tbody>
            <td class="td" scope="col" style="text-align:<?php echo $text_align; ?>;font-size:28px;font-weight:bold;"><?php echo wc_price($t_sale); ?></td>
            <td class="td" scope="col" style="text-align:<?php echo $text_align; ?>;font-size:28px;font-weight:bold;"><?php echo wc_price($t_earning); ?></td>
            <td class="td" scope="col" style="text-align:<?php echo $text_align; ?>;font-size:28px;font-weight:bold;"><?php echo wc_price($t_balance); ?></td>
        </tbody>
        <tfoot>
            <tr>
                <th class="td" scope="row" colspan="2" style="text-align:<?php echo $text_align; ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php printf(__( '%s total transactions:', 'dc-woocommerce-multi-vendor' ), ucfirst($report_data['period'])); ?></th>
                <td class="td" style="text-align:<?php echo $text_align; ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php echo wc_price($t_transaction); ?></td>
            </tr>
            <tr>
                <th class="td" scope="row" colspan="2" style="text-align:<?php echo $text_align; ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php _e( 'Period', 'dc-woocommerce-multi-vendor' ); ?></th>
                <td class="td" style="text-align:<?php echo $text_align; ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php echo isset($report_data['period']) ? ucfirst($report_data['period']) : ''; ?></td>
            </tr>
            <tr>
                <th class="td" scope="row" colspan="2" style="text-align:<?php echo $text_align; ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php _e( 'From Date', 'dc-woocommerce-multi-vendor' ); ?></th>
                <td class="td" style="text-align:<?php echo $text_align; ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php echo isset($report_data['start_date']) ? $report_data['start_date'] : ''; ?></td>
            </tr>
            <tr>
                <th class="td" scope="row" colspan="2" style="text-align:<?php echo $text_align; ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php _e( 'To Date', 'dc-woocommerce-multi-vendor' ); ?></th>
                <td class="td" style="text-align:<?php echo $text_align; ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php echo isset($report_data['end_date']) ? $report_data['end_date'] : ''; ?></td>
            </tr>
        </tfoot>
    </table>
</div>
<br>
<?php if($attachments && count($attachments) > 0 && $report_data['order_data'] && count($report_data['order_data']) > 0 ){ ?>
<p><?php echo __( 'Please find your report attachment', 'dc-woocommerce-multi-vendor' ); ?></p>
<?php }else{ ?>
<p><?php echo __( 'There is no stats report available.', 'dc-woocommerce-multi-vendor' ); ?></p>   
<?php } ?>
<?php do_action( 'wcmp_email_footer' ); ?>