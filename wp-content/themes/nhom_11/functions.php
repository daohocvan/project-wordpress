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

    function setPostView($postID){
        $count_key = 'views';
        $count = get_post_meta($postID, $count_key, true);
        if($count == ''){
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '1');
        }
        else{
            $count++;
            update_post_meta($postID, $count_key,$count);
        }
    }
    function getPostView($postID){
        $count_key = 'views';
        $count = get_post_meta($postID, $count_key, true);
        if($count == ''){
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '1');
            return '1';
        }
        return $count;
    }    
}

add_action('init', 'initTheme');

//% giảm giá
function percent_sale($price, $price_sale){
    $sale = ($price_sale * 100) / $price;
    $result = 100 - $sale;
    return number_format($result, 1);
}

/* Tự động chuyển đến một trang khác sau khi login */
function my_login_redirect( $redirect_to, $request, $user ) {
    global $user;
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
            if ( in_array( 'administrator', $user->roles ) ) {
                    
                    return admin_url();
            } else {
                    return home_url();
            }
    } else {
            return $redirect_to;
    }
}

add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );

//Sản phẩm đã xem
function viewedProduct(){
	session_start();
	if(!isset($_SESSION["viewed"])){
		$_SESSION["viewed"] = array();
	}
	if(is_singular('product')){
		$_SESSION["viewed"][get_the_ID()] = get_the_ID();
	}
}
add_action('wp', 'viewedProduct');

//Change url View Cart
add_filter( 'woocommerce_get_cart_url', 'cart_to_checkout' );
 
function cart_to_checkout( $url ) {
    return 'http://localhost:82/nhom11/gio-hang';
}

add_filter( 'woocommerce_get_checkout_url', 'checkout' );
 
function checkout( $url ) {
    return 'http://localhost:82/nhom11/checkout';
}

//Update quantity in cart
add_action( 'woocommerce_after_cart', function() {
    ?>
       <script>
          jQuery(function($) {
             var timeout;
             $('div.woocommerce').on('change textInput input', 'form.woocommerce-cart-form input.qty', function(){
                if(typeof timeout !== undefined) clearTimeout(timeout);
  
                //Not if empty
                if ($(this).val() == '') return;
  
                timeout = setTimeout(function() {
                   $("[name='update_cart']").trigger("click"); 
                }, 500);
             }); 
          });
       </script>
    <?php
 } );

//Custom form checkout
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields',99 );
function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
 $fields['billing']['billing_last_name'] = array(
    'label' => __('Name'),
    'required' => true,
    'clear' => true
  );
  $fields['billing']['billing_address_1']['placeholder'] = '';
 
 unset($fields['billing']['shipping_company']);
 unset($fields['billing']['shipping_first_name']);
 unset($fields['shipping']['shipping_country']);
 unset($fields['shipping']['shipping_state']);
 unset($fields['shipping']['shipping_postcode']);
 unset($fields['shipping']['shipping_address_2']);
 unset($fields['shipping']['shipping_city']);
 return $fields;
}

//Reset data in form checkout
add_filter('woocommerce_checkout_get_value','__return_empty_string',10);

add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment( $fragments ) {
 ob_start();
 ?>
		<a href="<?php bloginfo('url')?>/gio-hang" class="icon-cart">
								 <div class="icon">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span>
										
									</div>
									<div class="info-cart">
										<p>Giỏ hàng</p>
										<span><?php echo WC()->cart->get_cart_total(); ?></span>
									</div>
								</a>			
 <?php
 $fragments['a.icon-cart'] = ob_get_clean();
 return $fragments;
}

//Phân trang
function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
    if(1 != $pages)
    {
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<li class=\"page-item active\"><a class='page-link'>".$i."</a></li>":"<li class='page-item'> <a href='".get_pagenum_link($i)."' class=\"page-link\">".$i."</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href=\"".get_pagenum_link($paged + 1)."\">i class='flaticon flaticon-back'></i></a></li>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href='".get_pagenum_link($pages)."'><i class='flaticon flaticon-arrow'></i></a></li>";
        echo "</ul></nav>\n";
    }
}
add_filter('init', 'after_login');

function after_login() {
    if(is_user_logged_in() && $_SERVER['REQUEST_URI'] == "/nhom11/login"){
        wp_redirect( "http://localhost:82/nhom11/my-account" );
        exit();
    }
    if(is_user_logged_in() && $_SERVER['REQUEST_URI'] == "/nhom11/register"){
        wp_redirect( "http://localhost:82/nhom11/my-account" );
        exit();
    }
    if(!is_user_logged_in() && $_SERVER['REQUEST_URI'] == "/nhom11/my-account"){
        wp_redirect( "http://localhost:82/nhom11/login" );
        exit();
    }
    if(is_user_logged_in() && $_SERVER['REQUEST_URI'] == "/nhom11/lostpassword"){
        wp_redirect( "http://localhost:82/nhom11/my-account" );
        exit();
    }
}

//Slider
function slider_post_type(){
    $label = array(
        'name' => 'Slider',
        'singular_name' => 'Slider'
    );
 
    $args = array(
        'labels' => $label,
        'description' => 'Slider',
        'supports' => array(
            'title',
            'thumbnail',
        ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true, 
        'show_in_admin_bar' => true, 
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-format-gallery',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post'
    );

    register_post_type('slider', $args);
}
add_action('init', 'slider_post_type');

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
    return __( 'Mua ngay', 'woocommerce' ); 
}



 

 
 
