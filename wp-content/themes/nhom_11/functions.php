<?php
function my_custom_theme_support(){
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'my_custom_theme_support');
function initTheme(){
    add_filter('use_block_editor_for_post', '__return_false');
    register_nav_menu('header-top', __('Menu top'));
    register_nav_menu('header-main', __('Menu chính'));
    register_nav_menu('footer-menu', __('Menu footer'));

    if(function_exists('register_sidebar')){
        register_sidebar(array(
            'name' => 'Cột bên',
            'id' => 'sidebar',
            'before_widget' => '<div class="widget">',
            'after_widget' => '<div>',
            'before_title' => '<h3> <i class="fa fa-bars"></i>',
            'after_title' => '</h3>'
        ));
    }

}

add_action('init', 'initTheme');

function percent_sale($price, $price_sale){
    $sale = ($price_sale * 100) / $price;
    $result = 100 - $sale;
    return number_format($result, 1);
}
