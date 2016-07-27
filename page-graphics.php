<?php get_header(); ?>

<div id="intro" class="wrap">
	<h2>Art meets strategy</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar. Donec tristique ante at dapibus dignissim. Nunc quis justo risus. Vivamus at nulla sed velit dictum facilisis non id ante. Maecenas dictum rutrum odio ut consectetur. Mauris lobortis eget neque sit amet tincidunt. Morbi fringilla quam ante, quis interdum est vehicula a. Proin finibus pharetra massa, ut tempor nisi mattis eget. </p>
	<div class="infographics d-all m-all t-all">
		<?php
			 
			$info_query = new WP_Query( array( 
			'posts_per_page' => '4',
			'post_type' => array('infographic'),
		) );
					 
			if ( $info_query->have_posts() ) : ?>
						<?php 
						while ( $info_query->have_posts() ) : $info_query->the_post(); ?>	
							<?php 
								$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
							?>
							<div class="infographic d-1of4 t-1of4 m-1of4">
								<a href="<?php the_permalink(); ?>">
									<div class="thumb" style="background-image: url('<?php echo $thumb[0]; ?>');"></div>
								</a>
							</div>

						<?php endwhile; endif; ?>
	</div>
	<h2>Graphics get attention</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar. Donec tristique ante at dapibus dignissim. Nunc quis justo risus. Vivamus at nulla sed velit dictum facilisis non id ante. Maecenas dictum rutrum odio ut consectetur. Mauris lobortis eget neque sit amet tincidunt. Morbi fringilla quam ante, quis interdum est vehicula a. Proin finibus pharetra massa, ut tempor nisi mattis eget. </p>
</div>

<div class="features">
	<div class="feature wrap">
		<div class="d-1of2 t-1of2 m-1of2">
			<h2>Featured images</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar. Donec tristique ante at dapibus dignissim.</p>
			<a href="#">See examples here</a>
		</div>
		<div class="d-1of2 t-1of2 m-1of2">
			<img src="<?php echo get_template_directory_uri(); ?>/library/images/placeholder_image_fullWidth.jpg" />
		</div>
	</div>

	<div class="feature wrap">
		<div class="d-1of2 t-1of2 m-1of2">
			<img src="<?php echo get_template_directory_uri(); ?>/library/images/placeholder_image_fullWidth.jpg" />
		</div>
		<div class="d-1of2 t-1of2 m-1of2">
			<h2>Infographics</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar. Donec tristique ante at dapibus dignissim.</p>
			<a href="#">See examples here</a>
		</div>
	</div>

	<div class="feature wrap">
		<div class="d-1of2 t-1of2 m-1of2">
			<h2>CTAs</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar. Donec tristique ante at dapibus dignissim.</p>
			<a href="#">See how they get results</a>
		</div>
		<div class="d-1of2 t-1of2 m-1of2">
			<img src="<?php echo get_template_directory_uri(); ?>/library/images/placeholder_image_fullWidth.jpg" />
		</div>
	</div>
</div>

<div class="channels">
	<div class="wrap">
		<h2>Lorem ipsum dolor sit amet</h2>
		<div class="d-1of3 t-1of3 m-1of3">
			<h3>SEO</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar. Donec tristique ante at dapibus dignissim. Nunc quis justo risus. Vivamus at nulla sed velit dictum facilisis non id ante.</p>
		</div>
		<div class="d-1of3 t-1of3 m-1of3">
			<h3>Social</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar. Donec tristique ante at dapibus dignissim. Nunc quis justo risus. Vivamus at nulla sed velit dictum facilisis non id ante.</p>
		</div>
		<div class="d-1of3 t-1of3 m-1of3">
			<h3>Thought Leadership</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar. Donec tristique ante at dapibus dignissim. Nunc quis justo risus. Vivamus at nulla sed velit dictum facilisis non id ante.</p>
		</div>
	</div>
</div>

<div class="section wrap">
	<h2>As seen on...</h2>
</div>

<div class="make d-all">
	<div class="overlay">
		<div class="wrap">
			<div class="d-all t-all m-all">
				<div class="d-1of2">
					<h2>We're here to help</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar.</p>
					<a class="green-btn">Let's Talk</a>
				</div>
				<div class="d-1of2">
					<h2>What's Next?</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar.</p>
					<a class="green-btn">Meet the Execs</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>