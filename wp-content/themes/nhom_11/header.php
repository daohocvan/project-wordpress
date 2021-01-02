<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head() ?>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory')?>/libs/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory')?>/libs/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory')?>/css/main.css">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory')?>/css/responsive.css">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory')?>/css/child.css">
	</head>
	<body <?php body_class()?>>
		<div id="wallpaper">
			<header>
				<div class="top">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<?php
							 date_default_timezone_set("Asia/Ho_Chi_Minh");
							 $date = date("d-m-Y H:i");
							?>
								<p>Chào mừng bạn đến với website bán hàng! <?php echo $date?></p>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="top-menu">
								
								<?php if(is_user_logged_in() == false){?>
									<ul>
										<li><a href="<?php echo esc_url( wp_login_url() ); ?>">Login</a></li>
									</ul>
									
								<?php } else {?>
									<?php global $current_user; wp_get_current_user(); 
									?>
									<ul>
										<li><a href="<?php echo get_site_url(null, '/my-account', null);?>">Hi <?php  echo ($current_user->display_name) ?></a></li>
										<li><a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>
									</ul>
								<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="main-header">
					<div class="container">
						<div class="row">
							<div class="col-6 col-xs-6 col-sm-6 col-md-3 col-lg-3 order-md-0 order-0">
								<div class="logo">
									<a href="<?php bloginfo('url')?>"><img src="<?php bloginfo('stylesheet_directory')?>/images/logo.png" alt=""></a>
									<h1>Website bán hàng</h1>
								</div>
							</div>
							<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 order-md-1 order-2">
								<div class="form-seach-product">
							
								<form class="search" method="get" action="" role="search">
									<select name="" id="input" class="form-control">
										<option value="">Tìm kiếm</option>			
									</select>
									<div class="input-seach">
										<input type="text" class="form-control" name="s"/>
  										<button type="submit" class="btn-search-pro"><i class="fa fa-search"></i></button>
									</div>
									<div class="clear"></div>

								</form>
								</div>

							</div>
							<div class="col-6 col-xs-6 col-sm-6 col-md-3 col-lg-3 order-md-2 order-1" style="text-align: right">
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
							</div>
						</div>
					</div>
				</div>
				<div class="main-menu-header">
					<div class="container">
						<div id="nav-menu">
						<?php 
								 wp_nav_menu(
									 array(
										 'theme_location' => 'header-main',
										 'container' => 'false',
										 'sub_menu' => true,
										 'menu_id' => 'header-main',
										 'menu_class' => 'header-main',
										 'show_parent' => true
									 )
								 )
								?>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</header>