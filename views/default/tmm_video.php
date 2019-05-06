<?php if (!defined('ABSPATH')) die('No direct access allowed');

switch ($type) {
	case 'youtube':
		?>
		<?php if ($full_width): ?>

			<a class="player" id="bgndVideo" data-property="{videoURL: '<?php echo esc_attr( $content ) ?>',
				containment:'.video-full-container',
				autoPlay: false,
				mute: false,
				startAt: 0,
				opacity: 1,
				ratio: '16/9',
				addRaster: false }">
			</a>

			<div style="height: <?php echo esc_attr( (int) $height ) . 'px' ?>" class="video-full-container">
				<a class="video-button" id="buttonPlay"><i class="icon-play"></i></a>
				<a class="video-button" id="buttonPause"><i class="icon-pause"></i></a>
			</div>

		<?php else: ?>

		<?php
			$source_code = explode("?v=", $content);
			$source_code = explode("&", $source_code[1]);
			if (is_array($source_code)) {
				$source_code = $source_code[0];
			}
		?>

		<iframe width="<?php echo esc_attr( $width ) ?>" height="<?php echo esc_attr( $height ) ?>" src="https://www.youtube.com/embed/<?php echo esc_attr( $source_code ) ?>?wmode=transparent"></iframe>

		<?php endif; ?>

		<?php

		break;
	case 'vimeo':
		$source_code = explode("/", $content);
		if (is_array($source_code)) {
			$source_code = $source_code[count($source_code) - 1];
		}
		?>
			<iframe width="<?php echo esc_attr( $width ) ?>" height="<?php echo esc_attr( $height ) ?>" src="https://player.vimeo.com/video/<?php echo esc_attr( $source_code ) ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=f6e200"></iframe>
		<?php
		break;

	default:
		esc_html_e( 'Unsupported video format', 'tmm_shortcodes' );
		break;
}