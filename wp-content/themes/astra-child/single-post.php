<?php get_header();?>
<?php  $author_id=$post->post_author;?>
<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
<div class="single_page">
<div class="single_page_1" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; ">
    <div class="ast-container">
<h1><?php echo esc_html( get_the_title() ); ?></h1>
<p class="quick">Quick Summary : <span class="summ"><?php echo esc_html( get_the_excerpt() ); ?> </span></p>

<div class="author_image">
   
 <img src="<?php echo esc_url( get_avatar_url($author_id ) ); ?>" />
    </div>


<div class="author_image author_border"><?php echo get_author_name($author_id );?></div>
<div class="author_image1 author_border"><?php echo get_the_date();?></div>
<div class="author_image2 author_border">Reading time 8–13 minutes</div>
</div>
</div>

<div class="content">
    <div class="ast-container">
   <p><?php echo get_the_content();?>
 </p>



<div class="catagory">
   <?php 
    echo '<ul>';
   $categories = get_categories( array(  'taxonomy'   => 'category', // Taxonomy to retrieve terms for. We want 'category'. Note that this parameter is default to 'category', so you can omit it
    'orderby'    => 'name',
    'parent'     => 0,
    'hide_empty' => 0, // change to 1 to hide categores not having a single post
    
) );
  
   
  foreach($categories as $ce){
     
    
       echo '<li>';
       $link = get_term_link($ce->term_id);
       
      
       ?>
    
    
     <a href="<?php echo $link; ?>"><?php echo $ce->name; ?></a>
    

   
     <?php
  }
  
   ?>
   

</div>
</div>
</div>
 <div class="ast-container">
     <?php $prev_post = get_adjacent_post(false, '', true);?>
<?php if(!empty($prev_post)) {?>


 <h4>Read Next: <span class="next-link">
     <?php
echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">' . $prev_post->post_title . '</a>'; 

?></span></h4>
 
 <?php }?>
 </div>
 <div class="ast-container">
<div class="author_detail author_detail1">
<div class="author_image">
   
 <img src="<?php echo esc_url( get_avatar_url($author_id ) ); ?>" />
    </div>
  <div class="author_name">
     
      <h4><?php echo get_author_name($author_id );?></h4>  
     <p> <?php $user_info= get_user_meta($author_id);
      echo $user_info['description'][0];?></p>
     




    
     
     
</div>
</div>
</div>

<style>
     
    .single_page_1{background-size: cover;background-position: center;padding-top:150px!important; padding-bottom :100px!important
            }
            .single_page_1 h1{color:white;margin-bottom: 30px !important;}
            .single_page_1 p{color:white;line-height: 1.8em;}
            .quick{font-weight: 700;margin-bottom: 50px;}
            .summ{font-weight: 400 !important;}
            .author_details{float: left;}
            .content p{color:#3a3a3a;margin-top:40px !important;margin-bottom: 0;}
            .content img{margin-top:40px !important;width:50%;height:400px;margin-left:50px}
            
            .catagory{width:100% !important;margin-top:40px !important;margin-bottom: 40px;}
            .catagory_1{float:left;width:15%}
            .author_image{width:max-content;float: left;color:white;padding: 0px 10px;}
            .author_image1 {width: max-content;float: left;color: white;text-align: center; padding: 0px 10px;}
              .author_image2{width:max-content;float: left;color:white;text-align: center;padding: 0px 10px;}
          .author_image img {width: 70px;border-radius: 50%;height:70px;margin-top: -10px;}
          .author_border{border-right:1px solid white;text-align: center;}
          .author_detail{width:100% !important;overflow:auto;padding-top:70px;}
          .author_name{width:50%;float: left;margin-left:20px;margin-top: -30px; }
          .author_name p{font-size:15px;padding-top:5px;}
          .catagory ul {list-style: none;display: flex;margin-left: auto;flex-wrap: wrap;}
          .catagory li {margin-right: 20px; margin-bottom:10px;background: #e8e2e2;padding: 5px 15px;}
          .catagory li a{color:#3a3a3a;}
          .next-link a {color: #3a3a3a !important;text-decoration: underline;}
         
}

</style>
<?php get_footer();?>