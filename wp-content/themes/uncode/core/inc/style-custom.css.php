<?php

global $front_background_colors, $menutype;

/****
/   Load theme options
*****/

if ( is_multisite() ) {
	$uncode_option = get_blog_option( get_current_blog_id(), ot_options_id() );
} else {
	$uncode_option = get_option(ot_options_id());
}

if (empty($uncode_option)) {
	echo 'exit';
	return;
}

$cs_logo_color_light = $uncode_option['_uncode_logo_color_light'];
$cs_menu_color_light = $uncode_option['_uncode_menu_color_light'];
$cs_menu_bg_color_light = $uncode_option['_uncode_menu_bg_color_light'];
$cs_submenu_bg_color_light = $uncode_option['_uncode_submenu_bg_color_light'];
$cs_menu_bg_alpha_light = $uncode_option['_uncode_menu_bg_alpha_light'];
$cs_menu_border_color_light = $uncode_option['_uncode_menu_border_color_light'];
$cs_menu_border_alpha_light = $uncode_option['_uncode_menu_border_alpha_light'];
$cs_heading_color_light = $uncode_option['_uncode_heading_color_light'];
$cs_text_color_light = $uncode_option['_uncode_text_color_light'];
$cs_bg_color_light = $uncode_option['_uncode_background_color_light'];

$cs_logo_color_dark = $uncode_option['_uncode_logo_color_dark'];
$cs_menu_color_dark = $uncode_option['_uncode_menu_color_dark'];
$cs_menu_bg_color_dark = $uncode_option['_uncode_menu_bg_color_dark'];
$cs_submenu_bg_color_dark = $uncode_option['_uncode_submenu_bg_color_dark'];
$cs_menu_bg_alpha_dark = $uncode_option['_uncode_menu_bg_alpha_dark'];
$cs_menu_border_color_dark = $uncode_option['_uncode_menu_border_color_dark'];
$cs_menu_border_alpha_dark = $uncode_option['_uncode_menu_border_alpha_dark'];
$cs_heading_color_dark = $uncode_option['_uncode_heading_color_dark'];
$cs_text_color_dark = $uncode_option['_uncode_text_color_dark'];
$cs_bg_color_dark = $uncode_option['_uncode_background_color_dark'];

$cs_accent_color = $uncode_option['_uncode_accent_color'];

$cs_body_font_family = $uncode_option['_uncode_body_font_family'];
$cs_body_font_weight = isset( $uncode_option['_uncode_body_font_weight'] ) ? $uncode_option['_uncode_body_font_weight'] : 400;
$cs_ui_font_family = $uncode_option['_uncode_ui_font_family'];
$cs_menu_font_family = $uncode_option['_uncode_menu_font_family'];
$cs_heading_font_family = $uncode_option['_uncode_heading_font_family'];
$cs_buttons_font_family = $uncode_option['_uncode_buttons_font_family'];
$cs_font_fallback = isset($uncode_option['_uncode_fallback_font']) ? $uncode_option['_uncode_fallback_font'] : '';

$btn_outline = $front_background_colors[$cs_heading_color_light];

echo "/*";
echo "\n" . "----------------------------------------------------------";
echo "\n" . "[Table of contents]";
echo "\n\n";
echo "\n" . "#Skins-Colors";
echo "\n" . "#Skins-Typography";
echo "\n" . "#Skins-General";
echo "\n" . "#Skins-Buttons";
echo "\n" . "#Skins-Alerts";
echo "\n" . "#Skins-Menus";
echo "\n" . "#Skins-Thumbs";
echo "\n\n";
echo "\n" . "----------------------------------------------------------";
echo "\n" . "*/";

echo "\n" . "/*";
echo "\n" . "----------------------------------------------------------";
echo "\n\n";
echo "\n" . "#Skins-Color";
echo "\n\n";
echo "\n" . "----------------------------------------------------------";
echo "\n" . "*/";

