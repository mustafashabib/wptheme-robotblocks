<?php get_header(); ?>

<?php if ( have_posts() ) the_post(); ?>
  <h1><?php if ( is_day() ) : ?>
	  <?php printf( __( 'Daily Archives: %s', 'robotblocks' ), get_the_date() ); ?>
  <?php elseif ( is_month() ) : ?>
	  <?php printf( __( 'Monthly Archives: %s', 'robotblocks' ), get_the_date('F Y') ); ?>
  <?php elseif ( is_year() ) : ?>
		<?php printf( __( 'Yearly Archives: %s', 'robotblocks' ), get_the_date('Y') ); ?>
  <?php else : ?>
		<?php _e( 'Blog Archives', 'robotblocks' ); ?>
  <?php endif; ?>
	</h1>

<?php rewind_posts(); get_template_part( 'loop', 'archive' ); ?>

<?php get_footer(); ?>