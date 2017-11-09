<?php if (!defined('ABSPATH')) die('No direct access allowed');

if (!$posts_per_page) { $posts_per_page = 10; }

$cats_query_array = array();

if (!empty($cat_id)) {
	$cats_query_array[] = array(
		'taxonomy' => 'folio_category',
		'field' => 'term_taxonomy_id',
		'terms' => array($cat_id),
	);
}

$folio_page = 1;
if (isset($_GET['folio_page'])) {
	$folio_page = $_GET['folio_page'];
}

global $post;
$current_page_id = $post->ID;

$args = array(
	'tax_query' => $cats_query_array,
	'post_type' => TMM_Portfolio::$slug,
	'posts_per_page' => -1,
	'paged' => $folio_page		
);

$w_query = new WP_Query();
$query = $w_query->query($args);

$folio_cat = array();
$posts_cat = array();

foreach ($query as $p) {
	
	$terms = wp_get_post_terms( $p->ID, 'folio_category' ); 

	foreach ($terms as $cat_object) {
		$folio_cat[$cat_object->term_id] = $cat_object;
		$posts_cat[$p->ID][] = $cat_object;
	}
}

?>

<?php if (empty($cat_id)): ?>

	<div class="col-xs-12">

		<ul class="portfolio-filter opacity controls">
			<li class="filter control active" data-filter="all"><?php _e('All', 'tmm_shortcodes'); ?></li>
			<?php if (!empty($folio_cat)):?>
				<?php foreach ($folio_cat as $term_id => $cat) : ?>
					<li class="filter control" data-filter=".<?php echo $cat->slug ?>"><?php echo $cat->name ?></li>
				<?php endforeach; ?>
			<?php endif; ?>
		</ul><!--/ #portfolio-filter -->

	</div>

<?php endif; ?>

<section class="section padding-off">

	<ul class="portfolio-items" data-ppp="<?php echo $posts_per_page ?>">

		<?php foreach ($query as $post): ?>

			<?php
			$categories_css_class = "";

			if (isset($posts_cat[$post->ID])) {

				$cats = $posts_cat[$post->ID];

				if (!empty($cats)) {
					foreach ($cats as $key => $tag) {
						if ($key > 0) {
							$categories_css_class .= " ";
						}
						$categories_css_class .= $tag->slug;
					}
				}
			}

			?>

			<li class="<?php echo $categories_css_class ?> mix opacity2x">

				<div class="work-item">

					<img src="<?php echo TMM_Helper::get_post_featured_image($post->ID, '511*375'); ?>" alt="" />

					<div class="image-extra">

						<div class="extra-content">

							<div class="inner-extra">

								<h2 class="extra-title"><?php the_title(); ?></h2>

								<h6 class="extra-category">
									<?php
									$cats = wp_get_post_terms($post->ID, 'folio_category');
									foreach ($cats as $key => $value) {
										if ($key > 0) {
											echo ' / ';
										}
										echo $value->name;
									}
									?>
								</h6>

								<a class="single-image link-icon" href="<?php the_permalink(); ?>">Permalink</a>
								<a class="single-image plus-icon" data-fancybox-group="folio" href="<?php echo TMM_Helper::get_post_featured_image($post->ID, ''); ?>">Image</a>							

							</div><!--/ .inner-extra-->

						</div><!--/ .extra-content-->

					</div><!--/ .image-extra-->

				</div><!--/ .work-item-->

			</li><!--/ .mix-->
			
		<?php endforeach; ?>

	</ul><!--/ #portfolio-items-->

	<div class="mixitup-page-list"></div>

</section><!--/ .section-->