<?php 
// add our menu functions
function customtheme_theme_setup()  {
    register_nav_menus( array(
        'header' => 'Header menu',
        'footer' => 'Footer menu'
    ));
}
add_action('after_setup_theme', 'customtheme_theme_setup');

// add support to our featured images
add_theme_support('post-thumbnails');

// Set up our footer widgets
function cmsclass_widgets_init(){
    register_sidebar(array(
        'name'          => __('Footer Widget Area One', 'cmsclass'),
        'id'            => 'footer-widget-area-one',
        'description'   => __('The first footer widget area', 'cmsclass'),
        'before_widget' => '<div class="logo-widget">',
        'after_widget'  => '</div>',
    ));

register_sidebar(array(
    'name'          => __('Footer Widget Area Two', 'cmsclass'),
    'id'            => 'footer-widget-area-two',
    'description'   => __('The second footer widget area', 'cmsclass'),
    'before_widget' => '<div class="about-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
));
register_sidebar(array(
    'name'          => __('Footer Widget Area Three', 'cmsclass'),
    'id'            => 'footer-widget-area-three',
    'description'   => __('The third footer widget area', 'cmsclass'),
    'before_widget' => '<div class="menu-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
));
register_sidebar(array(
    'name'          => __('Footer Widget Area Four', 'cmsclass'),
    'id'            => 'footer-widget-area-four',
    'description'   => __('The fourth footer widget area', 'cmsclass'),
    'before_widget' => '<div class="contact-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
));
}
add_action('widgets_init', 'cmsclass_widgets_init');

// Our first custom plugin
function cms_plugin_init(){
    $args = array(
        'label'           => 'CMS Post Type',
        'public'          => true,
        'show_ui'         => true,
        'capability_type' => 'post',
        'taxonomies'      => array('category'),
        'hierarchical'    => false,
        'query_var'       => true,
        'menu_icon'       => 'dashicons-album',
        'supports'        => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'comments',
            'thumbnail',
            'author',
            'post-formats',
            'page-attributes',
        )
    );
    register_post_type('cmsPosttype', $args);
}
add_action('init', 'cms_plugin_init');

//Build our shortcode for our CMS post type
function cms_posttype_shortcode(){
    $query = new WP_Query(array('post_type' => 'cmsPosttype', 'posts_per_page' => 8, 'order' => 'asc'));
    while($query -> have_post()) : $query -> the_post();
    ?>
    <div class="cms_post_container">
        <div>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </div>
        <div>
            <h4><?php the_title(); ?></h4>
            <?php the_content(); ?>
            <a href="<?php the_permalink(); ?>">Learn More</a>
        </div>
    </div>
        <?php
            wp_reset_postdata();
            endwhile;    
}
// register our shortcode
add_shortcode('cmsPosttype', 'cms_posttype_shortcode');

//adding woocommerice support to our theme
function customtheme_add_woocommerce_support(){
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'customtheme_add_woocommerce_support');
function enqueue_wc_cart_fragments() {
    wp_enqueue_script('wc-cart-fragments');
}
add_action('wp_enqueue_scripts', 'enqueue_wc_cart_fragments');

// add_action('woocommerce_before_single_product_summary', function() {
	// printf(format: '<h4>This is our first Woocommerce action hook!</h4>');
// });

/* Remove the product title from the single product page*/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

/* Removes the product price */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

/* Removes all the add to cart options */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

/* Removes all the product data tabs */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

/* Removes all the product attributes */
remove_action('woocommerce_product_additional_information', 'wc_display_product_attributes', 10);

/* Removes all the up-sale products */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

/* Removes all the related products */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

/* Removes all the single product variations */
remove_action('woocommerce_single_variation', 'woocommerce_single_variation', 10);

/* Removes all the single product meta data, ex. SKU */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

/* Now let's add our product details back but this time we will change the order in which the information is displayed*/
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 15);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 15);
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 10);
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 15);
add_action('woocommerce_product_additional_information', 'wc_display_product_attributes', 15);
add_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
function web_add_woocommerce_support() {
    add_theme_support('woocommerce');
}   
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');
add_action('after_setup_theme', 'web_add_woocommerce_support');