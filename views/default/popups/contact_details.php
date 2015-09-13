<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="fullwidth">

		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'text',
			'title' => __('Enter Address', 'tmm_shortcodes'),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('content', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'text',
			'title' => __('Enter Phone', 'tmm_shortcodes'),
			'shortcode_field' => 'phone',
			'id' => '',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('phone', ''),
			'description' => ''
		));
		?>
		
		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'text',
			'title' => __('Enter Fax', 'tmm_shortcodes'),
			'shortcode_field' => 'fax',
			'id' => '',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('fax', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'text',
			'title' => __('Enter Email', 'tmm_shortcodes'),
			'shortcode_field' => 'email',
			'id' => '',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('email', ''),
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
			jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
				tmm_ext_shortcodes.changer(shortcode_name);
			});

		});
    </script>
	