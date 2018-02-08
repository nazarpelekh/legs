<?php get_header(); ?>

<section class="page-board front-board" style='background-image: url("<?php the_field('top_b_img'); ?>");'>
    <a href="#" class="logo-board"><img src="<?php the_field('top_b_logo'); ?>" alt=""></a>
    <div class="board-text"><?php the_field('top_b_caption'); ?></div>
    <div class="scroll-button scroll-button--down"></div>
</section>
            
            <?php
                $args = array(
                    'post_type' => 'blog',
                    //'orderby' => 'name',
                    'order' => 'ASC',
                    'hide_empty'  => 0,
                    'taxonomy' => 'blog_artical_category',
                    'pad_counts' => false
                );
                $categories = get_categories($args);
            ?>

            <?php foreach ($categories as $category) {
                $args = array(
                    'post_type' => 'blog',
                    'blog_artical_category' => $category->name,
                );
                $loop = new WP_Query($args);
                while ($loop->have_posts()) {
                    $loop->the_post();
                    ?>
                        <?php echo $category->name; ?><br>
                        <?php the_title(); ?> <br>
                        <?php echo get_the_post_thumbnail_url($post,'full' ) ?><br>
                        <?php echo get_the_date('d F o'); ?><br>
                        <?php the_excerpt(); ?><br>
                <?php   }
            } ?>
            <?php foreach ($categories as $category) { ?>
                <a href="<?php echo get_term_link($category->term_id, $category->taxonomy); ?>"><?php echo $category->name; ?></a>
            <?php } ?>
            <?php wp_reset_query(); ?>









<a id="front-anchor"></a>
<section class="news-front-section">

	<?php
	$args = array(
		'post_type'   => 'blog',
		'post_status' => 'publish',
	);

	$testimonials = new WP_Query( $args );
	if( $testimonials->have_posts() ) :
		?>
        <ul>
			<?php
			while( $testimonials->have_posts() ) :
				$testimonials->the_post();
				?>
                <li><?php printf( '%1$s - %2$s', get_the_title(), get_the_content() );  ?></li>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
        </ul>
		<?php
	else :
		esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
	endif;
	?>

	<?php if (have_posts()) : $p = 0; while (have_posts()) : the_post(); ?>
        <div class="posts">
		<?php if($p == 0 && $paged == 1) { ?>
            <a href="<?php the_permalink(); ?>" class="first_post post">
                <div class="post__thumb"><?php the_post_thumbnail('single');?></div>
                <div class="post__content">
                    <h4><?php the_title(); ?></h4>
                    <time datetime="<?php echo get_the_date('M. j. Y'); ?>"><?php echo get_the_date(); ?></time>
                    <!--                                <p>--><?php //echo wp_trim_words(get_the_content(), 50, ''); ?><!--...<i class="more icon-right-btn"> Read More</i></p>-->
                    <p><?php echo substr( strip_tags( get_the_content() ), 0, 146 );; ?>...</p>
                    <i class="more icon-right-btn"> Read More</i>
                </div>
            </a>
		<?php } else { ?>
            <div class="post">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('prev_index');?></a>
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date('M. j. Y'); ?></time>
                <p><?php echo wp_trim_words(get_the_content(), 35, ''); ?><a href="<?php the_permalink(); ?>" class="more icon-right-btn"> Read More</a></p>
            </div>
		<?php } ?>
		<?php $p++; endwhile; ?>
        </div>
	<?php endif; ?>

    <div class="container">
        <div class="news-block news-block--large clearfix">
            <div class="news-img block-left"><img src="<?php echo get_template_directory_uri(); ?>/img/img-01.jpg" alt=""></div>
            <div class="news-text block-left">
                <div class="attribute-news clearfix">
                    <div class="attr-name block-left">DOSSIER</div>
                    <div class="news-date block-right">10 juin 2017</div>
                </div>
                <div class="news-title">Assouplissement du droit de succession</div>
                <div class="news-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam faucibus posuere eros, eget eleifend tortor hendrerit eget. Proin orci nulla, posuere vel ante eu, suscipit cursus augue. Sed consectetur dolor eget molestie pharetra. Curabitur suscipit metus sollicitudin, efficitur mi semper, dictum purus. Phasellus dictum felis purus, nec consequat ipsum volutpat eu. Proin non elementum lectus. Nam porttitor dignissim </div>
                <a href="#" class="news-link">Lire la suite</a>
            </div>
        </div>
        <div class="news-list-block clearfix">
          <div class="news-block block-left">
            <div class="news-img"><img src="<?php echo get_template_directory_uri(); ?>/img/img-02.jpg" alt=""></div>
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
            <div class="news-img"><img src="<?php echo get_template_directory_uri(); ?>/img/img-03.jpg" alt=""></div>
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
            <div class="news-img"><img src="<?php echo get_template_directory_uri(); ?>/img/img-03.jpg" alt=""></div>
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
        <div class="news-front-links text-center">
            <a href="#" class="button"><span>TOUS NOS DOSSIERS ></span></a>
            <a href="#" class="button"><span>TOUtes les actualités ></span></a>
        </div>
    </div>
