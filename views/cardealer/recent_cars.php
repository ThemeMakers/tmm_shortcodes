<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
} ?>
<?php
$cars_count = (int) $content;
wp_reset_query();
global $wp_query;
global $wpdb;
$args                   = array();
$args['posts_per_page'] = $cars_count;
$args['post_type']      = TMM_Ext_PostType_Car::$slug;
$args['post_status']    = 'publish';
$args['order']          = 'DESC';
$args['orderby']        = 'meta_value';
$args['meta_key']       = 'car_is_featured';

if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
	$args['meta_query'][] = array(
		'key'     => '_icl_lang_duplicate_of',
		'value'   => '',
		'compare' => 'NOT EXISTS'
	);
}

$query = new WP_Query( $args );

$orderby = 'post_date_gmt';
$order   = 'DESC';
//step 1
$request = str_replace( "SQL_CALC_FOUND_ROWS", "", $query->request );
//step 2
//$tmp_request_array1 = explode('WHERE 1=1', $request);
//$tmp_request_array1[0] .= " INNER JOIN $wpdb->postmeta featured ON ($wpdb->posts.ID = featured.post_id) ";
//$request = $tmp_request_array1[0] . " WHERE 1=1 " . $tmp_request_array1[1];
////step 3
$tmp_request_array1 = explode( 'ORDER BY', $request );
$tmp_request_array2 = explode( $order, $tmp_request_array1[1] );
$request            = $tmp_request_array1[0] . ' ORDER BY ' . "$wpdb->postmeta.meta_value DESC, {$wpdb->posts}.{$orderby} $order" . $tmp_request_array2[1];

$request_result = $wpdb->get_results( $request, OBJECT_K );

$cars_listing_layout_class = "item-grid";

if ( empty($show_layout_switcher) && isset($layout_mode) && $layout_mode === 'list' ) {
	$cars_listing_layout_class = 'item-list';
}

if ( isset( $_COOKIE['cars_listing_layout_class'] ) ) {
	$cars_listing_layout_class = $_COOKIE['cars_listing_layout_class'];
}

$car_compare_list = TMM_Ext_PostType_Car::get_compare_list();
$car_watch_list   = TMM_Ext_PostType_Car::get_watch_list();
?>

<?php if ( ! empty( $title ) ) : ?>

	<div class="page-header clearfix">

		<h3 class="section-title"><?php echo $title ?></h3>

		<?php if ( isset( $show_layout_switcher ) && $show_layout_switcher == true ) { ?>
			<div class="layout-switcher">
				<a class="layout-grid <?php echo( $cars_listing_layout_class == 'item-grid' ? 'active' : '' ) ?>"
				   data-css-class="item-grid"
				   href="javascript:void(0);"><?php _e( "Grid View", 'tmm_shortcodes' ) ?></a>
				<a class="layout-list <?php echo( $cars_listing_layout_class == 'item-list' ? 'active' : '' ) ?>"
				   data-css-class="item-list"
				   href="javascript:void(0);"><?php _e( "List View", 'tmm_shortcodes' ) ?></a>
			</div><!--/ .layout-switcher-->
		<?php } ?>

	</div><!--/ .page-header-->

<?php endif; ?>

<div id="change-items" class="row tmm-view-mode <?php echo $cars_listing_layout_class ?>">

	<?php
	if ( ! empty( $request_result ) ) {
		foreach ( $request_result as $post ) {
			$GLOBALS['post_id']                             = $post->ID;
			$GLOBALS['featured_cars_autoslide']             = ! isset( $set_featured_autoslide ) || $set_featured_autoslide;
			$GLOBALS['recent_cars_show_currency_converter'] = ! isset( $show_recent_cars_currency_converter ) || $show_recent_cars_currency_converter;
			$GLOBALS['recent_cars_show_details_button']     = ! isset( $show_details_button ) || $show_details_button;
			$GLOBALS['thumbnail_size']     = isset( $thumbnail_size ) ? $thumbnail_size : 'large';
			get_template_part( 'article', 'car' );
		}
	}

	wp_reset_query();
	?>

</div>

<?php if ( $show_view_all_cars_link ):
	$searching_page = TMM_Helper::get_permalink_by_lang( TMM::get_option( 'searching_page', TMM_APP_CARDEALER_PREFIX ) );
	?>
	<a href="<?php echo $searching_page; ?>"><?php _e( 'Show all cars', 'tmm_shortcodes' ); ?> <i class="icon-angle-double-right"></i></a>
<?php endif; ?>


