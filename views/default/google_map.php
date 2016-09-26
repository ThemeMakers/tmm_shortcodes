<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

if (TMM::get_option("api_key_google")){

	$inique_id = uniqid();

	wp_enqueue_script('tmm_theme_map_api_js', 'http://maps.google.com/maps/api/js?key='. TMM::get_option("api_key_google") .'&sensor=false');
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
			$geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false');
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

		<div class="google_map" id="google_map_<?php echo $inique_id ?>" style="height: <?php echo $height ?>px;"></div>

		<script type="text/javascript">
			jQuery(function() {
				gmt_init_map(
					<?php echo $latitude ?>,
	                <?php echo $longitude ?>,
	                "google_map_<?php echo $inique_id ?>",
	                <?php echo $zoom ?>,
	                "<?php echo $maptype ?>",
	                "<?php echo $content ?>",
	                "<?php echo $enable_marker ?>",
	                "<?php echo $enable_popup ?>",
	                "<?php echo $enable_scrollwheel ?>",
	                <?php echo $js_controls ?>,
	                "<?php echo @$marker_is_draggable ?>"
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

		<img src="http://maps.googleapis.com/maps/api/staticmap?<?php echo $location_mode_string ?>&zoom=<?php echo (int)$zoom ?>&maptype=<?php echo strtolower($maptype) ?>&size=<?php echo (int)$width ?>x<?php echo (int)$height ?><?php echo $marker_string ?>&key=<?php echo TMM::get_option("api_key_google")?>&sensor=false">

<?php endif;

}

else{
	echo "<h4>"; 
	echo _e('Enter your Google Maps API key on Theme Options Page.', 'tmm_shortcodes');
	echo "</h4>";
}

?>
