<?php if (!defined('ABSPATH')) die('No direct access allowed');

$type = "";
$actions_array = array();

if (isset($actions)) {
	$actions_array = explode('^', $actions);
} 

$content = explode('^', $list_item_content);
$colors = explode('^', $colors);

switch ($list_type) {
	case 0:
		$list_type = 'ul';
		$type = 'unordered';
	break;
	case 1:
		$list_type = 'ol';
		$type = 'ordered';
	break;
	case 2:
		$list_type = 'ul';	
		$type = 'circle-list';	
	break;
	default: 
		$list_type = 'ul';
		$type = 'unordered';	
}

?>
<<?php echo esc_attr( $list_type ) ?> class="list <?php if ($type == 'circle-list'): ?>circle-list<?php endif; ?> <?php if ($animation) echo esc_attr( $animation ) ?>">
<?php if (!empty($content)): ?>
	<?php foreach ($content as $key => $text): ?>
		<li <?php if (!empty($colors[$key])): ?> style="color: <?php echo esc_attr( $colors[$key] ) ?>" <?php endif; ?>>
			<?php if ($type == 'unordered'): ?><i <?php if (!empty($colors[$key])) : ?> style="color: <?php echo esc_attr( $colors[$key] ) ?>" <?php endif; ?> class="<?php echo esc_attr( $actions_array[$key] ) ?>"></i><?php endif; ?>
				<?php echo esc_html( $text ) ?>
		</li>
	<?php endforeach; ?>
<?php endif; ?>
</<?php echo esc_attr( $list_type ) ?>>