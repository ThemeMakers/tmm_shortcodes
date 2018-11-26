<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php
wp_enqueue_script('tmm_widget_twitterFetcher', TMM_THEME_URI . '/js/min/twitterFetcher.min.js');

$limit = $count;
if (!$limit) $limit = 5;
$twitter_screen_name = isset($twitter_screen_name) ? $twitter_screen_name : 'ThemeMakers';
$hash = md5(rand(1, 999));
?>

<script type="text/javascript">
	jQuery(function() {
			var config = {
				"profile": {"screenName": '<?php echo esc_js($twitter_screen_name); ?>'},
				"domId": 'tweets_<?php echo esc_js($hash); ?>',
				"maxTweets": <?php echo (int) $limit; ?>,
				"enableLinks": true,
				"showTime": true,
				"showUser": false,
				"showRetweet": false,
				"showInteraction": false
			};
			twitterFetcher.fetch(config);
		});
</script>

<div class="tmm_tweet <?php if($animation) echo esc_attr($animation) ?>" id="tweets_<?php echo esc_attr($hash) ?>" data-timeout="<?php echo esc_attr($timeout) ?>"></div>

<script type="text/javascript">

	jQuery(function($) {

		function swipeFunc(e, dir) {

			var $currentTarget = $(e.currentTarget);

			if ($currentTarget.data('slideCount') > 1) {
				$currentTarget.data('dir', '');
				if (dir === 'left') {
					$currentTarget.cycle('next');
				}
				if (dir === 'right') {
					$currentTarget.data('dir', 'prev');
					$currentTarget.cycle('prev');
				}
			}
		}

		var $tweet = jQuery('#tweets_<?php echo esc_attr($hash) ?>');

		setTimeout(function(){
			$tweets = $tweet.children('ul');

			$tweets.each(function(i) {

				var $this = $(this);

				$this.css('height', $this.children('li:first').height())
					.after('<div id="tweets-nav-' + i + '" class="tweets-control-nav">')
					.cycle({
						before: function(curr, next, opts) {
							var $this = $(this);
							$this.parent().stop().animate({
								height: $this.height()
							}, opts.speed);
						},
						containerResize: false,
						easing: 'easeInOutExpo',
						fit: true,
						pause: true,
						slideResize: true,
						speed: 600,
						timeout: $this.parent().data('timeout') ? $this.parent().data('timeout') : '',
						width: '100%',
						pager: '#tweets-nav-' + i
					}).data('slideCount', $this.children('li').length);

			});

			if ($tweets.data('slideCount') > 1) {
				jQuery(window).on('resize', function() {
					$tweets.css('height', $tweets.find('li:visible').height());
				});
			}

			if (Modernizr.touch) {
				$tweets.swipe({
					swipeLeft: swipeFunc,
					swipeRight: swipeFunc,
					allowPageScroll: 'auto'
				});
			}
		},4000);

	});

</script>