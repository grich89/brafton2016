<?php get_header(); ?>

<div class="resources wrap">
<h1>Resources</h1>

<div class="sort">
	<ul>
		<li>Sort By</li>
		<li><a href="#">All</a></li>
		<li><a href="#">eBooks</a></li>
		<li><a href="#">Infographics</a></li>
		<li><a href="#">Whitepapers</a></li>
		<li><a href="#">Video Tutorials</a></li>
	</ul>
</div>

	<div class="d-all t-all m-all">

		<?php

				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				 
				$wp_query = new WP_Query( array( 
					'posts_per_page' => '9',
					'post_type' => array('post'),
					'paged' => $paged 
				) );
				 
				if ( $wp_query->have_posts() ) : ?>
					<?php 
					while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>	
						<?php 
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						?>
						<div class="case d-1of3 t-1of3 m-1of3">
							<div class="thumb" style="background-image: url('<?php echo $thumb[0]; ?>');"></div>
							<div class="entry">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="text">
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>

					<?php endwhile; ?>

	</div>

					<?php bones_page_navi(); ?>

				<?php else : ?>
					<!-- show 404 error here -->
				<?php endif; ?>
</div>

<?php get_footer(); ?>