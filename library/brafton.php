<?php

// Activating some advanced theme features...
add_editor_style(); // Parameters can be adjusted in editor-style.css
add_theme_support( 'post-thumbnails' );

// Remove stray paragraph tags from contact forms
define( 'WPCF7_AUTOP', false );

// Remove unwanted header meta
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link' );
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link' );
remove_action( 'wp_head', 'check_and_publish_future_post' );
remove_action( 'wp_head', 'wp_print_styles' );
remove_action( 'wp_head', '_ak_framework_meta_tags' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

remove_action( 'wp_footer', 'swap_images_js' );
//remove_action( 'wp_footer', 'dsq_output_footer_comment_js' );
remove_action( 'wp_head', 'sc_add_stylesheets' );
remove_action( 'wp_head', 'sc_add_javascripts' );
remove_action( 'wp_head', 'bb2_insert_head' );

// Keep Social Connect (Google login plugin) stuff off site pages
remove_action( 'wp_head', 'sc_add_stylesheets' );
remove_action( 'wp_head', 'sc_add_javascripts' );

if( function_exists('dsq_output_footer_comment_js') )
	add_action( 'after_post_content', 'dsq_output_footer_comment_js' );
if( function_exists('bb2_insert_head') )
	add_action( 'wp_footer', 'bb2_insert_head' );
if( 'support' == get_post_type() )
	remove_filter ( 'the_content', 'wpautop' );

add_action('init', 'modify_jquery');
//add_action('admin_init', 'modify_jquery');

//Making jQuery Google API
function modify_jquery() {
		global $concatenate_scripts;
		$concatenate_scripts = false;
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', false, '1.8.2');
		wp_enqueue_script('jquery');
}

define( 'MOBILE_FIRST_BREAKPOINT', 350 );

/* Replace AJAX Loading GIF in CF7 */
add_filter('wpcf7_ajax_loader', '_ajax_loader');
function _ajax_loader() { return 'http://cdn.brafton.com/loader.gif'; }

// Manipulating CF7 to use Modernizr.load
/*
function _kill_scripts( $_wpcf7 ) {
		wp_deregister_script('jquery-form');
		wp_deregister_script('contact-form-7');
		add_action('output_CF7_JS', function(){
			echo "Modernizr.load({
				load: ['" . WPCF7_PLUGIN_URL . "/includes/js/jquery.form.js', '" . WPCF7_PLUGIN_URL . "/includes/js/scripts.js']
			});";
		});
}

*/
add_action( 'wpcf7_enqueue_scripts', '_kill_scripts' );

// Create nav item sets (Editable under Appearance > Menus)
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus( 
		array ( 
			'support' => 'Support',
			'footer' => 'Footer'
		) 
	);
}

// Create widget areas (Editable under Appearance > Widgets)
if ( function_exists( 'register_sidebars' ) ) {
	register_sidebar(
		array(
			'name' => 'Support Left Menu',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		)
	);
	register_sidebar( 
		array( 
			'name' => 'Single Sidebar',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		) 
	);
	register_sidebar( 
		array( 
			'name' => 'Page Sidebar',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		) 
	);
	register_sidebar( 
		array( 
			'name' => 'Archive Sidebar',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		) 
	);
	register_sidebar( 
		array( 
			'name' => 'Category Sidebar',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		) 
	);
	register_sidebar( 
		array( 
			'name' => 'Home Featured',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		) 
	);
	register_sidebar( 
		array( 
			'name' => 'Home News',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		) 
	);
	register_sidebar( 
		array( 
			'name' => 'Home Social',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		) 
	);
	register_sidebar( 
		array( 
			'name' => 'Home Subscribe',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		) 
	);
	register_sidebar( 
		array( 
			'name' => 'Careers Left Sidebar',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		) 
	);
	register_sidebar( 
		array( 
			'name' => 'Careers Right Sidebar',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		) 
	);
	register_sidebar( 
		array( 
			'name' => 'New Blog Sidebar',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		) 
	);
	register_sidebar( 
		array( 
			'name' => 'Case Study Testimonial Sidebar',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		) 
	);
}

// Misc



function case_study_sidebar() {

	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id' => 'case-studies',
			'name' => __( 'Case Studies' ),
			'description' => __( 'A side bar to display recent case studies and testimonials' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	/* Repeat register_sidebar() code for additional sidebars. */
}
add_action( 'widgets_init', 'case_study_sidebar' );

// Swiss army knife function for detecting ancestry
function is_child( $parent ) {
	global $wp_query;
	$return = ( $wp_query->post->post_parent == $parent ) ? true : false;
	return $return;
}

// Adds the post thumbnails directly into the feeds, above the content
add_filter( 'the_content_feed', '_add_feed_images' );
function _add_feed_images( $content ) {
	global $post;
	if( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail( $post->ID ) )
		$content = '<p align="center">' . get_the_post_thumbnail( $post->ID, 'medium' ) . '</p>' . $post->post_content;
	
	return $content;
}

// Used in _add_RSS2_enclosures to obtain filesize of the image in bytes (required in RSS <enclosure> tag)
function remote_filesize( $url ) {
	ob_start();
	$ch = curl_init( $url );
	curl_setopt( $ch, CURLOPT_HEADER, 1 );
	curl_setopt( $ch, CURLOPT_NOBODY, 1 );
	$ok = curl_exec( $ch );
	curl_close( $ch );
	$head = ob_get_contents();
	ob_end_clean();
 
	$regex = "/Content-Length:\s([0-9].+?)\s/";
	$count = preg_match( $regex, $head, $matches );
 
	return isset( $matches[1] ) ? $matches[1] : 'unknown';
}

// Adds post thumbnails to RSS2 as media enclosures
add_action( 'rss2_item', '_RSS2_enclosures' );
function _RSS2_enclosures() { 
	global $post;
	$imageURL = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'original' ); 
	$image = str_replace( 'http://brafton.com.s3.amazonaws.com', 'http://cdn.brafton.com', $imageURL[0] );

	// Get Highlight Image
	if( strlen( $image ) == 0 )
		return;
 
	// Get MIME Type
	$pInfo = pathinfo( $image );
	$ext = $pInfo['extension'];

	if( $ext == 'png' )
		$sMime = 'image/png';
	elseif( $ext == 'gif' )
		$sMime = 'image/gif';
	else
		$sMime = 'image/jpeg';
 
	$data = remote_filesize( $image );
	echo "<enclosure url='$image' length='$data' type='$sMime' />";
}

/* Strip out unwanted auto-generated enclosures. */
add_filter('rss_enclosure', '');

// Sanitizes the + sign in search, it can be problematic
add_action( 'template_redirect', '_sanitize_search_term' );
function _sanitize_search_term() {
	if ( is_search() 
		&& strpos( $_SERVER['REQUEST_URI'], '/wp-admin/' ) === false 
		&& strpos( $_SERVER['REQUEST_URI'], '/search/' ) === false ) {
		wp_redirect( 
			home_url( 
				'/search/' 
				. str_replace( 
					array( ' ', '%20' ),  
					array( '+', '+' ), 
					get_query_var( 's' ) 
				) 
			) 
		);
		die();
	}
}

