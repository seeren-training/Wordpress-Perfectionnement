<?php

/* 
Template Name: No Widget
Template Post Type: page
*/

get_header();

while (have_posts()) :
	the_post();
	get_template_part('template-parts/content/content-page');
	if (comments_open() || get_comments_number()) {
		comments_template();
	}
endwhile;

get_footer();
