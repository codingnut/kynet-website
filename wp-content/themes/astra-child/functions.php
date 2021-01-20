<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );
	wp_register_script( 'typed', 'https://cdn.jsdelivr.net/npm/typed.js@2.0.11', null, null, true );
wp_enqueue_script('typed');

}
function subscribe_link_shortcode() {
$args = array(
'post_type'=> 'post',
'posts_per_page' => 3 // this will retrive all the post that is published 
);
$result = new WP_Query( $args );
if ( $result-> have_posts() ) : ?>
 <div class="main_div">
<?php while ( $result->have_posts() ) : $result->the_post(); ?>
 <div class="main_div1">
 <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('medium', array('class' => 'your-class-name')); ?></a>
 <a href="<?php the_permalink(); ?>"> <h2> <?php the_title(); ?> </h2></a>
<p><?php echo wp_trim_words( get_the_excerpt(), 10, '' ); ?></p>
</div>
  
<?php endwhile; ?>
</div>
<?php endif; wp_reset_postdata(); ?> 
<?php }
 add_shortcode('subscribe', 'subscribe_link_shortcode');

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