function the_content_limit( $max_char, $linked_string  ){
	$content = get_the_content();
	$content = str_replace( array( "\r", "\r\n", "\n" ), ' ', strip_tags( $content ) );
	$title = strip_tags( get_the_title() );

	$trimp = strpos( $content, ' ', $max_char );
	$content = substr( $content, 0, $trimp );

	if ( !$linked_string )
		$linked_string = '[more]';

	echo '<p itemprop="description">' . $content . ' ... <a href="' . get_permalink() . '" title="Read: ' . $title . '" class="recolor" itemprop="url">' . $linked_string . '</a></p>';
}

add_action( 'init', 'create_post_types' );
function create_post_types() {
	register_post_type( 'brafton_glossary',
		array(
			'labels' => array(
				'name' => __( 'Glossary' ),
				'singular_name' => __( 'Glossary' ),
				'all_items' => __( 'View All Terms' ),
				'add_new' => __( 'Add New Term')
			),
			'query_var' => true,
    			'rewrite' => array('slug' => 'glossary'),
    			'capability_type' => 'post',
			'description' => 'Marketing knowledge seekers: read our glossary. All entries are written by experts and continually refreshed according to industry developments.',
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
    			'show_in_menu' => true,
			'has_archive' => true,
			'menu_position' => 7,
			'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'revisions' )
		)
	);
	register_post_type( 'support',
		array(
			'labels' => array(
				'name' => __( 'Support' ),
				'singular_name' => __( 'Support' ),
				'all_items' => __( 'View All Support Pages' ),
				'add_new' => __( 'Add New Page')
			),
			'query_var' => true,
    			'rewrite' => array('slug' => 'support'),
    			'capability_type' => 'post',
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
    			'show_in_menu' => true,
			'show_in_admin_bar' => false,
			'has_archive' => true,
			'menu_position' => 10,
			'supports' => array( 'title', 'editor', 'revisions' )
		)
	);
	register_post_type( 'infographic',
		array(
			'labels' => array(
				'name' => __( 'Infographics' ),
				'singular_name' => __( 'Infographics' ),
				'all_items' => __( 'View All Infographics' ),
				'add_new' => __( 'Add New Infographic')
			),
    			'rewrite' => array('slug' => 'infographics'),
    			'capability_type' => 'post',
			'description' => 'Brafton regularly creates marketing infographics, featuring cutting-edge trend analysis and strategic forecasting.',
			'public' => true,
			'show_in_nav_menus' => false,
			'has_archive' => true,
			'menu_position' => 6,
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author' )
		)
	);
	
	register_post_type( 'downloadables',
		array(
			'labels' => array( 
				'name' => __( 'Resources' ),
				'singular_name' => __( 'Downloadable Resources' ),
				'all_items' => __( 'View All Downloads' ),
				'add_new' => __( 'Add a New Download' )
			),
			'query_var' => true,
    			'rewrite' => array('slug' => 'resources'),
    			'capability_type' => 'post',
			'description' => "Check out Brafton's downloadable resources, including eBooks, guides and other useful content.",
			'exclude_from_search' => false,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
    			'show_in_menu' => true,
			'show_in_nav_menus' => false, 
			'has_archive' => true,
			'menu_position' => 5,
			'comments' => false,
			'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'revisions', 'thumbnail' )
		)
	);
	register_post_type( 'webinar',
		array(
			'labels' => array(
				'name' => __( 'Webinars & Events' ),
				'singular_name' => __( 'Webinar' ),
				'all_items' => __( 'View All Webinars and Events' ),
				'add_new' => __( 'Add New Webinar/Event')
			),
    			'rewrite' => array('slug' => 'webinars-events'),
    			'capability_type' => 'post',
			'description' => 'Brafton regularly creates informative marketing webinars, featuring cutting-edge trend analysis and strategic forecasting.',
			'public' => true,
			'show_in_nav_menus' => false,
			'has_archive' => true,
			'menu_position' => 8,
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'custom-fields' )
		)
	);

	register_post_type( 'social_media_ad',
		array(
			'labels' => array(
				'name' => __( 'Social Media Ads' ),
				'singular_name' => __( 'Social Media Ad' ),
				'all_items' => __( 'View All Social Media Ad Pages' ),
				'add_new' => __( 'Add New Page')
			),
    			'rewrite' => array('slug' => 'social-media-ads'),
    			'capability_type' => 'post',
			'description' => 'Non-navigable social media ads.',
			'public' => true,
			'show_in_nav_menus' => false,
			'has_archive' => false,
			'menu_position' => 8,
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'custom-fields' )
		)
	);

	register_post_type( 'case_studies',
		array(
			'labels' => array(
				'name' => __( 'Case Studies' ),
				'singular_name' => __( 'Case Study' ),
				'all_items' => __( "View All Case Studies" ),
				'add_new' => __( 'Add New Case Study')
			),
    			'rewrite' => array('slug' => 'case-studies'),
    			'capability_type' => 'post',
			'description' => 'Case studies in several industries and products/services.',
			'public' => true,
			'show_in_nav_menus' => false,
			'has_archive' => true,
			'menu_position' => 8,
			'supports' => array( 'title', 'editor',  'thumbnail', 'excerpt', 'author', 'custom-fields' )
		)
	);

	register_post_type( 'testimonials',
		array(
			'labels' => array(
				'name' => __( 'testimonials' ),
				'singular_name' => __( 'testimonial' ),
				'all_items' => __( "View All testimonials" ),
				'add_new' => __( 'Add New testimonial')
			),
    			'rewrite' => array('slug' => 'testimonials'),
    			'capability_type' => 'post',
			'description' => 'Testimonials that have videos',
			'public' => true,
			'show_in_nav_menus' => false,
			'has_archive' => true,
			'menu_position' => 8,
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'custom-fields' )
		)
	);

	register_post_type( 'executives',
		array(
			'labels' => array(
				'name' => __( 'Executives' ),
				'singular_name' => __( 'Executives' ),
				'all_items' => __( 'View Executives' ),
				'add_new' => __( 'Add New Executive')
			),
			'query_var' => true,
    			'rewrite' => array('slug' => 'executive-leadership'),
    			'capability_type' => 'post',
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
    			'show_in_menu' => true,
			'has_archive' => true,
			'menu_position' => 7,
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions' )
		)
	);
		flush_rewrite_rules(false);
}

add_action( 'init', 'create_event_taxonomy' );
add_action( 'init', 'create_case_taxonomy' );
add_action( 'init', 'create_prod_taxonomy' );
add_action( 'init', 'create_client_size_taxonomy' );

