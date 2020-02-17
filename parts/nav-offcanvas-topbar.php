<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="top-bar" id="top-bar-menu">
	<div class="top-bar-left float-left">
		<?php $logo = get_theme_mod('top-bar-logo', ''); ?>
		<?php if($logo !== '') : ?>
        <img class="top-bar-logo" src="<?php echo $logo; ?>" alt="The Mad Dab Logo">
		<?php else: ?>
		<ul class="menu">
			<li><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li>
		</ul>
		<?php endif; ?>
	</div>
	<div class="top-bar-right show-for-medium">
		<?php joints_top_nav(); ?>
	</div>
	<div class="top-bar-right float-right show-for-small-only">
		<ul class="menu">
			<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
			<li><a data-toggle="off-canvas"><?php _e( 'Menu', 'jointswp' ); ?></a></li>
		</ul>
	</div>
</div>
