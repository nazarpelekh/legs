<?php
/**
 * The template is for displaying search results
 *
 * @package WordPress
 * @subpackage legs
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
<h1 style="">Search results for: <?php the_search_query(); ?></h1>

<?php // get_search_form(); ?>

<?php while (have_posts()) : the_post(); 
		get_template_part('search-result');
 endwhile; 
	//get_template_part('nav');		
else :		
	get_template_part( 'content', 'none' ); 
endif; ?>

<?php get_footer(); ?>