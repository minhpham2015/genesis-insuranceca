<?php
// Call phone
add_shortcode( 'comparesolar_call_phone', 'comparesolar_call_phone' );
function comparesolar_call_phone( $atts ) {
    $atts = shortcode_atts( array(
        'class' => 'style1',
    ), $atts, 'bartag' );
		$call_phone = get_field('call_phone','option');
 		ob_start();
		if(!empty($call_phone)):
			?>
			<div class="comparesolar-call-phone <?php echo esc_attr($atts['class']); ?>">
					<div class="icon-phone"></div>
					<div class="_phone-number">
						<?php echo $call_phone['phone_number'];  ?>
					</div>
					<div class="_time-work">
						<?php echo $call_phone['time'];  ?>
					</div>
			</div>
			<?php
		endif;
    return ob_get_clean();
}
?>
