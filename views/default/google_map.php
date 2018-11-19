<?php if (!defined('ABSPATH')) die('No direct access allowed');

if (TMM::get_option("api_key_google")){

	$inique_id = uniqid();

	wp_enqueue_script('tmm_theme_map_api_js', 'https://maps.google.com/maps/api/js?key='. TMM::get_option("api_key_google"));
	wp_enqueue_script('tmm_theme_markerwithlabel_js', TMM_Ext_Shortcodes::get_application_uri() . '/js/shortcodes/markerwithlabel.js');
	wp_enqueue_script("tmm_shortcode_google_map_js", TMM_Ext_Shortcodes::get_application_uri() . '/js/shortcodes/google_map.js');

	if (!isset($mode)) {
		$mode = 'map';
	}


	$js_controls = '{}';
	?>

	<?php
	if (isset($location_mode)) {
		if ($location_mode == 'address') {
			$address = str_replace(' ', '+', $address);
			$geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address=' . $address);
			$output = json_decode($geocode);
			if (isset($output->status) AND $output->status != 'OVER_QUERY_LIMIT') {
				$latitude = $output->results[0]->geometry->location->lat;
				$longitude = $output->results[0]->geometry->location->lng;
			} else {
				$maptype = 'image';
			}
		}
	}

	if (!isset($maptype)) {
		$maptype = 'image';
	}
	?>

	<?php if ($mode == 'map'): ?>

		<div class="google_map" id="google_map_<?php echo esc_attr( $inique_id ) ?>" style="height: <?php echo esc_attr( $height ) ?>px;"></div>

		<script type="text/javascript">
			jQuery(function() {
				gmt_init_map(
					<?php echo esc_attr( $latitude ) ?>,
	                <?php echo esc_attr( $longitude ) ?>,
	                "google_map_<?php echo esc_attr( $inique_id ) ?>",
	                <?php echo esc_attr( $zoom ) ?>,
	                "<?php echo esc_attr( $maptype ) ?>",
	                "<?php echo esc_attr( $content ) ?>",
	                "<?php echo esc_attr( $enable_marker ) ?>",
	                "<?php echo esc_attr( $enable_popup ) ?>",
	                "<?php echo esc_attr( $enable_scrollwheel ) ?>",
	                <?php echo esc_attr( $js_controls ) ?>,
	                "<?php echo esc_attr( $marker_is_draggable ) ?>"
	            );
			});
		</script>
	<?php else: ?>
		<?php
		$marker_string = '';
		if ($enable_marker) {
			$marker_string = '&markers=color:red|label:P|' . $latitude . ',' . $longitude;
		}

		$location_mode_string = 'center=' . $latitude . ',' . $longitude;
		?>

		<img src="https://maps.googleapis.com/maps/api/staticmap?<?php echo esc_attr( $location_mode_string ) ?>&zoom=<?php echo esc_attr( (int)$zoom ) ?>&maptype=<?php echo strtolower($maptype) ?>&size=<?php echo esc_attr( (int)$width ) ?>x<?php echo esc_attr( (int)$height ) ?><?php echo esc_attr( $marker_string ) ?>&key=<?php echo TMM::get_option("api_key_google")?>">

<?php endif;

}

else{
	echo "<h4>"; 
	echo esc_html_e('Enter your Google Maps API key on Theme Options Page.', 'tmm_shortcodes');
	echo "</h4>";
}

?>
