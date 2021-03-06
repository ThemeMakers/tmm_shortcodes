<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
	<?php $slider_types = TMM_Ext_Sliders::get_slider_types() ?>
   
	<div class="one-half">		

		<?php
		if (!isset($_REQUEST["shortcode_mode_edit"])) {
			$_REQUEST["shortcode_mode_edit"] = array();
			$_REQUEST["shortcode_mode_edit"]['type'] = '';
		}
		?>

		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'select',
			'title' => __('Page slider type', 'tmm_shortcodes'),
			'shortcode_field' => 'type',
			'id' => 'shortcode_page_slider_type',
			'options' => TMM_Ext_Sliders::get_slider_types(),
			'default_value' => TMM_Ext_Shortcodes::set_default_value('type', ''),
			'description' => ''
		));
		?>
		
	</div>
	
	<div class="one-half">
		
		<div class="native_sliders_groups2" <?php if ($_REQUEST["shortcode_mode_edit"]['type'] == 'layerslider'): ?>style="display: none;"<?php endif; ?>>
			<?php $slides = TMM_Ext_Sliders::get_list_of_groups(); ?>
			<?php if (!empty($slides)): ?>

				<?php
				TMM_Ext_Shortcodes::draw_shortcode_option(array(
					'type' => 'select',
					'title' => __('Slider groups', 'tmm_shortcodes'),
					'shortcode_field' => 'slider_group',
					'id' => 'slider_group',
					'options' => $slides,
					'default_value' => TMM_Ext_Shortcodes::set_default_value('slider_group', ''),
					'description' => '',
					'css_classes' => 'slider_group'
				));
				?>

			<?php else: ?>
				<?php _e("No one slider exists", 'tmm_shortcodes') ?>
			<?php endif; ?>
		</div>

		<?php if (function_exists('layerslider')): ?>
			<div id="layerslider_slidegroups2" <?php if ($_REQUEST["shortcode_mode_edit"]['type'] != 'layerslider'): ?>style="display: none;"<?php endif; ?>>

				<?php
				global $wpdb;
				$table_name = $wpdb->prefix . "layerslider";
				
				// Get sliders
				$sliders = $wpdb->get_results("SELECT * FROM $table_name
										WHERE flag_hidden = '0' AND flag_deleted = '0'
										ORDER BY id ASC LIMIT 200");
				
				?>
				<?php if (!empty($sliders)) : ?>
					<?php
					$slides = array();
					foreach ($sliders as $item) {
						$slides[$item->id] = empty($item->name) ? 'Unnamed' : $item->name;
					}
				
					TMM_Ext_Shortcodes::draw_shortcode_option(array(
						'type' => 'select',
						'title' => __('Layerslider plugins groups', 'tmm_shortcodes'),
						'shortcode_field' => 'layerslider_group',
						'id' => 'layerslider_group',
						'options' => $slides,
						'default_value' => TMM_Ext_Shortcodes::set_default_value('layerslider_group', ''),
						'description' => '',
						'css_classes' => 'layerslider_group'
					));
					
					?>

				<?php else: ?>
					<?php _e("No one Layerslider group exists", 'tmm_shortcodes') ?>
				<?php endif; ?>

			</div>
		<?php endif; ?>
		
	</div>
	
	<div class="one-half">
		
		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'checkbox',
			'title' => __('Show the direction keys', 'tmm_shortcodes'),
			'shortcode_field' => 'show_keys',
			'id' => 'show_keys',
			'is_checked' => TMM_Ext_Shortcodes::set_default_value('show_keys', 0),
			'description' => __('Show/Hide Direction Keys', 'tmm_shortcodes')
		));
		?>
		
	</div>

</div><!--/ .tmm_shortcode_template->
		  
<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	
	jQuery(function() {
		
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		jQuery("#shortcode_page_slider_type").change(function() {

			var value = jQuery(this).val();

			if (value == 'layerslider') {
				jQuery(".native_sliders_groups2").hide();
				jQuery("#layerslider_slidegroups2").show();
				jQuery("#shortcode_sliders_aliases").hide();
				return;
			}
			
			jQuery(".native_sliders_groups2").show();
			jQuery("#layerslider_slidegroups2").hide();
			jQuery("#shortcode_sliders_aliases").show();

			tmm_ext_shortcodes.changer(shortcode_name);
		});

		jQuery(".slider_group").change(function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
		
		selectwrap();

	});
	
</script>