function create_prod_taxonomy(){

		$labels = array(
		'name'              => _x( 'Prod & Service', 'taxonomy general name' ),
		'singular_name'     => _x( 'Prod & Service', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Prod & Services' ),
		'all_items'         => __( 'All Prod & Services' ),
		'parent_item'       => __( 'Parent Prod & Service' ),
		'parent_item_colon' => __( 'Parent Prod & Service:' ),
		'edit_item'         => __( 'Edit Prod & Service' ),
		'update_item'       => __( 'Update Prod & Service' ),
		'add_new_item'      => __( 'Add New Prod & Service' ),
		'new_item_name'     => __( 'New Prod & Service Name' ),
		'menu_name'         => __( 'Prod & Service' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'prod-service' ),


	);

	register_taxonomy( 'prod-service', array( 'case_studies','testimonials' ), $args );

	

}



function create_case_taxonomy(){

		$labels = array(
		'name'              => _x( 'Industry', 'taxonomy general name' ),
		'singular_name'     => _x( 'Industry', 'taxonomy singular name' ),
		'search_items'      => __( 'Search industries' ),
		'all_items'         => __( 'All industries' ),
		'parent_item'       => __( 'Parent Industry' ),
		'parent_item_colon' => __( 'Parent Industry:' ),
		'edit_item'         => __( 'Edit Industry' ),
		'update_item'       => __( 'Update Industry' ),
		'add_new_item'      => __( 'Add New Industry' ),
		'new_item_name'     => __( 'New Industry Name' ),
		'menu_name'         => __( 'Industry' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'industry' ),


	);

	register_taxonomy( 'industry', array( 'case_studies','testimonials' ), $args );

	
}


function create_client_size_taxonomy() {
	$labels = array(
		'name'              => _x( 'Client Size', 'taxonomy general name' ),
		'singular_name'     => _x( 'Client Size', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Client Size' ),
		'all_items'         => __( 'All Client Sizes' ),
		'parent_item'       => __( 'Parent Client Size' ),
		'parent_item_colon' => __( 'Parent Client Size:' ),
		'edit_item'         => __( 'Edit Client Size' ),
		'update_item'       => __( 'Update Client Size' ),
		'add_new_item'      => __( 'Add New Client Size' ),
		'new_item_name'     => __( 'New Client Size Name' ),
		'menu_name'         => __( 'Client Size' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'client-size' ),


	);

	register_taxonomy( 'client-size', array( 'case_studies','testimonials' ), $args );

}


function create_event_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Event Types', 'taxonomy general name' ),
		'singular_name'     => _x( 'Event Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Event Types' ),
		'all_items'         => __( 'All Event Types' ),
		'parent_item'       => __( 'Parent Event Type' ),
		'parent_item_colon' => __( 'Parent Event Type:' ),
		'edit_item'         => __( 'Edit Event Type' ),
		'update_item'       => __( 'Update Event Type' ),
		'add_new_item'      => __( 'Add New Event Type' ),
		'new_item_name'     => __( 'New Event Type Name' ),
		'menu_name'         => __( 'Event Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'event-type' ),
	);

	register_taxonomy( 'event-type', array( 'webinar' ), $args );


}
/*
function admin_include_css_and_js_refac() {
	global $post_type, $current_screen;
	if( 'slide' == $post_type || 'downloadables' == $post_type )
		wp_deregister_script( 'autosave' );
}
add_action( 'admin_enqueue_scripts', 'admin_include_css_and_js_refac' );
*/
// Creates Meta Fields for Homepage Slides in Editor
add_action( 'admin_init', '_add_custom_meta' );
function _add_custom_meta(){

	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
  	// check for a template type
  	if ($template_file == 'new-landing-page.php')
   		add_meta_box( 'feature-html', 'Feature Content', '_feature_html', 'page', 'side', 'high');

	add_meta_box( 'slider-meta', 'Additional Information', '_slider_meta', 'slide' );
	add_meta_box( 'slider-title', 'Slider Title Setup', '_slider_title', 'slide' );
	add_meta_box( 'downloadables-text', 'Text Before Body', '_downloadables_text', 'downloadables' );
	add_meta_box( 'downloadables-data', 'Required Digioh Data', '_downloadables_data', 'downloadables', 'side', 'high' );
}
function _feature_html(){
	global $post;
	$custom = get_post_custom( $post->ID );
	$html = $custom['feature_html'][0];

	echo '<textarea name="feature_html" style="width: 100%; height: 100px; padding: 0.5em 1em;" placeholder="Please input the HTML code for what should appear in this landing page&#39;s feature spot (left of form). &lt;img /&gt; or an &lt;iframe /&gt; is good." required>', $html, '</textarea>';
	echo '<p>Preview:</p>', '<style>#feature-html * { max-width: 100%; height: auto; }</style>', $html;
}
function _slider_meta(){
	global $post;
	$custom = get_post_custom( $post->ID );
	$slider_pos = $custom['slider_pos'][0];
	$slider_link = $custom['slider_link'][0];
	$slider_slug = $custom['slider_slug'][0];
	echo '<label for="slider_pos">Slide Position</label><br />';

	for($i = 1; $i < 6; $i++){
		echo '<input type="radio" name="slider_pos" value="' . $i . '"';
		if( $i == $slider_pos )
			echo 'checked';

		echo ' /> '.$i.' &nbsp;';
	}

	echo '<br /><br /><label for="slider_link">Linked Landing Page URL:</label> <input name="slider_link" value="'.$slider_link.'" /><br /><br />';
	echo '<label for="slider_slug">Slider Nav Title (Short Title):</label> <input name="slider_slug" value="'.$slider_slug.'" />';
}
function _slider_title(){
	global $post;
	$custom = get_post_custom( $post->ID );
	$title_top = $custom['title_top'][0];
	$title_middle = $custom['title_middle'][0];
	$title_bottom = $custom['title_bottom'][0];
	echo '<p align="center"><input name="title_top" style="width: 30%; margin-right: 1em" placeholder="Top Level Text" value="'.$title_top.'" />';
	echo '<input name="title_middle" style="width: 30%; margin-right: 1em" placeholder="Middle Level Text" value="'.$title_middle.'" />';
	echo '<input name="title_bottom" style="width: 30%" placeholder="Bottom Level Text" value="'.$title_bottom.'" /></p>';
	echo '<p style="margin-top: 1em"><label>Preview:</label></p><div style="background: #FFF;text-align:center;padding:1.5em">';
	echo vsprintf( '<div>%s</div><div>%s</div><div>%s</div>', array( $title_top, $title_middle, $title_bottom ) );
	echo '</div>';
}

function _downloadables_text(){
	global $post;
	$custom = get_post_custom( $post->ID );
	$top_text = $custom['downloadables_top_text'][0];
	echo '<p><label for="downloadables_top_text">Enter the text for above the form here. (HTML is allowed.)</label></p>';
	echo '<textarea name="downloadables_top_text" placeholder="Something like: &quot;Download our guide, &quot;Title&quot; today." style="width:100%;height:50px;box-sizing:border-box;padding: 10px">' . $top_text . '</textarea>';
}

function _downloadables_data(){
	global $post;
	$custom = get_post_custom( $post->ID );
	$product_id = $custom['digioh_product_id'][0];
	echo '<p><label for="digioh_product_id">Digioh Product ID# <span style="color:red;font-weight:700;margin-left:10px">(Required)</span></label></p>';
	echo '<input name="digioh_product_id" placeholder="e.g. 11111" style="box-sizing:border-box;padding: 10px;width:100%" value="' . $product_id . '" required></input>';
}

// Saves custom meta box fields to DB
add_action( 'save_post', '_save_custom_meta' );
function _save_custom_meta(){
	global $post;

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        	return $post->ID;

	// Landing page feature HTML
	update_post_meta( $post->ID, 'feature_html', $_POST['feature_html'] );

	// Slide custom fields
	update_post_meta( $post->ID, 'slider_pos', $_POST['slider_pos'] );
	update_post_meta( $post->ID, 'slider_link', $_POST['slider_link'] );
	update_post_meta( $post->ID, 'slider_slug', $_POST['slider_slug'] );
	update_post_meta( $post->ID, 'title_top', $_POST['title_top'] );
	update_post_meta( $post->ID, 'title_middle', $_POST['title_middle'] );
	update_post_meta( $post->ID, 'title_bottom', $_POST['title_bottom'] );

	// Downloadables custom fields
	update_post_meta( $post->ID, 'downloadables_top_text', htmlentities( $_POST['downloadables_top_text'], ENT_QUOTES, 'UTF-8' ) );
	update_post_meta( $post->ID, 'digioh_product_id', $_POST['digioh_product_id'] );
}

// Returns author display name, profile info and URL for boilerplate
function brafton_author_data( $post ) {
	$home = home_url();

	$author['ID'] = get_the_author_id( $post );

	$user_info = get_userdata($author['ID']);
	$author['slug'] = $user_info->user_nicename;
	$author['profile'] = get_user_meta($author['ID'], 'description', true);
	$author['name'] = $user_info->display_name;
	$author['description'] = $user_info->user_description;
	$author['url'] = $home . '/author/' . $user_info->user_nicename;
	$author['googleplus_id'] = get_user_meta( $author['ID'], 'googleplus_id', true );
	$author['twitter'] = get_user_meta( $author['ID'], 'twitter', true );
	$author['facebook'] = get_user_meta( $author['ID'], 'facebook', true );
	$author['linkedin'] = get_user_meta( $author['ID'], 'linkedin', true );

	return $author;
}

// Send form data to Salesforce and/or Mailchimp if applicable
add_action( 'wpcf7_mail_sent', '_post_processing' );
function _post_processing( $form ){
	$title = $form->title;
	$data = $form->posted_data;

	list($first, $middle, $last) = split( ' ', $data['name'] );
	if( !$last ){
        	$last = $middle;
        	unset($middle);
	}
	if( $title == 'General Inquiry' ){
		$body = array (
        		'first_name' => $first,
        		'last_name' => $last,
        		'email' => $data['email'],
        		'phone' => $data['phone'],
        		'company' => $data['company'],
        		'URL' => $data['website'],
        		'oid' => '00DA0000000J6De',
        		'lead_source' => 'Web (Brafton.com)'
		);
		$url = 'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
		if( function_exists('wp_remote_post') )
			wp_remote_post( $url, array('method' => 'POST', 'body' => $body ) );
	}

	if ( $title == 'Newsletter Signup' || $data['signup'] ){
		if( !$data['frequency'] )
			$data['frequency'] = 'Weekly';

		$lead = ( isset( $data['signup'] ) ) ? 'Yes' : 'No';

		$nbody = array(
			'u' => 'bf512a3688df1ae9ecc90514a',
			'id' => 'a8078587f9',
        		'FNAME' => $first,
        		'LNAME' => $last,
        		'EMAIL' => $data['email'],
			'COMPANY' => $data['company'],
			'WEBSITE' => $data['website'],
			'FREQ' => $data['frequency'],
			'ISLEAD' => $lead
		);
		$url = 'http://brafton.us2.list-manage2.com/subscribe/post';
		if( function_exists('wp_remote_post') )
			wp_remote_post( $url, array('method' => 'POST', 'body' => $nbody ) );
	}

	if ( $title == 'Twitter Event Notification List' ){
		
		$lead = ( isset( $data['signup'] ) ) ? 'Yes' : 'No';

		$nbody = array(
			'u' => 'bf512a3688df1ae9ecc90514a',
			'id' => '76fb827ea7',
    			'FNAME' => $first,
    			'LNAME' => $last,
    			'EMAIL' => $data['email'],
			'HANDLE' => $data['handle']
		);

		$url = 'http://brafton.us2.list-manage2.com/subscribe/post';
		if( function_exists('wp_remote_post') )
			wp_remote_post( $url, array('method' => 'POST', 'body' => $nbody ) );

		if( $lead == 'Yes' ){

			if( !$data['frequency'] )
				$data['frequency'] = 'Weekly';

			$nbody = array(
				'u' => 'bf512a3688df1ae9ecc90514a',
				'id' => 'a8078587f9',
        			'FNAME' => $first,
        			'LNAME' => $last,
        			'EMAIL' => $data['email'],
				'FREQ' => $data['frequency'],
				'ISLEAD' => $lead
			);

			$url = 'http://brafton.us2.list-manage2.com/subscribe/post';
			if( function_exists('wp_remote_post') )
				wp_remote_post( $url, array('method' => 'POST', 'body' => $nbody ) );
		}
	}
}

//references a 'Newsletter' cookie to confirm if the user wants to subscribe, then uses cookie info to push to Mailchimp if so
function newsletter_subscribe() {
	if ( !isset($_COOKIE['Newslettersignup'])) {
		//echo "Newsletter cookie is yes!<br />";
		
			if (isset($_COOKIE['Email']) && isset($_COOKIE['FirstName']) && isset($_COOKIE['LastName']) && isset($_COOKIE['Newsletter'])){
	$nbody = array(
			'u' => 'bf512a3688df1ae9ecc90514a',
			'id' => 'a8078587f9',
    		'EMAIL' => $_COOKIE['Email'],
			'FNAME' => $_COOKIE['FirstName'],
			'LNAME' => $_COOKIE['LastName'],
			'COMPANY' => $_COOKIE['Company'],
			'WEBSITE' => $_COOKIE['Website'],
			'FREQ' => $_COOKIE['Newsletter'],
			'ISLEAD' => 'Yes'
		);
		$url = 'http://brafton.us2.list-manage2.com/subscribe/post';
		if( function_exists('wp_remote_post') )
			wp_remote_post( $url, array('method' => 'POST', 'body' => $nbody ) );
			

		//destroy Newsletter cookie once they've been subscribed.
		
setcookie("Newslettersignup", true,2000000000, "/", "brafton.com");

}


	}
}

/*
//fix for cookie error while login.
function set_wp_test_cookie() {
	setcookie(TEST_COOKIE, 'WP Cookie check', 0, COOKIEPATH, COOKIE_DOMAIN);
	if ( SITECOOKIEPATH != COOKIEPATH )
		setcookie(TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN);
}
add_action( 'after_setup_theme', 'set_wp_test_cookie', 101 );*/




// Pagination Function
function _paginate( $query ) {
	
	wp_reset_query();

	global $wp_query, $wp_rewrite;
	
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	//If a custom query is passed, use that instead of the global

	if( $query ) {
		$wp_query = $query;
	}


	//Pagination code================================================

	$wp_query->query_vars[ 'paged' ] > 1 ? $current = $wp_query->query_vars[ 'paged' ] : $current = 1;

        //set the "paginate_links" array to do what we would like it it. Check the codex for examples http://codex.wordpress.org/Function_Reference/paginate_links
        $args = array(
            'base' => @add_query_arg( 'paged', '%#%' ),
            //'format' => '',
            'showall' => false,
            'prev_next' => true,
            'end_size' => 0,
            'mid_size' => 3,
            'total' => $wp_query->max_num_pages,
            'current' => $current,
            'type' => 'array'
     	);

    //build the paging links
    if ( $wp_rewrite->using_permalinks() )
        $args[ 'base' ] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

    //more paging links
    if ( !empty( $wp_query->query_vars[ 's' ] ) )
        $args[ 'add_args' ] = array( 's' => get_query_var( 's' ) );

    $pagination = paginate_links($args);

    //Unset total number from the array
    unset( $pagination[count($pagination)-2] );

    //echo

    echo '<ul class="pagination">';
			 foreach($pagination as $pag) {
					echo '<li>';
					echo $pag;
					echo '</li>';
				} 
	echo '</ul>';


}

// Modify default author page query
add_action( 'pre_get_posts', '_author_query' );
function _author_query( &$query ) {
    if ($query->is_author)
        $query->set( 'posts_per_page', 3 );
}

function _share_buttons(){
	echo '<div id="topshare" class="share"><noscript><span style="padding: 0.25em 0 0.25em 1.5em">Javascript is disabled.</span></noscript></div>';
}

function dimox_breadcrumbs() {
 
  $delimiter = '&rsaquo;';
  $home = 'Home'; // text for the 'Home' link
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="crumbs">';
 
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
}

function excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'excerpt_length' );

