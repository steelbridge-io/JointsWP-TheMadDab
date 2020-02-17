<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/responsive-navigation/
 */
?>

<div class="top-bar" id="main-menu">
	<div class="top-bar-left">
      <?php $logo = get_theme_mod('top-bar-logo', ''); ?>
      <?php if($logo !== '') : ?>
        <img class="top-bar-logo" src="<?php echo $logo; ?>" alt="The Mad Dab Logo">
      <?php else: ?>
        <ul class="menu">
          <li><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li>
        </ul>
      <?php endif; ?>
	</div>
	<div class="top-bar-right">
		<?php joints_top_nav(); ?>
	</div>
</div>
