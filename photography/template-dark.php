<?php
/* 
Template Name: Dark mode
Template Post Type: post, page, photo
*/

get_header();

?>
<div class="template-dark">
	<?php

	while (have_posts()) :
		the_post();
		get_template_part('template-parts/content/content-page');
		if (comments_open() || get_comments_number()) {
			comments_template();
		}
	endwhile;

	?>
</div>
<script>
	document
		.querySelector('.template-dark')
		.parentNode
		.style.background = 'black';
</script>
<?php

get_footer('widget');
