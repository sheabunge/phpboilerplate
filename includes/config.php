<?php

/**
 * Welcome to PHP Boilerplate!
 * Just customise the values below to 
 * suit your needs, and we're good to go.
 *
 * The below values will attempt to dynamically
 * construct themselves.
 * Usually, you can leave them be, but in some
 * cases you will need to hardcode them in
 *
 * One other thing, all of these constants can
 * be accessed with various functions. Try not to
 * call them directly, unless you really need to.
 *
 *
 * @package PHP Boilerplate
 * @subpackage Includes
 */


/**
 * The name for your Web site
 * You'll probably want to change this
 */
define( 'SITE_NAME', 'My Awesome Site' );

/**
 * The default author on the web site
 * You'll probably want to change this
 *
 * This value can be altered on a per-page
 * basis by setting the global $author variable
 */
define( 'SITE_AUTHOR', 'Shea Bunge' );

/**
 * Scheme
 * Are we running HTTP or HTTPS?
 */
define( 'SCHEME', isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http' );

/**
 * Site home URL
 * Something like https://mysite.com
 * Does not include trailing slash
 *
 * Note: subdirectories are *not* currently supported.
 *       if you need this feature, manually set the domain
 *       and path of your site.
 * eg: define('SITEURL', 'http://mysite.com/subdir');
 */

define( 'SITE_URL', SCHEME . '://' . $_SERVER['HTTP_HOST'] );

/**
 * Base directory path
 * Something like /home/testuser/htdocs
 * Does not include trailing slash
 */
define( 'SITE_PATH', dirname( dirname( __FILE__ ) ) );

/**
 * PHP includes directory, relative to
 * the root of your site.
 */
define( 'INC_DIR', 'includes' );

/**
 * PHP library directory, relative to
 * the root of your site.
 */
define( 'LIB_DIR', INC_DIR . '/lib' );

/**
 * Templates directory, relative to
 * the root of your site.
 */
define( 'TEMPLATE_DIR', INC_DIR . '/templates' );

/**
 * CSS stylesheet directory, relative
 * to the root of your site.
 */
define( 'CSS_DIR', 'assets/css' );

/**
 * LESS stylesheet directory, relative
 * to the root of your site.
 */
define( 'LESS_DIR', 'assets/less' );

/**
 * JavaScript directory, relative to
 * the root of your site.
 */
define( 'JS_DIR', 'assets/js' );

/**
 * Images directory, relative to
 * the root of your site.
 */
define( 'IMG_DIR', 'images' );