<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		
		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'text',
			'title' => esc_html__('Enter Link', 'tmm_shortcodes'),
			'shortcode_field' => 'link',
			'id' => 'link',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('link', '#'),
			'description' => ''
		));
		?>	
		
	</div>

	<div class="one-half">
		
		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'select',
			'title' => esc_html__('Link target', 'tmm_shortcodes'),
			'shortcode_field' => 'link_target',
			'id' => 'type',
			'options' => array(
				'_self' => esc_html__('_self', 'tmm_shortcodes'),
				'_blank' => esc_html__('_blank', 'tmm_shortcodes'),
			),
			'default_value' => TMM_Ext_Shortcodes::set_default_value('link_target', '_self'),
			'description' => ''
		));
		?>
		
	</div>
	
    <div class="fullwidth">

		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'textarea',
			'title' => esc_html__('Enter Tooltip Text', 'tmm_shortcodes'),
			'shortcode_field' => 'tooltip',
			'id' => 'tooltip',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('tooltip', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'textarea',
			'title' => esc_html__('Enter Text', 'tmm_shortcodes'),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('content', ''),
			'description' => ''
		));
		?>


    </div><!--/ .fullwidth-->

</div><!--/ .tmm_shortcode_template->
		  
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