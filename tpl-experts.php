<?php
/*
Template Name: Experts
*/
?>
<?php get_header(); ?>
<?php

$args = array(
	'blog_id'      => $GLOBALS['blog_id'],
	'role'         => '',
	'role__in'     => array(),
	'role__not_in' => array(),
	'meta_key'     => '',
	'meta_value'   => '',
	'meta_compare' => '',
	'meta_query'   => array(),
	'include'      => array(),
	'exclude'      => array(),
	'orderby'      => 'login',
	'order'        => 'ASC',
	'offset'       => '',
	'search'       => '',
	'search_columns' => array(),
	'number'       => '',
	'paged'        => 1,
	'count_total'  => false,
	'fields'       => 'all',
	'who'          => '',
	'has_published_posts' => null,
	'date_query'   => array() // смотрите WP_Date_Query
);
$users = get_users( $args );
foreach( $users as $user ){
	// обрабатываем
	echo '<li>' . $user->user_email . '</li>';
	echo '<li>' . $user->user_login . '</li>';
	echo '<li>' . $user->user_nicename . '</li>';
	echo '<li>' . $user->display_name . '</li>';
}
echo "<pre>";
echo print_r($user);
echo "</pre>";
wp_reset_postdata();
?>
<?php get_footer(); ?>