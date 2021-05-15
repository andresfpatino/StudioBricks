<div class="country" id="<?php echo $_POST['country']; ?>">
	<div class="country_wrap">
		<?php while($showRoom->have_posts()) : $showRoom->the_post() ; ?>
		<div class="city">
			<h3 class="city_title"> <?php the_title(); ?> </h3>
			<div class="city_info"> <?php the_content(); ?> </div>
		</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</div>