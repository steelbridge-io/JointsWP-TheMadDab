<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/responsive-navigation/
 */
?>

<?php if ( wp_is_mobile() ) : ?>
<div class="top-bar" id="main-prod-menu">
  <div class="top-bar-center">
    <ul class="vertical menu accordion-menu" data-accordion-menu>
      <li>
        <a href="#">Product Types</a>
    <?php joints_product_nav(); ?>
      </li>
    </ul>
  </div>
</div>
<?php else: ?>
  <div class="top-bar" id="main-prod-menu">
    <div class="top-bar-center">
		<?php joints_product_nav(); ?>
    </div>
  </div>
<?php endif; ?>
