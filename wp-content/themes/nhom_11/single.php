<?php get_header() ?>
<div id="content">
	<div class="product-box page-category">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 order-lg-0 order-0">
                <?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
					<?php setPostView(get_the_ID()) ?>
                    <h1 class="title"><?php the_title()?></h1>
                    <p><?php the_content()?></p>
					<div class="meata-single">
                        <span>Tác giả: <?php the_author()?></span><br>
                        <span>Chuyên mục: <?php the_category(', ')?></span><br>
                        <span>Lượt xem: <?php echo getPostView(get_the_ID())?></span>
                    </div>
						
					</div>
					<?php endwhile;?>
					<?php endif; ?>		
					
					
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