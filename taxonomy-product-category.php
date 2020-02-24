<?php
/**
 * Displays archive pages if a speicifc template is not set.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>
	
	<div class="content">
		
			<div class="inner-content grid-x grid-margin-x grid-padding-x align-center">
				
				<main class="main small-12 medium-8 large-8 cell" role="main">
					
					<header>
						<h1 class="page-title"><?php the_archive_title();?></h1>
						<?php the_archive_description('<div class="taxonomy-description">', '</div>');?>
					</header>
					
					<div id="card-cont-one" class="grid-container">
						<div class="grid-x grid-margin-x small-up-1 medium-up-1 large-up-3 align-center">
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
						<!-- To see additional archive styles, visit the /parts directory -->
						<?php get_template_part( 'parts/loop', 'products' ); ?>
					
					<?php endwhile; ?>
						<div class="clearfix"></div>
					<div style="width:100%">
						<?php joints_page_navi(); ?>
					</div>
					
					<?php else : ?>
						
						<?php get_template_part( 'parts/content', 'missing' ); ?>
					
					<?php endif; ?>
						
						</div>
					</div>
				
				</main> <!-- end #main -->
				
				<?php get_sidebar(); ?>
			
			</div> <!-- end #inner-content -->
		
	
	</div> <!-- end #content -->

<?php get_footer(); ?>
