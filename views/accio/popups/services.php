<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="fullwidth">

		<?php
		$type_array = array(
			'icon-paper-plane-2' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'paper-plane-2',
			'icon-pencil-7' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'pencil-7',
			'icon-cog-6' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'cog-6',
			'icon-beaker-1' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'beaker-1',
			'icon-megaphone-3' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'megaphone-3',
			'icon-search' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'search',
            'icon-lightbulb-3' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'lightbulb-3',
            'icon-thumbs-up-5' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'thumbs-up-5',
			'icon-laptop' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'laptop',
			'icon-wrench' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'wrench',
			'icon-leaf' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'leaf',
			'icon-cogs' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'cogs',
			'icon-group' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'group',
			'icon-folder-open' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'folder-open',
			'icon-folder-close' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'folder-close',
			'icon-cloud' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'cloud',
			'icon-briefcase' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'briefcase',
			'icon-beaker' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'beaker',
			'icon-bullhorn' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'bullhorn',
			'icon-comment' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'comment',
			'icon-comments-alt' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'comments-alt',
			'icon-comment-6' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'comment-6',
			'icon-globe' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'globe',
			'icon-globe-6' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'globe-6',
			'icon-heart' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'heart',
			'icon-rocket' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'rocket',
			'icon-suitcase' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'suitcase',
			'icon-pencil' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'pencil',
			'icon-params' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'params',
			'icon-cog' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'cog',
			'icon-coffee' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'coffee',
			'icon-gift' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'gift',
			'icon-home' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'home',
			'icon-lightbulb' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'lightbulb',
			'icon-thumbs-up' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'thumbs-up',
			'icon-umbrella' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'umbrella',
			'icon-random' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'random',
			'icon-th-list' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'th-list',
			'icon-resize-small' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'resize-small',
			'icon-download-alt' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'download-alt',
			//custom icons
			'icon-butterfly' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'butterfly',
			'icon-door' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'door',
			'icon-house' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'house',
			'icon-parquet' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'parquet',
			'icon-toolbox' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'toolbox',
			'icon-wardrobe' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'wardrobe',
			'icon-window' => esc_html__('Icon', 'tmm_shortcodes') . ': ' . 'window'
                         
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
									<i class="<?php echo $icons_edit_data[$key] ?>"></i>
								</li>
								<li>
									<?php
									TMM_Ext_Shortcodes::draw_shortcode_option(array(
										'type' => 'select',
										'title' => 'Select Icon',
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
									<input type="text" value="<?php echo $titles_edit_data[$key] ?>" class="list_item_title js_shortcode_template_changer data-input" />			
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
									<textarea class="list_item_content js_shortcode_template_changer data-area"><?php echo $content_edit_text ?></textarea>										
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
                
		jQuery(".js_delete_list_item").life('click', function () {
                                               
			if (jQuery(".list_item").length > 1) {                            
				jQuery(this).parents('li').hide(200, function () {
					jQuery(this).remove();
				});                             
			}
                        
            setTimeout(function() { tmm_ext_shortcodes.services_changer(shortcode_name); }, 500);
			
			return false;
		});
                
		jQuery(".list_item_icon").life('change', function () {
			jQuery(this).parents('li').find('i').removeAttr('class').addClass(jQuery(this).val());
			tmm_ext_shortcodes.services_changer(shortcode_name);
		});
		
	});
	
</script>