</section>

<section class="front-question-section">
    <div class="container">
        <div class="question-block clearfix">
            <div class="img-block block-left"><img src="<?php the_field("h_question_bg"); ?>" alt=""></div>
            <div class="text-block block-left">
                <h2><?php the_field("h_questions_title"); ?></h2>
                <?php the_field('h_questions_sub_title'); ?>
                <ul>
                    <?php
                    // check if the repeater field has rows of data
                    if( have_rows('h_list_item') ):
                    // loop through the rows of data
                    while ( have_rows('h_list_item') ) : the_row(); ?>
                    <li><div class="q-icon"><img src="<?php  the_sub_field('pictogram'); ?>" alt=""></div><?php  the_sub_field('text'); ?></li>
                    <?php
                    endwhile;
                    else :
                        // no rows found
                    endif;
                    ?>
                </ul>
                <a href="<?php the_field("h_question_b_left_link"); ?>" class="button button--q01 button--blue-alt"><span><?php the_field("h_question_b_left"); ?></span></a>
                <a href="<?php the_field("h_question_b_right_link"); ?>" class="button button--q02 button--blue"><span><?php the_field("h_question_b_right"); ?></span></a>
            </div>
        </div>
    </div>
</section>

<section class="front-temoignent-section">
    <div class="container text-center">
        <h2>ils témoignent</h2>
        <div class="video-block">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/52zmpRT5RFg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
        <div class="text-left">
            <h3>Lorem Ipsum dolor set amet lorem</h3>
            <p>Quam ob rem ut ii qui superiosuperiores sunt submittere se debent in amicitia, sic quodamsuperiores sunt submittere se debent in amicitia, sic quodamres sunt submittere se debent in amicitia, sic quodam modo inferiloremores </p>
        </div>
        <a href="#" class="button"><span>tous les témoignages ></span></a>
    </div>
</section>

