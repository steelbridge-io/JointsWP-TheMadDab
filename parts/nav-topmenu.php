

<nav class="top-bar topbar-responsive">
  <div class="top-bar-title">
    <span data-responsive-toggle="topbar-responsive" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle></button>
    </span>
	  <?php $logo = get_theme_mod('top-bar-logo', ''); ?>
	  <?php if($logo !== '') : ?>
        <img class="top-bar-logo" src="<?php echo $logo; ?>" alt="The Mad Dab Logo">
	  <?php else: ?>
        <a class="topbar-responsive-logo" href="<?php echo home_url(); ?>"><strong><?php bloginfo('name'); ?></strong></a>
	  <?php endif; ?>
  </div>
  <div id="topbar-responsive" class="topbar-responsive-links">
    <div class="top-bar-right">
	    <?php joints_top_nav(); ?>
      <!--<ul class="menu simple vertical medium-horizontal">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Works</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">Contact</a></li>
        <li>
          <button type="button" class="button hollow topbar-responsive-button">Categories</button>
        </li>
      </ul>-->
    </div>
  </div>
</nav>