function new_excerpt_more( $excerpt ){
  global $post;

   $excerpt = rtrim( $excerpt );
if ( '<p>' == substr($excerpt, 0, 3) && '</p>' == substr($excerpt, -4) ){

   if (has_term( 'twitter-chats', 'event-type',$post->ID) || has_term( 'webinars', 'event-type',$post->ID) ){

   	$excerpt =sprintf( '<p>%s <br /><br /><a href="%s" rel="nofollow" class="register button morelink">View</a></p>', substr($excerpt, 3, -4), get_permalink() );;

   }
   else if (has_term( 'pre-chat', 'event-type',$post->ID) || has_term( 'pre-webinar', 'event-type',$post->ID) ){

   	$excerpt =sprintf( '<p>%s <br />', substr($excerpt, 3, -4));

   }

   else {
            $excerpt = sprintf( '<p>%s <a href="%s" rel="nofollow" class="morelink">Read More &rsaquo;</a></p>', substr($excerpt, 3, -4), get_permalink() );

        }
    }
    return $excerpt;
   }



add_action( 'the_excerpt', 'new_excerpt_more' );

add_action( 'edit_form_advanced', 'catlist2radio' );
function catlist2radio(){
	echo '<script>';
	echo 'jQuery("#categorychecklist input, #categorychecklist-pop input, .cat-checklist input")';
	echo '.each(function(){this.type="radio"});</script>';
}

