<?php get_header(); ?>

  <div class="return-block"><a href="#">RETOUR</a></div>

  <section class="page-board" style='background-image: url("<?php the_field('background','cpt_faq') ?>");'></section>

  <section class="page-title-section">
    <div class="container">
      <div class="page-title"><?php the_field('title','cpt_faq') ?></div>
      <h3><?php the_field('subtitle','cpt_faq') ?></h3>
    </div>
  </section>

    <section class="breadcrumbs-section">
        <div class="container">
      <?php if (function_exists('yoast_breadcrumb')) yoast_breadcrumb('<div class="breadcrumbs clearfix">', '</div>'); ?>
        </div>
    </section>

    <section class="page-content">
    <div class="container">

        <div class="page-text-content text-center">
          <?php the_field('text','cpt_faq') ?>
        </div>

        <ul class="faq-page-list">

  <?php 
  $iterator = 0;
  if($member_group_terms = get_terms('faq_artical_category')){ ?>
            <?php foreach ($member_group_terms as $member_group_term) {
              $member_group_query = new WP_Query(array(
                'post_type'      => 'faq',
                'posts_per_page' => -1,
                // 'order'          => 'ASC',
                //'orderby'        => 'default_date',
                'tax_query'      => array(
                  array(
                    'taxonomy' => 'faq_artical_category',
                    'field'    => 'slug',
                    'terms'    => array($member_group_term->slug),
                    'operator' => 'IN'
                  )
                )
              ));
              ?>
                <?php
                $args = array(
                  'posts_per_page' => -1,
                  'order'          => 'ASC',
                  'orderby' => 'menu_order',
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'faq_artical_category',
                      'field'    => 'term_id',
                      'terms'    => $member_group_term->term_id,
                      'operator' => 'IN'
                    )
                  )
                );

                $query = new WP_Query( $args );    ?>


                           
            <li>
                <div class="question-block" data-collapse="true" data-target="q<?php echo $iterator; ?>">
                    <span><?php echo $member_group_term->name; ?></span>
                </div>
                <div id="q<?php echo $iterator; ?>" class="answer-block">
                    <div class="innter-wrap">
                <?php

                if ( $query->have_posts() ) {
                  while ( $query->have_posts() ) {
                    $query->the_post();
                    echo '<p><a href="' . get_field('faq_link') . '">' . get_the_title() . '</a></p>';
                  }
                }
                wp_reset_postdata();

                ?>
                    </div>
                </div>
            </li> 

          
              <?php
              // Reset things, for good measure
              $member_group_query = null;
              wp_reset_postdata();
   $iterator++;         
 } ?>

  <?php } ?>
</ul> 

    </div>

</section>

<div class="content-link-block">
  <div class="container">
    <ul class="content-link-list clearfix">
      <li class="block-left width-33 text-center">
        <div class="wrapper">
          <div class="icon-block">
            <div class="icon icon--list"></div>
          </div>
          <strong class="description">Découvrir notre expertise sur le legs et la création de fondations au travers de nos dossiers.</strong>
          <a href="#" class="button"><span>TOUS NOS DOSSIERS ></span></a>
        </div>
      </li>
      <li class="block-left width-33 text-center">
        <div class="wrapper">
          <div class="icon-block">
            <div class="icon icon--letter"></div>
          </div>
          <strong class="description">Si vous ne trouvez pas la réponse à votre question, contactez notre équipe d'expert.</strong>
          <a href="#" class="button"><span>contactez-nous ></span></a>
        </div>
      </li>
      <li class="block-left width-33 text-center">
        <div class="wrapper">
          <div class="icon-block">
            <div class="icon icon--book"></div>
          </div>
          <strong class="description">Un terme, un mot incompris, consultez notre glossaire.</strong>
          <a href="#" class="button"><span>notre glossaire ></span></a>
        </div>
      </li>
    </ul>
  </div>
</div>

<div class="button-to-top">
  <span class="fa fa-angle-up"></span>
  Haut <br/>de la page
</div>

<?php get_footer(); ?>