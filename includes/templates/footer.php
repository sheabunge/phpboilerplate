<?php

/**
 * Footer template
 *
 * This file shoule be the last template
 * called. It closes many of the elements
 * opened in header.php
 *
 * You can call this template into your
 * own coe using the get_footer() function
 * 
 * @package PHP Boilerplate
 * @subpackage Templates
 */

?>
	
	</section><!-- .content -->
	
	<?php get_sidebar(); ?>
	
	<footer class="contentinfo">
		<p>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php siteinfo('url'); ?>"><?php siteinfo('name'); ?></a>. </p>
		<p>Powered by <a href="<?php echo $_BOILERPLATE['url'] ?>"><?php echo $_BOILERPLATE['name'] ?></a>.</p>
	</footer>
	
	</div><!--.main-->
	
	<!--
	instert footer scripts here
	Example: <script>head.js('js/tracking.js');</script>
	-->
	
</body>
</html>