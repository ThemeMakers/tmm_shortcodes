<?php if (!defined('ABSPATH')) die('No direct access allowed');

$staff = explode('^', $staff);

$args = array(
    'post_type' => TMM_Staff::$slug,
    'post__in' => $staff,
    'orderby' => 'date',
    'order' => 'ASC',
    'post_status' => array('publish')
);

$wp_query = new WP_Query($args);
global $post;

if ( $wp_query->have_posts() ) {
 ?>

	<?php if ($layout == 1): ?>
		<section class="team-member type-1 clearfix">
            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                <article class="team-item">
					<?php if (has_post_thumbnail($post->ID)) : ?>
						<img class="team-image" src="<?php echo TMM_Helper::get_post_featured_image($post->ID, '160*160') ?>" alt="<?php echo get_the_title($post->ID); ?>" />
					<?php endif; ?>
					<h5 class="team-title"><?php echo get_the_title($post->ID); ?></h5>
				</article><!--/ .team-item-->
			<?php endwhile; ?>
		</section><!--/ .team-member-->
	<?php endif; ?>

	<?php if ($layout == 2): ?>
		<section class="team-member type-2 clearfix">
			<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                <?php $custom = TMM_Staff::get_meta_data($post->ID); ?>
                <article class="four columns">
                    <?php if (has_post_thumbnail($post->ID)) : ?>
                        <img class="team-image" src="<?php echo TMM_Helper::get_post_featured_image($post->ID, '220*240') ?>" alt="<?php echo get_the_title($post->ID); ?>" />
                    <?php endif; ?>
					<hgroup>
						<h4 class="team-title"><?php echo get_the_title($post->ID); ?></h4>
						<h6 class="team-position"><?php
							$post_categories = wp_get_post_terms($post->ID, 'position', array("fields" => "names"));
							if (!empty($post_categories)) {
								foreach ($post_categories as $key => $value) {
									if ($key > 0) {
										echo ' / ';
									}
									echo esc_html( $value );
								}
							}
							?>
						</h6>
					</hgroup>
					<p><?php echo get_post($post->ID)->post_excerpt; ?></p>
					<ul class="social-icons">
						<?php if (!empty($custom["email"])): ?>
							<li class="email"><a href="<?php echo esc_url( 'mailto:' . $custom["email"] ) ?>"></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["twitter"])): ?>
							<li class="twitter"><a target="_blank" href="<?php echo esc_url( $custom["twitter"] ) ?>"></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["facebook"])): ?>
							<li class="facebook"><a target="_blank" href="<?php echo esc_url( $custom["facebook"] ) ?>"></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["dribble"])): ?>
							<li class="dribbble"><a target="_blank" href="<?php echo esc_url( $custom["dribble"] ) ?>"></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["skype"])): ?>
							<li class="skype"><a target="_blank" href="<?php echo esc_url( $custom["skype"] ) ?>"></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["phone"])): ?>
							<li class="phone"><a href="<?php echo esc_url( 'tel:' . $custom["phone"] ) ?>"></a></li>
						<?php endif; ?>
					</ul><!--/ .social-icons-->
				</article>
            <?php endwhile; ?>
		</section><!--/ .team-member-->
	<?php endif; ?>

	<?php if ($layout == 3): ?>
		<section class="team-member type-3 clearfix">
            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				<?php $custom = TMM_Staff::get_meta_data($post->ID); ?>
                <article class="one-third column">
                    <?php if (has_post_thumbnail($post->ID)) : ?>
                        <img class="team-image" src="<?php echo TMM_Helper::get_post_featured_image($post->ID, '300*305') ?>" alt="<?php echo get_the_title($post->ID); ?>" />
                    <?php endif; ?>
					<hgroup>
						<h4 class="team-title"><?php echo get_the_title($post->ID); ?></h4>
						<h6 class="team-position"><?php
							$post_categories = wp_get_post_terms($post->ID, 'position', array("fields" => "names"));
							if (!empty($post_categories)) {
								foreach ($post_categories as $key => $value) {
									if ($key > 0) {
										echo ' / ';
									}
									echo esc_html( $value );
								}
							}
							?>
						</h6>
					</hgroup>
					<p><?php echo get_post($post->ID)->post_excerpt; ?></p>
					<ul class="social-icons">
						<?php if (!empty($custom["email"])): ?>
							<li class="email"><a href="<?php echo esc_url( 'mailto:' . $custom["email"] ) ?>"></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["twitter"])): ?>
							<li class="twitter"><a target="_blank" href="<?php echo esc_url( $custom["twitter"] ) ?>"></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["facebook"])): ?>
							<li class="facebook"><a target="_blank" href="<?php echo esc_url( $custom["facebook"] ) ?>"></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["dribble"])): ?>
							<li class="dribbble"><a target="_blank" href="<?php echo esc_url( $custom["dribble"] ) ?>"></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["skype"])): ?>
							<li class="skype"><a target="_blank" href="<?php echo esc_url( $custom["skype"] ) ?>"></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["phone"])): ?>
							<li class="phone"><a href="<?php echo esc_url( 'tel:' . $custom["phone"] ) ?>"></a></li>
						<?php endif; ?>
					</ul><!--/ .social-icons-->
				</article>
            <?php endwhile; ?>
		</section><!--/ .team-member-->
	<?php endif; ?>

<?php
}
wp_reset_postdata();