/** Loop colors **/
foreach ($front_background_colors as $key => $value) {
	if (!isset($value) || $value === '') {
		continue;
	}
	$value = str_replace(';nb',';b',$value);
	$value = str_replace(';n}',';}',$value);
	$value_rgb = sscanf($value, "#%02x%02x%02x");
	echo "\n\n" . '/*----------------------------------------------------------';
	echo "\n" . '#'.$key;
	echo "\n" . '----------------------------------------------------------*/';
	if (strpos($value, 'background') !== false) {
		echo "\n" . '.style-' . $key . '-bg { ' . $value . ' }';
		echo "\n" . '.btn-' . $key . ' { color: #ffffff !important; ' . $value . str_replace('background','border-image',$value) . '}';
		echo "\n" . '.border-' . $key . '-color {'.str_replace('background','border-image',$value).'}';
		preg_match_all("/rgb\s*\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\)/i", $value, $matches);
		if (isset($matches[0][0])) {
			echo "\n" . '.text-' . $key . '-color > * { color: '.$matches[0][0].' !important; }';
		}
		echo "\n" . '.text-' . $key . '-color > * { -webkit-text-fill-color: transparent !important; -webkit-background-clip: text !important; '.$value.' }';
		echo "\n" . '.text-' . $key . '-color > * { background: none !important \0/IE9; }';
		echo "\n" . '@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) { .text-' . $key . '-color > * { background: none !important; } }';
	} else {
		if ( function_exists('uncode_darken_color')) {
			$darken_value = uncode_darken_color( $value );
		} else {
			$darken_value = $value;
		}
		echo "\n" . '.style-' . $key . '-bg { background-color: ' . $value . '; }';
		if ($key !== 'white') {
			echo "\n" . '.btn-' . $key . ' { color: #ffffff !important; background-color: ' . $value . ' !important; border-color: ' . $value . ' !important; }';
		} else {
			echo "\n" . '.btn-' . $key . ' { color: #1a1b1c !important; background-color: ' . $value . ' !important; border-color: ' . $value . ' !important; }';
		}
		echo "\n" . '.btn-' . $key . ':not(.btn-hover-nobg):not(.icon-animated):hover, .btn-' . $key . ':not(.btn-hover-nobg):not(.icon-animated):focus, .btn-' . $key . ':not(.btn-hover-nobg):not(.icon-animated):active { background-color: transparent !important; border-color: ' . $value . ' !important;}';
		echo "\n" . '.btn-' . $key . '.btn-flat:not(.btn-hover-nobg):hover, .btn-' . $key . '.btn-flat:not(.btn-hover-nobg):focus, .btn-' . $key . '.btn-flat:active { background-color: ' . $darken_value . ' !important; border-color: ' . $darken_value . ' !important;}';
		echo "\n" . '.btn-' . $key . ':not(.btn-flat):not(.btn-hover-nobg):not(.icon-animated):not(.btn-text-skin):hover, .btn-' . $key . ':not(.btn-flat):not(.btn-hover-nobg):not(.icon-animated):not(.btn-text-skin):focus, .btn-' . $key . ':not(.btn-flat):not(.btn-hover-nobg):not(.icon-animated):not(.btn-text-skin):active { color: ' . $value . ' !important; }';
		echo "\n" . '.btn-' . $key . '.btn-outline { background-color: transparent !important; border-color: ' . $value . ' !important; }';
		echo "\n" . '.btn-' . $key . '.btn-outline:not(.btn-text-skin) { color: ' . $value . ' !important; }';
		echo "\n" . '.btn-' . $key . '.btn-outline:not(.btn-hover-nobg):hover, .btn-' . $key . '.btn-outline:not(.btn-hover-nobg):focus, btn-' . $key . '.btn-outline:active { background-color: ' . $value . ' !important; border-color: ' . $value . ' !important; }';
		echo "\n" . '.btn-' . $key . '.btn-outline:not(.btn-hover-nobg):not(.btn-text-skin):not(.icon-animated):hover, .btn-' . $key . '.btn-outline:not(.btn-hover-nobg):not(.btn-text-skin):not(.icon-animated):focus, btn-' . $key . '.btn-outline:active { color: #ffffff !important; }';
		echo "\n" . '.style-light .btn-' . $key . '.btn-text-skin.btn-outline, .style-light .btn-' . $key . '.btn-text-skin:not(.btn-outline):hover, .style-light .btn-' . $key . '.btn-text-skin:not(.btn-outline):focus, .style-light .btn-' . $key . '.btn-text-skin:not(.btn-outline):active { color: ' . $btn_outline . ' !important; }';
		echo "\n" . '.style-light .btn-' . $key . '.btn-text-skin.btn-outline:hover, .style-light .btn-' . $key . '.btn-text-skin.btn-outline:focus, .style-light .btn-' . $key . '.btn-text-skin.btn-outline:active { color: #ffffff !important; }';
		echo "\n" . '.style-light .style-dark .btn-' . $key . '.btn-text-skin.btn-outline, .style-light .style-dark .btn-' . $key . '.btn-text-skin:not(.btn-outline):hover, .style-light .style-dark .btn-' . $key . '.btn-text-skin:not(.btn-outline):focus, .style-light .style-dark .btn-' . $key . '.btn-text-skin:not(.btn-outline):active { color: #ffffff !important; }';
		echo "\n" . '.style-light .style-dark .btn-' . $key . '.btn-text-skin.btn-outline:hover, .style-light .style-dark .btn-' . $key . '.btn-text-skin.btn-outline:focus, .style-light .style-dark .btn-' . $key . '.btn-text-skin.btn-outline:active { color: ' . $btn_outline . ' !important; }';
		echo "\n" . '.text-' . $key . '-color { color: ' . $value . ' !important; fill: ' . $value . ' !important; }';
		echo "\n" . '.border-' . $key . '-color { border-color: ' . $value . ' !important; }';
		if ( $value_rgb && is_array($value_rgb) && isset($value_rgb[0]) && $value_rgb[0] !== '' ) {
			echo "\n" . '.tmb-overlay-gradient-top .style-' . $key . '-bg { background-color: transparent !important; background-image: linear-gradient(to bottom, ' . $value . ' 0%, rgba(' . $value_rgb[0] . ', ' . $value_rgb[1] . ', ' . $value_rgb[2] . ', 0) 50%) !important;}';
			echo "\n" . '.tmb-overlay-gradient-bottom .style-' . $key . '-bg:not(.tmb-term-evidence) { background-color: transparent !important; background-image: linear-gradient(to top, ' . $value . ' 0%, rgba(' . $value_rgb[0] . ', ' . $value_rgb[1] . ', ' . $value_rgb[2] . ', 0) 50%) !important;}';
		} else {
			echo "\n" . '.tmb-overlay-gradient-top .style-' . $key . '-bg { background-color: transparent !important; }';
			echo "\n" . '.tmb-overlay-gradient-bottom .style-' . $key . '-bg:not(.tmb-term-evidence) { background-color: transparent !important; }';
		}
	}

	if ($key === $cs_logo_color_light) {
		$cs_logo_color_light = $value;
	}
	if ($key === $cs_menu_color_light) {
		if (strpos($value, 'background') !== false) {
			preg_match_all("/rgb\s*\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\)/i", $value, $matches);
			if (isset($matches[0][0])) {
				$cs_menu_color_light = $matches[0][0];
			}
			echo "\n" . '.menu-light .menu-smart a, .menu-light .menu-smart a i:before { -webkit-text-fill-color: transparent !important; -webkit-background-clip: text !important; ' . $value . '}';
		} else {
			$cs_menu_color_light = $value;
		}
	}
	if ($key === $cs_menu_bg_color_light) {
		$cs_menu_bg_color_light = $value;
	}
	if ($key === $cs_submenu_bg_color_light) {
		$cs_submenu_bg_color_light = $value;
	}
	if ($key === $cs_menu_border_color_light) {
		$cs_menu_border_color_light = $value;
	}
	if ($key === $cs_menu_border_alpha_light) {
		$cs_menu_border_alpha_light = $value;
	}
	if ($key === $cs_heading_color_light) {
		$cs_heading_color_light = $value;
	}
	if ($key === $cs_text_color_light) {
		$cs_text_color_light = $value;
	}
	if ($key === $cs_bg_color_light) {
		$cs_bg_color_light = $value;
	}

	if ($key === $cs_logo_color_dark) {
		$cs_logo_color_dark = $value;
	}
	if ($key === $cs_menu_color_dark) {
		$cs_menu_color_dark = $value;
	}
	if ($key === $cs_menu_bg_color_dark) {
		$cs_menu_bg_color_dark = $value;
	}
	if ($key === $cs_submenu_bg_color_dark) {
		$cs_submenu_bg_color_dark = $value;
	}
	if ($key === $cs_menu_border_color_dark) {
		$cs_menu_border_color_dark = $value;
	}
	if ($key === $cs_menu_border_color_dark) {
		$cs_menu_border_color_dark = $value;
	}
	if ($key === $cs_heading_color_dark) {
		$cs_heading_color_dark = $value;
	}
	if ($key === $cs_text_color_dark) {
		$cs_text_color_dark = $value;
	}
	if ($key === $cs_bg_color_dark) {
		$cs_bg_color_dark = $value;
	}

	if ($key === $cs_accent_color) {
		$cs_accent_color = $value;
	}
}