<section class="front-experts-section">
    <div class="container text-center">
        <h2>nos experts</h2>
        <article>Notre réseau d’experts de terrain nous permet d’élargir notre accompagnement aux thématiques de chaque projet :<br/>
            Responsable de libéralités, Conseiller financier, etc...</article>
        <ul class="experts-list">
            <li>
                <div class="expert-photo"><img src="<?php echo get_template_directory_uri(); ?>/img/img-06.jpg" alt=""></div>
                <div class="e-name">John Doe</div>
                <div class="e-post">Conseiller financier pour la Fondation de France</div>
                <div class="e-text">
                    Quam ob rem ut ii qui superiosuperiores sunt submittere se debent in amicitia sic quodamsuperiores sunt submittere se debent in amicitia, si
                </div>
            </li>
            <li>
                <div class="expert-photo"><img src="<?php echo get_template_directory_uri(); ?>/img/img-06.jpg" alt=""></div>
                <div class="e-name">John Doe2</div>
                <div class="e-post">Conseiller financier pour la Fondation de France</div>
                <div class="e-text">
                    Quam ob rem ut ii qui superiosuperiores sunt submittere se debent in amicitia sic quodamsuperiores sunt submittere se debent in amicitia, si
                </div>
            </li>
            <li>
                <div class="expert-photo"><img src="<?php echo get_template_directory_uri(); ?>/img/img-06.jpg" alt=""></div>
                <div class="e-name">John Doe3</div>
                <div class="e-post">Conseiller financier pour la Fondation de France</div>
                <div class="e-text">
                    Quam ob rem ut ii qui superiosuperiores sunt submittere se debent in amicitia sic quodamsuperiores sunt submittere se debent in amicitia, si
                </div>
            </li>
        </ul>
        <div class="expert-text-block">
            <div class="expert-name">John Doe</div>
            <div class="expert-post">Conseiller financier pour la Fondation de France</div>
            <div class="expert-text">
                Quam ob rem ut ii qui superiosuperiores sunt submittere se debent in amicitia sic quodamsuperiores sunt submittere se debent in amicitia, si
            </div>
        </div>
        <a href="#" class="button button--blue-alt"><span>découvrir <br/>tous nos experts ></span></a>
    </div>
</section>

<section class="front-faq-section text-center">
    <div class="container">
        <h2>ENCORE DES QUESTIONS ?</h2>
        <article>Cognitis enim pilatorum caesorumque funeribus nemo deinde ad has stationes appulit navem, s</article>
        <div class="wrap-list-block clearfix">
            <div class="faq-column block-left">
                <ul class="faq-list text-left">
                    <li>
                        <div class="wrap-block"><span>Mon legs peut-il servir à créer une fondation ?</span></div>
                        <div class="answer-block">
                            <div class="wrap-inner-block">Illud tamen clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant.
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="wrap-block"><span>Dans quel cas bénéficier d'une exonération de droits de succession ?</span></div>
                        <div class="answer-block">
                            <div class="wrap-inner-block">Illud tamen clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant.
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="wrap-block"><span>J'ai choisi de faire un legs, comment serez-vous informé de mon décès ?</span></div>
                        <div class="answer-block">
                            <div class="wrap-inner-block">Illud tamen clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant.
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="faq-column block-left">
                <ul class="faq-list text-left">
                    <li>
                        <div class="wrap-block"><span>Comment faire un legs sans déshériter ses enfants ?</span></div>
                        <div class="answer-block">
                            <div class="wrap-inner-block">Illud tamen clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant.
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="wrap-block"><span>Comment vendre les biens immobiliers qui vous sont légués ?</span></div>
                        <div class="answer-block">
                            <div class="wrap-inner-block">Illud tamen clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant.
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="wrap-block"><span>Comment vendre les biens immobiliers qui vous sont légués ?</span></div>
                        <div class="answer-block">
                            <div class="wrap-inner-block">Illud tamen clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant.
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="faq-buttons-block">
            <a href="#" class="button"><span>toutes vos questions ></span></a>
            <a href="#" class="button button--blue"><span>posez votre question ></span></a>
        </div>
        <div class="scroll-button scroll-button--up"></div>
    </div>
</section>

<section class="front-brand-section">
    <div class="container">
        <h2 class="text-center">ils parlent de nous</h2>
        <ul class="brand-list">
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/logo-notaires.png" alt=""></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/logo-senior.png" alt=""></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/logo-aider.jpg" alt=""></li>
            <li><img class="tablet-200" src="<?php echo get_template_directory_uri(); ?>/img/logo-figaro.png" alt=""></li>
        </ul>
    </div>
</section>

<?php get_footer(); ?>