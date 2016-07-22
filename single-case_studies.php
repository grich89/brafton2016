<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<?php if( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>

									<?php brafton_share( 'top' ); ?> 

								</header> <?php // end article header ?>

								<section class="entry-content cf" itemprop="articleBody">

									<?php
									
										$before_text = html_entity_decode( get_post_meta( $post->ID, 'downloadables_top_text', true ) );
										$product_id = get_post_meta( $post->ID, 'digioh_product_id', true );
										$account_id = 1252;

									?>

									<p class="downloadable-before"><?php echo $before_text; ?></p>

									<?php

									$img = get_post_meta(get_the_ID(), 'wp_custom_attachment', true); 
									$exclude = get_field('exclude-top-button'); 

									//If exclude button is checked, do not include download button at top

									if ( in_array ('Exclude', $exclude) ) { 

										echo '';

									} else {

									?>

										<?php 

										//If exclude button is unchecked, download button will be included by default
										if( $img ) { ?>

											<a class="pdflink" href="<?php echo $img['url']; ?>"> <div class="text">Download the Case Study (PDF)</div></a>

										<?php } //end img if statement ?>

									<?php } ?>

									<?php

										// the content (pretty self explanatory huh)
										the_content();

									if( $img ) { ?>

										<a class="pdflink" href="<?php echo $img['url']; ?>"> <div class="text">Download the Case Study (PDF)</div></a>

									<?php } //end img if statement ?>

								</section> <?php // end article section ?>

								<footer class="article-footer cf">

								</footer>

								<?php 
								//No comments on the standard page template
								//comments_template(); ?>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

					</main>

				</div>

			</div>

<div class="make d-all t-all m-all">
	<div class="overlay">
		<div class="wrap">
			<div class="d-all t-all m-all">
				<h2>Need a success story starring you?</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar.</p>
				<a class="green-btn">Let's Talk</a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