if ($cs_bg_color_light !== '') {
	echo "\n\n" . '/*----------------------------------------------------------';
	echo "\n" . '#Style light';
	echo "\n" . '----------------------------------------------------------*/';
	if (strpos($cs_bg_color_light, 'background') !== false) {
		echo "\n" . '.style-light-bg { ' . $cs_bg_color_light . ' }';
	} else {
		echo "\n" . '.style-light-bg { background-color: ' . $cs_bg_color_light . '; }';
		echo "\n" . '.border-light-bg { border-color: ' . $cs_bg_color_light . '; }';
	}
}
if ($cs_bg_color_dark !== '') {
	echo "\n\n" . '/*----------------------------------------------------------';
	echo "\n" . '#Style dark';
	echo "\n" . '----------------------------------------------------------*/';
	if (strpos($cs_bg_color_dark, 'background') !== false) {
		echo "\n" . '.style-dark-bg { ' . $cs_bg_color_dark . ' }';
	} else {
		echo "\n" . '.style-dark-bg { background-color: ' . $cs_bg_color_dark . '; }';
		echo "\n" . '.border-dark-bg { border-color: ' . $cs_bg_color_dark . '; }';
	}
}

echo "\n\n" . '/*----------------------------------------------------------';
echo "\n" . '#Color fix';
echo "\n" . '----------------------------------------------------------*/';
echo "\n" . '.btn-white.btn-outline:hover, .btn-white.btn-outline:focus, .btn-white.btn-outline:active { color: #333333 !important; }';

