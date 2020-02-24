<?php
/*
Template Name: Product Cards
*/

get_header(); ?>

<div class="content">
  
  <div id="card-cont-two" class="grid-container">
    
    <div class="inner-content grid-x grid-margin-x grid-padding-x">
      
      <main class="main small-12 medium-12 large-12 cell" role="main">
		  
		  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			  
			  <?php get_template_part( 'parts/loop', 'page' ); ?>
		  
		  <?php endwhile; endif; ?>
      
      </main> <!-- end #main -->
    
    </div> <!-- end #inner-content -->
  
  </div>
  
  <div id="card-cont-one" class="grid-container">
    <div class="grid-x grid-margin-x small-up-2 medium-up-3 align-center">
      
      <?php
      $args = array(
          'post_type' => 'product_cpt',
          'posts_per_page' => 24,
          'order' => 'ASC' );
          
      $the_query = new WP_Query( $args );
      ?>
      <?php if ( $the_query->have_posts() ) : ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      
      <div class="cell">
        <div class="card">
          <?php $img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

          $thumb_id = get_post_thumbnail_id(get_the_ID());
          $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true); ?>
          
          <a href="<?php echo get_permalink(); ?>" title=""><img src="<?php echo $img_url; ?>" alt="<?php echo $alt; ?>"></a>
          <div class="card-section">
            <h4><a href="<?php echo get_permalink(); ?>" title=""><?php the_title(); ?></a></h4>
            <p><?php the_excerpt(); ?></p>
          </div>
        </div>
      </div>
      
      <?php wp_reset_postdata(); ?>

      <?php endwhile;
            endif; ?>
    </div>
  </div>
</div> <!-- end #content -->

<?php get_footer(); ?>
