<?php if (!defined('ABSPATH')) die('No direct access allowed');

wp_enqueue_script('tmm_widget_twitterFetcher', TMM_THEME_URI . '/js/min/twitterFetcher.min.js');

$limit = $count;
if (!$limit) $limit = 5;
$twitter_screen_name = isset($twitter_screen_name) ? $twitter_screen_name : 'ThemeMakers';
$hash = md5(rand(1, 999));
$lang = substr( get_bloginfo( 'language' ), 0, 2 );
?>

<div class="tmm_tweet <?php if($animation) echo esc_attr($animation) ?>" id="tweets_<?php echo esc_attr($hash) ?>"></div>

<script>

	jQuery(function($) {

        const fetchTweets = () => {
            const config = {
                "profile": {"screenName": '<?php echo esc_js($twitter_screen_name); ?>'},
                "domId": 'tweets_<?php echo esc_js($hash); ?>',
                "maxTweets": <?php echo (int) $limit; ?>,
                "enableLinks": true,
                "showTime": true,
                "showUser": false,
                "showRetweet": false,
                "showInteraction": false,
                "lang": '<?php echo esc_js($lang) ?>'
            };
            twitterFetcher.fetch(config);
        };

        const initTweetSlider = () => {
            const $tweet = $('#tweets_<?php echo esc_attr($hash) ?>');

            const $tweets = $tweet.find('> ul');

            $tweets.each(function() {

                const $this = $(this);

                $this.lightSlider({
                    item: 1,
                    autoWidth: false,
                    easing: 'easeInOutExpo',
                    speed: 600,
                    pause: <?php echo esc_attr($timeout) ?>,
                    mode: 'fade', //Type of transition 'slide' and 'fade'
                    auto: true,
                    loop: true,
                    controls: false,
                    pauseOnHover: true,
                    pager: true
                });

            });
        };

        $.when(fetchTweets()).then(function(){
            setTimeout(initTweetSlider,5000);
        })

	});

</script>