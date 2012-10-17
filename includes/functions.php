<?php


function get_siteinfo( $handle ) {

	switch( $handle ) {
	
		case 'url':
			// the full URL to the site
			return SITE_URL . '/';
			break;
			
		case 'dir':
			// the name of the folder the site resides in
			return basename( SITE_PATH );
			break;
			
		case 'path':
			// filesystem path to the root of the site
			return SITE_PATH . '/';
			break;
			
		case 'name':
			// what is the name of the site?
		
			global $site;
			
			if ( ! empty( $site ) )
				return $site;
			
			return SITE_NAME;
			break;
			
		case 'author':
			// who write the current page?
		
			global $author;
			
			if ( ! empty( $author ) )
				return $author;
			
			return SITE_AUTHOR;
			break;
			
		case 'scheme':
			// are we running HTTP or HTTPS?
			if ( defined( 'SCHEME' ) )
				return SCHEME;
			else
				return 'http';
			break;
			
		default:
			// no valid site meta found
			return -1;
			break;
	}
}

function siteinfo( $handle ) {
	echo get_siteinfo( $handle );
}

function get_dir( $handle, $format = 'url', $echo = false ) {

	if ( $format == 'url' )
		$dir = get_siteinfo('url');
	elseif ( $format == 'path' )
		$dir = get_siteinfo('path');
	else
		$dir = '';
	
	switch( $handle ) {
	
		case 'inc':
		case 'includes':
		
			if ( defined('INC_DIR') )
				$dir .= INC_DIR;
				
			elseif ( defined('INCLUDE_DIR') )
				$dir .= INCLUDE_DIR;
				
			elseif ( defined('INCLUDES_DIR') )
				$dir .= INCLUDES_DIR;
				
			else
				$dir .= 'includes';
				
			break;
			
		case 'lib':
		
			if ( defined('LIB_DIR') )
				$dir .= LIB_DIR;
				
			elseif ( defined('LIBRARY_DIR') )
				$dir .= LIBRARY_DIR;
				
			elseif ( defined('INC_DIR') )
				$dir .= INC_DIR . '/lib';
				
			elseif ( defined('INCLUDE_DIR') )
				$dir .= INCLUDE_DIR . '/lib';
				
			elseif ( defined('INCLUDES_DIR') )
				$dir .= INCLUDES_DIR . '/lib';
				
			else
				$dir .= 'includes/lib';
			
			break;
			
		case 'templates':
		
			if ( defined( 'TEMPLATE_DIR' ) )
				$dir .= TEMPLATE_DIR;
				
			elseif ( defined( 'TEMPLATES_DIR' ) )
				$dir .= TEMPLATES_DIR;
				
			elseif ( defined( 'INC_DIR' ) )
				$dir .= INC_DIR . '/templates';
				
			elseif ( defined( 'INCLUDE_DIR' ) )
				$dir .= INCLUDE_DIR . '/templates';
				
			elseif ( defined('INCLUDES_DIR') )
				$dir .= INCLUDES_DIR . '/templates';
				
			else
				$dir .= 'includes/templates';
			
			break;
			
		case 'img':
		case 'images':
		
			if ( defined('IMG_DIR') )
				$dir .= IMG_DIR;
				
			elseif ( defined('IMAGE_DIR') )
				$dir .= IMAGE_DIR;
				
			elseif ( defined('IMAGES_DIR') )
				$dir .= IMAGES_DIR;
				
			else
				$dir = 'images';
				
			break;
			
		case 'css':
		case 'styles':
			
			if ( defined( 'CSS_DIR' ) )
				$dir .= CSS_DIR;
			
			elseif ( defined( 'STYLE_DIR' ) )
				$dir .= STYLE_DIR;
				
			elseif ( defined( 'STYLES_DIR' ) )
				$dir .= STYLES_DIR;
				
			else
				$dir .= 'css';
			
			break;
			
		case 'less':
			
			if ( defined( 'LESS_DIR' ) )
				$dir .= LESS_DIR;
			else
				$dir .= 'less';
			break;
		
		case 'home':
		case 'site':
			return $dir;
			break;
		
		default:
			$dir .= $handle;
		
	}
	
	return $dir . '/';
}

function get_url( $handle, $path = '' ) {
	return get_dir( $handle, 'url' ) . $path;
}

function get_path( $handle, $path = '' ) {
	return get_dir( $handle, 'path' ) . $path;
}