echo "\n" . "/*";
echo "\n" . "----------------------------------------------------------";
echo "\n\n";
echo "\n" . "#Skins-Typography";
echo "\n\n";
echo "\n" . "----------------------------------------------------------";
echo "\n" . "*/";

/** Loop fonts **/
if (isset($uncode_option['_uncode_font_groups'])) {
	$fonts = $uncode_option['_uncode_font_groups'];
	if (!empty($fonts) && is_array($fonts)) {
		foreach ($fonts as $key => $value) {
			$font_class = $value['_uncode_font_group_unique_id'];
			$font_name = urldecode($value['_uncode_font_group']);
			if ($font_name === 'manual') {
				$font_name = $value['_uncode_font_manual'];
			}
			$font_name = str_replace( ', ', ',', $font_name );
			$font_name_arr = explode( ',', $font_name );
			$font_name = '';
			foreach ( $font_name_arr as $key => $font_name_value ) {
				if (strpos($font_name_value, ' ') > 0 && strpos($font_name_value, "'") === false && strpos($font_name_value, "\"") === false) {
					$font_name_value = "'" . $font_name_value . "'";
				}
				$font_name .= $font_name_value;
				if ( ( $key+1 ) < count($font_name_arr) ) {
				    $font_name .= ',';
				}
			}
			if ($font_name !== '') {
				echo "\n\n" . '/*----------------------------------------------------------';
				echo "\n" . '#'.$font_name;
				echo "\n" . '----------------------------------------------------------*/';
				echo "\n" . '.' . $font_class . ' { font-family: ' . $font_name . ' !important; }';
				echo "\n" . '.btn-custom-typo.' . $font_class . ' { font-family: ' . $font_name . ' !important; }';
			}

			if ($font_class === $cs_body_font_family) {
				$cs_body_font_family = $font_name;
			}
			if ($font_class === $cs_ui_font_family) {
				$cs_ui_font_family = $font_name;
			}
			if ($font_class === $cs_menu_font_family) {
				$cs_menu_font_family = $font_name;
			}
			if ($font_class === $cs_heading_font_family) {
				$cs_heading_font_family = $font_name;
			}
			if ($font_class === $cs_buttons_font_family) {
				$cs_buttons_font_family = $font_name;
			}
			if ($font_class === $cs_font_fallback) {
				$cs_font_fallback = $font_name;
			}

		}
	}
}

/** Loop font sizes **/
if (isset($uncode_option['_uncode_heading_font_sizes'])) {
	$font_sizes = $uncode_option['_uncode_heading_font_sizes'];
	if (!empty($font_sizes) && is_array($font_sizes)) {
		foreach ($font_sizes as $key => $value) {
			$_heading_font_size = isset( $value['_uncode_heading_font_size'] ) ? floatval( $value['_uncode_heading_font_size'] ) : 0;
			if ( $_heading_font_size && $_heading_font_size > 0 ) {
				echo "\n\n" . '/*----------------------------------------------------------';
				echo "\n" . '#Font-size: '.$_heading_font_size.'px';
				echo "\n" . '----------------------------------------------------------*/';
				echo "\n" . '.' . $value['_uncode_heading_font_size_unique_id'] . ' { font-size: ' . $_heading_font_size . 'px; }';
				$first_mquery = $_heading_font_size / 1.5;
				if ($_heading_font_size > 35) {
					echo "\n" . '@media (max-width: 959px) { .' . $value['_uncode_heading_font_size_unique_id'] . ' { font-size: ' . $first_mquery . 'px; }}';
					if ($first_mquery > 35) {
						echo "\n" . '@media (max-width: 569px) { .' . $value['_uncode_heading_font_size_unique_id'] . ' { font-size: 35px; }}';
					}
				}
				if ($first_mquery > 28) {
					echo "\n" . '@media (max-width: 320px) { .' . $value['_uncode_heading_font_size_unique_id'] . ' { font-size: 28px; }}';
				}
			}
		}
	}
}

