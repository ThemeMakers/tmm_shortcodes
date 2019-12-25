<?php if (!defined('ABSPATH')) die('No direct access allowed');

if (TMM::get_option("api_key_google")){

	$inique_id = uniqid();

	$google_maps_api_key = (TMM::get_option("api_key_google")) ? 'key=' . TMM::get_option("api_key_google") . '&' : '' ;
	$map_link = 'https://maps.google.com/maps/api/js?' . $google_maps_api_key;

	$js_controls = '{}';

	if (!isset($mode)) {
		$mode = 'map';
	}

	$location_mode = isset($location_mode) ? $location_mode : '';

	if ($location_mode === 'address') {
		$address = str_replace(' ', '+', $address);
		$geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $address . '&' . $google_maps_api_key);
		$output = json_decode($geocode, true);

		$latitude = 0;
		$longitude = 0;

		// if latitude & longitude does not defined by user
		if ($output) {
			if( $output['status'] == 'OK' ) {
				$latitude = $output['results'][0]['geometry']['location']['lat'];
				$longitude = $output['results'][0]['geometry']['location']['lng'];
			} else {
				$error_message = $output['error_message'];
			}
		} else {
			$error_message = esc_html_e('GPS coordinates were not available because connection failed or malformed request', 'accio');
		}
	}

	if (!isset($maptype)) {
		$maptype = 'ROADMAP';
	}

	if (!isset($marker_is_draggable)) {
		$marker_is_draggable = 0;
	}

	if ($mode === 'map') {

		wp_enqueue_script("tmm_shortcode_google_api_js", $map_link);
		wp_enqueue_script("tmm_shortcode_google_map_js", TMM_Ext_Shortcodes::get_application_uri() . '/js/shortcodes/google_map.js', array(), false, true);
		?>

		<div class="google_map" id="google_map_<?php echo esc_attr($inique_id) ?>" style="height: <?php echo esc_attr($height) ?>px;">
			<?php
				if( $output['status'] != 'OK' ) {
					$err_image_url = 'https://via.placeholder.com/1130x' . esc_attr($height) . '?text=' . str_replace(" ", "+", $error_message);
					echo '<img class="aligncenter" src=' . $err_image_url . '>';
				}
			?>
		</div>

		<script type="text/javascript">
			jQuery(function() {
				gmt_init_map(
					<?php echo esc_attr($latitude) ?>,
					<?php echo esc_attr($longitude) ?>,
					"google_map_<?php echo esc_attr($inique_id) ?>",
					<?php echo esc_attr($zoom) ?>,
					"<?php echo esc_attr($maptype) ?>",
					"<?php echo esc_attr($content) ?>",
					"<?php echo esc_attr($enable_marker) ?>",
					"<?php echo esc_attr($enable_popup) ?>",
					"<?php echo esc_attr($enable_scrollwheel) ?>",
					<?php echo esc_attr($js_controls) ?>,
					"<?php echo esc_attr($marker_is_draggable) ?>"
				);
			});
		</script>
	<?php } else { ?>
		<?php
		$marker_string = '';
		if ($enable_marker) {
			$marker_string = '&markers=color:red|label:P|' . $latitude . ',' . $longitude;
		}

		$location_mode_string = 'center=' . $latitude . ',' . $longitude;

		$staticmap = 'https://maps.googleapis.com/maps/api/staticmap?' . $location_mode_string . '&zoom=' . (int) $zoom . '&maptype=' . strtolower($maptype) . '&size=' . (int)$width . 'x' . (int)$height . $marker_string . '&' . $google_maps_api_key;

		?>

		<img src="https://maps.googleapis.com/maps/api/staticmap?<?php echo esc_attr($location_mode_string) ?>&zoom=<?php echo esc_attr($zoom) ?>&maptype=<?php echo strtolower($maptype) ?>&size=<?php echo esc_attr($width) ?>x<?php echo esc_attr($height) ?><?php echo esc_attr($marker_string) ?>&<?php echo esc_attr( $google_maps_api_key ) ?>">

	<?php }

} else {
	$full_width = ($width == '' || $width == '100%') ? '1130' : $width;
	$custom_height = ($height == '') ? '400' : $height;
	$link_url = 'https://via.placeholder.com/' . $full_width . 'x' . $custom_height . '?text=Please+Enter+a+Valid+Google+API+key';
	echo '<img class="aligncenter" src=' . $link_url . '>';
}