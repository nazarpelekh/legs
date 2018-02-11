<?php get_header(); ?>

	<div class="return-block"><a href="#">RETOUR</a></div>

	<section class="page-board" style='background-image: url("<?php the_field('background','cpt_legs') ?>");'></section>

	<section class="page-title-section">
		<div class="container">
			<div class="page-title"><?php the_field('title','cpt_legs') ?></div>
			<h3><?php the_field('subtitle','cpt_legs') ?></h3>
		</div>
	</section>

    <section class="breadcrumbs-section">
        <div class="container">
			<?php if (function_exists('yoast_breadcrumb')) yoast_breadcrumb('<div class="breadcrumbs clearfix">', '</div>'); ?>
        </div>
    </section>

	<section class="dessiers-main-section">
		<div class="container">
			<div class="main-text-block text-center">
				<?php the_field('text','cpt_legs') ?>
			</div>

            <ul class="dessiers-list clearfix">
			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <li class="block-left">
                        <a href="<?php the_permalink() ?>" class="wrap-block text-center" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
                            <h3  class="title-block"><?php the_title() ?></h3>
                            <div class="description-block"><?php echo wp_trim_words( get_the_content(), 25, '...' ); ?></div>
                            <div class="author">Par Isabelle Bourdel, Responsable de libéralités FDF</div>
                            <button class="button button--white"><span>voir ></span></button>
                        </a>
                    </li>
			    <?php endwhile; endif; ?>
            </ul>

			<?php wp_pagenavi(); ?>
		</div>
	</section>

	<section class="want-to-know-section">
		<div class="container text-center">
			<h4>Vous souhaitez en savoir plus sur le legs <br/>ou la création d'une fondation ?</h4>
			<a href="#" class="button button--white-alt">contactez-nous ></a>
		</div>
	</section>

	<div class="button-to-top">
		<span class="fa fa-angle-up"></span>
		Haut <br/>de la page
	</div>

<?php get_footer(); ?>