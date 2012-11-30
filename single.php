<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header>
          <h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'robotblocks' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
          <date><?php the_date();?></date>
      </header>
      <p>
       <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
          <?php the_excerpt(); ?>
        <?php else : ?>
          <?php the_content( __( '<nav class="continue">Continue reading &rarr;</nav>', 'robotblocks' ) ); ?>
          <div style="clear:both;"></div>
          <?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'robotblocks' ), 'after' => '' ) ); ?>
          <?php edit_post_link( __( 'Edit', 'robotblocks' ), '<p class="edit-post">', '</p>' ); ?>
        <?php endif; ?>
      </p>
      <?php the_tags('<ul class="tags"><li>#','</li><li>','</li></ul>'); ?>
    </article>
  	<nav>
        <prev><?php previous_post_link('%link', '&lt;') ?></prev>
        <next><?php next_post_link('%link', '&gt;') ?></next>
    </nav>
<?php endwhile;?>
<?php get_footer(); ?>