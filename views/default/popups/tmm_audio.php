<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="one-half">
		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'upload',
			'title' => esc_html__('Link to Audio', 'tmm_shortcodes'),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Ext_Shortcodes::set_default_value('content', ''),
			'description' => ''
		));
		?>

    </div><!--/ .one-half-->


	<div class="one-half">
		<?php
		TMM_Ext_Shortcodes::draw_shortcode_option(array(
			'type' => 'select',
			'title' => esc_html__('Audio format', 'tmm_shortcodes'),
			'shortcode_field' => 'format',
			'id' => 'format',
			'options' => array(
				'other' => esc_html__('Other', 'tmm_shortcodes'),
				'wav' => esc_html__('Wav', 'tmm_shortcodes'),
				'ogg' => esc_html__('Ogg', 'tmm_shortcodes'),
			),
			'default_value' => TMM_Ext_Shortcodes::set_default_value('format', 'other'),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

    <div class="clear"></div>

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

