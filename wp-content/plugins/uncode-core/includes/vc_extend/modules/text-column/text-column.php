<?php
/**
 * VC Text Column config
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$add_text_size = uncode_core_vc_params_get_text_size( 'text_lead' );

vc_map(array(
	'name' => esc_html__('Text Block', 'uncode-core') ,
	'base' => 'vc_column_text',
	'weight' => 9750,
	'icon' => 'fa fa-font',
	'wrapper_class' => 'clearfix',
	'php_class_name' => 'uncode_generic_admin',
	'category' => array(
		esc_html__('Essentials', 'uncode-core') ,
		esc_html__('Dynamic', 'uncode-core') ,
		esc_html__('WooCommerce Product', 'uncode-core') ,
	),
	'description' => esc_html__('Text description content excerpt', 'uncode-core') ,
	'params' => array(
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Text', 'uncode-core') ,
			'param_name' => 'content',
			'value' => wp_kses(__('<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'uncode-core'), array( 'p' => array())),
			'dependency' => array(
				'element' => 'auto_text',
				'is_empty' => true,
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Dynamic Text", 'uncode-core') ,
			"param_name" => "auto_text",
			"description" => esc_html__("Activate this to use the Dynamic Text Content. NB. This option is designed to display dynamic contents created with the native WordPress editor, and not a page or content built through the Page Builder.", 'uncode-core') ,
			'admin_label' => true,
			"value" => array(
				esc_html__('No', 'uncode-core') => '',
				esc_html__('Get the Excerpt or Description', 'uncode-core') => 'excerpt',
				esc_html__('Get the Content', 'uncode-core') => 'content',
			) ,
		) ,
		$add_text_size,
		$add_css_animation,
		$add_animation_speed,
		$add_animation_delay,
		array(
			'type' => 'css_editor',
			'heading' => esc_html__('CSS', 'uncode-core') ,
			'param_name' => 'css',
			'group' => esc_html__('Custom', 'uncode-core')
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Border color", 'uncode-core') ,
			"param_name" => "border_color",
			"description" => esc_html__("Specify a border color.", 'uncode-core') ,
			"group" => esc_html__("Custom", 'uncode-core') ,
			"value" => $uncode_colors_w_transp,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Border style", 'uncode-core') ,
			"param_name" => "border_style",
			"description" => esc_html__("Specify a border style.", 'uncode-core') ,
			"group" => esc_html__("Custom", 'uncode-core') ,
			"value" => $border_style,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Element ID', 'uncode-core') ,
			'param_name' => 'el_id',
			'description' => esc_html__('This value has to be unique. Change it in case it\'s needed.', 'uncode-core') ,
			"group" => esc_html__("Extra", 'uncode-core') ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Extra class name', 'uncode-core') ,
			'param_name' => 'el_class',
			'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.', 'uncode-core'),
			"group" => esc_html__("Extra", 'uncode-core') ,
		) ,
	) ,
	'js_view' => 'UncodeTextView'
));
