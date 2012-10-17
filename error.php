<?php 

$error_type = isset( $_REQUEST['type'] ) ? intval( $_REQUEST['type'] ) : 404;

global $title;

switch ( $error_type ) {
	case 400:
		$title = 'Bad Request';
		$msg   = "Sorry, I couldn't find that page.";
		break;
	case 401:
		$title = 'Unauthorized';
		$msg   = 'Sorry, you need authorization to access that page.';
		break;
	case 403:
		$title = 'Forbidden';
		$msg   = "Sorry, I can't let you access that page.";
		break;
	case 404:
		$title = 'Page Not Found';
		$msg   = "Sorry, I couldn't find that page.";
		break;
	case 500:
		$title = 'Server Error';
		$msg   = 'Sorry, something went wrong on our end.';
		break;
	default:
		$title = 'Page Not Found';
		$msg   = "Sorry, I couldn't find that page.";
}

get_header();

?>

		<article class="error-<?php echo $error_type; ?>">
		
			<h2><?php echo $title; ?></h2>
			<p><?php echo $msg; ?></p>
			<p>Try going <a href="javascript:window.history.back()">back to where you came from</a> or to the <a href="">home page</a>.</p>
		
		</article>

	<?php get_footer(); ?>