// Special RSS Image Size for Emails
add_image_size( 'rss', 600, 75, true );
add_image_size('webinar_thumb',250, 250, true);

add_filter( 'pre_get_posts', 'exclude_tags_rss' );
function exclude_tags_rss( $query ) {
	if ( $query->is_feed ){
		if( isset( $_GET['tag__not_in'] ) ) {
			$qv = $_GET['tag__not_in'];

			if( strpos( $qv, ',' ) !== false )
				$tag = explode(',', $qv);
			else 
				$tag[] = $qv;
		}
		$query-> set('tag__not_in', $tag);
	}
return $query;
}

add_action( 'admin_head', '_tags_as_list' );
function _tags_as_list() {
	echo '<style>#tagcloud-post_tag a {
font-size: 1.3em !important;
display: block;
}</style>';
}

add_filter( 'tiny_mce_before_init', 'myformatTinyMCE' );
function myformatTinyMCE( $in ){
	$in['theme_advanced_styles'] = "Featured Treatment=feature;Left Blockquote=left;Right Blockquote=right";
	$in['extended_valid_elements'] .= ',input[*]';
	return $in;
}

add_action( 'transition_post_status', '_brafton_alerts', 10, 3 );
function _brafton_alerts( $new_status, $old_status, $post ) {
	if( $new_status != 'publish' || $post->post_type == 'nav_menu_item' || $post->post_type == 'advertisement' || $post->post_type == 'support' || $post->post_type == 'wpcf7_contact_form' )
		return;

	$to = 'katherine.griwert@brafton.com, evan.jacobs@brafton.com';

	switch( $post->post_type ) {
		case 'brafton_glossary':
			$subject = '[Glossary Term]';
			break;
	 	case 'infographic':
			$subject = '[Infographic]';
			break;
		case 'support':
			$subject = '[Support Page]';
			break;
		case 'slide':
			$subject = '[Homepage Slide]';
			break;
		case 'post':
			$subject = '[Post]';
			break;
		case 'page':
			$subject = '[Page]';
			break;
		case 'downloadables':
			$subject = '[Resource]';
			break;
		default:
			$subject = "[$post->post_type]";
			break;
	}

	$subject .= " '$post->post_title' has been ";
	$subject .= ( $old_status == 'publish' ) ? 'updated' : 'published';

	$from = "From: Brafton.com Alerts <mailer@brafton.com>\r\n";
	
	$body = "<style>" . file_get_contents('editor-style.css') . "</style>";
	$body .= "<h1>$post->post_title</h1>";

	// Checks for an excerpt and uses the Platinum SEO Meta Description instead if not found (good for pages)
	$description = ( strlen( $post->post_excerpt ) != 0 ) ? $post->post_except : get_post_meta( $post->ID, 'description', true );

	if( strlen( $description ) != 0 )
		$body .= "<h3>Excerpt / Description</h3><p>$description</p>";

	if( $old_status == 'publish' ){
		global $wpdb;
		$query = "SELECT post_content FROM $wpdb->posts WHERE post_name LIKE '$post->ID-revision%' ORDER BY ID DESC LIMIT 1;";
		$result = $wpdb->get_var( $query );
		$diff = wp_text_diff( $result, $post->post_content, array( 'title_left' => 'Old Content', 'title_right' => 'Updated Content' ) ) . "<br /><br />";
		if( strlen( $diff ) != 0 ) {
			$diff = str_ireplace( array("<ins>", "<del>"), array("<ins style='color:green'>", "<del style='color: red'"), $diff);
			$body .= $diff;
		} else
			$body .= '<p>No change in post content, check the title, excerpt, tags etc.</p>';
	}
	else
		$body .= '<h3>Content</h3>' . wpautop($post->post_content) . '<p>';

	$body .= "<strong>Link</strong> &rarr; <a href='$post->guid' title='View: $post->post_title'>$post->guid</a></p>";

	if( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail( $post->ID ) )
		$body .= "<h5>Thumbnail</h5>".get_the_post_thumbnail( $post->ID, 'thumbnail' );
	
	add_filter( 'wp_mail_content_type', create_function( '', 'return "text/html";' ) );
	wp_mail( $to, $subject, $body );
}

add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );
 
