<?php

/**
 * Informtion about the PHP Boilerplate package
 */
global $_BOILERPLATE;

$_BOILERPLATE = array(
	'version' => '1.0',
	'name' => 'PHP Boilerplate',
	'url' => 'https://github.com/bungeshea/phpboilerplate',
);

// set the content type and encoding
header('Content-type: text/html; charset=UTF-8');

// replace the X-UA-Compatible meta tag with a PHP header to fix validation errors
header('X-UA-Compatible: IE=edge,chrome=1');

// load configuration file
require_once( dirname( __FILE__ ) . '/config.php' );

// load generic functions
require_once( dirname( __FILE__ ) . '/functions.php' );

// load template functions
require_once( dirname( __FILE__ ) . '/template.php' );

/**
 * Are we using Microsoft Internet Explorer?
 * @type bool
 */
global $is_IE; 
$is_IE = strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' );

/**
 * Default JavaScript files to load on every page
 *
 * You can use the get_url() function to retrive an
 * absolute URI to the folder where the scripts are stored.
 *
 * Per-page scripts can be passed directly to the get_header()
 * function, or you can modify the global $scripts variable
 * before calling get_header()
 */
global $scripts;

$scripts = array(
	'prefixfree' => get_url( 'scripts', 'vendor/prefixfree-1.0.3.min.js' ),
	'jquery'     => get_url( 'scripts', 'vendor/jquery-1.8.1.min.js' ),
	'plugins'    => get_url( 'scripts', 'plugins.js' ),
	get_url( 'scripts', 'main.js' ),
	//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js
);

/**
 * Default inline JavaScript to load to load on every page
 *
 * You can later add to this script in the page
 * itself, by modifying the global $script variable
 * before calling get_header()
 */
global $script;

$script = "
			// Google Analytics: change UA-XXXXX-X to be your site's ID.
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
";

/**
 * Default page description
 *
 * You can change this on a per-page basis by modifying
 * the global $description variable before calling get_header()
 */
global $description;