<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'upload',
			'title' => esc_html__('Image URL', 'tmm_shortcodes'),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('content', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->


	<div class="one-half">

		<?php
		$action = TMM_Ext_Shortcodes::set_default_value('action', 'none');
		//***
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'select',
			'title' => esc_html__('Action', 'tmm_shortcodes'),
			'shortcode_field' => 'action',
			'id' => 'img_shortcode_action',
			'options' => array(
				'none' => esc_html__('No link on image', 'tmm_shortcodes'),
				'link' => esc_html__('Open link', 'tmm_shortcodes'),
			),
			'default_value' => $action,
			'description' => ''
		));
		?>


		<div id="image_action_link" style="display: <?php echo($action == 'none' ? 'none' : 'block') ?>;">
			<?php
			TMM_Ext_Shortcodes::draw_shortcode_option(array(
				'type' => 'text',
				'title' => esc_html__('Image Action Link', 'tmm_shortcodes'),
				'shortcode_field' => 'image_action_link',
				'id' => 'image_action_link',
				'default_value' => TMM_Ext_Shortcodes::set_default_value('image_action_link', '#'),
				'description' => ''
			));
			?>

			<?php
			TMM_Ext_Shortcodes::draw_shortcode_option(array(
				'type' => 'select',
				'title' => esc_html__('Link Target', 'tmm_shortcodes'),
				'shortcode_field' => 'target',
				'id' => 'target',
				'options' => array(
					'_self' => esc_html__('Self', 'tmm_shortcodes'),
					'_blank' => esc_html__('Blank', 'tmm_shortcodes'),
				),
				'default_value' => TMM_Ext_Shortcodes::set_default_value('target', '_self'),
				'description' => ''
			));
			?>
			
			<?php
			TMM_Ext_Shortcodes::draw_shortcode_option(array(
				'type' => 'text',
				'title' => esc_html__('Link Title', 'tmm_shortcodes'),
				'shortcode_field' => 'link_title',
				'id' => 'link_title',
				'default_value' => TMM_Ext_Shortcodes::set_default_value('link_title', ''),
				'description' => ''
			));
			?>	

		</div>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'select',
			'title' => esc_html__('Align', 'tmm_shortcodes'),
			'shortcode_field' => 'align',
			'id' => 'align',
			'options' => array(
				'' => esc_html__('None', 'tmm_shortcodes'),
				'alignleft' => esc_html__('Left', 'tmm_shortcodes'),
				'alignright' => esc_html__('Right', 'tmm_shortcodes'),
				'aligncenter' => esc_html__('Center', 'tmm_shortcodes'),
			),
			'default_value' => TMM_Ext_Shortcodes::set_default_value('align', ''),
			'description' => ''
		));
		?>


	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'text',
			'title' => esc_html__('Size', 'tmm_shortcodes'),
			'shortcode_field' => 'image_size_alias',
			'id' => 'image_size_alias',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('image_size_alias', ''),
			'description' => esc_html__('width*height. Fore example: 500*300. Empty field means full size', 'tmm_shortcodes'),
		));
		?>


	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'text',
			'title' => esc_html__('Image Alt', 'tmm_shortcodes'),
			'shortcode_field' => 'image_alt',
			'id' => 'image_alt',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('image_alt', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'text',
			'title' => esc_html__('Top Indent (px)', 'tmm_shortcodes'),
			'shortcode_field' => 'margin_top',
			'id' => 'margin_top',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('margin_top', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'text',
			'title' => esc_html__('Right Indent (px)', 'tmm_shortcodes'),
			'shortcode_field' => 'margin_right',
			'id' => 'margin_right',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('margin_right', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'text',
			'title' => esc_html__('Bottom Indent (px)', 'tmm_shortcodes'),
			'shortcode_field' => 'margin_bottom',
			'id' => 'margin_bottom',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('margin_bottom', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'text',
			'title' => esc_html__('Left Indent (px)', 'tmm_shortcodes'),
			'shortcode_field' => 'margin_left',
			'id' => 'margin_left',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('margin_left', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->
	
	<div class="one-half">
		
		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'select',
			'title' => esc_html__('Animation', 'tmm_shortcodes'),
			'shortcode_field' => 'animation',
			'id' => '',
			'options' => TMM_Ext_Shortcodes::css_animation_array(),
			'default_value' => TMM_Ext_Shortcodes::set_default_value('animation', ''),
			'description' => 'Waypoints is a jQuery plugin that makes it easy to execute a function whenever you scroll to an element.'
		));
		?>	 
		
	</div>

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {

		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		jQuery('#img_shortcode_action').on('change', function() {
			jQuery("#image_action_link").hide(300);
			if (jQuery(this).val() == 'link') {
				jQuery("#image_action_link").show(300);
			}
		});
		
		var $align = jQuery('select#align'),
			$inputs = jQuery('input[type=text]#margin_left, input[type=text]#margin_right');

		var checkAlign = function(mode) {
			if (mode.children(':selected').val() == 'aligncenter') {
				$inputs.val('').prop({
					"disabled": true
				}).css('background-color', '#eee');
			} else {
				$inputs.prop({
					"disabled": false
				}).css('background-color', '#fff');
			}
		};

		checkAlign($align);

		$align.on('change', function() { checkAlign(jQuery(this)); });	
		
		var $img_animated = jQuery("#img_animated");
		
		function slideDownUp (el) {
			if (el.is(':checked')) {
				jQuery('.hide').slideDown(300);
			} else {
				jQuery('.hide').slideUp(300);
			}	
		}
		
		slideDownUp($img_animated)

		$img_animated.on('click', function () {
			slideDownUp(jQuery(this));
		});
		
	});

	function app_shortcode_border_align_values(self) {
		jQuery("#image_border_align_values").hide(300);
		if (jQuery(self).val() == 1) {
			jQuery("#image_border_align_values").show(300);
		}
	}

</script>