function extra_user_profile_fields( $user ) { ?>
<h3><?php _e("Social Networks", "blank"); ?></h3>
 
<table class="form-table">
<tr>
<th><label for="twitterProfile"><?php _e("Twitter"); ?></label></th>
<td>
<input type="text" name="twitterProfile" id="twitterProfile" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("Please enter your Twitter name, without @. [ex. http://www.twitter.com/<span style='color:red'>yourid</span>]"); ?></span>
</td>
</tr>
<tr>
<th><label for="facebookProfile"><?php _e("Facebook"); ?></label></th>
<td>
<input type="text" name="facebookProfile" id="facebookProfile" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("Please enter your Facebook ID. [ex. http://www.facebook.com/<span style='color:red'>yourid</a>]"); ?></span>
</td>
</tr>
<tr>
<th><label for="linkedinProfile"><?php _e("LinkedIn"); ?></label></th>
<td>
<input type="text" name="linkedinProfile" id="linkedinProfile" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("Please enter your LinkedIn URL. [ex. http://www.linkedin.com/in/yourid]"); ?></span>
</td>
</tr>
<tr>
<th><label for="googleplusProfile"><?php _e("Google+"); ?></label></th>
<td>
<input type="text" name="googleplusProfile" id="googleplusProfile" value="<?php echo esc_attr( get_the_author_meta( 'googleplus_id', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("Please enter your Google+ ID number. [ex. https://plus.google.com/<span style='color:red'>116980982167937288125</span>/]"); ?></span>
</td>
</tr>
</table>
<?php }
 
add_action( 'personal_options_update', 'save_extra_user_profile_fields', 11 );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields', 11 );
 
function save_extra_user_profile_fields( $user_id ) {
 
if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

update_usermeta( $user_id, 'linkedin', $_POST['linkedinProfile'] );
update_usermeta( $user_id, 'facebook', $_POST['facebookProfile'] );
update_usermeta( $user_id, 'twitter', $_POST['twitterProfile'] );
update_usermeta( $user_id, 'googleplus_id', $_POST['googleplusProfile'] );
}

add_shortcode( 'authors', 'contributors' );
function contributors( $atts ) {
	global $wpdb;

	$contribs = '<style>
	ul#authorlist {	 
		list-style: none;	 
		width: 600px;	 
		margin: 0;	 
		padding: 0;	 
	}	 
	#authorlist li {	 
		margin: 0 0 5px 0;	 
		list-style: none;	 
		height: 90px;	 
		padding: 15px 0 15px 0;	 
		border-bottom: 1px solid #`ecec;	 
	}	 
	#authorlist img.photo {	 
		max-width: 80px;	 
		max-height: 80px;	 
		float: left !important;	 
		margin: 0 15px 0 0 !important;	 
		padding: 3px;	 
		border: 1px solid #ececec;	 
	}	 
	#authorlist div.authname {	 
		margin: 20px 0 0 10px;	 
	} 
	</style>';
	
	$authors = $wpdb->get_results( "SELECT ID, user_nicename, display_name, user_url from $wpdb->users WHERE display_name <> 'editorial' ORDER BY display_name" );
	
	$contribs .= '<ul id="authorlist">';
	foreach ( $authors as $author ) {
		$num = get_usernumposts( $author->ID );
		if( $num < 1 ) continue;
		
		$contribs .= '<li><a href="' . get_bloginfo( 'url' ) . '/author/' . $author->user_nicename . '" title="View the profile for ' . $author->display_name . '">';
		$contribs .= get_avatar( $author->ID );
		$contribs .= '</a>';
		$contribs .= '<div>';
		$contribs .= '<a href="' . get_bloginfo( 'url' ) . '/author/' . $author->user_nicename . '" title="View the profile for ' . $author->display_name . '">' . $author->display_name . '</a><br />';
		
		if( $author-> user_url )
			$contribs .= 'Website: <a href="' . $author->user_url . '" target="_blank">' . $author->user_url . '</a><br />';
			
		$contribs .= '<a href="' . get_bloginfo( 'url' ) . '/author/' . $author->user_nicename . '" title="View the profile for ' . $author->display_name . '">Visit ' . $author->display_name . '&#39;s Author Page</a>';
		$contribs .= '</div></li>';
	}
	$contribs .= '</ul>';

	return $contribs;
}

function _customize_login() {
	echo '<link rel="stylesheet" href="' . get_bloginfo('stylesheet_directory') . '/login.css" />';
} 
add_action( 'login_head', '_customize_login' );

add_filter( 'login_message', '_login_message' );
function _login_message() {
	return '<p id="login-message">Please login using your @brafton.com email address.</p>';
}

// Adds post tags to <body> class output
add_filter( 'body_class', '_add_tags' );
function _add_tags( $classes ){
    global $post;
    
    $tags = (array) get_the_tags( $post->ID );
    foreach( $tags as $tag )
    	$classes[] = 'tagged-' . $tag->slug;

    return $classes;
}

// Outputs HTML for Sharrre to use when creating buttons
function brafton_share( $location ){
	$services = array( 'linkedin', 'twitter', 'facebook', 'gplus', 'pinterest', 'stumbleupon' );

	echo "<div class='share icons $location small cf'>";
	foreach( $services as $network )
		echo "<a data-service='$network' href='#'></a>";
		if (is_page('71465')) {
			echo "<a target='_blank' class='glassdoor-icon' href='https://www.glassdoor.com/Reviews/Brafton-Reviews-E337405.htm'><img src='http://brafton.com/wp-content/themes/brafton/library/images/glassdoor.png' alt='Glassdoor' /></a>";
		}
	echo '</div>';
}

// Add buttons to TinyMCE for inserting 1140 Grid layouts
add_filter( 'tiny_mce_before_init', 'addCols_tiny_mce_before_init' );
function addCols_tiny_mce_before_init( $initArray )
{
    $initArray['setup'] = <<<JS
[function(ed) {
    ed.addButton('2col', {
        title : 'Add 2-Column Layout',
        image : 'http://cdn.brafton.com/2col.png',
        onclick : function() {
            ed.selection.setContent( '<div class="d-all t-all m-all row"><div class="d-1of2 t-1of2 m-all"><p>Enter Content Here.</p></div><div class="d-1of2 t-1of2 m-all"><p>Enter Content Here.</p></div></div>Replace me with the next line of content or delete me.' );
        }
    });
	ed.addButton('3col', {
        title : 'Add 3-Column Layout',
        image : 'http://cdn.brafton.com/3col.png',
        onclick : function() {
            ed.selection.setContent( '<div class="d-all t-all m-all row"><div class="d-1of3 t-1of3 m-all"><p>Enter Content Here.</p></div><div class="d-1of3 t-1of3 m-all"><p>Enter Content Here.</p></div><div class="d-1of3 t-1of3 m-all"><p>Enter Content Here.</p></div></div>Replace me with the next line of content or delete me.' );
        }
    });
	ed.addButton('4col', {
        title : 'Add 4-Column Layout',
        image : 'http://cdn.brafton.com/4col.png',
        onclick : function() {
            ed.selection.setContent( '<div class="d-all t-all m-all row"><div class="d-1of4 t-1of4 m-all"><p>Enter Content Here.</p></div><div class="d-1of4 t-1of4 m-all"><p>Enter Content Here.</p></div><div class="d-1of4 t-1of4 m-all"><p>Enter Content Here.</p></div><div class="d-1of4 t-1of4 m-all"><p>Enter Content Here.</p></div></div>Replace me with the next line of content or delete me.' );
        }
    });
}][0]
JS;
    return $initArray;
}

add_filter( 'mce_buttons', 'addCols_mce_buttons' );
function addCols_mce_buttons( $mce_buttons )
{
    $mce_buttons[] = '2col';
	$mce_buttons[] = '3col';
	$mce_buttons[] = '4col';
    return $mce_buttons;
}

/*
	Outputs an ordered or unordered list for a specified tag.
	Usage: [tagfeed tag="google" num="3"]
	Optional Attributes: type (ol or ul, defaults to ul), num (number of posts to be shown - integer only), orderby (sort by name, date, etc - see Wordpress documentation on the loop)
*/