/** Loop font height **/
if (isset($uncode_option['_uncode_heading_font_heights'])) {
	$font_heights = $uncode_option['_uncode_heading_font_heights'];
	if (!empty($font_heights) && is_array($font_heights)) {
		foreach ($font_heights as $key => $value) {
			echo "\n\n" . '/*----------------------------------------------------------';
			echo "\n" . '#Line-height: '.$value['_uncode_heading_font_height'];
			echo "\n" . '----------------------------------------------------------*/';
			echo "\n" . '.' . $value['_uncode_heading_font_height_unique_id'] . ' { line-height: ' . $value['_uncode_heading_font_height'] . '; }';
		}
	}
}

/** Loop letter spacings **/
if (isset($uncode_option['_uncode_heading_font_spacings'])) {
	$font_spacings = $uncode_option['_uncode_heading_font_spacings'];
	if (!empty($font_spacings) && is_array($font_spacings)) {
		foreach ($font_spacings as $key => $value) {
			echo "\n\n" . '/*----------------------------------------------------------';
			echo "\n" . '#Letter-spacing: '.$value['_uncode_heading_font_spacing'];
			echo "\n" . '----------------------------------------------------------*/';
			echo "\n" . '.' . $value['_uncode_heading_font_spacing_unique_id'] . ' { letter-spacing: ' . $value['_uncode_heading_font_spacing'] . ' !important; }';
		}
	}
}

/** Collect style for admin **/
$admin_css = ob_get_contents();

