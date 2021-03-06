<?php get_header(); ?>

    <div class="return-block"><a href="#">RETOUR</a></div>

    <section class="page-board" style='background-image: url(<?php the_post_thumbnail_url() ?>);'></section>

    <section class="page-title-section">
        <div class="container">
            <div class="page-title"><?php the_title() ?></div>
            <h3><?php the_field( 'subtitle' ); ?></h3>
        </div>
    </section>

    <section class="breadcrumbs-section">
        <div class="container">
			<?php if (function_exists('yoast_breadcrumb')) yoast_breadcrumb('<div class="breadcrumbs clearfix">', '</div>'); ?>
        </div>
    </section>

    <section class="main-page-section">
        <div class="container clearfix">
            <div class="page-navigation-top">
                <div class="page-navigation text-center">
	                <?php if (get_previous_post_link()) { ?>
		                <?php $prevPost = get_previous_post(true);
		                $prev_post = get_adjacent_post(false, '', true);
		                ?>
                        <a href="<?php echo $previous_post_url = get_permalink( get_adjacent_post(false,'',true)->ID ); ?>" class="page-nav page-prev"><span class="fa fa-angle-left"></span></a>
                    <?php } ?>
	                <?php if (get_next_post_link()) { ?>
		                <?php $nextPost = get_next_post(true);
		                $next_post = get_adjacent_post(false, '', false);
		                ?>
                        <a href="<?php echo $next_post_url = get_permalink( get_adjacent_post(false,'',false)->ID ); ?>" class="page-nav page-next"><span class="fa fa-angle-right"></span></a>
	                <?php } ?>
                    <div class="text-block">
	                    <?php $terms = get_terms( array(
		                    'taxonomy'       => 'legs_artical_category'
                        ));
	                    foreach ( $terms as $term ) {
		                    echo $term->name;
		                    echo '<span class="page-numb">' . $term->term_id  .' | ' . $term->count . '</span>';
	                    } ?>
                    </div>
                </div>
            </div>
            <div class="page-content block-left width-75 page-content-column">
                <div class="page-attribute clearfix">
                    <div class="page-date block-left">PUBLIÉ LE 28/07/2017 à 14H23 par <strong class="author">Sabine Legret-Gontier, responsable de libéralités</strong></div>
                    <ul class="social-block block-right clearfix">
                        <li class="block-left"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"><span class="fa fa-facebook"></span></a></li>
                        <li class="block-left"><a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>"><span class="fa fa-twitter"></span></a></li>
                        <li class="block-left"><a href="#"><span class="fa fa-envelope"></span></a></li>
                    </ul>
                </div>

	            <?php include 'parts/flexible.php'?>


            </div>
            <aside class="aside-dossier block-left width-25">
                <div class="dossier-block text-left">
                    <div class="title-block">SOMMAIRE DU DOSSIER</div>
                    <ul>
	                    <?php if (get_previous_post_link()) { ?>
		                    <?php $prevPost = get_previous_post(true);
		                    $prev_post = get_adjacent_post(false, '', true);
		                    ?>
                            <li><?php  echo $prev_post->post_title ?></li>
	                    <?php } ?>
                        <li><?php the_title(); ?></li>
	                    <?php if (get_next_post_link()) { ?>
		                    <?php $nextPost = get_next_post(true);
		                    $next_post = get_adjacent_post(false, '', false);
		                    ?>
		                    <li><?php echo $next_post->post_title ?></li>
	                    <?php } ?>
                    </ul>
                </div>
                <a href="#" class="button button--blue"><span>faites un legs ></span></a>
                <a href="#" class="button button--blue"><span>créez une fondation ></span></a>
            </aside>
            <div class="page-navigation-bottom">
                <div class="page-navigation text-center">
		            <?php if (get_previous_post_link()) { ?>
			            <?php $prevPost = get_previous_post(true);
			            $prev_post = get_adjacent_post(false, '', true);
			            ?>
                        <a href="<?php echo $previous_post_url = get_permalink( get_adjacent_post(false,'',true)->ID ); ?>" class="page-nav page-prev"><span class="fa fa-angle-left"></span></a>
		            <?php } ?>
		            <?php if (get_next_post_link()) { ?>
			            <?php $nextPost = get_next_post(true);
			            $next_post = get_adjacent_post(false, '', false);
			            ?>
                        <a href="<?php echo $next_post_url = get_permalink( get_adjacent_post(false,'',false)->ID ); ?>" class="page-nav page-next"><span class="fa fa-angle-right"></span></a>
		            <?php } ?>
                    <div class="text-block">
			            <?php $terms = get_terms( array(
				            'taxonomy'       => 'legs_artical_category'
			            ));
//			            var_dump($terms);
			            foreach ( $terms as $term ) {
				            echo $term->name;
				            echo '<span class="page-numb">' . $term->term_id  .' | ' . $term->count . '</span>';
			            } ?>
			            <?php wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="list-dessiers-section">
        <div class="container">
            <h2>Ces dossiers peuvent aussi vous intéresser</h2>
            <div class="news-list-block clearfix">

	            <?php

	            $posts = get_field('related_posts');

	            if( $posts ): ?>
			            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				            <?php setup_postdata($post); ?>
                            <div class="news-block block-left">
                                <div class="news-img"><img src="<?php echo get_the_post_thumbnail_url($post,'full' ) ?>" alt=""></div>
                                <div class="news-text">
                                    <div class="attribute-news clearfix">
                                        <div class="attr-name block-left">DOSSIER</div>
                                        <div class="news-date block-right"><?php echo get_the_date('d F o'); ?></div>
                                    </div>
                                    <div class="news-title"><?php the_title(); ?></div>
                                    <a href="<?php the_permalink(); ?>" class="news-link">Lire la suite</a>
                                </div>
                            </div>
			            <?php endforeach; ?>
		            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	            <?php endif; ?>

                <div class="news-block block-left">
                    <div class="news-img"><img src="<?php the_field('image_adv','option') ?>" alt=""></div>
                    <div class="news-text">
                        <div class="attribute-news clearfix">
                            <div class="attr-name block-left"><?php the_field( 'category_adv','option' ); ?></div>
                            <div class="news-date block-right"><?php the_field( 'date_adv','option' ); ?></div>
                        </div>
                        <div class="news-title"><?php the_field( 'title','option' ); ?></div>
                        <a href="https://www.fondationdefrance.org/" target="_blank" class="news-link">Lire la suite</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="button-to-top">
        <span class="fa fa-angle-up"></span>
        Haut <br/>de la page
    </div>

<?php get_footer(); ?>