add_shortcode( 'tagfeed', '_display_feed' );
function _display_feed( $args ) {
	if( !$args['tag'] )
		return;

	if( !$args['type'] )
		$args['type'] = 'ul';
	else
		$args['type'] = 'ol';

	$feed = '<' . $args['type'] . ' class="feed">';
	$query = array( 'tag' => $args['tag'], 'posts_per_page' => $args['num'], 'orderby' => $args['orderby'] );
	$loop = new WP_Query( $query );

	if( $loop->have_posts() ) {
		while( $loop->have_posts() ) {
			$loop->the_post();

			// Formats and outputs the number of posts specified in list format
			$feed .= sprintf('<li><a href="%s" title="Read: %s">%s</a></li>', get_permalink( $post->ID ), the_title_attribute( '', '', false ), get_the_title( $post->ID ) );
		}
	}

	$feed .= '</' . $args['type'] . '>';
	return $feed;
}

add_shortcode( 'grid', '_prepare_grid' );
function _prepare_grid( $atts ) {

	global $post;

	$images =& get_children( 'post_parent=' . $post->ID . '&post_type=attachment&post_mime_type=image&post_status=inherit&orderby=rand' );

	$rows = ($atts['rows'] > 0) ? $atts['rows'] : 2;
	$columns = ($atts['columns'] > 0) ? $atts['columns'] : 10;

	if ( !empty($images) ) {

		$script = "<script src='" . get_stylesheet_directory_uri() . "/js/gridrotator.min.js'></script>";

		$init = "<script>(function($){ $(document).ready(function(){ $('#rotator').gridrotator({ rows: " . $rows . ", columns: " . $columns . ", slideshow: true, interval: 2500, animType: 'fadeInOut' }); }); })(jQuery);</script>";

		$html = "<div id='rotator' class='ri-grid ri-grid-size-3'><img class='ri-loading-image' src='//cdn.brafton.com/loader.gif' /><ul>";

		foreach ( $images as $attachment_id => $attachment ) {

			/* Only include images that begin with "grid" */

			if( !strncmp(get_the_title($attachment_id), 'grid', strlen('grid')) ){
				$html .= "<li><a href='#'>" . wp_get_attachment_image( $attachment_id, 'original' ) . "</a></li>";
			} 
		}

		$html .= "</ul></div>";

		return $html . $script . $init;
	}
}






//add meta boxes
    function update_edit_form() {  
        echo ' enctype="multipart/form-data"';  
    } // end update_edit_form  
    add_action('post_edit_form_tag', 'update_edit_form');  

function meta_boxes_setup() {

	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'add_post_meta_boxes' );

	add_action( 'save_post', 'save_post_meta_boxes');

}

function add_post_meta_boxes() {

$types = array('webinar','case_studies');

$types_2 = array('webinar', 'case_studies', 'post', 'page');
foreach( $types as $type ) {
      add_meta_box('checkbox_id', 'Featured', 'post_meta_box', $type, 'normal', 'high');
      add_meta_box('wp_custom_attachment', 'PDF attachment', 'post_meta_attachment', $type, 'normal', 'high');


  }

  // foreach( $types as $type ) {
  //     add_meta_box('checkbox_id', 'Featured', 'post_meta_box', $type, 'normal', 'high');
  //     add_meta_box('wp_custom_attachment', 'PDF attachment', 'post_meta_attachment', $type, 'normal', 'high');


  // }

  foreach( $type_2 as $type )
  {
      add_meta_box('sublime_video_embed', 'Sublime Video Embed', 'render_sublime_video_meta_box', $type, 'normal', 'high');
  }


}


	function render_sublime_video_meta_box($post){
		$value = get_post_meta( $post->ID ); 

		
		if( !$values )
		echo sprintf('<input type="text" name="sublime_video_embed" id="sublime_video_embed" value="{$value}" />');
	}
  function post_meta_attachment($post){

    wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');  
      
    $html = '<p class="description">';  
        $html .= 'Upload your PDF here.';  
    $html .= '</p>';  
    $html .= '<input id="wp_custom_attachment" name="wp_custom_attachment" value="" size="25" type="file">';  
      
    echo $html;  




  }




   
    
    



/*Sublime Video Custom Meta and short code*/
/* Currently only supports single video. We expect this will change soon */
add_shortcode('video', 'insert_video');

function insert_video( $atts, $embedCode = null ) {
   return '<span class="video">' . do_shortcode( $embedCode ) . '</span>';
}

/* sublime video shortcode end */



  function post_meta_box($post){

$values = get_post_meta( $post->ID ); 
$bool =  $values['my_checkbox'][0];


//wp_nonce_field( basename( __FILE__ ), 'post_nonce' );

echo'<p><label for="post-class">';


		_e( "Featured", 'Brafton' ); 


echo '</label><br />  <input type="checkbox" name="my_checkbox" id="my_checkbox"';

if ($bool=='on'){

  echo 'checked';
}
 echo' ></p>';




  }


/* Save the meta box's post metadata. */

//
function save_post_meta_boxes( $post_id) {
//save checkbox
	/* Verify the nonce before proceeding. */
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
    // if our nonce isn't there, or we can't verify it, bail 
     

     
    // if our current user can't edit this post, bail  
    if( !current_user_can( 'edit_post' ) ) return;  

  // Make sure your data is set before trying to save it  
  
        update_post_meta( $post_id, 'my_checkbox', $_POST['my_checkbox'] );  

        update_post_meta( $post_id, 'sublime_video_embed', $_POST['sublime_video_embed']);


        //attachment save 
    if(!wp_verify_nonce($_POST['wp_custom_attachment_nonce'], plugin_basename(__FILE__))) {  
      return $post_id;  
    } // end if  
        
 

        // Make sure the file array isn't empty  

         
        // Setup the array of supported file types. In this case, it's just PDF.  
        $supported_types = array('application/pdf');  
          
        // Get the file type of the upload  
        $arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment']['name']));  
        $uploaded_type = $arr_file_type['type'];  
          
        // Check if the type is supported. If not, throw an error.  
        if(in_array($uploaded_type, $supported_types)) {  
  
            // Use the WordPress API to upload the file  
            $upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));  
      
            if(isset($upload['error']) && $upload['error'] != 0) {  
                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);  
            } else {  
                add_post_meta($post_id, 'wp_custom_attachment', $upload);  
                update_post_meta($post_id, 'wp_custom_attachment', $upload);       
            } // end if/else  
  
        }  
          
}





add_action( 'load-post.php', 'meta_boxes_setup' );
add_action( 'load-post-new.php', 'meta_boxes_setup' );

// start ajax filter

add_action('wp_ajax_nopriv_do_ajax', 'our_ajax_function');
add_action('wp_ajax_do_ajax', 'our_ajax_function');

function our_ajax_function(){

	$industry=$_REQUEST['industry'];
	$ind=$_REQUEST['id'];
	$prodid=$_REQUEST['prodid'];
	$size=$_REQUEST['sizeid'];


if ($industry=='all'){
$args1=array(
	'posts_per_page' => -1,
	'post_type'=>array('testimonials','case_studies'),
	'orderby'=>'date',
	'order'=>'DESC'



    );


}
else{
$args1 = array(
	'posts_per_page' => -1,
		'orderby'=>'date',
	'order'=>'DESC',
'post_type'=>array('testimonials', 'case_studies'),

	'tax_query' => array(
		'relation' => 'OR',
		array(
			'taxonomy' => 'industry',
			'field' => 'id',
			'terms' => $ind
		),	
		array(
			'taxonomy' => 'prod-service',
			'field' => 'id',
			'terms' => $prodid
		),
		array(
			'taxonomy' => 'client-size',
			'field' => 'id',
			'terms' => $size
		)
	)

	);


}
$the_query = new WP_Query( $args1 );
$inc=0;
global $post;
 if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) : $the_query->the_post();
