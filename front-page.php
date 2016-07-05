<?php get_header(); ?>

<div id="intro" class="wrap">
	<h2>Steadfast content marketing experience</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar. Donec tristique ante at dapibus dignissim. Nunc quis justo risus. Vivamus at nulla sed velit dictum facilisis non id ante. Maecenas dictum rutrum odio ut consectetur. Mauris lobortis eget neque sit amet tincidunt. Morbi fringilla quam ante, quis interdum est vehicula a. Proin finibus pharetra massa, ut tempor nisi mattis eget. </p>
	<a class="black-btn">See More Clients</a>
</div>

<div id="writers">
	<div class="wrap">
		<h2>Meet your extended marketing team</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar. Donec tristique ante at dapibus dignissim. Nunc quis justo risus. Vivamus at nulla sed velit dictum facilisis non id ante.</p>
		<a class="green-btn">Meet your writers</a>
	</div>
</div>

<div id="how" class="wrap">
	<h2>How it works</h2>
	<div class="d-all t-all m-all">
		<div class="grid-col d-1of3 t-1of3 m-1of3">
			<p><img src="<?php echo get_template_directory_uri(); ?>/library/images/nothumb.gif" /></p>
			<a href="#">Content Strategy</a>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar.</p>
		</div>
		<div class="grid-col d-1of3 t-1of3 m-1of3">
			<p><img src="<?php echo get_template_directory_uri(); ?>/library/images/nothumb.gif" /></p>
			<a href="#">Content Creation</a>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar.</p>
		</div>
		<div class="grid-col d-1of3 t-1of3 m-1of3">
			<p><img src="<?php echo get_template_directory_uri(); ?>/library/images/nothumb.gif" /></p>
			<a href="#">Content Distribution</a>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar.</p>
		</div>
	</div>
	<div class="d-all t-all m-all">
		<div class="grid-col d-1of3 t-1of3 m-1of3">
			<div class="d-1of2 t-1of2 m-1of2">
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/nothumb.gif" />
			</div>
			<div class="d-1of2 t-1of2 m-1of2">
				<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit."</p>
				<span class="author">Author Name</span>
				<span class="company">The Company</span>
			</div>
		</div>
		<div class="grid-col d-1of3 t-1of3 m-1of3">
			<div class="d-1of2 t-1of2 m-1of2">
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/nothumb.gif" />
			</div>
			<div class="d-1of2 t-1of2 m-1of2">
				<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit."</p>
				<span class="author">Author Name</span>
				<span class="company">The Company</span>
			</div>
		</div>
		<div class="grid-col d-1of3 t-1of3 m-1of3">
			<div class="d-1of2 t-1of2 m-1of2">
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/nothumb.gif" />
			</div>
			<div class="d-1of2 t-1of2 m-1of2">
				<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit."</p>
				<span class="author">Author Name</span>
				<span class="company">The Company</span>
			</div>
		</div>
	</div>
</div>

<div id="demo">
	<div class="wrap">
		<h2>Request a demo</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere facilisis nibh efficitur pulvinar.</p>
		<?php get_template_part('marketoforms/contact_marketo_form'); ?>
	</div>
</div>

<?php get_footer(); ?>