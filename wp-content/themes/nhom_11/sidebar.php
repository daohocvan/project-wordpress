<!-- <div class="category-box">
	<h3>Danh mục sản phẩm</h3>
	<div class="content-cat">
		<ul>
			
			<?php $cat = get_term_by('id', $category->term_id, 'product_cat')?>
			<?php 
				$args = array(
					'type' => 'product',
					'child_of' => '0',
					'taxonomy' => 'product_cat',
					'number' => '10',
					'parent' => $cat->term_id
				);	
				$categories = get_categories($args);
				foreach ($categories as $category){ ?>
					<li><i class="fa fa-angle-right"></i><a href="<?php echo get_term_link($category->slug, 'product_cat')?>">
						<?php echo $category->name?>
					</a></li>
			<?php }?>
		</ul>
	</div>
</div> -->

<div class="widget">
<h3>
<i class="fa fa-eye"></i>
		Sản phẩm vừa xem
	</h3>
	<div class="content-w">
		<ul>
		<?php if(isset($_SESSION["viewed"]) && $_SESSION["viewed"]){
		$data = $_SESSION["viewed"];
		$args = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => 5,
			'post__in'	=> $data
		);
?>
<?php $getposts = new WP_query( $args);?>
<?php global $wp_query; $wp_query->in_the_loop = true; ?>
<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
<?php global $product; ?>
	<li>
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('thumbnail')?>
		</a>
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<div class="clear"></div>
	</li>
<?php endwhile;  wp_reset_postdata();
} else { ?> 
	<p>Không có sản phẩm nào vừa xem!</p>
<?php } ?>		
		</ul>
	</div>
</div>


<div class="widget">
<h3>
<i class="fa fa-plus-square"></i>
		Sản phẩm mới nhất
	</h3>
	<div class="content-w">
		<ul>
	
<?php $args = array( 'post_type' => 'product','posts_per_page' =>5,); ?>
    <?php $getposts = new WP_query( $args);?>
    <?php global $wp_query; $wp_query->in_the_loop = true; ?>
    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
    <?php global $product; ?>
	<li>
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('thumbnail')?>
		</a>
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<div class="clear"></div>
	</li>
<?php endwhile;  wp_reset_postdata(); ?>
		</ul>
	</div>
</div>



<div class="widget">
	<h3>
	<i class="fa fa-star"></i>
		Đánh giá cao
	</h3>
	<div class="content-w">
		<ul>
	
		<?php $args = array(
		'posts_per_page' => 3,
		'post_status'    => 'publish',
		'post_type'      => 'product',
		'meta_key'       => '_wc_average_rating',
		'orderby'        => 'meta_value_num',
		'order'          => 'DESC',
	);?>
<?php $getposts = new WP_query( $args);?>
<?php global $wp_query; $wp_query->in_the_loop = true; ?>
<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
<?php global $product; ?>
	<li>
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('thumbnail')?>
		</a>
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<div class="clear"></div>
	</li>
<?php endwhile;  wp_reset_postdata(); ?>	
		</ul>
	</div>
</div>

<!-- <div class="widget">
	<h3>
		<i class="fa fa-bars"></i>
		Tin tức
	</h3>
	<div class="content-w">
		<ul>
			
		<?php $args = array('post_status' => 'publish', 'post_type' => 'post','posts_per_page' => 5, 'cat' => 31) ?>
								<?php $getposts = new WP_query( $args);?>
								<?php global $wp_query; $wp_query->in_the_loop = true; ?>
								<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

								<li>
				<a href="<?php the_permalink()?>">
					<?php the_post_thumbnail('thumbnail')?>
				</a>
				<h4><a href="<?php the_permalink()?>"><?php the_title() ?></a></h4>
				<div class="clear"></div>
			</li>
								<?php endwhile; wp_reset_postdata(); ?>
			
			
		</ul>
	</div>
	
</div> -->

<!-- <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar')) :?> <?php endif; ?> -->
			