$term=wp_get_post_terms( $post->ID, 'industry');
$type=get_post_type( $post );
$hover_image=get_post_meta($post->ID, 'hover_image', TRUE);


switch($type){
case 'case_studies':
$ptype = 'Case Study';
break;
case 'testimonials':
$ptype = 'Testimonial';
break;


}

$result[$inc]='<article class="shell casethumbs" itemscope itemtype="http://schema.org/NewsArticle">
<a href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark" class="featured_image_link">'.get_the_post_thumbnail(get_the_ID(), array('itemprop' => 'image thumbnailUrl')).
'</a><a href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark" class="hover_image_link"><img class="hover_image" src="'.$hover_image.'"/></a>
<div class="data">	<div class="case_data"><strong><u>'.$ptype.'</u></strong><div class="title"><a itemprop="name headline"  href="'.get_permalink().'" >'.get_the_title().'</a>
</div></div><a href="'.get_permalink().'" class="button" >View Details</a></div></article>';

		
$inc++;
		endwhile;
	endif;

wp_reset_postdata();



	     //$ = filterposts($ind);
   
        $output=json_encode($result);

         if(is_array($output)){
        print_r($output);  
         }
         else{
        echo $output;
         }
         die;
}

//FOR NEW BLOG/NEWS ARTICLES

//readtime function 

function readtime() {
	ob_start();
	the_content();
	$postcontent = ob_get_clean();
	$wordcount = sizeof(explode(" ", $postcontent));
	$mins = round($wordcount/250, 0, PHP_ROUND_HALF_UP);

	if( $mins == 0 || $mins == 1 ) {
		return '<div class="read_number">1 </div> min. <div class="to_read">to read</div>';
	} else {
		return '<div class="read_number">' . $mins . ' </div> min. <div class="to_read">to read</div>';
	}
}

remove_filter('term_description','wpautop');

//enqueue scripts for the CTA slection in post.php

//function add_admin_javascript() {
	//wp_enqueue_script('admin-js', '/wp-content/plugins/brafton-ad-system/ad-system.js');
//}

//add_action( 'admin_head', 'add_admin_javascript');

function subcategory_links() {

	$cats = get_the_category();
	if( $cats ) {
		foreach($cats as $cat) {

			//filter out news/blog parent categories

			$id = $cat->term_id;

			if( $id == '25' || $id == '19' ) {
				return;
			} else {
				$description = $cat->category_description;
				echo '<a href="/' .$description. '-archive"><div class="subcategory-image ' . $description . '"></div></a>';
			}
		}
	}
}

function subcategory_sidebar_links() {
	$cats = array("seo", "content-marketing", "contentwriting", "contentanalytics", "videomarketing", "videos", "graphics", "socialmedia" );
	foreach($cats as $cat) {
		echo '<div class="d-1of4 t-1of4 m-1of4">';
			echo '<a href="/' .$cat. '-archive"><div class="subcategory-image ' . $cat . '"></div></a>';
		echo '</div>';
	}
}

function blog_tagbar() {

	$tags = get_tags( 'order=DESC&hide_empty=0&include=165,201,200,199,134,218' );
	
	if ($tags) {
		
		//display "all" tag- "selected" on hub pages and unselected on single.php

		echo '<a class="taglink" href="/blog">';

		
		if ( is_category( 'blog' ) ) {
			echo '<div class="selected tag">All</div>';
		} else {

			echo '<div class="tag">All</div>';
		}	

		echo '</a>';

		//display "marketing news" tag- "selected" on hub pages and unselected on single.php

		echo '<a class="taglink" href="/news">';

		
		if ( is_category( 'news' ) ) {
			echo '<div class="selected tag">Marketing News</div>';
		} else {

			echo '<div class="tag">Marketing News</div>';
		}	

		echo '</a>';


		//on individual posts, highlight relevant tags

		if( !is_archive() ) {

		    foreach($tags as $tag) {
		  	
			    $name= $tag->name;

			    $slug = $tag->slug;

			    $tagid = $tag->term_id;

			    echo '<a href="' . get_site_url() . '/tag/' . $slug . '">';

			    if( has_term( $tagid, 'post_tag') && is_single() ) {

			    	echo '<div class="selected tag">' . $name . '</div>';

				} else {

					echo '<div class="tag">' . $name . '</div>';
				}

				echo '</a>';
	  		}

	  	//for tag archives, find the slug of the current archive tag and then highlight it 
	  		
	  	} else {
	  		
	  		$obj = get_queried_object();

	  		$queried_slug = $obj->slug;
	  		
	  		foreach($tags as $tag) {
		  	
			    $name= $tag->name;

			    $slug = $tag->slug;

			    echo '<a class="taglink" href="' . get_site_url() . '/tag/' . $slug . '">';

			    if( $queried_slug == $slug ) {

			    	echo '<div class="selected tag">' . $name . '</div>';

				} else {

					echo '<div class="tag">' . $name . '</div>';
				}

				echo '</a>';
			}
	  	}
	}
}

function sidebar_tag_images() {

	$tags = get_tags( 'order=DESC&hide_empty=0&include=166,201,200,199,134,218' );

	if ($tags) {

	    foreach($tags as $tag) {
	  		$name= $tag->name;
		    $slug = $tag->slug;

		    echo '<a class="taglink" href="/tag/' . $slug . '">';
			echo '<div class="tag">' . $name . '</div>';
			echo '</a>';
  		}
	}
}

function blog_hub_sidebar_features( $content_type ) {
	if( $content_type == 'video' ) {
		$sidebar_posts = new WP_Query( 'tag_id=107&posts_per_page=1' );
	
	} elseif( $content_type == 'downloadables' ) {
		$rand = rand(0,1);
		if($rand == 0) {
			$sidebar_posts = new WP_Query( 'tag_id=188&posts_per_page=1' );
		} else {
			$sidebar_posts = new WP_Query( 'post_type=infographic&posts_per_page=1');
		}

	} elseif( $content_type == 'ebook' ) {
		$sidebar_posts = new WP_Query( 'post_type=social_media_ad&downloadables&posts_per_page=1');
	}

	while( $sidebar_posts->have_posts() ) : $sidebar_posts->the_post();
		echo '<a href="' . get_permalink() . '">';
			echo '<div class="blog-hub-sidebar-feature '. $content_type .'">';
				the_post_thumbnail( 'thumbnail' );
			echo '</div>';
		echo '</a>';
	endwhile;
}

//load some fonts since they are broken on old.brafton

function load_fonts() {
    wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans');
    wp_enqueue_style( 'googleFonts');
}
    
add_action('wp_print_styles', 'load_fonts');


//add news posts to blog category query
//add_action( 'pre_get_posts', 'custom_query_vars' );
//function custom_query_vars( $query ) {
  //if ( is_category( $blog ) && $query->is_main_query() ) {
    //$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	         //$query->set( 'post_type', 'any' );
	         //$query->set( 'cat', '228,19' );
	         //$query->set( 'orderby', 'date' );
	         //$query->set( 'posts_per_page', 10 );
	         //$query->set ( 'paged', $paged );
	         //$query->set ( 'order', 'DESC');
  	//}
  //return $query;
//}