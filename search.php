<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<h1><?php printf( __( 'Search Results for: %s', 'robotblocks' ), '' . get_search_query() . '' ); ?></h1>
	<?php get_template_part( 'loop', 'search' ); ?>
<?php else : ?>
	<h2><?php _e( 'Nothing Found', 'robotblocks' ); ?></h2>
	<p><?php _e( 'Ooops! We did not find anything. Try searching again...', 'robotblocks' ); ?></p>
	<?php get_search_form(); ?>
	<line></line>
<?php endif; ?>

<?php get_footer(); ?>
