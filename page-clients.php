<?php get_header(); ?>

<div class="wrap">
<h1>Case Studies</h1>

	<div class="clients d-all t-all m-all">
	<?php
			$args = array( 'numberposts' => '3', 'post_type' => 'case_studies', 'post_status' => 'publish' );
			$case_posts = wp_get_recent_posts( $args );
			foreach( $case_posts as $case ){
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($case['ID']), false, '' );
				echo '<div class="case d-1of3 t-1of3 m-1of3"><a href="' . get_permalink($case["ID"]) . '" title="'.esc_attr($case["post_title"]).'" ><div class="caseimg" style="background-image: url('. $thumb[0] .');"></div></a>';
				echo '<div class="text"><a href="' . get_permalink($case["ID"]) . '" title="'.esc_attr($case["post_title"]).'" ><h3 class="center">' . $case["post_title"] .'</h3></a>' . $case["post_excerpt"] . '</div>';
				echo '<a href="' . get_permalink($case["ID"]) . '" class="green-btn">Read full case study</a>';
				echo '</div>';
			} ?>

	</div>

</div>

<?php get_footer(); ?>