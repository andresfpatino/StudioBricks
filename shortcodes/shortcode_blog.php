<?php  // [blog-studiobricks]

function shortcode_blog_studiobricks(){  ?>
	<div class="blog_studiobricks">
		<?php
		    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
			$arg_stickyPost = array(
				'post_type'      => 'post',
				'publish_status' => 'published',
				'posts_per_page' => 1,
				'ignore_sticky_posts' => 1,
				'post__in'  => get_option( 'sticky_posts' )
			);

			// POST STICKY
			$querySticky = new WP_Query($arg_stickyPost);
			if($querySticky->have_posts() && $paged < 2) : ?>
				<!-- Sticky post -->
				<div class="wrap_post--sticky">
					<?php while($querySticky->have_posts()) : $querySticky->the_post() ; ?>						
						<div class="wrap_post">	
							<div class="post_studiobricks-content">
								<hr>
								<h3 class="post_studiobricks-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a> </h3> 
								<p  class="post_studiobricks-excerpt"> <?php echo mb_strimwidth(get_the_excerpt(), 0, 180, '...'); ?> </p>
								<a class="post_studiobricks-view-more" href=" <?php the_permalink(); ?> "> <?php echo _e('read more','studiobricks');  ?> </a>
								<div class="post_studiobricks_meta">
									<time class="post_studiobricks_meta--date-published" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished">
										<?php echo _e('Date published','studiobricks') . '<br>' . get_the_date('Y.m.d');  ?>
									</time>
									<p class="post_studiobricks_meta--category"> 
										<?php $category = get_the_category( ); 
										echo _e('Category','studiobricks') . '<br>' . $category[0]->cat_name; ?>
									</p>	
								</div>
							</div>	
							<div class="post_studiobricks-thumnail"> 
								<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail(); ?> </a>
							</div>
						</div>					
					<?php endwhile; wp_reset_postdata(); ?>	
				</div>
			<?php endif; ?> 
		
		<?php 
		// POST
		$arg_Post = array(
			'post_type'      => 'post',
			'post__not_in'	=> get_option ('sticky_posts'),
			'publish_status' => 'published',
			'posts_per_page' => 3,
			'paged' => $paged			
		);

		$queryPosts = new WP_Query($arg_Post);
		if($queryPosts->have_posts()) : ?>
			<!-- Posts archive -->
			<div class="wrap_post--archive">	
				<?php while($queryPosts->have_posts()) : $queryPosts->the_post() ; ?>													
					<div class="wrap_post">	
						<div class="post_studiobricks_meta">
							<div class="post_studiobricks_meta--wrap">
								<time class="post_studiobricks_meta--date-published" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished">
									<?php echo _e('Date published','studiobricks') . '<br>' . get_the_date('Y.m.d');  ?>
								</time>
								<p class="post_studiobricks_meta--category"> 
									<?php $category = get_the_category( ); 
									echo _e('Category','studiobricks') . '<br>' . $category[0]->cat_name; ?>
								</p>	
							</div>
						</div>
						<div class="post_studiobricks-content">
							<hr>
							<h3 class="post_studiobricks-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a> </h3> 
							<p class="post_studiobricks-excerpt"> <?php echo mb_strimwidth(get_the_excerpt(), 0, 210, '...'); ?> </p>
						</div>	
						<div class="post_studiobricks-thumnail"> 
							<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('large'); ?> </a>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata();  ?>
				
				<?php wp_pagenavi( array( 'query' => $queryPosts ) ); ?>			
				
			</div>
		<?php endif; ?>
		
	</div> <?php
} 
add_shortcode( 'blog-studiobricks', 'shortcode_blog_studiobricks' ); 