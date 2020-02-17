<?php
/**
 * Custom CSS for Customizer
 * Make sure to enqueue add_inline_style 'customizer_css' in functions.php
 * Otherwise your styles won't load in the preview window.
 */

function customizer_css() {
  $css_1 = '';
  $front_page_hero_image  = get_theme_mod ('themaddab_top_img');
  
  // Modified menu color css
  
  $css_1 .= '
			 .fp-topcont-img.card-section {
        background-image: url(' . $front_page_hero_image . '),  linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        padding-top: 8rem;
        padding-bottom: 8rem;
        background-blend-mode: overlay;
      }
		';
  return $css_1;
}
