<?php
/**
 * Customizer for themaddab.com
 *
 */


include 'customizer-css.php';

function themeslug_sanitize_url( $url ) {
  return esc_url_raw( $url );
}

add_action( 'customize_register', 'themaddab_customizer_register' );
/**
 * Registers settings and controls with the Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function themaddab_customizer_register( $wp_customize ) {
  
  $wp_customize->add_panel(
    'themaddab_settings',
    [
      'description' => __( 'Customize the The Mad Dab Theme.', 'themaddab' ),
      'priority'    => 80,
      'title'       => __( 'The Mad Dab Theme Settings', 'themaddab' ),
    ]
  );
  
  // Hero Section.
  $wp_customize->add_section(
    'themaddab_hero_section_settings',
    [
      'active_callback' => 'is_front_page',
      'description'     => sprintf( '<strong>%s</strong>', __( 'Modify the settings for the front page hero section.', 'themaddab' ) ),
      'title'           => __( 'Hero Section Settings', 'themaddab' ),
      'panel'           => 'themaddab_settings',
    ]
  );
  
  // Hero Title.
  $wp_customize->add_setting(
    'themaddab_hero_title',
    [
      'default'           => '',
      'sanitize_callback' => 'wp_kses_post',
      'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
    ]
  );
  
  $wp_customize->add_control(
    'themaddab_hero_title',
    [
      'description' => __( 'Change the front page title.', 'themaddab' ),
      'label'       => __( 'Front Page Title', 'themaddab' ),
      'section'     => 'themaddab_hero_section_settings',
      'settings'    => 'themaddab_hero_title',
      'type'        => 'text',
    ]
  );
  
  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial(
      'themaddab_hero_title',
      [
        'selector'        => '.front-page-hero-title',
        'settings'        => [ 'themaddab_hero_title' ],
        'render_callback' => function() {
          return get_theme_mod( 'themaddab_hero_title' );
        },
      ]
    );
  }
  
  // Hero Sub Title.
  $wp_customize->add_setting(
    'themaddab_hero_subtitle_text',
    [
      'default'           => '',
      'sanitize_callback' => 'wp_kses_post',
      'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
    ]
  );
  
  $wp_customize->add_control(
    'themaddab_hero_subtitle_text',
    [
      'description' => __( 'Change the front page sub-title.', 'themaddab' ),
      'label'       => __( 'Front Page Sub-Title', 'themaddab' ),
      'section'     => 'themaddab_hero_section_settings',
      'settings'    => 'themaddab_hero_subtitle_text',
      'type'        => 'textarea',
    ]
  );
  
  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial(
      'themaddab_hero_subtitle_text',
      [
        'selector'        => '.hero-subtitle',
        'settings'        => [ 'themaddab_hero_subtitle_text' ],
        'render_callback' => function() {
          return get_theme_mod( 'themaddab_hero_subtitle_text' );
        },
      ]
    );
  }
  
  // Hero Text Content.
  $wp_customize->add_setting(
    'themaddab_hero_text',
    [
      'default'           => '',
      'sanitize_callback' => 'wp_kses_post',
      'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
    ]
  );
  
  $wp_customize->add_control(
    'themaddab_hero_text',
    [
      'description' => __( 'Change the front page header text.', 'themaddab' ),
      'label'       => __( 'Front Page Header Text', 'themaddab' ),
      'section'     => 'themaddab_hero_section_settings',
      'settings'    => 'themaddab_hero_text',
      'type'        => 'textarea',
    ]
  );
  
  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial(
      'themaddab_hero_text',
      [
        'selector'        => '.hero-text',
        'settings'        => [ 'themaddab_hero_text' ],
        'render_callback' => function() {
          return get_theme_mod( 'themaddab_hero_text' );
        },
      ]
    );
  }
  
  // Front Page Hero Image
  $wp_customize->add_setting(
    'themaddab_top_img',
    [
      'default'           => '',
      'sanitize_callback' => 'esc_attr',
    ]
  );
  
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'themaddab_top_img',
      [
        'description' => __( 'Select an image to appear at the top of the page', 'themaddab' ),
        'label'       => __( 'Top Image Front Page', 'themaddab' ),
        'section'     => 'themaddab_hero_section_settings',
        'settings'    => 'themaddab_top_img',
      ]
    )
  );
  
  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial(
      'themaddab_top_img',
      [
        'selector'        => '.fp-topcont-img',
        'settings'        => [ 'themaddab_top_img' ],
        'render_callback' => function() {
          return get_theme_mod( 'themaddab_top_img' );
        },
      ]
    );
  }
  
  // Header Logo
  $wp_customize->add_setting(
    'top-bar-logo',
    [
      'default'           => '',
      'sanitize_callback' => 'esc_attr',
    ]
  );
  
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'top-bar-logo',
      [
        'description' => __( 'Adds a logo to the top left corner.', 'themaddab' ),
        'label'       => __( 'Logo', 'themaddab' ),
        'section'     => 'themaddab_hero_section_settings',
        'settings'    => 'top-bar-logo',
      ]
    )
  );
  
  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial(
      'top-bar-logo',
      [
        'selector'        => '.top-bar-logo',
        'settings'        => [ 'top-bar-logo' ],
        'render_callback' => function() {
          return get_theme_mod( 'top-bar-logo' );
        },
      ]
    );
	
	  // Color 1 settings.
	  $wp_customize->add_setting(
		  'themaddab_link_color',
		  [
			  'default'           => '',
			  'sanitize_callback' => 'sanitize_hex_color',
		  ]
	  );
	
	  $wp_customize->add_control(
		  new WP_Customize_Color_Control(
			  $wp_customize,
			  'themaddab_link_color',
			  [
				  'description' => __( 'Change link color.', 'themaddab' ),
				  'label'       => __( 'Link Color', 'themaddab' ),
				  'section'     => 'colors',
				  'settings'    => 'themaddab_link_color',
			  ]
		  )
	  );
	  
	  
	   // Color 1 settings.
	  $wp_customize->add_setting(
		  'themaddab_link_hover',
		  [
			  'default'           => '',
			  'sanitize_callback' => 'sanitize_hex_color',
		  ]
	  );
	
	  $wp_customize->add_control(
		  new WP_Customize_Color_Control(
			  $wp_customize,
			  'themaddab_link_hover',
			  [
				  'description' => __( 'Change link hover color.', 'themaddab' ),
				  'label'       => __( 'Link Color:hover', 'themaddab' ),
				  'section'     => 'colors',
				  'settings'    => 'themaddab_link_hover',
			  ]
		  )
	  );
   
   
   
  }
  
  
  /*
  
  // Hero Button.
  $wp_customize->add_setting(
    'themaddab_hero_button_text',
    [
      'default'           => themaddab_get_default_hero_button_text(),
      'sanitize_callback' => 'esc_html',
      'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
    ]
  );
  
  $wp_customize->add_control(
    'themaddab_hero_button_text',
    [
      'description' => __( 'Change the text for the colored button in the front page hero section.', 'themaddab' ),
      'label'       => __( 'Hero Colored Button Text', 'themaddab' ),
      'section'     => 'themaddab_hero_section_settings',
      'settings'    => 'themaddab_hero_button_text',
    ]
  );
  
  $wp_customize->add_setting(
    'themaddab_hero_button_url',
    [
      'sanitize_callback' => 'esc_url',
      'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
    ]
  );
  
  $wp_customize->add_control(
    'themaddab_hero_button_url',
    [
      'description' => __( 'Change the url for the colored button in the front page hero section.', 'themaddab' ),
      'label'       => __( 'Hero Colored Button URL', 'themaddab' ),
      'section'     => 'themaddab_hero_section_settings',
      'settings'    => 'themaddab_hero_button_url',
    ]
  );
  
  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial(
      'themaddab_hero_button_text',
      [
        'selector'        => '.hero-section .button',
        'settings'        => [ 'themaddab_hero_button_text' ],
        'render_callback' => function() {
          return get_theme_mod( 'themaddab_hero_button_text' );
        },
      ]
    );
  }
  
  // Image Settings section.
  $wp_customize->add_section(
    'themaddab_image_settings',
    [
      'description' => sprintf( '<strong>%s</strong>', __( 'Modify the images displayed on the front page, the default image shown on inside pages, and the footer image. The recommended image size is 1600px wide by 420px tall. Larger images will be cropped to that size.', 'themaddab' ) ),
      'title'       => __( 'Image Settings', 'themaddab' ),
      'panel'       => 'themaddab_settings',
    ]
  );
  
  // Front Page Image 1.
  $wp_customize->add_setting(
    'themaddab_front_page_image_1',
    [
      'default'           => themaddab_get_default_front_page_image_1(),
      'sanitize_callback' => 'esc_attr',
    ]
  );
  
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'themaddab_front_page_image_1',
      [
        'description' => __( 'Select an image for the hero section of the front page.', 'themaddab' ),
        'label'       => __( 'Front Page Image 1', 'themaddab' ),
        'section'     => 'themaddab_image_settings',
        'settings'    => 'themaddab_front_page_image_1',
      ]
    )
  );
  
  // Front Page Image 2.
  $wp_customize->add_setting(
    'themaddab_front_page_image_2',
    [
      'default'           => themaddab_get_default_front_page_image_2(),
      'sanitize_callback' => 'esc_attr',
    ]
  );
  
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'themaddab_front_page_image_2',
      [
        'description' => __( 'Select an image to appear if the Front Page 1, Front Page 2 or Front Page 3 sections are in use.', 'themaddab' ),
        'label'       => __( 'Front Page Image 2', 'themaddab' ),
        'section'     => 'themaddab_image_settings',
        'settings'    => 'themaddab_front_page_image_2',
      ]
    )
  );
  
  // Front Page Image 3.
  $wp_customize->add_setting(
    'themaddab_front_page_image_3',
    [
      'default'           => themaddab_get_default_front_page_image_3(),
      'sanitize_callback' => 'esc_attr',
    ]
  );
  
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'themaddab_front_page_image_3',
      [
        'description' => __( 'Select an image to appear if the Front Page 4 or Front Page 5 sections are in use.', 'themaddab' ),
        'label'       => __( 'Front Page Image 3', 'themaddab' ),
        'section'     => 'themaddab_image_settings',
        'settings'    => 'themaddab_front_page_image_3',
      ]
    )
  );
  
  // Default Posts and Page Image.
  $wp_customize->add_setting(
    'themaddab_default_image',
    [
      'default'           => themaddab_get_default_front_page_image_1(), // Use same default as front page 1.
      'sanitize_callback' => 'esc_attr',
    ]
  );
  
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'themaddab_default_image',
      [
        'description' => __( 'Select an image to use at the top of posts, pages, and portfolio items if a featured image is not set.', 'themaddab' ),
        'label'       => __( 'Default Post, Page, and Portfolio Image', 'themaddab' ),
        'section'     => 'themaddab_image_settings',
        'settings'    => 'themaddab_default_image',
      ]
    )
  );
  
  // Footer image.
  $wp_customize->add_setting(
    'themaddab_footer_image',
    [
      'default'           => themaddab_get_default_page_footer_image(),
      'sanitize_callback' => 'esc_attr',
    ]
  );
  
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'themaddab_footer_image',
      [
        'description' => __( 'Select an image for the call to action section above the footer.', 'themaddab' ),
        'label'       => __( 'Footer Image', 'themaddab' ),
        'section'     => 'themaddab_image_settings',
        'settings'    => 'themaddab_footer_image',
      ]
    )
  );
  
  // Color 1 settings.
  $wp_customize->add_setting(
    'themaddab_primary_color',
    [
      'default'           => themaddab_customizer_get_primary_color(),
      'sanitize_callback' => 'sanitize_hex_color',
    ]
  );
  
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'themaddab_primary_color',
      [
        'description' => __( 'Change the first color used in titles, menu links, post info links, default buttons, image overlays and more.', 'themaddab' ),
        'label'       => __( 'Color 1', 'themaddab' ),
        'section'     => 'colors',
        'settings'    => 'themaddab_primary_color',
      ]
    )
  );
  
  // Color 2 settings.
  $wp_customize->add_setting(
    'themaddab_secondary_color',
    [
      'default'           => themaddab_customizer_get_secondary_color(),
      'sanitize_callback' => 'sanitize_hex_color',
    ]
  );
  
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'themaddab_secondary_color',
      [
        'description' => __( 'Change the second color used in call-to-action and primary buttons, breadcrumbs, links, and more.', 'themaddab' ),
        'label'       => __( 'Color 2', 'themaddab' ),
        'section'     => 'colors',
        'settings'    => 'themaddab_secondary_color',
      ]
    )
  );
  
  // Basic settings section.
  $wp_customize->add_section(
    'themaddab_basic_settings',
    [
      'description' => sprintf( '<strong>%s</strong>', __( 'Modify the themaddab Pro Theme basic settings.', 'themaddab' ) ),
      'title'       => __( 'Basic Settings', 'themaddab' ),
      'panel'       => 'themaddab_settings',
    ]
  );
  
  // Styled paragraph settings.
  $wp_customize->add_setting(
    'themaddab_use_paragraph_styling',
    [
      'default'           => 1,
      'sanitize_callback' => 'absint',
    ]
  );
  
  $wp_customize->add_control(
    'themaddab_use_paragraph_styling',
    [
      'label'       => __( 'Enable the "intro" paragraph style on single posts?', 'themaddab' ),
      'description' => __( 'Check the box to automatically apply the "intro" font size and style to the first paragraph of all single posts.', 'themaddab' ),
      'section'     => 'themaddab_basic_settings',
      'settings'    => 'themaddab_use_paragraph_styling',
      'type'        => 'checkbox',
    ]
  );
  
  // Add single post image setting to the Customizer.
  $wp_customize->add_setting(
    'themaddab_post_image_setting',
    [
      'default'           => themaddab_customizer_get_default_post_image_setting(),
      'sanitize_callback' => 'absint',
    ]
  );
  
  $wp_customize->add_control(
    'themaddab_post_image_setting',
    [
      'label'       => __( 'Show featured image on posts?', 'themaddab' ),
      'description' => __( 'Check the box if you would like to display the featured image above the content on single posts.', 'themaddab' ),
      'section'     => 'themaddab_basic_settings',
      'type'        => 'checkbox',
      'settings'    => 'themaddab_post_image_setting',
    ]
  );
  
  // Add page setting to the Customizer.
  $wp_customize->add_setting(
    'themaddab_page_image_setting',
    [
      'default'           => themaddab_customizer_get_default_page_image_setting(),
      'sanitize_callback' => 'absint',
    ]
  );
  
  $wp_customize->add_control(
    'themaddab_page_image_setting',
    [
      'label'       => __( 'Show featured image on pages?', 'themaddab' ),
      'description' => __( 'Check the box if you would like to display the featured image above the content on single pages.', 'themaddab' ),
      'section'     => 'themaddab_basic_settings',
      'type'        => 'checkbox',
      'settings'    => 'themaddab_page_image_setting',
    ]
  );
  
  // Add portfolio image setting to the Customizer if portfolio in use.
  if ( post_type_exists( 'portfolio' ) ) {
    $wp_customize->add_setting(
      'themaddab_portfolio_image_setting',
      [
        'default'           => themaddab_customizer_get_default_portfolio_image_setting(),
        'sanitize_callback' => 'absint',
      ]
    );
    
    $wp_customize->add_control(
      'themaddab_portfolio_image_setting',
      [
        'label'       => __( 'Show featured image on portfolio items?', 'themaddab' ),
        'description' => __( 'Check the box if you would like to display the featured image above the content on single portfolio items.', 'themaddab' ),
        'section'     => 'themaddab_basic_settings',
        'type'        => 'checkbox',
        'settings'    => 'themaddab_portfolio_image_setting',
      ]
    );
  }
  
  // Add option to turn off image tints/overlays.
  $wp_customize->add_setting(
    'themaddab_color_overlay_setting',
    [
      'default'           => themaddab_customizer_get_default_color_overlay_setting(),
      'sanitize_callback' => 'absint',
    ]
  );
  
  $wp_customize->add_control(
    'themaddab_color_overlay_setting',
    [
      'label'       => __( 'Show a colored overlay on featured images?', 'themaddab' ),
      'description' => __( 'Check the box to display a colored overlay on featured and front page images in supported browsers. Alter the tint by changing Color 1 in the Colors settings. The overlay will not appear on product images.', 'themaddab' ),
      'section'     => 'themaddab_basic_settings',
      'type'        => 'checkbox',
      'settings'    => 'themaddab_color_overlay_setting',
    ]
  );
  
  // Front Page Content.
  $wp_customize->add_section(
    'themaddab_fpcontent_section_settings',
    [
      'active_callback' => 'is_front_page',
      'description'     => sprintf( '<strong>%s</strong>', __( 'Add content to front page.', 'themaddab' ) ),
      'title'           => __( 'Front Page Content', 'themaddab' ),
      'panel'           => 'themaddab_settings',
    ]
  );
  
  // Front Page Top Container Image.
  $wp_customize->add_setting(
    'themaddab_top_container_img',
    [
      'default'           => themaddab_get_default_front_page_image_3(),
      'sanitize_callback' => 'esc_attr',
    ]
  );
  
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'themaddab_top_container_img',
      [
        'description' => __( 'Select an image to appear at the above the top container', 'themaddab' ),
        'label'       => __( 'Top Container Image', 'themaddab' ),
        'section'     => 'themaddab_fpcontent_section_settings',
        'settings'    => 'themaddab_top_container_img',
      ]
    )
  );
  
  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial(
      'themaddab_top_container_img',
      [
        'selector'        => '.topcontainer-img',
        'settings'        => [ 'themaddab_top_container_img' ],
        'render_callback' => function() {
          return get_theme_mod( 'themaddab_top_container_img' );
        },
      ]
    );
  }
  
  // Top Container Link URL.
  $wp_customize->add_setting(
    'themaddab_topcontainer_link',
    [
      'default'           => '',
      'sanitize_callback' => 'themeslug_sanitize_url',
      'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
    ]
  );
  
  $wp_customize->add_control(
    'themaddab_topcontainer_link',
    [
      'description' => __( 'Adds Link To Container Title', 'themaddab' ),
      'label'       => __( 'Top Container Title Link', 'themaddab' ),
      'section'     => 'themaddab_fpcontent_section_settings',
      'settings'    => 'themaddab_topcontainer_link',
      'type'        => 'url',
    ]
  );
  
  
  // Top Container Title.
  $wp_customize->add_setting(
    'themaddab_topcontainer_title_text',
    [
      'default'           => '',
      'sanitize_callback' => 'wp_kses_post',
      'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
    ]
  );
  
  $wp_customize->add_control(
    'themaddab_topcontainer_title_text',
    [
      'description' => __( 'Adds Top Container Title', 'themaddab' ),
      'label'       => __( 'Top Container Title', 'themaddab' ),
      'section'     => 'themaddab_fpcontent_section_settings',
      'settings'    => 'themaddab_topcontainer_title_text',
      'type'        => 'textarea',
    ]
  );
  
  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial(
      'themaddab_topcontainer_title_text',
      [
        'selector'        => '.topcontainer-title',
        'settings'        => [ 'themaddab_topcontainer_title_text' ],
        'render_callback' => function() {
          return get_theme_mod( 'themaddab_topcontainer_title_text' );
        },
      ]
    );
  }
  
  // Top Container Content.
  $wp_customize->add_setting(
    'themaddab_topcontainer_content',
    [
      'default'           => '',
      'sanitize_callback' => 'wp_kses_post',
      'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
    ]
  );
  
  $wp_customize->add_control(
    'themaddab_topcontainer_content',
    [
      'description' => __( 'Adds Top Container Content', 'themaddab' ),
      'label'       => __( 'Top Container Content', 'themaddab' ),
      'section'     => 'themaddab_fpcontent_section_settings',
      'settings'    => 'themaddab_topcontainer_content',
      'type'        => 'textarea',
    ]
  );
  
  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial(
      'themaddab_topcontainer_content',
      [
        'selector'        => '.top-container-content',
        'settings'        => [ 'themaddab_topcontainer_content' ],
        'render_callback' => function() {
          return get_theme_mod( 'themaddab_topcontainer_content' );
        },
      ]
    );
  }
  
  // Left Container mid page
  $wp_customize->add_setting(
    'themaddab_leftcontainer_midpage_text',
    [
      'default'           => '',
      'sanitize_callback' => 'wp_kses_post',
      'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
    ]
  );
  
  $wp_customize->add_control(
    'themaddab_leftcontainer_midpage_text',
    [
      'description' => __( 'Adds Content To Middle Container Left', 'themaddab' ),
      'label'       => __( 'Middle Container Left', 'themaddab' ),
      'section'     => 'themaddab_fpcontent_section_settings',
      'settings'    => 'themaddab_leftcontainer_midpage_text',
      'type'        => 'textarea',
    ]
  );
  
  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial(
      'themaddab_leftcontainer_midpage_text',
      [
        'selector'        => '.card-body-left',
        'settings'        => [ 'themaddab_leftcontainer_midpage_text' ],
        'render_callback' => function() {
          return get_theme_mod( 'themaddab_leftcontainer_midpage_text' );
        },
      ]
    );
  }
  
  // Right Container Title
  $wp_customize->add_setting(
    'themaddab_rightcontainer_title',
    [
      'default'           => '',
      'sanitize_callback' => 'wp_kses_post',
      'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
    ]
  );
  
  $wp_customize->add_control(
    'themaddab_rightcontainer_title',
    [
      'description' => __( 'Adds A Title To The Mid Page Right Container', 'themaddab' ),
      'label'       => __( 'Mid Page Right Container Title', 'themaddab' ),
      'section'     => 'themaddab_fpcontent_section_settings',
      'settings'    => 'themaddab_rightcontainer_title',
      'type'        => 'text',
    ]
  );
  
  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial(
      'themaddab_rightcontainer_title',
      [
        'selector'        => '.rightcontainer-title',
        'settings'        => [ 'themaddab_rightcontainer_title' ],
        'render_callback' => function() {
          return get_theme_mod( 'themaddab_rightcontainer_title' );
        },
      ]
    );
  }
  
  // Right Container Content
  $wp_customize->add_setting(
    'themaddab_rightcontainer_content',
    [
      'default'           => '',
      'sanitize_callback' => 'wp_kses_post',
      'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
    ]
  );
  
  $wp_customize->add_control(
    'themaddab_rightcontainer_content',
    [
      'description' => __( 'Adds Content To The Mid Page Right Container', 'themaddab' ),
      'label'       => __( 'Mid Page Right Container Content', 'themaddab' ),
      'section'     => 'themaddab_fpcontent_section_settings',
      'settings'    => 'themaddab_rightcontainer_content',
      'type'        => 'textarea',
    ]
  );
  
  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial(
      'themaddab_rightcontainer_content',
      [
        'selector'        => '.rightcontainer-content',
        'settings'        => [ 'themaddab_rightcontainer_content' ],
        'render_callback' => function() {
          return get_theme_mod( 'themaddab_rightcontainer_content' );
        },
      ]
    );
  } */
  
}
