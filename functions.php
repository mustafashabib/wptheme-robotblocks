<?php
define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/header.jpg'); // %s is the template dir uri
define('HEADER_IMAGE_WIDTH', 1482); // use width and height appropriate for your theme
define('HEADER_IMAGE_HEIGHT', 999);
define('NO_HEADER_TEXT', true );
 if ( ! isset( $content_width ) ) $content_width = 1482; 
function robotblocks_enqueue_comments_reply() {
	if( get_option( 'thread_comments' ) )  {
		wp_enqueue_script( 'comment-reply' );
	}
}
function paginate() {
	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['page'] > 1 ? $current = $wp_query->query_vars['page'] : $current = 1;
	
	$pagination = array(
		'base' => @add_query_arg('page','%#%'),
		'format' => '',
		'total' => $wp_query->max_num_pages,
		'current' => $current,
		'show_all' => true,
		'type' => 'list',
		'prev_next'=>true,
		'next_text' => '&raquo;',
		'prev_text' => '&laquo;'
		);
	
	if( $wp_rewrite->using_permalinks() )
		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
	
	if( !empty($wp_query->query_vars['s']) )
		$pagination['add_args'] = array( 's' => get_query_var( 's' ) );
	
	echo paginate_links( $pagination );
}

function header_style() {

}

function admin_header_style() {
	
}

function robotblocks_customize_register( $wp_customize )
{

	$args = array(
	'width'         => 1482,
	'height'        => 999,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
	'uploads'       => true,
	);
   //All our sections, settings, and controls will be added here
	add_theme_support( 'automatic-feed-links' );/*required*/
	add_theme_support( 'custom-header', $args );
	add_theme_support( 'title_tagline' );
	// Add Theme support


	$wp_customize->add_section( 'robotblocks_options', array(
    'title'          => __( 'Additional Options', 'robotblocks' ),
    'priority'       => 75,) );

    $wp_customize->add_setting( 'robotblocks_theme_options[analytics_id]', array(
    'default'        => '',
    'type'           => 'option',
    'capability'     => 'edit_theme_options',
) );

    $wp_customize->add_setting( 'robotblocks_theme_options[twitter_id]', array(
    'default'        => '',
    'type'           => 'option',
    'capability'     => 'edit_theme_options',
) );

   $wp_customize->add_control('robotblocks_analytics_id', array(
    'label'      => __('Google Analytics ID', 'robotblocks'),
    'section'    => 'robotblocks_options',
    'settings'   => 'robotblocks_theme_options[analytics_id]',
));
   $wp_customize->add_control('robotblocks_twitter_id', array(
    'label'      => __('Twitter ID', 'robotblocks'),
    'section'    => 'robotblocks_options',
    'settings'   => 'robotblocks_theme_options[twitter_id]',
));

   register_default_headers( array(
		'photoman' => array(
			'url' => '%s/images/header.jpg',
			'thumbnail_url' => '%s/images/header-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Photo man', 'robotblocks' )
		)
	) );

}

function render_google_analytics($analytics_id) 
{
	echo '<script type="text/javascript">' . "\n";
	echo "var _gaq = _gaq || [];" . "\n";
	echo "_gaq.push(['_setAccount', '$analytics_id']);" . "\n";
	echo "_gaq.push(['_trackPageview']);" . "\n";
	echo "(function() {" . "\n";
	echo "var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;" . "\n";
	echo "ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';" . "\n";
	echo "var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);" . "\n";
	echo "})();" . "\n";
	echo "</script>" . "\n";
}


add_custom_image_header('header_style', 'admin_header_style');

add_action( 'customize_register', 'robotblocks_customize_register' );
add_action( 'comment_form_before', 'robotblocks_enqueue_comments_reply' );
add_action( 'widgets_init', 'my_register_sidebars' );



function my_register_sidebars() {

	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Primary' ),
			'description' => __( 'All widgets appear in the footer.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	/* Repeat register_sidebar() code for additional sidebars. */
}

?>