<?php
/**
 * Header Template
 *
 * This should be the first thing included on almost every
 * page of your site. 
 *
 * @package PHP Boilerplate
 * @subpackage Templates
 */

global $script, $scripts, $author, $description;

?>
<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8" />
	
	<!-- styles -->
	<link rel="stylesheet" href="<?php echo get_url( 'css', 'normalize.css' ); ?>" />
	<link rel="stylesheet" href="<?php echo get_url( 'css', 'boilerplate.css' ); ?>" />
	<link rel="stylesheet" href="<?php echo compile_less( 'style' ); ?>" />
	
	<!-- page meta -->
	<title><?php page_title(); ?></title>
	<meta name="viewport" content="width=device-width" />
<?php if ( isset( $description ) ) : ?>
	<meta name="description" content="<?php echo $description; ?>" />
<?php endif; ?>
<?php if ( get_siteinfo( 'author' ) ) : ?>
	<meta name="author" content="<?php siteinfo('author'); ?>" />
<?php endif; ?>
	<meta name="generator" content="PHP Boilerplate <?php echo $_BOILERPLATE['version']; ?>" />
	<link rel="home" href="<?php siteinfo('url') ?>" />
	<link rel="icon" type="image/x-icon" href="<?php echo get_url( 'home', 'favicon.ico' ); ?>" />
	
	<!-- scripts -->
	<script src="<?php echo get_url( 'js', 'vendor/head-0.96.min.js' ) ?>"></script>	
	<script>
	head.js(
<?php
		$index = 0;
		
		// print scripts
		foreach( $scripts as $handle => $path ) {
			
			echo "\t\t";
			
			if( ! is_numeric( $handle ) )
				printf( '{%s: %s},', $handle, $path );
			else
				printf( '%s,', $path );
				
			//if ( count( $scripts ) > $index )
			
			echo "\n";
		}
?>

		function() {
			<?php
		
			/* Custom inline scripts can be stored in the global $script variable */
			echo $script;
		
			?>
		}
	);
	</script>
</head>
<body>
	<?php if ( $is_IE ) : ?>

	<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
	<![endif]-->
	<?php endif; ?>

	<div class="wrapper">

	<header class="banner">
		<h1><a href="<?php siteinfo('url'); ?>"><?php siteinfo('name'); ?></a></h1>
		<nav><?php nav_menu(); ?></nav>
	</header>
		
	<section class="content">
	