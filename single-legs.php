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
                    <a href="#" class="page-nav page-prev"><span class="fa fa-angle-left"></span></a>
                    <a href="#" class="page-nav page-next"><span class="fa fa-angle-right"></span></a>
                    <div class="text-block">Lorem ipsum et doloris amoris et omni <span class="page-numb">2 | 3</span></div>
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
                        <li>Lorem ipsum et doloris amoris et omni</li>
                        <li>Lorem ipsum et doloris doloris eiusmod tempor doloris eiusmod</li>
                        <li>Lorem ipsum et doloris doloris eiusmod tempor doloris eiusmod</li>
                    </ul>
                </div>
                <a href="#" class="button button--blue"><span>faites un legs ></span></a>
                <a href="#" class="button button--blue"><span>créez une fondation ></span></a>
            </aside>
            <div class="page-navigation-bottom">
                <div class="page-navigation text-center">
                    <a href="#" class="page-nav page-prev"><span class="fa fa-angle-left"></span></a>
                    <a href="#" class="page-nav page-next"><span class="fa fa-angle-right"></span></a>
                    <div class="text-block">Lorem ipsum et doloris amoris et omni <span class="page-numb">2 | 3</span></div>
                </div>
            </div>
        </div>
    </section>

    <section class="list-dessiers-section">
        <div class="container">
            <h2>Ces dossiers peuvent aussi vous intéresser</h2>
            <div class="news-list-block clearfix">
                <div class="news-block block-left">
                    <div class="news-img"><img src="img/img-02.jpg" alt=""></div>
                    <div class="news-text">
                        <div class="attribute-news clearfix">
                            <div class="attr-name block-left">ACTUALITÉ</div>
                            <div class="news-date block-right">10 juin 2017</div>
                        </div>
                        <div class="news-title">Testament : les erreurs à ne pas commettre</div>
                        <a href="#" class="news-link">Lire la suite</a>
                    </div>
                </div>
                <div class="news-block block-left">
                    <div class="news-img"><img src="img/img-03.jpg" alt=""></div>
                    <div class="news-text">
                        <div class="attribute-news clearfix">
                            <div class="attr-name block-left">DOSSIER</div>
                            <div class="news-date block-right">10 juin 2017</div>
                        </div>
                        <div class="news-title">Comment pérenniser sa générosité</div>
                        <a href="#" class="news-link">Lire la suite</a>
                    </div>
                </div>
                <div class="news-block block-left">
                    <div class="news-img"><img src="img/img-03.jpg" alt=""></div>
                    <div class="news-text">
                        <div class="attribute-news clearfix">
                            <div class="attr-name block-left">ACTUALITÉ</div>
                            <div class="news-date block-right">10 juin 2017</div>
                        </div>
                        <div class="news-title">Le PACS : Moins protecteur que le mariage en cas de décès</div>
                        <a href="#" class="news-link">Lire la suite</a>
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