<?php if (!defined('ABSPATH')) die('No direct access allowed');

$staff = explode('^', $staff);
$id = '';
$uniqid = uniqid();
?>

<section class="row accHorizontal">

	<script>
		/*@cc_on

		 @if (@_jscript_version == 11)
		 document.write('<div class="items items_<?php echo esc_attr( $uniqid ) ?>" data-id="<?php echo esc_attr( $uniqid ); ?>">');

		 @end

		 @*/
	</script>

	<?php foreach ($staff as $post_id){ ?><?php

	if (function_exists('icl_object_id')){
		$post_id = icl_object_id($post_id, TMM_Staff::$slug, true, ICL_LANGUAGE_CODE);
	}
		$id = base_convert(microtime(), 10, 36);

		$custom = TMM_Staff::get_meta_data($post_id); ?>

		<aside class="accHorizontal__item <?php if ($animation) echo esc_attr( $animation ) ?>">

			<input type="checkbox" class="state" id="acc-<?php echo esc_attr( $id ) ?>" />
			<label class="backdrop" for="acc-<?php echo esc_attr( $id ) ?>"><i class="fa fa-times"></i></label>
			<article class="acc_cBox">
				<div class="acc_cImg">
					<img src="<?php echo TMM_Helper::get_post_featured_image($post_id, '252*270') ?>" alt="" />
					<header>
						<h3><?php echo get_the_title($post_id); ?></h3>
						<h5><?php
							$post_categories = wp_get_post_terms($post_id, 'position', array("fields" => "names"));
							if (!empty($post_categories)) {
								foreach ($post_categories as $key => $value) {
									if ($key > 0) {
										echo ' / ';
									}
									echo esc_html( $value );
								}
							}
							?>
						</h5>
					</header>
				</div>
				<div class="acc_cCont">
					<p><?php echo substr(get_post($post_id)->post_excerpt, 0, 468); ?></p>
					<ul class="social-icons">
						<?php if (!empty($custom["mail"])): ?>
							<li class="mail"><a href="<?php echo esc_url( 'mailto:' . $custom["mail"] ) ?>"><i class="icon-mail"></i></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["phone"])): ?>
							<li class="phone"><a href="<?php echo esc_url( 'tel:' . $custom["phone"] ) ?>"><i class="icon-phone"></i></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["twitter"])): ?>
							<li class="twitter"><a target="_blank" href="<?php echo esc_url( $custom["twitter"] ) ?>"><i class="icon-twitter"></i></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["facebook"])): ?>
							<li class="facebook"><a target="_blank" href="<?php echo esc_url( $custom["facebook"] ) ?>"><i class="icon-facebook"></i></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["linkedin"])): ?>
							<li class="linkedin"><a target="_blank" href="<?php echo esc_url( $custom["linkedin"] ) ?>"><i class="icon-linkedin"></i></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["dribbble"])): ?>
							<li class="dribbble"><a target="_blank" href="<?php echo esc_url( $custom["dribbble"] ) ?>"><i class="icon-dribbble"></i></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["instagram"])): ?>
							<li class="instagram"><a target="_blank" href="<?php echo esc_url( $custom["instagram"] ) ?>"><i class="icon-instagram"></i></a></li>
						<?php endif; ?>
					</ul><!--/ .social-icons-->
				</div>
			</article>

		</aside>

	<?php

	} ?>

	<script>
		/*@cc_on

		 @if (@_jscript_version == 11)
		 document.write('</div>');

		 @end

		 @*/
	</script>

</section><!--/ .accHorizontal-->