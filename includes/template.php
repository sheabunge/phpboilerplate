<?php

global $lessc;

/**
 * Compile a .LESS file into a .CSS file.
 *
 * @param $handle LESS file to compile
 * @return $css_code Resulting CSS code
 */
function compile_less( $handle ) {

	// Include the compiler
	if ( ! class_exists( 'lessc' ) )
		require_once( get_path( 'lib', 'lessc.php' ) );
		
	// Include the minifier
	if ( ! class_exists( 'CssMin' ) )
		require_once( get_path( 'lib', 'cssmin.php' ) );
		
	global $lessc;
	
	// Start new object from PHP Less script
	if ( empty( $lessc ) )
		$lessc = new lessc();
	
	// Where is the LESS file stored?
	$less_file = get_path( 'less', $handle . '.less' );
		
	// Grab LESS code
	$less_code = file_get_contents( $less_file );
	
	// Compile to CSS code
	$css_code = $lessc->parse( $less_code );
	
	// Minify CSS code
	$css_code = CssMin::minify( $css_code );
	
	// Add source header
	$src_header = '/* Source: ' . get_url( 'less', $handle . '.less' ) . " */\n";
	
	// Where is the CSS file stored?
	$css_file = get_path('css') . $handle . '.css';
	
	// Write CSS
	file_put_contents( $css_file, $src_header . $css_code );
	
	// Return the URL to the resulting CSS file
	return get_url( 'css', $handle . '.css' );
}

function load_template( $_template_file, $require_once = true ) {
	global $_BOILERPLATE, $is_IE;

	if ( $require_once )
		require_once( $_template_file );
	else
		require( $_template_file );
}

function locate_template($template_names, $load = false, $require_once = true ) {
	$located = '';
	foreach ( (array) $template_names as $template_name ) {
		if ( !$template_name )
			continue;
		if ( file_exists( get_path( 'templates', $template_name ) ) ) {
			$located = get_path('templates', $template_name);
			break;
		}
	}

	if ( $load && '' != $located )
		load_template( $located, $require_once );

	return $located;
}
		
function get_header( $page_title = '', $custom_scripts = array(), $name = null ) {

	global $title;
	global $scripts;
	
	// if no page title is preset, set it to be the cutom title
	$title = ( empty( $title ) ? $page_title : $title );
	
	// merge the custom scripts with the default ones
	$scripts = array_merge(	$custom_scripts, $scripts );
	
	// load the header.php file
	$templates = array();
	
	if ( isset($name) )
		$templates[] = "header-{$name}.php";

	$templates[] = 'header.php';

	locate_template( $templates, true );
}

function get_sidebar( $name = null ) {
	
	$templates = array();
	
	if ( isset($name) )
		$templates[] = "sidebar-{$name}.php";

	$templates[] = 'sidebar.php';

	locate_template( $templates, true );
}

function get_footer( $name = null ) {

	$templates = array();
	
	if ( isset($name) )
		$templates[] = "footer-{$name}.php";

	$templates[] = 'footer.php';

	locate_template( $templates, true );
}

function get_template( $slug, $name = null ) {
	
	$templates = array();
	
	if ( isset($name) )
		$templates[] = "{$slug}-{$name}.php";

	$templates[] = "{$slug}.php";

	locate_template($templates, true, false);
	
}

function style( $handle ) {
	echo "\n\t" . '<link rel="stylesheet" href="' . get_path('styles', $handle . '.css' ) . '">';
}

function script( $handle ) {
	echo "\n\t" . '<script src="' . get_path('scripts', $handle . '.js' ) . '"></script>';
}

function page_title( $custom_title = '', $sep = '|', $display = true ) {
	
	global $title;
	
	if ( ! empty( $custom_title ) )
		$title = $custom_title;
	
	if ( empty( $title ) )
		$output = get_siteinfo('name');
	else
		$output = sprintf( '%1$s %2$s %3$s', $title, $sep, get_siteinfo('name') );
	
	if ( $display )
		echo $output;
	else
		return $output;
}

function menu_class( $current_item_slug, $class = array(), $echo = true ) {

	if ( ! is_array( $class ) )
		$class = preg_split( '#\s+#', $class );
	
	// add the 'active' class if we're on the current menu item
	if ( $current_item_slug == trim( $_SERVER['REQUEST_URI'], '/' ) )
		$class[] = 'active';
	
	if ( ! empty( $current_item_slug ) )
		$class[] = 'page-' . $current_item_slug;
	
	if ( $echo ) {
		// Separates classes with a single space, collates classes for body element
		echo 'class="' . join( ' ', $class ) . '"';
	} else {
		return $class;
	}
	
}

function nav_menu( $menu_items = array() ) {

	global $title;

	$default_items = array(
		'Home',
		'news' => 'Latest News',
		'about' => 'About Us',
		'contact' => 'Contact Us',
	);
	
	$items = array_merge( $default_items, $menu_items );
	
	echo '<ul>';
	
	foreach( $items as $slug => $label ) {
		
		if ( is_numeric( $slug ) )
			$slug = '';

		echo "\n\t\t\t\t";
		
		printf( '<li class="%1$s"><a href="%2$s" title="%3$s">%3$s</a></li>',
			join( ' ', menu_class( $slug, array(), false ) ),
			get_url( 'home', $slug ),
			$label
		);	
	}

		echo "\n\t\t\t</ul>\n";
	
}