echo "\n\n" . '/*----------------------------------------------------------';
echo "\n" . '#Standard font size';
echo "\n" . '----------------------------------------------------------*/';
$default_font_size = isset($uncode_option['_uncode_font_size']) ? $uncode_option['_uncode_font_size'] : '';
$large_text_font_size = isset($uncode_option['_uncode_large_text_size']) ? $uncode_option['_uncode_large_text_size'] : '';
$small_text_font_size = isset($uncode_option['_uncode_small_text_size']) ? $uncode_option['_uncode_small_text_size'] : '';
$h1 = isset($uncode_option['_uncode_heading_h1']) ? $uncode_option['_uncode_heading_h1'] : '';
$h2 = isset($uncode_option['_uncode_heading_h2']) ? $uncode_option['_uncode_heading_h2'] : '';
$h3 = isset($uncode_option['_uncode_heading_h3']) ? $uncode_option['_uncode_heading_h3'] : '';
$h4 = isset($uncode_option['_uncode_heading_h4']) ? $uncode_option['_uncode_heading_h4'] : '';
$h5 = isset($uncode_option['_uncode_heading_h5']) ? $uncode_option['_uncode_heading_h5'] : '';
$h6 = isset($uncode_option['_uncode_heading_h6']) ? $uncode_option['_uncode_heading_h6'] : '';
if ($default_font_size !== '') {
	echo "\n" . 'body,p,li,dt,dd,dl,address,label,pre,code { font-size: ' . $default_font_size . 'px; }';
}
if ($large_text_font_size !== '') {
	echo "\n.text-lead, .text-lead > * { font-size: " . intval($large_text_font_size) . "px; }".
	"\n.module-text-lead,.module-text-lead > *,.module-text-lead p,.module-text-lead li,.module-text-lead dt,.module-text-lead dd,.module-text-lead dl,.module-text-lead address,.module-text-lead label,.module-text-lead small,.uncode-wc-module.text-lead pre,.module-text-lead code { font-size: " . intval($large_text_font_size) . "px; }".
	"\n@media (max-width: 1499px) { .uncode-slider .text-lead > * { font-size: " . ( ( intval($large_text_font_size) / 9 ) * 8 ) . "px; } }".
	"\n@media (max-width: 959px) { .uncode-slider .text-lead > * { font-size: " . ( ( intval($large_text_font_size) / 18 ) * 13 ) . "px; } }";
}
if ($small_text_font_size !== '') {
	echo "\n.text-small, .text-small > * { font-size: " . intval($small_text_font_size) . "px; }".
	"\n.module-text-small,.module-text-small > *,.module-text-small p,.module-text-small li,.module-text-small dt,.module-text-small dd,.module-text-small dl,.module-text-small address,.module-text-small label,.module-text-small small,.uncode-wc-module.text-small pre,.module-text-small code { font-size: " . intval($small_text_font_size) . "px; }".
	"\n@media (max-width: 1499px) { .uncode-slider .text-small > * { font-size: " . ( ( intval($small_text_font_size) / 9 ) * 8 ) . "px; } }".
	"\n@media (max-width: 959px) { .uncode-slider .text-small > * { font-size: " . ( ( intval($small_text_font_size) / 18 ) * 13 ) . "px; } }";
}
if ($h1 !== '') {
	echo "\n" . 'h1:not([class*="fontsize-"]),.h1:not([class*="fontsize-"]) { font-size: ' . $h1 . 'px; }';
	$first_mquery = $h1 / 1.5;
	if ($h1 > 35) {
		echo "\n" . '@media (max-width: 959px) { h1:not([class*="fontsize-"]),.h1:not([class*="fontsize-"]) { font-size: ' . $first_mquery . 'px; }}';
		if ($first_mquery > 35) {
			echo "\n" . '@media (max-width: 569px) { h1:not([class*="fontsize-"]),.h1:not([class*="fontsize-"]) { font-size: 35px; }}';
		}
	}
	if ($first_mquery > 28) {
		echo "\n" . '@media (max-width: 320px) { h1:not([class*="fontsize-"]),.h1:not([class*="fontsize-"]) { font-size: 28px; }}';
	}
}
if ($h2 !== '') {
	echo "\n" . 'h2:not([class*="fontsize-"]),.h2:not([class*="fontsize-"]) { font-size: ' . $h2 . 'px; }';
	$first_mquery = $h2 / 1.5;
	if ($h2 > 35) {
		echo "\n" . '@media (max-width: 959px) { h2:not([class*="fontsize-"]),.h2:not([class*="fontsize-"]) { font-size: ' . $first_mquery . 'px; }}';
		if ($first_mquery > 35) {
			echo "\n" . '@media (max-width: 569px) { h2:not([class*="fontsize-"]),.h2:not([class*="fontsize-"]) { font-size: 35px; }}';
		}
	}
	if ($first_mquery > 28) {
		echo "\n" . '@media (max-width: 320px) { h2:not([class*="fontsize-"]),.h2:not([class*="fontsize-"]) { font-size: 28px; }}';
	}
}
if ($h3 !== '') {
	echo "\n" . 'h3:not([class*="fontsize-"]),.h3:not([class*="fontsize-"]) { font-size: ' . $h3 . 'px; }';
	$first_mquery = $h3 / 1.5;
	if ($h3 > 35) {
		echo "\n" . '@media (max-width: 959px) { h3:not([class*="fontsize-"]),.h3:not([class*="fontsize-"]) { font-size: ' . $first_mquery . 'px; }}';
		if ($first_mquery > 35) {
			echo "\n" . '@media (max-width: 569px) { h3:not([class*="fontsize-"]),.h3:not([class*="fontsize-"]) { font-size: 35px; }}';
		}
	}
	if ($first_mquery > 28) {
		echo "\n" . '@media (max-width: 320px) { h3:not([class*="fontsize-"]),.h3:not([class*="fontsize-"]) { font-size: 28px; }}';
	}
}
if ($h4 !== '') {
	echo "\n" . 'h4:not([class*="fontsize-"]),.h4:not([class*="fontsize-"]) { font-size: ' . $h4 . 'px; }';
	$first_mquery = $h4 / 1.5;
	if ($h4 > 35) {
		echo "\n" . '@media (max-width: 959px) { h4:not([class*="fontsize-"]),.h4:not([class*="fontsize-"]) { font-size: ' . $first_mquery . 'px; }}';
		if ($first_mquery > 35) {
			echo "\n" . '@media (max-width: 569px) { h4:not([class*="fontsize-"]),.h4:not([class*="fontsize-"]) { font-size: 35px; }}';
		}
	}
	if ($first_mquery > 28) {
		echo "\n" . '@media (max-width: 320px) { h4:not([class*="fontsize-"]),.h4:not([class*="fontsize-"]) { font-size: 28px; }}';
	}
}
if ($h5 !== '') {
	echo "\n" . 'h5:not([class*="fontsize-"]),.h5:not([class*="fontsize-"]) { font-size: ' . $h5 . 'px; }';
	$first_mquery = $h5 / 1.5;
	if ($h5 > 35) {
		echo "\n" . '@media (max-width: 959px) { h5:not([class*="fontsize-"]),.h5:not([class*="fontsize-"]) { font-size: ' . $first_mquery . 'px; }}';
		if ($first_mquery > 35) {
			echo "\n" . '@media (max-width: 569px) { h5:not([class*="fontsize-"]),.h5:not([class*="fontsize-"]) { font-size: 35px; }}';
		}
	}
	if ($first_mquery > 28) {
		echo "\n" . '@media (max-width: 320px) { h5:not([class*="fontsize-"]),.h5:not([class*="fontsize-"]) { font-size: 28px; }}';
	}
}
if ($h6 !== '') {
	echo "\n" . 'h6:not([class*="fontsize-"]),.h6:not([class*="fontsize-"]) { font-size: ' . $h6 . 'px; }';
	$first_mquery = $h6 / 1.5;
	if ($h6 > 35) {
		echo "\n" . '@media (max-width: 959px) { h6:not([class*="fontsize-"]),.h6:not([class*="fontsize-"]) { font-size: ' . $first_mquery . 'px; }}';
		if ($first_mquery > 35) {
			echo "\n" . '@media (max-width: 569px) { h6:not([class*="fontsize-"]),.h6:not([class*="fontsize-"]) { font-size: 35px; }}';
		}
	}
	if ($first_mquery > 28) {
		echo "\n" . '@media (max-width: 320px) { h6:not([class*="fontsize-"]),.h6:not([class*="fontsize-"]) { font-size: 28px; }}';
	}
}

