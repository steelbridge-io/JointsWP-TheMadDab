<?php
/**
 * Template part for displaying a single post
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	
	<header class="article-header">
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php //get_template_part( 'parts/content', 'byline' ); ?>
    </header> <!-- end article header -->
				
    <div class="entry-content" itemprop="text">
      <div class="card">
        <div class="card-section">
		<?php the_post_thumbnail('full'); ?>
        </div>
        <div class="card-section">
		<?php the_content(); ?>
        </div>
        
        <?php // Shows related products is post in a Product CPT
        if ( get_post_type() === 'product_cpt' ) { ?>
        
        
          <h3 class="text-center">Related Products</h3>
          <div class="grid-container fluid">
           <?php if ( is_page_template('template-full-width-posts.php') ) {
	           echo '<div class="grid-x grid-margin-x small-up-2 medium-up-3 large-up-4">';
           } else {
             echo '<div class="grid-x grid-margin-x small-up-2 medium-up-2">';
           }
           
	        $args = array(
		        'post_type' => 'product_cpt',
		        'orderby'   => 'title',
		        'order' => 'ASC',
		        'posts_per_page' => 9,
		        'tax_query' => array(
			        array(
				        'taxonomy' => 'product-category',
				        'field' => 'slug',
				        'terms' => 'related'
			        )
		        )
	        );
	        
	        $the_query = new WP_Query( $args );
	        
	        if ( $the_query->have_posts() ) {
		        while ( $the_query->have_posts() ) {
			        $the_query->the_post();
			
			        echo '<div class="cell">
                            <div class="realted card">';
			
			        if(has_post_thumbnail()){
				
				        $image_id = get_post_thumbnail_id();
				        $image_alt = get_post_meta($image->id, '_wp_attachment_image_alt', TRUE);
				        $image_title = get_the_title($image->id);
				
				       echo '<div class="card-section">
					          <a href="'. get_permalink() .'" title="'. $image_title .'" >' . get_the_post_thumbnail(
					              $post->ID, 'large' ) .'</a>
					         </div>';
			        }
			        
			       echo '<div class="card-section">
                          <a href="'. get_permalink() .'" title="'. get_the_title() .'"><h4>'.
                        get_the_title()
                        .'</h4></a>';
			        
			                the_excerpt();
			
			        echo '</div>
                        </div>
                       </div>';
		        }
		
	        } else {
              // no posts found
	        }
	       
	        wp_reset_postdata();?>
            
            </div>
          </div>
          
          <?php } ?>
          
        </div>
    </div>
	</section> <!-- end article section -->
	
	<footer class="article-footer">
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
		<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->
	
	<?php comments_template(); ?>
	
</article> <!-- end article -->
