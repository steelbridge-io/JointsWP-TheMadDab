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
				
    <section class="entry-content" itemprop="text">
      <div class="card">
        <div class="card-section">
		<?php the_post_thumbnail('full'); ?>
        </div>
        <div class="card-section">
		<?php the_content(); ?>
        </div>
        <div class="card-section">
          <h3>Related Products</h3>
          <div class="grid-container">
            <div class="grid-x grid-margin-x small-up-2 medium-up-3">
	
	        <?php
	
	        $args = array(
		        'post_type' => 'product_cpt',
		        'orderby'   => 'title',
		        'order' => 'ASC',
		        'tax_query' => array(
			        array(
				        'taxonomy' => 'product-category',
				        'field' => 'slug',
				        'terms' => 'related'
			        )
		        )
	        );
	        //$query = new WP_Query( $args ); // this line is useless in your code
	
	        // The Query
	        $the_query = new WP_Query( $args );
	
	        // The Loop
	        if ( $the_query->have_posts() ) {
		        while ( $the_query->have_posts() ) {
			        $the_query->the_post();
			
			        echo '<div class="cell">
                            <div class="card">';
			
			        if(has_post_thumbnail()){
				
				       echo '<a href="'. get_permalink() .'" title="" >' . get_the_post_thumbnail( $post->ID, 'large' ) .'</a>';
			        }
			
			        the_excerpt();
			
			        echo '</div>
                          </div>';
			
		        }
		
	        } else {
// no posts found
	        }
	        /* Restore original Post Data */
	        wp_reset_postdata();?>
            
            </div>
          </div>





        </div>
      </div>
	</section> <!-- end article section -->
	
	<footer class="article-footer">
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
		<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->
	
	<?php comments_template(); ?>
	
</article> <!-- end article -->
