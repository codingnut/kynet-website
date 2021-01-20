<?php
/* 
Template Name:Archives
*/
get_header(); ?>
<div class="archive_page">
<div class="archive_page_1" style="background: url('https://www.kynetweb.com/Kynet122820/wp-content/uploads/2021/01/Header.png') no-repeat; ">    
  <div class="ast-container">  
    <h1>"<?php single_cat_title(); ?>"</h1>
</div>
 </div>
</div>
<div class="bg-cat">
<div class="ast-container"> 
    <div class="site-content">
    
        <div id="content" role="main">
        <?php 
        $current_category = get_queried_object();
            $category_query_args = array(
                'cat' => $current_category->cat_ID,
                
                );
                
                $category_query = new WP_Query( $category_query_args );
                if ( $category_query->have_posts() ) : while ($category_query->have_posts()) : $category_query->the_post();
                // Loop output goes here
                ?>
                <div class="main_div1">
            
                    <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('medium', array('class' => 'your-class-name')); ?></a>
                    <a href="<?php the_permalink(); ?>"> <h2> <?php the_title(); ?> </h2></a>
                    <p><?php echo wp_trim_words( get_the_excerpt(), 10, '' ); ?></p>
                    </div>
                    
            <?php
                endwhile; endif;

        ?>   

        </div><!-- #content -->
    </div><!-- #primary -->
 </div>
</div>

<?php
get_footer(); ?>