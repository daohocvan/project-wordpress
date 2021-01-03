<?php get_header() ?>
<div id="content">
	<div class="container">
		<?php get_template_part('slider') ?>
	</div>
	<div class="product-box">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 order-lg-0 order-0">
					<div class="product-section">
                         <h2 class="title-product">
                            Sản phẩm đang giảm giá						
							<div class="clear"></div>
						</h2>
						<div class="content-product-box">
							<div class="row">

							<?php 
							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
							$args = array( 
							'post_type' => 'product',
							'posts_per_page' => 4,
							'paged' => $paged,
							'meta_query'     => array(
								'relation' => 'OR',
								array(
									'key'           => '_sale_price',
									'value'         => 0,
									'compare'       => '>',
									'type'          => 'numeric'
								)
							)
						); ?>
					<?php $getposts = new WP_query( $args);?>
					<?php global $wp_query; $wp_query->in_the_loop = true; ?>
					<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
					<?php global $product; ?>

								<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
									<?php get_template_part('content/product_item')?>
								</div>
								<?php endwhile; wp_reset_postdata(); ?>
								<?php  pagination($getposts->max_num_pages); ?>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 order-lg-1 order-1">
					<div class="sidebar">
						<?php get_sidebar() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>
