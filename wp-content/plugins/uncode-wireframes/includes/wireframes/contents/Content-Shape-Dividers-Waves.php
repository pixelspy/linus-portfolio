<?php
/**
 * name             - Wireframe title
 * cat_name         - Comma separated list for multiple categories (cat display name)
 * custom_class     - Space separated list for multiple categories (cat ID)
 * dependency       - Array of dependencies
 * is_content_block - (optional) Best in a content block
 *
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$wireframe_categories = UNCDWF_Dynamic::get_wireframe_categories();
$data                 = array();

// Wireframe properties

$data[ 'name' ]             = esc_html__( 'Content Shape Dividers Waves', 'uncode-wireframes' );
$data[ 'cat_name' ]         = $wireframe_categories[ 'contents' ];
$data[ 'custom_class' ]     = 'contents';
$data[ 'image_path' ]       = UNCDWF_THUMBS_URL . 'contents/Content-Shape-Dividers-Waves.jpg';
$data[ 'dependency' ]       = array();
$data[ 'is_content_block' ] = false;

// Wireframe content

$data[ 'content' ]      = '
[vc_row row_height_percent="85" override_padding="yes" h_padding="2" top_padding="5" bottom_padding="5" back_color="accent" back_image="'. uncode_wf_print_single_image( '80472' ) .'" overlay_color="accent" overlay_alpha="80" gutter_size="4" column_width_percent="100" shift_y="0" z_index="0" enable_bottom_divider="default" bottom_divider_inv="waves-opacity" shape_bottom_invert="yes" shape_bottom_h_use_pixel="" shape_bottom_height="200" shape_bottom_opacity="100" shape_bottom_index="0" shape_dividers=""][vc_column column_width_percent="100" position_vertical="middle" style="dark" overlay_alpha="50" gutter_size="3" medium_width="4" align_mobile="align_center_mobile" mobile_width="0" shift_x="0" shift_y="0" shift_y_down="0" z_index="0" width="1/2"][vc_custom_heading heading_semantic="h3" text_size="'. uncode_wf_print_font_size( 'fontsize-155944' ) .'"]Medium length display headline[/vc_custom_heading][vc_column_text text_lead="yes"]Change the color to match your brand or vision, add your logo, choose the perfect layout, modify menu settings, add animations, add shape dividers, increase engagement with call to action and more.[/vc_column_text][vc_button size="" border_width="0" link="url:%23|||"]Click the button[/vc_button][/vc_column][vc_column column_width_percent="100" position_vertical="middle" overlay_alpha="50" gutter_size="3" medium_width="4" mobile_width="0" shift_x="0" shift_y="0" shift_y_down="0" z_index="0" width="1/2"][vc_single_image media="'. uncode_wf_print_single_image( '80471' ) .'" media_width_percent="100" media_ratio="one-one" shadow="yes" shadow_weight="xl"][/vc_column][/vc_row]
';

// Check if this wireframe is for a content block
if ( $data[ 'is_content_block' ] && ! $is_content_block ) {
	$data[ 'custom_class' ] .= ' for-content-blocks';
}

// Check if this wireframe requires a plugin
foreach ( $data[ 'dependency' ]  as $dependency ) {
	if ( ! UNCDWF_Dynamic::has_dependency( $dependency ) ) {
		$data[ 'custom_class' ] .= ' has-dependency needs-' . $dependency;
	}
}

vc_add_default_templates( $data );
