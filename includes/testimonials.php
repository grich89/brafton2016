<script>
	$(document).ready(function(){
	  $('.testimonials-slider').bxSlider({
	  	pager: true,
	  	auto: false,
	  	pause: 8000,
	  	speed: 1500,
	  	autoHover: true,
	  	nextSelector: '#slider-next',
	  	prevSelector: '#slider-prev',
  		mode: 'horizontal',
	  });
	});
</script>
<div class="testimonials">
	<div class="wrap">
	<ul class="testimonials-slider">
	<?php
			$testimonials_query = new WP_Query( array( 
			'post_type' => array('testimonials'),
		) );
					 
			if ( $testimonials_query->have_posts() ) : ?>
						<?php 
						while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post(); ?>	
							
							<li>
								<span class="open-quote">
									<i class="fa fa-quote-left" aria-hidden="true"></i>
								</span>

								<span class="close-quote">
									<i class="fa fa-quote-right" aria-hidden="true"></i>
								</span>

								<?php 
									$author = get_field('test_author');
									$title = get_field('title');
									$company_name = get_field('company_name');
									$quote = get_field('slider_quote');
								?>

								<div class="quote">
									<?php if( $quote ) {
											echo '<div class="text">';
											echo $quote;
											echo '</div>';
										}
										?>									
									<div class="author-data">
										<?php if( $author ) {
											echo '<span class="author">';
											echo $author;
											echo '</span>';
										}
										?>
										<?php if( $title ) {
											echo '<span class="title">';
											echo $title;
											echo '</span>';
										}
										?>
										<?php if( $company_name ) {
											echo '<span class="company">';
											echo $company_name;
											echo '</span>';
										}
										?>
									</div>
								</div>
							</li>
			<?php endwhile; endif; ?>
		</ul>
	</div>
</div>