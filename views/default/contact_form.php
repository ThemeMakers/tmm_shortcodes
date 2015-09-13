<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
//contact form on front by shortcode
if(isset($form_content)){
	$form_name = $form_content;
}else{
	$form_name = $content;
}

$contact_form = TMM_Contact_Form::get_form($form_name);
wp_enqueue_script("tmm_shortcode_contact_form_js", TMM_Ext_Shortcodes::get_application_uri() . '/js/shortcodes/contact_form.js');
$tmm_lang = array(
	'captcha_image_url' => get_template_directory_uri() . '/helper/capcha/image.php',
	'wrong_field_value' => __('Please enter correct', 'tmm_shortcodes'),
	'success' => __('Your message has been sent successfully!', 'tmm_shortcodes'),
	'fail' => __('Server failed. Send later', 'tmm_shortcodes'),
);
wp_localize_script('tmm_shortcode_contact_form_js', 'tmm_mail_l10n', $tmm_lang);

$unique_id=  uniqid();

if (!isset($dont_fill_inputs)) {
	$dont_fill_inputs = true;
}

//output fields
if (!empty($contact_form['inputs'])) {
	?>
	<form method="post" class="contact-form">

		<input type="hidden" name="contact_form_name" value="<?php echo $form_name ?>" />

		<?php if(isset($car_id)): ?>
			<input type="hidden" name="car_id" value="<?php echo $car_id ?>" />
		<?php endif; ?>

		<?php foreach ($contact_form['inputs'] as $key => $input) : ?>

			<?php
			$name = $input['type'] . $key;

			switch ($input['type']) {

				case "email":
					?>
					<p class="input-block">
						<label for="email_<?php echo $unique_id ?>"><?php _e($input['label'], 'tmm_shortcodes'); ?><?php echo($input['is_required'] ? ': <span class="required">*</span>' : '') ?></label>
						<input id="email_<?php echo $unique_id ?>"<?php echo($input['is_required'] ? " required" : "") ?> type="email" name="<?php echo $name ?>" value="<?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" />
					</p>
					<?php
					break;

				case "textinput":
					?>
					<p class="input-block">
						<label for="name_<?php echo $unique_id ?>"><?php _e($input['label'], 'tmm_shortcodes'); ?><?php echo($input['is_required'] ? ': <span class="required">*</span>' : '') ?></label>
						<input id="name_<?php echo $unique_id ?>"<?php echo($input['is_required'] ? " required" : "") ?> type="text" name="<?php echo $name ?>" value="<?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" />
					</p>
					<?php
					break;

				case "website":
					?>
					<p class="input-block">
						<label for="url_<?php echo $unique_id ?>"><?php _e($input['label'], 'tmm_shortcodes'); ?><?php echo($input['is_required'] ? ': <span class="required">*</span>' : '') ?></label>
						<input id="url_<?php echo $unique_id ?>"<?php echo($input['is_required'] ? " required" : "") ?> type="url" name="<?php echo $name ?>" value="<?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" />
					</p>
					<?php
					break;

				case "messagebody":
					if (empty($name)) {
						$name = "messagebody";
					}
					?>
					<p class="input-block">
						<label for="message_<?php echo $unique_id ?>"><?php _e($input['label'], 'tmm_shortcodes'); ?><?php echo($input['is_required'] ? ': <span class="required">*</span>' : '') ?></label>
						<textarea id="message_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? " required" : "") ?> name="<?php echo $name ?>"><?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?></textarea>
					</p>
					<?php
					break;

				case "select":
					$select_options = explode(",", $input['options']);
					?>
					<p class="input-block">
						<label for="sel_<?php echo $unique_id ?>"><?php _e($input['label'], 'tmm_shortcodes'); ?><?php echo($input['is_required'] ? ': <span class="required">*</span>' : '') ?></label>
						<select id="sel_<?php echo $unique_id ?>" name="<?php echo $name ?>">
							<?php if (!empty($select_options)): ?>
								<?php foreach ($select_options as $value) : ?>
									<option value="<?php echo $value; ?>"><?php _e($value, 'tmm_shortcodes'); ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
					</p>
					<?php
					break;
				default:
					break;
			}
			?>

		<?php endforeach; ?>

		<?php if ($contact_form['has_capture']): ?>

			<p class="input-block">
				<label><?php _e('Are you human?', 'tmm_shortcodes'); ?></label>
				<?php $hash = md5(time()); ?>
				<img class="contact_form_capcha" src="<?php echo get_stylesheet_directory_uri(); ?>/helper/capcha/image.php?hash=<?php echo $hash ?>" height="29" width="72" alt="" />
				<input type="text" value="" name="verify" class="verify" />
				<input type="hidden" name="verify_code" value="<?php echo $hash ?>" />
			</p><!--/ .row-->

		<?php endif; ?>

		<p class="input-block">
			<button class="button <?php echo $contact_form['submit_button'] ?> medium" type="submit"><?php _e($contact_form['submit_button_text'], 'tmm_shortcodes'); ?></button>
		</p>

	</form>
	<div class="contact_form_responce" style="display: none;"><ul></ul></div>

<?php
}
?>
<div class="clear"></div>

