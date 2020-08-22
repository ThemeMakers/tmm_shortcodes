<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
	
	<div class="one-half">
		
		<?php 

			$categories_list = array('' => 'All');
			$portfolio_categories = get_terms( 'folio_category' );

			foreach ($portfolio_categories as $category) {
				$categories_list[$category->term_taxonomy_id] = $category->name;
			}
			
		 ?>

		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'select',
			'title' => esc_html__('Categories', 'tmm_shortcodes'),
			'shortcode_field' => 'cat_id',
			'id' => '',
			'options' => $categories_list,
			'default_value' => TMM_Ext_Shortcodes::set_default_value('cat_id', ' '),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->
	
	<div class="one-half">

		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'text',
			'title' => esc_html__('Posts per page', 'tmm_shortcodes'),
			'shortcode_field' => 'posts_per_page',
			'id' => '',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('posts_per_page', 10),
			'description' => esc_html__('Posts per page', 'tmm_shortcodes'),
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'select',
			'title' => esc_html__('Portfolio order parameter', 'tmm_shortcodes'),
			'shortcode_field' => 'folio_order',
			'id' => 'folio_order',
			'options' => array(
				'ASC' => esc_html__('Ascending order from lowest to highest values', 'tmm_shortcodes'),
				'DESC' => esc_html__('Descending order from highest to lowest values', 'tmm_shortcodes')
			),
			'default_value' => TMM_Ext_Shortcodes::set_default_value('folio_order', 'DESC'),
			'description' => esc_html__('Designates the ascending or descending order of the "orderby" parameter.', 'tmm_shortcodes'),
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'select',
			'title' => esc_html__('Portfolio sorting parameter', 'tmm_shortcodes'),
			'shortcode_field' => 'folio_order_by',
			'id' => 'folio_order_by',
			'options' => array(
				'none' => esc_html__('No order', 'tmm_shortcodes'),
				'ID' => esc_html__('Order by post id', 'tmm_shortcodes'),
				'author' => esc_html__('Order by author', 'tmm_shortcodes'),
				'title' => esc_html__('Order by title', 'tmm_shortcodes'),
				'name' => esc_html__('Order by post name', 'tmm_shortcodes'),
				'date' => esc_html__('Order by date', 'tmm_shortcodes'),
				'modified' => esc_html__('Order by last modified date', 'tmm_shortcodes'),
				'rand' => esc_html__('Random order', 'tmm_shortcodes')
			),
			'default_value' => TMM_Ext_Shortcodes::set_default_value('folio_order_by', 'none'),
			'description' => esc_html__('Sort retrieved posts by parameter.', 'tmm_shortcodes'),
		));
		?>

	</div><!--/ .one-half-->

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->


<script type="text/javascript">
	
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
	});

</script>