echo "\n\n";

$color_primary = $cs_accent_color;

/** Light skin **/
$color_logo = $cs_logo_color_light;
$color_menu_text = $cs_menu_color_light;
$color_menu_background_alpha_light = uncode_hex2rgb($cs_menu_bg_color_light);
$color_menu_background_alpha_light = 'rgba('.$color_menu_background_alpha_light[0].','.$color_menu_background_alpha_light[1].','.$color_menu_background_alpha_light[2].','.($cs_menu_bg_alpha_light / 100).')';
$color_menu_background_light = $cs_menu_bg_color_light;
$color_submenu_background_light = $cs_submenu_bg_color_light;
$color_menu_border_light_transparent = uncode_hex2rgb($cs_menu_border_color_light);
$color_menu_border_light = $color_submenu_border_light = $color_menu_border_light_transparent = 'rgba('.$color_menu_border_light_transparent[0].','.$color_menu_border_light_transparent[1].','.$color_menu_border_light_transparent[2].','.($cs_menu_border_alpha_light / 100).')';
$get_menu_hover_color = $uncode_option['_uncode_menu_color_hover'];
if ($get_menu_hover_color === '') {
	$color_menu_text_hover = uncode_hex2rgb($cs_menu_color_light);
	$color_menu_text_hover = 'rgba('.$color_menu_text_hover[0].','.$color_menu_text_hover[1].','.$color_menu_text_hover[2].',.5)';
} else {
	$color_menu_text_hover = $front_background_colors[$get_menu_hover_color];
}
$color_menu_text_hover_static = uncode_hex2rgb($cs_menu_color_light);
	$color_menu_text_hover_static = 'rgba('.$color_menu_text_hover_static[0].','.$color_menu_text_hover_static[1].','.$color_menu_text_hover_static[2].',.5)';

/** Dark skin **/
$color_logo_inverted = $cs_logo_color_dark;
$color_menu_text_inverted = $cs_menu_color_dark;
$color_menu_background_alpha_dark = uncode_hex2rgb($cs_menu_bg_color_dark);
$color_menu_background_alpha_dark = 'rgba('.$color_menu_background_alpha_dark[0].','.$color_menu_background_alpha_dark[1].','.$color_menu_background_alpha_dark[2].','.($cs_menu_bg_alpha_dark / 100).')';
$color_menu_background_dark = $cs_menu_bg_color_dark;
$color_submenu_background_dark = $cs_submenu_bg_color_dark;
$color_menu_border_dark_transparent = uncode_hex2rgb($cs_menu_border_color_dark);
$color_menu_border_dark = $color_submenu_border_dark = $color_menu_border_dark_transparent = 'rgba('.$color_menu_border_dark_transparent[0].','.$color_menu_border_dark_transparent[1].','.$color_menu_border_dark_transparent[2].','.($cs_menu_border_alpha_dark / 100).')';
if ($get_menu_hover_color === '') {
	$color_menu_text_inverted_hover = uncode_hex2rgb($cs_menu_color_dark);
	$color_menu_text_inverted_hover = 'rgba('.$color_menu_text_inverted_hover[0].','.$color_menu_text_inverted_hover[1].','.$color_menu_text_inverted_hover[2].',.5)';
} else {
	$color_menu_text_inverted_hover = $front_background_colors[$get_menu_hover_color];
}
$color_menu_text_inverted_hover_static = uncode_hex2rgb($cs_menu_color_dark);
$color_menu_text_inverted_hover_static = 'rgba('.$color_menu_text_inverted_hover_static[0].','.$color_menu_text_inverted_hover_static[1].','.$color_menu_text_inverted_hover_static[2].',.5)';

