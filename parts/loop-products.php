<?php
/**
 * Template part for displaying posts
 *
 * Used for single, index, archive, search.
 */
?>
<div class="cell">
	<div class="card">
		<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
			
			<header class="article-header">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			</header> <!-- end article header -->
			
			<section class="entry-content product-archive" itemprop="text">
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
				<?php the_excerpt(); ?>
			</section> <!-- end article section -->
		
		</article> <!-- end article -->
	</div>
</div>
