<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="fullwidth">

		<?php
		$type_array = array(
			'icon-paper-plane-2' => 'paper plane',
			'icon-pencil-7' => 'pencil',
			'icon-cog-6' => 'cog',
			'icon-beaker-1' => 'beaker',
			'icon-megaphone-3' => 'megaphone',
			'icon-search' => 'search',
            'icon-lightbulb-3' => 'lightbulb',
            'icon-thumbs-up-5' => 'thumbs up',
			'icon-laptop' => 'laptop',
			'icon-wrench' => 'wrench',
			'icon-leaf' => 'leaf',
			'icon-cogs' => 'cogs',
			'icon-group' => 'group',
			'icon-folder-open' => 'folder open',
			'icon-folder-close' => 'folder close',
			'icon-cloud' => 'cloud',
			'icon-briefcase' => 'briefcase',
			'icon-beaker' => 'beaker',
			'icon-bullhorn' => 'bullhorn',
			'icon-comment' => 'comment',
			'icon-comments-alt' => 'comments alt',
			'icon-comment-6' => 'comment',
			'icon-globe' => 'globe',
			'icon-globe-6' => 'globe',
			'icon-heart' => 'heart',
			'icon-rocket' => 'rocket',
			'icon-suitcase' => 'suitcase',
			'icon-pencil' => 'pencil',
			'icon-params' => 'params',
			'icon-cog' => 'cog 2',
			'icon-coffee' => 'coffee',
			'icon-gift' => 'gift',
			'icon-home' => 'home',
			'icon-lightbulb' => 'lightbulb',
			'icon-thumbs-up' => 'thumbs up',
			'icon-umbrella' => 'umbrella',
			'icon-random' => 'random',
			'icon-th-list' => 'th list',
			'icon-resize-small' => 'resize small',
			'icon-download-alt' => 'download alt',
			//custom icons
			'icon-butterfly' => 'butterfly',
			'icon-door' => 'door',
			'icon-house' => 'house',
			'icon-parquet' => 'parquet',
			'icon-toolbox' => 'toolbox',
			'icon-wardrobe' => 'wardrobe',
			'icon-window' => 'window'
                         
		);
		?>

		<h4 class="label"><?php esc_html_e('Blocks', 'tmm_shortcodes'); ?></h4>
		
		<a class="button button-secondary js_add_list_item" href="#"><?php esc_html_e('Add item', 'tmm_shortcodes'); ?></a><br />
		
		<ul id="list_items" class="list-items">
			
			<?php
			$content_edit_data = array('');
			$links_edit_data = array('#');
			$titles_edit_data = array('');
			$icons_edit_data = array(key($type_array));
			$list_item_color = array('');
			
			if (isset($_REQUEST["shortcode_mode_edit"])) {
				$content_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['content']);
				$links_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['links']);
				$titles_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['titles']);
				$icons_edit_data = explode(',', $_REQUEST["shortcode_mode_edit"]['icons']);
				$list_item_color = explode(',', $_REQUEST["shortcode_mode_edit"]['colors']);
			}
			?>
                   
			<?php foreach ($content_edit_data as $key => $content_edit_text) : ?>
                                                    
				<li class="list_item">
					<ul class="list-table">
						<li>
							<ul>
								<li>
									<h4 class="label"><?php esc_html_e('Icon View', 'tmm_shortcodes'); ?></h4>
									<i class="<?php esc_attr_e( $icons_edit_data[$key] ) ?>"></i>
								</li>
								<li>
									<?php
									TMM_Ext_Shortcodes::draw_shortcode_option(array(
										'type' => 'select',
										'title' => esc_html__('Select Icon', 'tmm_shortcodes'),
										'shortcode_field' => 'list_item_icon',
										'id' => '',
										'options' => $type_array,
										'default_value' => $icons_edit_data[$key],
										'description' => '',
										'css_classes' => 'list_item_icon'
									));
									?>
								</li>
								<li>
									<h4 class="label"><?php esc_html_e('Title', 'tmm_shortcodes'); ?></h4>
									<input type="text" value="<?php esc_html_e( $titles_edit_data[$key], 'tmm_shortcodes' ) ?>" class="list_item_title js_shortcode_template_changer data-input" />			
								</li>
								<li>
									<h4 class="label"><?php esc_html_e('Delete Block', 'tmm_shortcodes'); ?></h4>
									<a class="button button-secondary js_delete_list_item js_shortcode_template_changer" href="#">&nbsp&nbsp&nbsp&nbsp<?php esc_html_e('Remove', 'tmm_shortcodes'); ?>&nbsp&nbsp&nbsp&nbsp</a>
								</li>
							</ul>
						</li>
						<li>
							<ul>
								<li>
									<h4 class="label"><?php esc_html_e('Content', 'tmm_shortcodes'); ?></h4>
									<textarea class="list_item_content js_shortcode_template_changer data-area"><?php esc_html_e( $content_edit_text, 'tmm_shortcodes' ) ?></textarea>										
								</li>
								<li>
									<div class="row-mover"></div>
								</li>
							</ul>
						</li>
					</ul>
				</li>

			<?php endforeach; ?>

		</ul><!--/ #list_items-->
		
		<a class="button button-secondary js_add_list_item" href="#"><?php esc_html_e('Add item', 'tmm_shortcodes'); ?></a><br />

	</div><!--/ .fullwidth-->
	
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
       
	jQuery(function () {
		
		colorizator();

		jQuery("#list_items").sortable({
			stop: function(event, ui) {
				tmm_ext_shortcodes.services_changer(shortcode_name);
			}
		});                
                
		tmm_ext_shortcodes.services_changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change', function () {                       
			tmm_ext_shortcodes.services_changer(shortcode_name);
		});

		jQuery(".js_add_list_item").click(function() { 
			var clone = jQuery(".list_item:last").clone(false);
			var last_row = jQuery(".list_item:last");
			jQuery(clone).insertAfter(last_row, clone);
            tmm_ext_shortcodes.services_changer(shortcode_name);
			jQuery(".list_item:last").find('input[type=text]').val("");
			jQuery(".list_item:last").find('textarea').val("");
			tmm_ext_shortcodes.services_changer(shortcode_name);   
            jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change', function () {
                tmm_ext_shortcodes.services_changer(shortcode_name);
            });
			colorizator();
			return false;
		});
                
		jQuery(document.body).on('click', '.js_delete_list_item', function () {
                                               
			if (jQuery(".list_item").length > 1) {                            
				jQuery(this).parents('li').hide(200, function () {
					jQuery(this).remove();
				});                             
			}
                        
            setTimeout(function() { tmm_ext_shortcodes.services_changer(shortcode_name); }, 500);
			
			return false;
		});
                
		jQuery(document.body).on('change', '.list_item_icon', function () {
			jQuery(this).parents('li').find('i').removeAttr('class').addClass(jQuery(this).val());
			tmm_ext_shortcodes.services_changer(shortcode_name);
		});
		
	});
	
</script>