<?php if (!defined('ABSPATH')) die('No direct access allowed');

if (TMM::get_option("api_key_google")){

$inique_id = uniqid();

$google_maps_api_key = (TMM::get_option("api_key_google")) ? 'key=' . TMM::get_option("api_key_google") : '' ;
$map_link = '//maps.google.com/maps/api/js?' . $google_maps_api_key . '&sensor=false';


	wp_enqueue_script('tmm_google_maps_api', $map_link);
	wp_enqueue_script('tmm_google_maps_api', '//maps.google.com/maps/api/js?' . $google_maps_api_key . '&sensor=false');
	wp_enqueue_script('tmm_theme_markerwithlabel_js', TMM_Ext_Shortcodes::get_application_uri() . '/js/shortcodes/markerwithlabel.js', array(), false, true);
	wp_enqueue_script("tmm_shortcode_google_map_js", TMM_Ext_Shortcodes::get_application_uri() . '/js/shortcodes/google_map.js', array(), false, true);


if (!isset($mode)) {
	$mode = 'map';
}

$controls = ""; //not need
$js_controls = '{';
if (!empty($controls)) {
	$controls = explode(',', $controls);
	if (!empty($controls)) {
		foreach ($controls as $key => $value) {
			if ($key > 0) {
				$js_controls.=',';
			}
			$js_controls.=$value . ': true';
		}
	}
}
$js_controls.='}';
?>

<?php
if (isset($location_mode)) {
	if ($location_mode == 'address') {
		$address = str_replace(' ', '+', $address);

		$geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address=' . urlencode($address) . '&sensor=false');
		if(isset($geocode) && $geocode){
			$output = json_decode($geocode);
		}
		if (isset($output) && isset($output->status) && $output->status != 'OVER_QUERY_LIMIT') {
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

	<div class="google_map" id="google_map_<?php echo $inique_id ?>" style="width:100%;height: <?php echo $height ?>px;"></div>

	<script async type="text/javascript">
		jQuery(function() {
			gmt_init_map(
				<?php echo $latitude ?>,
				<?php echo $longitude ?>,
				"google_map_<?php echo $inique_id ?>",
				<?php echo (int) $zoom ?>,
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

	<img src="https://maps.googleapis.com/maps/api/staticmap?<?php echo $location_mode_string ?>&zoom=<?php echo (int) $zoom ?>&maptype=<?php echo strtolower($maptype) ?>&size=<?php echo (int)$width ?>x<?php echo (int)$height ?><?php echo $marker_string ?>&key=<?php echo TMM::get_option("api_key_google")?>&sensor=false">

<?php endif;

} else {
	$full_width = ($width == '' || $width == '100%') ? '1130' : $width;
	$custom_height = ($height == '') ? '400' : $height;
	$link_url = 'https://placeholdit.imgix.net/~text?txtsize=40&txt=Please+Enter+a+Valid+Google+API+key&w='. $full_width . '&h=' . $custom_height;
	echo '<img class="aligncenter" src=' . $link_url . '>';
}

?>
