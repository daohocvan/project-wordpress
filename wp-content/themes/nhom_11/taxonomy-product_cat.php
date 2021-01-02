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
							Danh mục
							<div class="clear"></div>
						</h2>
						<div class="content-product-box">
							<div class="row">

							<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<?php get_template_part('content/product_item')?>
						</div>
	
							<?php endwhile;?>
							<?php endif; ?>
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