<?php get_header() ?>
<div id="content">
	<div class="product-box page-category">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 order-lg-0 order-0">
					<div class="category-page-content">
					<h1 class="cat-title"><?php single_cat_title()?></h1>
						<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
						<div class="list-news">
						<div class="row">
							
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<a href="<?php the_permalink()?>">
								<?php the_post_thumbnail('full')?>
							</a>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
							<h4><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
							<?php the_excerpt()?>
							<a href="<?php the_permalink() ?>" class="detail">Xem chi tiết</a>
							</div>
							
						</div>	
						</div>
						<?php endwhile;?>
						<?php endif; ?>					
					</div>
					<?php if(paginate_links()!='') {?>
	<div class="phanTrang">
		<?php
		global $wp_query;
		$big = 999999999;
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'prev_text'    => __('«'),
			'next_text'    => __('»'),
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
			) );
	    ?>
	</div>
<?php } ?>
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