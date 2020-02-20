<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
	
	<header class="article-header">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header> <!-- end article header -->
				
    <section class="entry-content" itemprop="text">
	    <div class="card">
		    <div class="card-section">
      
                <?php the_post_thumbnail('full'); ?>
			    
		    </div>
      
            <div class="card-section">
	            
                <?php the_content(); ?>
	            
            </div>
		    
      </div>
	</section> <!-- end article section -->
	
	<footer class="article-footer">
		 <?php wp_link_pages(); ?>
	</footer> <!-- end article footer -->
	
	<?php comments_template(); ?>
	
</article> <!-- end article -->
