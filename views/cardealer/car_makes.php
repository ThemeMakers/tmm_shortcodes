<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$meta_query_array = array();
if(!defined('ICL_LANGUAGE_CODE')){
	$meta_query_array[] = array(
		'key' => '_icl_lang_duplicate_of',
		'value' => '',
		'compare' => 'NOT EXISTS'
	);
}
$args = array(
	//'taxonomy' => 'carproducer',
	'hide_empty' => $hide_empty,
	//'show_count' => true,
	//'depth' => 1,
	//'exclude' => 'false',
	'post_type' => 'car',
	'showposts' => -1,
	'tax_query' => array(),
	'meta_query' => $meta_query_array,
	//'suppress_filters' => false,
);

?>

<ul class="carproducers_list list">

	<?php
	$terms = TMM_Ext_PostType_Car::get_carproducers(true);
	foreach ($terms as $term){

		$args['tax_query'][0] = array(
			'taxonomy' => 'carproducer',
			'field' => 'id',
			'include_children' => false,
			'terms' => array($term->term_id)
		);
		$query = new WP_Query( $args );
		$count = $query->post_count;
		wp_reset_postdata();

		$image_name = strtolower($term->name);
		$image_name = preg_replace( array('/\s/', '/ë/'), array('_', 'e'), $image_name );
		$src = 'images/car_makes_logos/' . $image_name . '.svg';

		if ( !file_exists(TMM_Ext_Shortcodes::get_application_path() . $src) ) {
			$src = '';
		}else{
			$src = TMM_Ext_Shortcodes::get_application_uri() . $src;
		}

		if (isset($show_only_with_logo) && $show_only_with_logo && !$src) {
			continue;
		}

		if($count > 0 || !$hide_empty){
			?>

			<li class="cat-item cat-item-<?php echo $term->term_id; ?>">
				<?php if($show_logo && $src != ''){ ?><img src="<?php echo $src; ?>" /><?php } ?>
				<a title="<?php echo sprintf(__('View all ads filed under %s', 'tmm_shortcodes'), $term->name); ?>" href="<?php echo home_url(); ?>/carproducer/<?php echo $term->slug; ?>/"><?php echo $term->name; ?></a> (<?php echo $count; ?>)
			</li>

		<?php
		}
	}
	?>

</ul>