$color_heading = $cs_heading_color_light;
$color_heading_alpha = uncode_hex2rgb($color_heading);
$color_heading_alpha = 'rgba('.$color_heading_alpha[0].','.$color_heading_alpha[1].','.$color_heading_alpha[2].',0.75)';

$color_heading_inverted = $cs_heading_color_dark;
$color_text = $cs_text_color_light;
$color_text_inverted = $cs_text_color_dark;

$color_ui_text_alpha_light = uncode_hex2rgb($color_text);
$color_ui_text_alpha_light = 'rgba('.$color_ui_text_alpha_light[0].','.$color_ui_text_alpha_light[1].','.$color_ui_text_alpha_light[2].',0.65)';

$color_ui_text_alpha_dark = uncode_hex2rgb($color_text_inverted);
$color_ui_text_alpha_dark = 'rgba('.$color_ui_text_alpha_dark[0].','.$color_ui_text_alpha_dark[1].','.$color_ui_text_alpha_dark[2].',0.65)';

$font_family_fallback = $cs_font_fallback != '' ? ', ' . $cs_font_fallback : '';
$font_family_menu = $cs_menu_font_family . $font_family_fallback;
$font_family_base = $cs_body_font_family . $font_family_fallback;
$font_family_headings = $cs_heading_font_family . $font_family_fallback;
$font_family_btn = $cs_buttons_font_family . $font_family_fallback;
$font_family_ui = $cs_ui_font_family . $font_family_fallback;

$menu_font_weight = $uncode_option['_uncode_menu_font_weight'];
$menu_letter_spacing = $uncode_option['_uncode_menu_letter_spacing'];
$menu_font_size = $uncode_option['_uncode_menu_font_size'];
if ($menu_font_size === '') {
	$menu_font_size = 12;
}
$submenu_font_size = $uncode_option['_uncode_submenu_font_size'];
if ($submenu_font_size === '') {
	$submenu_font_size = 12;
}
$menu_mobile_font_size = $uncode_option['_uncode_menu_mobile_font_size'];
if ($menu_mobile_font_size === '') {
	$menu_mobile_font_size = 12;
}
$heading_font_weight = $uncode_option['_uncode_heading_font_weight'];
if ( isset( $uncode_option['_uncode_heading_letter_spacing'] ) ) {
	$heading_letter_spacing = $uncode_option['_uncode_heading_letter_spacing'];
} else {
	$heading_letter_spacing = '0.00';
}
$btn_font_weight = $uncode_option['_uncode_buttons_font_weight'];
$ui_font_weight = $uncode_option['_uncode_ui_font_weight'];
$btn_text_transform = $uncode_option['_uncode_buttons_text_transform'];
$btn_letter_spacing = !isset($uncode_option['_uncode_buttons_letter_spacing']) || $uncode_option['_uncode_buttons_letter_spacing'] == '' ? '0.1em' : $uncode_option['_uncode_buttons_letter_spacing'];
$btn_letter_spacing = $btn_letter_spacing == 'uncode-fontspace-zero' ? '0em' : $btn_letter_spacing;
$btn_border_width = !isset($uncode_option['_uncode_buttons_border_width']) || $uncode_option['_uncode_buttons_border_width'] == '' ? '1' : $uncode_option['_uncode_buttons_border_width'];

/** Loop letter spacings (again) **/
if (isset($uncode_option['_uncode_heading_font_spacings'])) {
	$font_spacings = $uncode_option['_uncode_heading_font_spacings'];
	if (!empty($font_spacings) && is_array($font_spacings)) {
		foreach ($font_spacings as $key => $value) {
			if ( $value['_uncode_heading_font_spacing_unique_id'] === $btn_letter_spacing ) {
				$btn_letter_spacing = $value['_uncode_heading_font_spacing'];
			}
		}
	}
}

include get_template_directory() . '/core/inc/style-skins.css.php';

// WooCommerce dynamic styles
if ( class_exists( 'WooCommerce' ) ) {
	update_option( 'uncode_has_wc_dynamic_css', true );
	include get_template_directory() . '/core/inc/style-skins-woocommerce.css.php';
} else {
	delete_option( 'uncode_has_wc_dynamic_css' );
}

// Yith Wishlist dynamic styles
if ( class_exists( 'YITH_WCWL' ) ) {
	include get_template_directory() . '/core/inc/style-skins-wishlist.css.php';
}
